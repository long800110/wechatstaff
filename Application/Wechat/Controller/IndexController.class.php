<?php
namespace Wechat\Controller;
use Think\Controller;
use Org\Wechat\Thinkphp\TPWechat;
use Org\Wechat\Wechat;


class IndexController extends Controller {
	public function index() {
		$options = C("WECHAT_OPTIONS");
		$weObj = new TPWechat($options);
		$weObj->valid();
		$type = $weObj->getRev()->getRevType();
		switch ($type) {
			case Wechat :: MSGTYPE_EVENT :
				$this->handleEvent($weObj);
				break;
			default :
				$weObj->text("The operation do not be support so far, more function, so stay tuned")->reply();
		}
	}
	public function bind() {
		$options = C("WECHAT_OPTIONS");
		$weObj = new TPWechat($options);
		$openId = I("openId");
		session('openId', $openId);
		$userINfo = $weObj->getUserInfo($openId);
		$this->assign("nickName", $userINfo['nickname']);
		$this->display();
	}
	public function validateBind() {
		$pwid = I("username");
		$password = I("password");
		$validateRes = true;
		// PWID和密码的基本校验，如长度是否合法等
		if (strlen($pwid) != 7 and is_numeric($pwid) and strlen($password) > 0) {
			$this->error("Please input correct PWID or password.");
		}
		//TODO: 这里需要一步pwid和域密码的校验。

		//检查PWID是否在staff列表中
		$Dao = M();
		$sql = "select id from tb_staff where pwid = $pwid";
		$Staff = M("TbStaff");
		$criteria['pwid'] = $pwid;
		$rs = $Staff->where($criteria)->find();
		if (!$rs) {
			$this->error("The Staff ID is not in the staff list, please contact system administrator.");
		}
		//判断open_id是否已经在wechat_user表中
		$openId = session('openId');
		$UserStaff = M("TbRelUserStaff");
		$criteria2['pwid'] = $pwid;
		$criteria2['open_id'] = $openId;
		$rs = $UserStaff->where($criteria2)->find();
		//如果有值，说明pwid和open_id匹配，跳过
		if ($rs) {
			$this->success("success");
		}
		M()->startTrans();
		$criteria3['pwid'] = $pwid;
		$rs1 = $UserStaff->where($criteria3)->delete();
		$criteria4['open_id'] = $openId;
		$rs2 = $UserStaff->where($criteria4)->delete();
		$data['open_id'] = $openId;
		$data['pwid'] = $pwid;
		$rs3 = $UserStaff->add($data);
		if ($rs1 !== false and $rs2 !== false and $rs3) {
			M()->commit();
		} else {
			M()->rollback();
			$this->error("Tech exception, please contact system administrator.");
		}
		$this->success('Bind success');
	}
	private function handleEvent($weObj) {
		$eventMsg = $weObj->getRevEvent();
		$event = $eventMsg["event"];
		switch ($event) {
			case Wechat :: EVENT_SUBSCRIBE :
				$this->handleSubscribe($weObj);
				break;
			case Wechat :: EVENT_UNSUBSCRIBE :
				break;
			case Wechat :: EVENT_MENU_SCAN_WAITMSG :
				$this->handleMenuScanWaitmsg($weObj);
				break;
			default :
				$weObj->text("The operation do not be support so far, more function, so stay tuned")->reply();
		}
	}
	/**
	 * 对用户关注进行处理，回复文字信息，用户点击链接跳转到与staff绑定的页面
	 * */
	private function handleSubscribe($weObj) {
		$openId = $weObj->getRevFrom();
		$userINfo = $weObj->getUserInfo($openId);
		$User = M("TbWechatUser");
		$criteria['open_id'] = $openId;
		$rs = $User->where($criteria)->find();
		if ($rs) {
			$data['nickname'] = $userINfo['nickname'];
			$data['head_img_url'] = $userINfo['headimgurl'];
			$User->where($criteria)->data($data)->save();
		} else {
			$data['open_id'] = $openId;
			$data['nickname'] = $userINfo['nickname'];
			$data['head_img_url'] = $userINfo['headimgurl'];
			$User->add($data);
		}
		$bindUrl = U("Wechat/Index/bind@" . $_SERVER['SERVER_NAME']);
		$weObj->text("Welcome to subscribe Staff Webchat Platform!\n\nPlease visit <a href='" . $bindUrl . "?openId=" . $openId . "''>Here</a> to bind your Wechat Account and Staff ID. \nThanks.")->reply();
	}

	private function handleMenuScanWaitmsg($weObj) {		
		$eventMsg = $weObj->getRevEvent();
		$key = $eventMsg["key"];
		if($key == "event_scan_01"){
			//首先查看该用户是否被授权扫描该二维码，如未授权，返回相应的err_msg.
			$openId = $weObj->getRevFrom();
			$scanInfo = $weObj->getRevScanInfo();
			$scanType = $scanInfo["ScanType"];
			$scanResult = $scanInfo["ScanResult"];
			if($scanType == "qrcode"){
				//从数据表出取出扫描结果对应的二维码id
				$QRCode = M("TbQrcode");
				$criteria['scan_result'] = $scanResult;
				$rs = $QRCode->where($criteria)->find();
				if($rs){
					$qrcodeId = $rs["id"];
					error_log("qr code id === $qrcodeId");
					$AuthUserQrcode = M("VwAuthUserQrcode");
					$criteria2['auth_open_id'] = $openId;
					$criteria2['auth_qrcode_id'] = $qrcodeId;
					$rs2 = $AuthUserQrcode->where($criteria2)->find();
					if($rs2){
						//查的到，说明用户被授权扫描该二维码，继续操作
						$pwid = $rs2["auth_pwid"];
						$ScanRecord = M("TbScanRecord");
						$criteria3['pwid'] = $pwid;
						$criteria3['qrcode_id'] = $qrcodeId;
						//当前hard code为： 对于一个二维码，每个员工每天只能扫一次，该接口可扩展，二维码表中也预留了scan_limit字段，具体设计需由biz来定。  
						$rs3 = $ScanRecord->where($criteria3)->where("date(scan_date) = curdate()")->find();
						if($rs3){
							//说明该员工当天已扫过该二维码，返回相应的err_msg
							$weObj->text("You had already scaned the QR code today. One staff only can scan one QR code one time.")->reply();
						}else{
							//当天还没有扫过码，插入扫码记录并返回扫码成功的msg.
							$data['pwid'] = $pwid;
							$data['qrcode_id'] = $qrcodeId;
							$ScanRecord->add($data);
							$weObj->text("Scan QR code successfully, Thanks.")->reply();
						}
					}else{
						//查不到，说明没授权，返回err_msg.
						$weObj->text("You are not authorized to scan this QR code. Any question please contact system administrator.")->reply();
					}

				}else{
					//查不到，说明该二维码没有被维护在系统中，返回相应的err_msg
					$weObj->text("The QR code not in system, please confirm you scan a right QR code. Any question please contact system administrator.")->reply();
				}				
			}else{
				//如果scanType不等于qrcode，说明扫描的是条码，系统返回相应的err_msg.
				$weObj->text("Please scan a correct QR code.")->reply();
			}
		}else{
			$weObj->text("The operation do not be support so far, more function, so stay tuned")->reply();
		}
	}

}
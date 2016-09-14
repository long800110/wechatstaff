<?php
namespace Admin\Controller;
use Think\Controller;

class PostLoginController extends Controller {
	
	public function dashboard() {
		$Staff = M("TbStaff");
		$staffCount = $Staff->count();
		$this->assign("staffCount", $staffCount);
		$UserStaff = M("VwUserStaff");
		$userCount = $UserStaff->count();
		$this->assign("userCount", $userCount);
		$QRCode = M("TbQrcode");
		$qrcodeCount = $QRCode->count();
		$this->assign("qrcodeCount", $qrcodeCount);
		$Seat= M("TbSeat");
		$seatCount = $Seat->count();
		$this->assign("seatCount", $seatCount);
		
		$this->display();
	}
	public function listStaff() {
		$Dao = M("TbStaff");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}
	public function listUser() {
		$Dao = M("VwUserStaff");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}
	public function listRole() {
		$Dao = M("TbRole");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}
	public function listFunction() {
		$Dao = M("TbFunction");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}
	public function listBuilding() {
		$Dao = M("TbBuilding");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}
	public function listFloor() {
		$Dao = M();
		$sql = "select a.name as floor_name, a.description as floor_desc, a.status as floor_status, c.name as building_name from tb_floor a, tb_rel_building_floor b, tb_building c where a.id = b.floor_id and c.id = b.building_id";
		$list = $Dao->query($sql);
		$this->assign("list", $list);
		$this->display();
	}

	public function listQRCode() {
		$Dao = M("TbQrcode");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}
	/**
	 * 根据二维码ID获取该二维码的功能描述
	 * */
	public function getFunctionDescByQRCodeId() {
		$qrcodeId = I("qrcodeId");
		$Dao = M();
		$result = $Dao->query("SELECT description FROM tb_function WHERE id = (select function_id from tb_rel_qrcode_function where qrcode_id = $qrcodeId)");
		if (count($result) == 1) {
			$desc = $result[0]["description"];
			$this->success("$desc");
		} else {
			$this->error();
		}
	}
	public function listSeat() {
		$Dao = M("VwBuildingFloorSeat");
		$list = $Dao->select();
		$this->assign("list", $list);
		$this->display();
	}

	public function monitorSeat() {
		$Dao = M();
		$list = $Dao->query("select a.*, b.cnt, scan_date from vw_seat_qrcode a left join (select qrcode_id, count(qrcode_id) as cnt, date(scan_date) scan_date from tb_scan_record where date(scan_date) = curdate() group by qrcode_id  ) b on a.qrcode_id = b. qrcode_id order by a.seat_id");
		$this->assign("list", $list);
		$this->display();
	}

	/**
	 * 根据二维码ID获取该二维码的功能描述
	 * */
	public function getStaffInfo() {
		$qrcodeId = I("qrcodeId");
		$scanDate = I("scanDate");
		$Dao = M();
		$sql = "select pwid, name, department, cost_centre from tb_staff where pwid in (select pwid from tb_scan_record where qrcode_id = $qrcodeId and date(scan_date) = '$scanDate')";
		$list = $Dao->query($sql);
		$this->success($list);
	}

	/**
	 * 输出座位监控报表
	 * */
	public function exportSeatMonitorReport() {
		$fileType = I("fileType");
		$scanDate = I("scanDate");
		$floorId = I("floorId");
		$isMonth = I("isMonth");
		if($isMonth == 1){
			$reportTitle = "Seat Monitor Monthly Report";
			$filename = "monthly_report";
			$monthDate = substr($scanDate, 0 ,7);
			$sql = "select c.seat_name, c.building_name, c.floor_name, b.pwid, b.name, b.department, b.cost_centre, date(a.scan_date) as scandate from tb_scan_record a, tb_staff b, vw_seat_qrcode c where a.pwid = b.pwid and a.qrcode_id = c.qrcode_id and date_format(a.scan_date,'%Y-%m') = '$monthDate' and c.floor_id = $floorId order by date(a.scan_date), c.seat_name";
			
		}else{
			$reportTitle = "Seat Monitor Daily Report";
			$filename = "daily_report";
			$sql = "select c.seat_name, c.building_name, c.floor_name, b.pwid, b.name, b.department, b.cost_centre, date(a.scan_date) as scandate from tb_scan_record a, tb_staff b, vw_seat_qrcode c where a.pwid = b.pwid and a.qrcode_id = c.qrcode_id and date(a.scan_date) = '$scanDate' and c.floor_id = $floorId order by c.seat_name";
			
		}
		$Dao = M();
		$list = $Dao->query($sql);

		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");
		import("Org.Util.PHPExcel.Writer.PDF");

		
		$headArr = array (
			"Seat Name",
			"Building Name",
			"Floor Name",
			"PWID",
			"Name",
			"Department",
			"Cost Centre",
			"Date"
		);
		$this->getExcel($filename, $reportTitle, $headArr, $list, $scanDate, $fileType);
	}
	private function getExcel($fileName, $reportTitle, $headArr, $data, $reportDate, $fileType) {
		//对数据进行检验
		if (empty ($data) || !is_array($data)) {
			die("data must be a array");
		}
		//检查文件名
		if (empty ($fileName)) {
			exit;
		}

		$date = date("Y_m_d", time());
		$fileName .= "_{$date}.xls";

		//创建PHPExcel对象，注意，不能少了\
		$objPHPExcel = new \PHPExcel();
		$objProps = $objPHPExcel->getProperties();

		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $reportTitle)->setCellValue('A2', "Building Name")->setCellValue('C2', "MSD")->setCellValue('A3', "Floor")->setCellValue('C3', "MSD-F28")->setCellValue('A4', "Report Date")->setCellValue('C4', $reportDate);
		$objActSheet = $objPHPExcel->getActiveSheet();
		//设置表头
		$key = ord("A");
		foreach ($headArr as $v) {
			$colum = chr($key);
			$objActSheet->setCellValue($colum . '6', $v);
			$key += 1;
		}
		$column = 7;
		foreach ($data as $key => $rows) { //行写入
			$span = ord("A");
			foreach ($rows as $keyName => $value) { // 列写入
				$j = chr($span);
				$objActSheet->setCellValue($j . $column, $value);
				$span++;
			}
			$column++;
		}
		$fileName = iconv("utf-8", "gb2312", $fileName);
		$objPHPExcel->getActiveSheet()->setTitle('Seat Monitor');
		$objPHPExcel->setActiveSheetIndex(0);
		header("Content-Disposition: attachment;filename=\"$fileName\"");
		header('Cache-Control: max-age=0');
		if ($fileType == 'EXCEL') {
			header('Content-Type: application/vnd.ms-excel');
			$objWriter = \PHPExcel_IOFactory :: createWriter($objPHPExcel, 'Excel5');
		} else {
			//		    	$rendererName = \PHPExcel_Settings::PDF_RENDERER_MPDF;
			//				$rendererLibrary = 'mPDF5.4';
			//				$rendererLibraryPath = dirname(__FILE__).'/../../../libraries/PDF/' . $rendererLibrary;
		}
		$objWriter->save('php://output');
		exit;
	}
}
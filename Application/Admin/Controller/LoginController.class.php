<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
//    public function index(){
//		echo "hello word";
//    }

    public function login($projectName='thinkphp'){
        $this->display();
    }
    public function validate() {
    	$username = I("username");
    	$password = I("password");
    	error_log("username===$username");
    	error_log("password===$password");
    	if(strlen($username) > 0 and strlen($password) > 0){
    		error_log("login success");

    		$this->success('Login success', __ROOT__."/Admin/PostLogin/dashboard");
    	}else{
    		$this->error(0);
    	}
	}
}
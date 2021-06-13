<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User_thirdModels;
use App\Models\RoleModels;
class Home extends BaseController
{
	var $title = "Trang chính";
	function __construct(){
		$this->RoleModels = new RoleModels();
		$this->User_thirdModels = new User_thirdModels();
	}
	public function index()
	{
		
		// echo "<pre>";
		// print_r($datas);die;
		$data = array(
			'title'=>$this->title
		);
		return view('users/layout/dashboard/comment',$data?$data:NULL);
	}
	function changepass(){
		// if (!session('logged_in') == true) {return redirect()->to(base_url('/login.html'));}
		$session = session();
		$password = $this->request->getPost('password');
		$data_update['password'] = password_hash($password,PASSWORD_DEFAULT);
		$result = $this->User_thirdModels->edit($data_update,array('id'=>$session->get('id')));
		if ($result['type'] =="success") {
			echo json_encode($result);
		}
	}
	function success(){
		return view('users/layout/comment/success');
	}
}

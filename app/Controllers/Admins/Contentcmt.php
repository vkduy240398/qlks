<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\ContentcmtModels;
class Contentcmt extends BaseController
{	
	var $control = 'contentcmt';
	var $title = "Nội dung đánh giá";
	function __construct(){
		$this->ContentcmtModels = new ContentcmtModels();
	}
	public function index()
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0),'id desc');
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		$data = [
			'datas' => $branch,
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0));
		if ($this->request->getPost()) {
				$data_post = $this->request->getPost('data_post');
				$data_post['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
				// echo "<pre>";
				// print_r($data_post);die;
				$result = $this->ContentcmtModels->add($data_post);
				if ($result['type'] =="success") {
					return redirect()->to('index')->with('success',ADD_SUCCESS);
				}
				else{
					return redirect()->to('index')->with('error',ADD_FAIL);
				}
		}
		else{
			
		}
		$data = [
			'branch'	=> $branch,
			'title'		=>'Thêm mới '.$this->title,
			'control'	=>$this->control
		];
		return view('admin/layout/'.$this->control.'/add',$data?$data:NULL);
	}

	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$parent = $this->ContentcmtModels->find_one(array('id'=>$id,'parentid'=>0));
		if ($parent) {
			$result = $this->ContentcmtModels->delete_where(array('id'=>$id));
			if ($result) {
				$result_parent = $this->ContentcmtModels->delete_where(array('parentid'=>$id));
				if ($result_parent) {
					return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success','Xóa thành công');
				}
			}
		}
		else{
			$result = $this->ContentcmtModels->delete_where(array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success','Xóa thành công');
			}
		}
	
	}
	function edit($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0));
		$datas = $this->ContentcmtModels->find_one(array('id'=>$id));
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$result = $this->ContentcmtModels->edit($data_post,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'branch'	=> $branch,
			'datas'	=> $datas,
			'title'	=>'Cập nhật dữ liệu '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/edit',$data?$data:NULL);
	}
	function deleteAll(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$list_id = $this->request->getPost('list_id');
		$list_id_delete = explode(',',$list_id);
		foreach($list_id_delete as $key => $val){	
			$result =$this->ContentcmtModels->delete_where(array('id'=>$val));
			$this->ContentcmtModels->delete_where(array('parentid'=>$id));
			if ($result) {
				echo json_encode("success");
			}
		}
	}

}

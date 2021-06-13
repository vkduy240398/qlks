<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\LevelModels;
use App\Models\CriteriaModels;
class Level extends BaseController
{	
	var $control = 'level';
	var $title = "Trình độ học vị";
	function __construct(){
		$this->LevelModels = new LevelModels();
		$this->CriteriaModels = new CriteriaModels();
	}
	public function index()
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$datas = $this->LevelModels->select_array();
		$data = [
			'datas' => $datas,
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		if ($this->request->getPost()) {
				$data_post = $this->request->getPost('data_post');
				$data_post['publish']?$publish = 1:$publish = 0;
				$data_post['publish'] = $publish;
				$data_post['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
				$result = $this->LevelModels->add($data_post);
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
			'title'	=>'Thêm mới '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/add',$data?$data:NULL);
	}

	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$result = $this->LevelModels->delete_where(array('id'=>$id));
		if ($result) {
			return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success','Xóa thành công');
		}
	}
	function edit($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$datas = $this->LevelModels->find_one(array('id'=>$id));
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_post['publish']?$publish = 1:$publish = 0;
			$data_post['publish'] = $publish;
			$data_post['updated_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
			$result = $this->LevelModels->edit($data_post,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.$this->control.'/index'))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'datas'	=> $datas,
			'title'	=>'Cập nhật dữ liệu '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/edit',$data?$data:NULL);
	}
	function checkglobals(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$id = $this->request->getPost('id');
		$global = $this->request->getPost('global');
		$properties = $this->request->getPost('properties');
		$dataUpdate[$properties] = $global;
		$result = $this->LevelModels->edit($dataUpdate,array('id'=>$id));
		if ($result) {
			echo json_encode($result);
		}
	}
	function deleteAll(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$list_id = $this->request->getPost('list_id');
		// echo $list_id;die;
		$list_id_delete = explode(',',$list_id);
		foreach($list_id_delete as $key => $val){	
			$result =$this->LevelModels->delete_where(array('id'=>$val));
			if ($result) {
				echo json_encode("success");
			}
		}
	}

}

<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\RoleModels;
use App\Models\CriteriaModels;
use App\Models\ContentModels;
class Criteria extends BaseController
{	
	var $control = 'criteria';
	var $title = "Tiêu chí";
	function __construct(){
		$this->RoleModels = new RoleModels();
		$this->CriteriaModels = new CriteriaModels();
		$this->ContentModels = new ContentModels();
	}
	public function index($id)
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$name_role = $this->RoleModels->find_one(array('id'=>$id));
		$datas = $this->CriteriaModels->select_array(NULL,array('id_role'=>$id),'sort asc,id desc');
		foreach($datas as $key => $val){
			$datas[$key]['content'] = $this->ContentModels->select_array(NULL,array('id_criteria'=>$val['id']));
		}
	
		$data = [
			'id'	=> $id,
			'datas' => $datas,
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control,
			'name_role'	=> $name_role['name']
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$sort_max = $this->CriteriaModels->select_max('sort',array('id_role'=>$id));
		if ($this->request->getPost()) {
				$data_post = $this->request->getPost('data_post');
				$data_post['publish']?$publish = 1:$publish = 0;
				$data_post['publish'] = $publish;
				$data_post['id_role'] = $id;
				$data_post['sort'] = $sort_max['sort']+1;
				$data_post['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
				$result = $this->CriteriaModels->add($data_post);
				if ($result['type'] =="success") {
					return redirect()->to(base_url(ADMIN.'criteria/index/'.$id))->with('success',ADD_SUCCESS);
				}
				else{
					return redirect()->to('index')->with('error',ADD_FAIL);
				}
		}
		else{
			
		}
		$role = $this->RoleModels->select_array();
		$data = [
			'id'	=> $id,
			'role'	=> $role,
			'title'	=>'Thêm mới '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/add',$data?$data:NULL);
	}

	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$id_role = $this->CriteriaModels->find_one(array('id'=>$id));
		$result = $this->CriteriaModels->delete_where(array('id'=>$id));
		if ($result) {
			return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$id_role['id_role']))->with('success','Xóa thành công');
		}
	}
	function edit($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$datas = $this->CriteriaModels->find_one(array('id'=>$id));
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_post['publish']?$publish = 1:$publish = 0;
			$data_post['publish'] = $publish;
			$data_post['updated_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
			$result = $this->CriteriaModels->edit($data_post,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$datas['id_role']))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$datas['id_role']))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'id'	=> $datas['id_role'],
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
		$result = $this->CriteriaModels->edit($dataUpdate,array('id'=>$id));
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
			$result =$this->CriteriaModels->delete_where(array('id'=>$val));
			if ($result) {
				echo json_encode("success");
			}
		}
	}
	public function sort()
	{
		if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/adminlogin.html'));}
		$id = $_POST['id'];
		$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$result = $this->CriteriaModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}

}

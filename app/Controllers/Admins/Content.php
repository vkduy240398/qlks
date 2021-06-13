<?php

namespace App\Controllers\Admins;
use App\Controllers\BaseController;
use App\Models\RoleModels;
use App\Models\CriteriaModels;
use App\Models\ContentModels;
class Content extends BaseController
{	
	var $control = 'content';
	var $title = "Nội dung";
	function __construct(){
		$this->RoleModels = new RoleModels();
		$this->CriteriaModels = new CriteriaModels();
		$this->ContentModels = new ContentModels();
	}
	public function index($id)
	{	
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}

		$name_role = $this->CriteriaModels->find_one(array('id'=>$id));
		$datas = $this->ContentModels->select_array(NULL,array('id_criteria'=>$id));
		// echo "<pre>";
		// print_r($datas);die;
		$data = [
			'id'	=> $id,
			'id_role'	=> $name_role['id_role'],
			'datas' => $datas,
			'title'	=>'Quản lý '.$this->title,
			'control'=>$this->control,
			'name_role'	=> $name_role['name']
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	public function add($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		if ($this->request->getPost()) {
				$data_post = $this->request->getPost('data_post');
				$data_post['id_criteria	'] = $id;
				$data_post['created_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
				$result = $this->ContentModels->add($data_post);
				if ($result['type'] =="success") {
					return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$id))->with('success',ADD_SUCCESS);
				}
				else{
					return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$id))->with('error',ADD_FAIL);
				}
		}
		else{
			
		}
		$data = [
			'id'	=> $id,
			'title'	=>'Thêm mới '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/add',$data?$data:NULL);
	}

	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$id_criteria = $this->ContentModels->find_one(array('id'=>$id));
		$result = $this->ContentModels->delete_where(array('id'=>$id));
		if ($result) {
			return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$id_criteria['id_criteria']))->with('success','Xóa thành công');
		}
	}
	function edit($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$datas = $this->ContentModels->find_one(array('id'=>$id));
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_post['updated_at'] = gmdate("Y-m-d H:i:s",time()+7*3600);
			$result = $this->ContentModels->edit($data_post,array('id'=>$id));
			if ($result) {
				return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$datas['id_criteria']))->with('success',EDIT_SUCCESS);
			}
			else{
				return redirect()->to(base_url(ADMIN.$this->control.'/index/'.$datas['id_criteria']))->with('error',EDIT_FAIL);
			}
		}
		$data = [
			'id'	=> $datas['id_criteria'],
			'datas'	=> $datas,
			'title'	=>'Cập nhật dữ liệu '.$this->title,
			'control'=>$this->control
		];
		return view('admin/layout/'.$this->control.'/edit',$data?$data:NULL);
	}
	function deleteAll(){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$list_id = $this->request->getPost('list_id');
		// echo $list_id;die;
		$list_id_delete = explode(',',$list_id);
		foreach($list_id_delete as $key => $val){	
			$result =$this->ContentModels->delete_where(array('id'=>$val));
			if ($result) {
				echo json_encode("success");
			}
		}
	}

}

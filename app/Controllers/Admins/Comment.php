<?php

namespace App\Controllers\Admins;
use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\RoleModels;
use App\Models\AgeModels;
use App\Models\User_thirdModels;
use App\Models\LevelModels;
use App\Models\GiangvienModels;
use App\Models\CommentModels;
use App\Controllers\BaseController;
class Comment extends BaseController
{
	var $control = 'cmt_gv';
	var $controller = 'comment';
	var $title = "Danh sách đánh giá của giảng viên";
	function __construct(){
		$this->ContentModels = new ContentModels();
		$this->CriteriaModels = new CriteriaModels();
		$this->LevelModels = new LevelModels();
		$this->RoleModels = new RoleModels();
		$this->User_thirdModels = new User_thirdModels();
		$this->GiangvienModels = new GiangvienModels();
		$this->CommentModels = new CommentModels();
		$this->AgeModels = new AgeModels();
	}
	public function index()
	{
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$gv = $this->GiangvienModels->select_array();
		$data = [
			'data' => $gv,
			'title'	=>'Quản lý '.$this->title,
			'controller'=>$this->controller,
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	function detail($id){
		// if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$gv = $this->GiangvienModels->find_one_row('*',array('id'=>$id));
		$age = $this->AgeModels->select_array(NULL,array('publish'=>1));
		$level = $this->LevelModels->select_array(NULL,array('publish'=>1));
	
		// =======================================
		$cmt = $this->CommentModels->select_array(NULL,array('id_gv'=> $id));
		// echo "<pre>";
		// print_r($cmt);
		// die;
		$content_2 =  $this->CriteriaModels->select_array('name name_cer,id',array('id_role'=>4),'sort asc');
		foreach($content_2 as $key => $val){
			$content = $this->ContentModels->select_array('content,id',array('id_criteria'=>$val['id']));
			foreach($content as $key_cnt => $val_cnt){
				$info_status ='';
				$status =  $this->CommentModels->find_one_row('status',array('id_gv'=>$id,'id_content'=> $val_cnt['id']));
				$info_status = $status['status'];
				$content[$key_cnt]['status']= $info_status;
			}
			$content_2[$key]['content'] = $content;
		}
		// echo "<pre>";
		// print_r($content_2);
		// die;
		$data = [
			'gv'	=> $gv,
			'title'	=>$gv['fullname'],
			'control'=>$this->control,
			'age'	=> $age,
			'level'	=> $level,
			'content' => $content_2,
		];
		return view('admin/layout/'.$this->control.'/GV',$data?$data:NULL);
	}
	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$result = $this->CommentModels->delete_where(array('id_gv'=>$id));
		if ($result) {
			$this->GiangvienModels->delete_where(array('id'=>$id));
			return redirect()->to(base_url(ADMIN.$this->controller))->with('success','Xóa thành công');
		}
	}
}

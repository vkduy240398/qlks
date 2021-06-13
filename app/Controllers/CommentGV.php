<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\RoleModels;
use App\Models\AgeModels;
use App\Models\User_thirdModels;
use App\Models\LevelModels;
use App\Models\GiangvienModels;
use App\Models\CommentModels;
class CommentGV extends BaseController
{
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
		$age = $this->AgeModels->select_array(NULL,array('publish'=>1));
		$level = $this->LevelModels->select_array(NULL,array('publish'=>1));
		$content =  $this->CriteriaModels->select_array('name name_cer,id id_cer',array('id_role'=>4),'sort asc');
		foreach($content as $key => $val){
			$content[$key]['content'] = $this->ContentModels->select_array('*',array('id_criteria'=>$val['id_cer']));
		}
		if ($this->request->getPost()) {
			$data = $this->request->getPost('data_post');
			$date_cmt = $this->request->getPost('date_on');
			$date_cmt = explode("/",$date_cmt);
			$date = $date_cmt[2].'-'.$date_cmt[1].'-'.$date_cmt[0];
			$arr = array(
				'fullname' => $this->request->getPost('fullname'),
				'id_level' => $this->request->getPost('id_level'),
				'gender' => $this->request->getPost('gender'),
				'id_age' => $this->request->getPost('id_age'),
				'date_cmt' => $date,
			);
		
			$result = $this->GiangvienModels->add($arr);
			$idGV = $result['insertID'];
			foreach($data as $key => $val){
				$arr_content = array(
					'id_gv' => $idGV,
					'id_content' => $val['id'],
					'status'	=> $val['kq'],
				);
				$result = $this->CommentModels->add($arr_content);
			}
			if ($result['type'] =="success") {
				return redirect()->to(base_url('gui-danh-gia-thanh-cong.html'))->with("success","Đánh giá thành công");
			}
		}
		$data = array(
			'age'	=> $age,
			'level'	=> $level,
			'content' => $content,
			'title' => "Đánh giá",
		);
		return view('users/layout/comment/GV',$data?$data:NULL);
	}
	
}

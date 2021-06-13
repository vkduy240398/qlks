<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\CommentModels;
use App\Models\BranchModels;
use App\Models\ContentcmtModels;
use App\Models\InfoSv;
use App\Models\SvComment;
class Commentsv extends BaseController
{
	function __construct(){
		$this->ContentModels = new ContentModels();
		$this->CriteriaModels = new CriteriaModels();
		$this->CommentModels = new CommentModels();
		$this->ContentcmtModels = new ContentcmtModels();
		$this->BranchModels = new BranchModels();
		$this->InfoSv = new InfoSv();
		$this->SvComment = new SvComment();
	}
	public function index()
	{
		$content =  $this->CriteriaModels->select_array('name name_cer,id id_cer',array('id_role'=>3),'sort asc');
		foreach($content as $key => $val){
			$content[$key]['content'] = $this->ContentModels->select_array('*',array('id_criteria'=>$val['id_cer']));
		}
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0),'id desc');
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
	
		if ($this->request->getPost()) {
			$data_info = $this->request->getPost('data_info');		
			$result = $this->InfoSv->add($data_info);
			// Insert và lấy dc id sinh viên
			$id_sv = $result['insertID'];
			$data_post = $this->request->getPost('data_post');
			if (isset($data_post) && $data_post !=NULL) {
				foreach($data_post as $key => $val){
					$arr = array(
						'id_sv'		=> $id_sv,
						'id_content'	=> $val['id'],
						'status'		=> $val['kq']
					);
					$this->SvComment->add($arr);
				}
			}	
			if ($result['type']=="success") {
				return redirect()->to(base_url('gui-danh-gia-thanh-cong.html'))->with("success","Đánh giá thành công");
			}
		}
		$data = array(
	
			'datas'			=> $branch,
			'content'		=> $content,
			'nganhhoc'		=> $nganhhoc,
			'title'			=> "Đánh giá",
		);
		return view('users/layout/comment/sv',$data?$data:NULL);
	}
}

<?php

namespace App\Controllers\Admins;

use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\CommentModels;
use App\Models\BranchModels;
use App\Models\ContentcmtModels;
use App\Models\InfoSv;
use App\Models\SvComment;
use App\Controllers\BaseController;
class Comment_sv extends BaseController
{
	var $control = 'comment_sv';
	var $controller = 'comment_sv';
	var $title = "Danh sách đánh giá của cựu sinh viên";
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
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$oldsv = $this->InfoSv->select_array();
		
		$data = [
			'data' => $oldsv,
			'title'	=>'Quản lý '.$this->title,
			'controller'=>$this->controller,
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	function detail($id){
        $nganhhoc = $this->BranchModels->select_array('*',array('parentid >'=>0));
	
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0),'id desc');
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		// hoạt động
	
		
	
        // info old sinh viên
        $info = $this->InfoSv->find_one_row('*',array('id'=>$id));
      
      
       
      
        // echo "<pre>";
        // print_r($daotao);
        // die;
        // comment content
        $content =  $this->CriteriaModels->select_array('name name_cer,id id_cer',array('id_role'=>3),'sort asc');
		foreach($content as $key => $val){
			$content_2= $this->ContentModels->select_array('*',array('id_criteria'=>$val['id_cer']));
            foreach($content_2 as $key_child => $val_child){
                $infostatus = '';
                $status =  $this->SvComment->find_one_row('status',array('id_sv'=>$id,'id_content'=> $val_child['id']));
				$info_status = $status['status'];
				$content_2[$key_child]['status']= $info_status;
            }
            $content[$key]['content'] = $content_2;
		}
        // echo "<pre>";
        // print_r($content);
        // die;
		$data = [
			'datas'			=> $branch,
			'content'		=> $content,
            'info'          => $info,
			'title'			=> "Đánh giá",
		];
		return view('admin/layout/'.$this->control.'/sv',$data?$data:NULL);
	}
	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$this->SvComment->delete_where(array('id_sv'=>$id));
		$this->InfoSv->delete_where(array('id'=>$id));
		return redirect()->to(base_url(ADMIN.'comment_sv/index/'))->with('success','Xóa thành công');
	}
}

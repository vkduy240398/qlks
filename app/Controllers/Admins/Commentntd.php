<?php

namespace App\Controllers\Admins;
use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\RoleModels;
use App\Models\AgeModels;
use App\Models\User_thirdModels;
use App\Models\LevelModels;
use App\Models\Nhatuyendung;
use App\Models\CommentModels;
use App\Models\BranchModels;
use App\Models\ContentcmtModels;
use App\Models\Nganhtuyendung;
use App\Models\Comment_Ntd;
use App\Models\Noidungntd;
use App\Models\HoatdongModel;
use App\Models\LoaihinhModels;
use App\Models\VitriModels;
use App\Models\PhamviModels;
use App\Models\MucdoModels;
use App\Controllers\BaseController;
class Commentntd extends BaseController
{
	var $control = 'cmt_ntd';
	var $controller = 'Commentntd';
	var $title = "Danh sách đánh giá của nhà tuyển dụng";
	function __construct(){
		$this->ContentModels = new ContentModels();
		$this->Noidungntd = new Noidungntd();
		$this->Nganhtuyendung = new Nganhtuyendung();
		$this->CriteriaModels = new CriteriaModels();
		$this->RoleModels = new RoleModels();
		$this->User_thirdModels = new User_thirdModels();
		$this->Nhatuyendung = new Nhatuyendung();
		$this->CommentModels = new CommentModels();
		$this->BranchModels = new BranchModels();
		$this->ContentcmtModels = new ContentcmtModels();
		$this->Comment_Ntd = new Comment_Ntd();
		$this->HoatdongModel = new HoatdongModel();
		$this->LoaihinhModels = new LoaihinhModels();
		$this->VitriModels = new VitriModels();
		$this->PhamviModels = new PhamviModels();
		$this->MucdoModels = new MucdoModels();
	}
	public function index()
	{
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$gv = $this->Nhatuyendung->select_array();
		
		$data = [
			'data' => $gv,
			'title'	=>'Quản lý '.$this->title,
			'controller'=>$this->controller,
		];
		return view('admin/layout/'.$this->control.'/index',$data?$data:NULL);
	}
	function detail($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$ntd = $this->Nhatuyendung->find_one_row('*',array('id'=>$id));
		$nganhhoc = $this->BranchModels->select_array('*',array('parentid >'=>0));
		foreach($nganhhoc as $key => $val){
			$check_nganh = $this->Nganhtuyendung->find_one_row('id_branch',array('id_ntd'=>$id,'id_branch'=>$val['id']));
			$info = $check_nganh['id_branch'];
			$nganhhoc[$key]['id_branch'] = $info;
		}
			// hoạt động
			$hd = $this->HoatdongModel->select_array();
			$loaihinh = $this->LoaihinhModels->select_array();
			$vitri = $this->VitriModels->select_array();
			$phamvi = $this->PhamviModels->select_array();
			$mucdo = $this->MucdoModels->select_array();
		// 
		$content_2 =  $this->CriteriaModels->select_array('name name_cer,id',array('id_role'=>1),'sort asc');
		foreach($content_2 as $key => $val){
			$content = $this->ContentModels->select_array('*',array('id_criteria'=>$val['id']));
			foreach($content as $key_cnt => $val_cnt){
				$info_status ='';
				$status =  $this->Comment_Ntd->find_one_row('status',array('id_ntd'=>$id,'id_content'=> $val_cnt['id']));
				$info_status = $status['status'];
				
				$content[$key_cnt]['status']= $info_status;
				
			}
			$content_2[$key]['content'] = $content;
		}
	
		// nội dung đánh giá
		$content_3 =  $this->ContentcmtModels->select_array('*',array('parentid'=>0));
		foreach($content_3 as $key => $val){
			$child = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
			foreach($child as $key_child => $val_child){
				$info_status = '';
				$status = $this->Noidungntd->find_one_row('*',array('id_ntd'=>$id,'id_contentcmt'=>$val_child['id']));
				$info_status = $status['status'];
				$child[$key_child]['status'] = $info_status;
			}
			$content_3[$key]['child'] = $child;
		}
	
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0),'id desc');
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		$data = [
			'mucdo'			=> $mucdo,
			'phamvi'		=> $phamvi,
			'vitri'			=> $vitri,
			'ld'			=> $ld,
			'loaihinh'			=>	$loaihinh,
			'ntd'			=> $ntd,
			'datas'			=> $content_3,
			'content'		=> $content_2,
			'nganhhoc'		=> $nganhhoc,
			'title'			=> "Đánh giá",
		];
		return view('admin/layout/'.$this->control.'/NTD',$data?$data:NULL);
	}
	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$this->Nganhtuyendung->delete_where(array('id_ntd'=>$id));
		$this->Comment_Ntd->delete_where(array('id_ntd'=>$id));
		$this->Noidungntd->delete_where(array('id_ntd'=>$id));
		$this->Nhatuyendung->delete_where(array('id'=>$id));
		return redirect()->to(base_url(ADMIN.'commentntd/index/'))->with('success','Xóa thành công');
	}
}

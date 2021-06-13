<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\Nhatuyendung;
use App\Models\Comment_Ntd;
use App\Models\User_thirdModels;
use App\Models\Nganhtuyendung;
use App\Models\GiangvienModels;
use App\Models\CommentModels;
use App\Models\BranchModels;
use App\Models\ContentcmtModels;
use App\Models\Noidungntd;
use App\Models\HoatdongModel;
use App\Models\LoaihinhModels;
use App\Models\VitriModels;
use App\Models\PhamviModels;
use App\Models\MucdoModels;
class CommentNTD extends BaseController
{
	function __construct(){
		$this->ContentModels = new ContentModels();
		$this->Noidungntd = new Noidungntd();
		$this->CriteriaModels = new CriteriaModels();
		$this->Nganhtuyendung = new Nganhtuyendung();
		$this->Comment_Ntd = new Comment_Ntd();
		$this->Nhatuyendung = new Nhatuyendung();
		$this->CommentModels = new CommentModels();
		$this->ContentcmtModels = new ContentcmtModels();
		$this->BranchModels = new BranchModels();
		$this->HoatdongModel = new HoatdongModel();
		$this->LoaihinhModels = new LoaihinhModels();
		$this->VitriModels = new VitriModels();
		$this->PhamviModels = new PhamviModels();
		$this->MucdoModels = new MucdoModels();
		
		
	}
	public function index()
	{
		$nganhhoc = $this->BranchModels->select_array('*',array('parentid >'=>0));
		$content =  $this->CriteriaModels->select_array('name name_cer,id id_cer',array('id_role'=>1),'sort asc');
		foreach($content as $key => $val){
			$content[$key]['content'] = $this->ContentModels->select_array('*',array('id_criteria'=>$val['id_cer']));
		}
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0),'id desc');
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		// hoạt động
		$hoatdong = $this->HoatdongModel->select_array();
		$loaihinh = $this->LoaihinhModels->select_array();
		$vitri = $this->VitriModels->select_array();
		$phamvi = $this->PhamviModels->select_array();
		$mucdo = $this->MucdoModels->select_array();
		if ($this->request->getPost()) {
			$data_info = $this->request->getPost('data_info');
			$data_info['created_at'] =gmdate("Y-m-d H:i:s",time()+7*3600);		
			$result = $this->Nhatuyendung->add($data_info);
			// Insert và lấy dc id nhà tuyển dụng
			$id_ntd = $result['insertID'];
			$data_noidung = $this->request->getPost('data_noidung');
			foreach($data_noidung as $key =>$val){
				$arr = array(
					'id_ntd'=> $id_ntd,
					'id_contentcmt' => $val['id'],
					'status' => $val['kq'],
				);
				$this->Noidungntd->add($arr);
			}
			// 
			$data_nganh = $this->request->getPost('data_nganh');
			// echo "<pre>";
			// print_r($data_nganh);
			// die;
			foreach($data_nganh as $key =>$val){
				$arr = array(
					'id_ntd'=> $id_ntd,
					'id_branch' => $val,
				);
				$this->Nganhtuyendung->add($arr);
			}
			$data_contentcmt = $this->request->getPost('data_post');
			// echo "<pre>";
			// print_r($data_contentcmt);
			// die;
			foreach($data_contentcmt as $key => $val){
				$arr_data = array(
					'id_ntd' => $id_ntd,
					'id_content' => $val['id'],
					'status'	=> $val['kq'],
				);
				$this->Comment_Ntd->add($arr_data);
			}
			if ($result['type']=="success") {
				return redirect()->to(base_url('gui-danh-gia-thanh-cong.html'))->with("success","Đánh giá thành công");
			}
		}
		$data = array(
			'hoatdong'		=> $hoatdong,
			'mucdo'			=> $mucdo,
			'phamvi'		=> $phamvi,
			'vitri'			=> $vitri,
			'ld'			=> $ld,
			'loaihinh'			=>	$loaihinh,
			'datas'			=> $branch,
			'content'		=> $content,
			'nganhhoc'		=> $nganhhoc,
			'title'			=> "Đánh giá",
		);
		return view('users/layout/comment/NTD',$data?$data:NULL);
	}
}

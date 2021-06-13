<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModels;
use App\Models\CriteriaModels;
use App\Models\User_thirdModels;
use App\Models\Nganhtuyendung;
use App\Models\GiangvienModels;
use App\Models\CommentModels;
use App\Models\BranchModels;
use App\Models\ContentcmtModels;
use App\Models\HoatdongModel;
use App\Models\LoaihinhModels;
use App\Models\VitriModels;
use App\Models\LhcoquanModels;
use App\Models\MucdoModels;
use App\Models\YeutoModels;
use App\Models\DaotaoModels;
use App\Models\Co_soModels;
use App\Models\NguyennhanModels;
use App\Models\InfoOldsvModels;
use App\Models\OldSvnguyennhan;
use App\Models\OldSvyeuto;
use App\Models\OldSvdaotao;
use App\Models\OldSvcoso;
use App\Models\OldSvCmt;
class Commentold_sv extends BaseController
{
	function __construct(){
		$this->ContentModels = new ContentModels();
		$this->CriteriaModels = new CriteriaModels();
		$this->Nganhtuyendung = new Nganhtuyendung();
		$this->CommentModels = new CommentModels();
		$this->ContentcmtModels = new ContentcmtModels();
		$this->BranchModels = new BranchModels();
		$this->HoatdongModel = new HoatdongModel();
		$this->LoaihinhModels = new LoaihinhModels();
		$this->VitriModels = new VitriModels();
		$this->LhcoquanModels = new LhcoquanModels();
		$this->MucdoModels = new MucdoModels();
		$this->YeutoModels = new YeutoModels();
		$this->DaotaoModels = new DaotaoModels();
		$this->Co_soModels = new Co_soModels();
		$this->NguyennhanModels = new NguyennhanModels();
		$this->InfoOldsvModels = new InfoOldsvModels();
		$this->OldSvnguyennhan = new OldSvnguyennhan();
		$this->OldSvyeuto  = new OldSvyeuto();
		$this->OldSvdaotao  = new OldSvdaotao();
		$this->OldSvcoso  = new OldSvcoso();
		$this->OldSvCmt  = new OldSvCmt();
	}
	public function index()
	{
		$nganhhoc = $this->BranchModels->select_array('*',array('parentid >'=>0));
		$content =  $this->CriteriaModels->select_array('name name_cer,id id_cer',array('id_role'=>2),'sort asc');
		foreach($content as $key => $val){
			$content[$key]['content'] = $this->ContentModels->select_array('*',array('id_criteria'=>$val['id_cer']));
		}
		$branch = $this->ContentcmtModels->select_array('*',array('parentid'=>0),'id desc');
		foreach($branch as $key => $val){
			$branch[$key]['child'] = $this->ContentcmtModels->select_array('*',array('parentid'=>$val['id']),'id desc');
		}
		// hoạt động
		$hd = $this->HoatdongModel->select_array();
		$loaihinh = $this->LoaihinhModels->select_array();
		$vitri = $this->VitriModels->select_array();
		$phamvi = $this->LhcoquanModels->select_array();
		$mucdo = $this->MucdoModels->select_array();
		$yeuto = $this->YeutoModels->select_array();
		$daotao = $this->DaotaoModels->select_array();
		$co_so = $this->Co_soModels->select_array();
		$nguyenhan = $this->NguyennhanModels->select_array();
		if ($this->request->getPost()) {
			$data_info = $this->request->getPost('data_info');
			$price = $data_info['thunhap'];
			$price = str_replace(",","",$price);
			$data_info['thunhap'] = $price;
			$birtday = $data_info['ngaysinh'];
			$birtday_format = explode("/",$birtday);
			$birtday_data = $birtday_format[2].'-'.$birtday_format[1].'-'.$birtday_format[0];
			$data_info['ngaysinh'] = $birtday_data;
		
			$result = $this->InfoOldsvModels->add($data_info);
			// echo "<pre>";
			// print_r($data_info);
			// die;
			// Insert và lấy dc id sinh viên
			$id_old_sv = $result['insertID'];
			$data_post = $this->request->getPost('data_post');
			// echo "<pre>";
			// print_r($data_post);
			// die;
			if (isset($data_post) && $data_post !=NULL) {
				foreach($data_post as $key => $val){
					$arr = array(
						'id_old_sv'		=> $id_old_sv,
						'id_content'	=> $val['id'],
						'status'		=> $val['kq']
					);
					$this->OldSvCmt->add($arr);
				}
			}
			$data_nguyennhan = $this->request->getPost('data_nguyennhan'); 
			if(isset($data_nguyennhan) && $data_nguyennhan !=NULL){
				foreach($data_nguyennhan as $key => $val){
					$array = array(
						'id_old_sv' => $id_old_sv,
						'id_nguyennhan' => $val['id']
					);
					$this->OldSvnguyennhan->add($array);
				}
			}
			
			$data_yeuto = $this->request->getPost('data_yeuto');
			if (isset($data_yeuto) && $data_yeuto !=NULL) {
				foreach($data_yeuto as $key => $val){
					$array = array(
						'id_old_sv' => $id_old_sv,
						'id_yeuto' => $val['id']
					);
					$this->OldSvyeuto->add($array);
				}
			}
			// 
			$data_daotao = $this->request->getPost('data_daotao');
			if (isset($data_daotao) && $data_daotao !=NULL) {
				foreach($data_daotao as $key => $val){
					$array = array(
						'id_old_sv' => $id_old_sv,
						'id_daotao' => $val['id']
					);
					$this->OldSvdaotao->add($array);
				}
			}
			// 
			$data_coso = $this->request->getPost('data_coso');
			if (isset($data_coso) && $data_coso !=NULL) {
				foreach($data_coso as $key => $val){
					$array = array(
						'id_old_sv' => $id_old_sv,
						'id_coso' => $val['id']
					);
					$this->OldSvcoso->add($array);
				}
			}
		
		
			if ($result['type']=="success") {
				return redirect()->to(base_url('gui-danh-gia-thanh-cong.html'))->with("success","Đánh giá thành công");
			}
		}
		$data = array(
			'nguyenhan'		=> $nguyenhan,
			'co_so'			=> $co_so,
			'daotao'		=> $daotao,
			'mucdo'			=> $mucdo,
			'phamvi'		=> $phamvi,
			'vitri'			=> $vitri,
			'yeuto'			=> $yeuto,
			'ld'			=> $ld,
			'loaihinh'		=>	$loaihinh,
			'datas'			=> $branch,
			'content'		=> $content,
			'nganhhoc'		=> $nganhhoc,
			'title'			=> "Đánh giá",
		);
		return view('users/layout/comment/old_sv',$data?$data:NULL);
	}
}

<?php

namespace App\Controllers\Admins;

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
use App\Controllers\BaseController;
class Comment_oldsv extends BaseController
{
	var $control = 'comment_oldsv';
	var $controller = 'comment_oldsv';
	var $title = "Danh sách đánh giá của cựu sinh viên";
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
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$oldsv = $this->InfoOldsvModels->select_array();
		
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
		$hd = $this->HoatdongModel->select_array();
		$loaihinh = $this->LoaihinhModels->select_array();
		$vitri = $this->VitriModels->select_array();
		$phamvi = $this->LhcoquanModels->select_array();
		$mucdo = $this->MucdoModels->select_array();
		$yeuto = $this->YeutoModels->select_array();
		$daotao = $this->DaotaoModels->select_array();
		
	
        // info old sinh viên
        $info = $this->InfoOldsvModels->find_one_row('*',array('id'=>$id));
        // yếu tố
        $yeuto = $this->YeutoModels->select_array();
        foreach($yeuto as $key => $val){
            $info_yeuto = $this->OldSvyeuto->find_one_row('*',array('id_old_sv'=>$id,'id_yeuto'=>$val['id']));
            $id_yeuto = $info_yeuto['id_yeuto'];
            $yeuto[$key]['id_yeuto'] = $id_yeuto;
        }
        // nguyen nhân
        $nguyenhan = $this->NguyennhanModels->select_array();
        foreach($nguyenhan as $key => $val){
            $info_nguyenhan = $this->OldSvnguyennhan->find_one_row('*',array('id_old_sv'=>$id,'id_nguyennhan'=>$val['id']));
            $id_nguyenhan = $info_nguyenhan['id_nguyennhan'];
            $nguyenhan[$key]['id_nguyennhan'] = $id_nguyenhan;
        }
        // đào tạo
        $daotao = $this->DaotaoModels->select_array();
        foreach($daotao as $key => $val){
            $info_daotao = $this->OldSvdaotao->find_one_row('*',array('id_old_sv'=>$id,'id_daotao'=>$val['id']));
            $id_daotao = $info_daotao['id_daotao'];
            $daotao[$key]['id_daotao'] = $id_daotao;
        }
        // Cơ sở
        $co_so = $this->Co_soModels->select_array();
        foreach($co_so as $key => $val){
            $info_coso = $this->OldSvcoso->find_one_row('*',array('id_old_sv'=>$id,'id_coso'=>$val['id']));
            $id_coso = $info_coso['id_coso'];
            $co_so[$key]['id_coso'] = $id_coso;
        }
        // echo "<pre>";
        // print_r($daotao);
        // die;
        // comment content
        $content =  $this->CriteriaModels->select_array('name name_cer,id id_cer',array('id_role'=>2),'sort asc');
		foreach($content as $key => $val){
			$content_2= $this->ContentModels->select_array('*',array('id_criteria'=>$val['id_cer']));
            foreach($content_2 as $key_child => $val_child){
                $infostatus = '';
                $status =  $this->OldSvCmt->find_one_row('status',array('id_old_sv'=>$id,'id_content'=> $val_child['id']));
				$info_status = $status['status'];
				$content_2[$key_child]['status']= $info_status;
            }
            $content[$key]['content'] = $content_2;
		}
        // echo "<pre>";
        // print_r($phamvi);
        // die;
		$data = [
			'nguyenhan'		=> $nguyenhan,
			'co_so'			=> $co_so,
			'daotao'		=> $daotao,
			'mucdo'			=> $mucdo,
			'phamvi'		=> $phamvi,
			'vitri'			=> $vitri,
			'yeuto'			=> $yeuto,
			'ld'			=> $ld,
			'loaihinh'		=> $loaihinh,
			'datas'			=> $branch,
			'content'		=> $content,
			'nganhhoc'		=> $nganhhoc,
            'info'          => $info,
			'title'			=> "Đánh giá",
		];
		return view('admin/layout/'.$this->control.'/old_sv',$data?$data:NULL);
	}
	function delete($id){
		if (!session('logged_in') == true) {return redirect()->to('/adminlogin.html');}
		$this->OldSvyeuto->delete_where(array('id_old_sv'=>$id));
		$this->OldSvnguyennhan->delete_where(array('id_old_sv'=>$id));
		$this->OldSvdaotao->delete_where(array('id_old_sv'=>$id));
		$this->OldSvcoso->delete_where(array('id_old_sv'=>$id));
		$this->OldSvCmt->delete_where(array('id_old_sv'=>$id));
		$this->InfoOldsvModels->delete_where(array('id'=>$id));
		return redirect()->to(base_url(ADMIN.'comment_oldsv/index/'))->with('success','Xóa thành công');
	}
}

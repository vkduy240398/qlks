<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= base_url() ?>">
    <link rel="stylesheet" href="testing/css/style.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
    <div class="container evalute">
        <?php if(session()->getFlashdata('success')){?>
            <p class="alert alert-success"><?= session()->getFlashdata('success') ?></p>
        <?php } ?>
        <div class="evalute row">
            <div class="info col-12">
                <div class="title">
                    <h3>Tra cứu thông tin khảo sát</h3>
                </div>
                <div class="col-12 text-center p-3">
                    <h3 class="text-dark">PHIẾU KHẢO SÁT</h3>
                    <p>Ý kiến của nhà tuyển dụng về các lĩnh vực hoạt động của trường</p>
                    <hr>
                    <p>
                        Nhằm không ngừng cải tiến,nâng cao chất lượng đào tạo nguồn nhân lực đáp ứng nhu cầu 
                        thị trường lao động trong thời kỳ hội nhập, Trường Đại Học Kỹ Thuật - Công Nghệ Cần Thơ 
                        gửi đến quý anh / chị <strong>"Phiếu khảo sát ý kiến của cựu sinh viên về các lĩnh vực
                        hoạt động của Trường".</strong> Nhà trường đảm bảo thông tin trên phiếu được bảo mật và 
                        chỉ dùng để cải tiến và nâng cao chất lượng đào tạo của Trường. Rất mong anh / chị dành thời gian cho ý kiến.
                    </p>
                </div>
            </div>
            <div class="col-12">
                <form action="" id="form_cmt" method="post">
                    <h2>A. <span class="text-uppercase">Thông tin chung</span></h2>
                    <div class="row border">
                        <div class="col-3">
                            <div class="form-group">
                                <h5 class="text-danger">Họ tên</h5>
                                <h6 class=""><?= $info['hoten'] ?></h6>
                            </div>
                        </div>
                        <div class="col-3">
                            <h5 class="text-danger">Giới tính:</h5>
                            <div class="form-group">
                                <input type="radio" <?= $info['gioitinh']=="Nam"?'checked':'' ?> name="data_info[gioitinh]" value="Nam"> Nam
                                <input type="radio"<?= $info['gioitinh']=="Nữ"?'checked':'' ?> name="data_info[gioitinh]" value="Nữ"> Nữ
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <h5 class="text-danger">Ngày tháng năm sinh</h5>
                                        <h6 class=""><?= date('d/m/Y',strtotime($info['ngaysinh'])) ?></h6>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <h5 class="text-danger">Số điện thoại</h5>
                                        <h6 class=""><?= $info['phone'] ?></h6>
                                    </div>
                                </div>
                                <div class="col-3 ">
                                    <div class="form-group">
                                        <h5 class="text-danger">Email</h5>
                                        <h6 class=""><?= $info['email'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <h5 class="text-danger">Ngành đào tạo</h5>
                                        <h6 class=""><?= $info['chuyennganh'] ?></h6>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h5 class="text-danger">Khóa</h5>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <h6 class=""><?= $info['start'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-1"> - </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <h6 class=""><?= $info['end'] ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h5 class="text-danger">Tên cơ quan công tác</h5>
                                <div class="form-group">
                                    <h6 class=""><?= $info['tencoquan'] ?></h6>
                                </div>
                            </div>
                            <div class="col-3">
                                <h5 class="text-danger">Địa chỉ</h5>
                                <div class="form-group">
                                    <h6 class=""><?= $info['diachi'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 border p-3">
                            <h5  class="text-info">Tình hình việc làm của anh / chị hiện nay như thế nào?</h5>
                            <div class="row fom-group ">
                                <div class="col-6">
                                    <input type="checkbox" <?= $info['status_job']==1?'checked':'disabled' ?> name="data_info[status_job]" value="1"> Đã có việc
                                </div>
                                <div class="col-6">
                                    <input type="checkbox" <?= $info['status_job']==2?'checked':'disabled' ?> name="data_info[status_job]" value="2"> Chưa có việc
                                </div>
                            </div>
                        </div>
                        <div class="col-12 border p-3">
                            <h5  class="text-info">Anh / chị có việc làm khi nào?</h5>
                                <div class="row fom-group">
                                    <div class="col-6 mb-3">
                                        <input type="checkbox" <?= $info['status_job_month']==1?'checked':'disabled' ?> name="data_info[status_job_month]" value="1"> Sau 6 tháng tốt nghiệp
                                    </div>
                                    <div class="col-6 mb-3">
                                        <input type="checkbox" <?= $info['status_job_month']==2?'checked':'disabled' ?> name="data_info[status_job_month]" value="2"> Sau 12 tháng tốt nghiệp
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 border p-3">
                            <h4  class="text-info">Vị trí của các cựu sinh viên tại quý cơ quan</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group m-2">
                                        <input type="checkbox"  <?= $info['status_right']==1?'checked':'disabled' ?> name="data_info[status_right]" value="1"> Đúng ngành
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-2">
                                        <input type="checkbox" <?= $info['status_right']==2?'checked':'disabled' ?> name="data_info[status_right]" value="2"> Trái ngành
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <?php if(isset($phamvi) && $phamvi !=NULL){?>
                            <div class="col-12 border p-3">
                                <h4  class="text-info">Phạm vi hoạt động của quý cơ quan</h4>
                                <div class="row">
                                <?php foreach($phamvi as $key => $val){?>
                                    <div class="col-3">
                                        <input type="checkbox" <?= $info['id_lhcoquan']==$val['id']?'checked':'disabled' ?> value="<?= $val['id'] ?>" name="data_info[id_lhcoquan]"> <?= $val['name'] ?>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-12 border p-3">
                            <h5  class="text-info">Anh / chị có vận dụng được những kiến thức và kỹ năng cần thiết theo chuyên ngành tốt nghiệp vào công việc hiện tạ</h5>
                            <div class="row">
                                <div class="col-3">
                                    <input type="checkbox" <?= $info['van_dung']==1?'checked':'disabled' ?> name="data_info[van_dung]" value="1"> Rất Tốt
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" <?= $info['van_dung']==2?'checked':'disabled' ?> name="data_info[van_dung]" value="2"> Tốt
                                </div>
                                <div class="col-3">
                                    <input type="checkbox"<?= $info['van_dung']==3?'checked':'disabled' ?> name="data_info[van_dung]" value="3"> Trung bình 
                                </div>
                                <div class="col-3">
                                    <input type="checkbox"<?= $info['van_dung']==4?'checked':'disabled' ?> name="data_info[van_dung]" value="4"> Kém
                                </div>
                            </div>
                        </div>
                        <div class="col-12 border p-3">
                            <h5  class="text-info">Anh / chị có được việc làm là do các yếu tố sau (có thể chọn nhiều phương án)</h5>
                            <div class="row">
                            <?php if(isset($yeuto) && $yeuto !=NULL){?>
                                <?php foreach($yeuto as $key => $val){?>
                                    <div class="col-3">
                                        <input type="checkbox" <?= $val['id']==$val['id_yeuto']?'checked':'disabled' ?> name="data_yeuto[<?= $key ?>][id]" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-6 border p-3">
                            <span><h5>Tổng thu nhập bình quân / tháng của anh chị hiện nay là:</h5><input type="text" onkeyup="FormatNumber(this)" value="<?= number_format($info['thunhap']) ?>" disabled name="data_info[thunhap]" class="form-control"></span>        
                        </div>
                        <?php if(isset($mucdo) && $mucdo !=NULL){?>
                            <div class="row">
                                <h5  class="text-info">Anh / chị có đáp ứng yêu cầu của công việc không?</h5>
                                <?php foreach($mucdo as $key => $val){ ?>
                                    <div class="col-12 border p-3">
                                        <input type="checkbox" <?= $info['id_mucdo']==$val['id']?'checked':'disabled' ?> name="data_info[id_mucdo]"  value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="col-12 border p-3">
                            <h5 class="text-info">Nếu anh chị chưa xin được việc làm, xin cho biết nguyên nhân</h5>
                            <div class="row">
                            <?php if(isset($nguyenhan) && $nguyenhan !=NULL){?>
                                <?php foreach($nguyenhan as $key => $val){?>
                                    <div class="col-3">
                                        <input type="checkbox" <?= $val['id']==$val['id_nguyennhan']?'checked':'disabled' ?> name="data_nguyennhan[<?= $key ?>][id]" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </div>
                        <h2 class="text-uppercase">B. Nhận xét của nhà tuyển dụng về Nhà trường</h2>
                        <div class="row ">
                            <?php if(isset($content) && $content != NULL){?>
                                <?php $i =1; foreach($content as $key => $val){ ?>
                                <div class="col-12 border p-3" id="data">
                                    <h3 class="text-primary"><?= $i++.' '.$val['name_cer'] ?></h3>
                                    <?php if($val['content'] && $val['content'] !=NULL ) {?>
                                        <?php foreach($val['content'] as $key_ct => $val_ct){?>
                                            <p id="<?= $val_ct['id'] ?>" style="font-weight:bold;"  class="text-dark data"><?= $val_ct['content'] ?></p>
                                            <div class="form-group mt-0 mb-5" >
                                                <input type="hidden" id="kq<?= $val_ct['id'] ?>" data-id ="<?= $val_ct['id'] ?>" value="" name="data_post[<?= $val_ct['id'] ?>][kq]">
                                                <input type="hidden" name="data_post[<?= $val_ct['id'] ?>][id]" value="<?= $val_ct['id'] ?>">
                                                <input type="checkbox" <?= $val_ct['status']==1?'checked':'disabled' ?> data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value="1"> Rất hài lòng
                                                <input type="checkbox"  <?= $val_ct['status']==2?'checked':'disabled' ?> data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="2"> Hài lòng
                                                <input type="checkbox" <?= $val_ct['status']==3?'checked':'disabled' ?> data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="3"> Không ý kiến
                                                <input type="checkbox" <?= $val_ct['status']==4?'checked':'disabled' ?> data-check="<?= $val_ct['id'] ?>"  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "4"> Không hài lòng
                                                <input type="checkbox" <?= $val_ct['status']==5?'checked':'disabled' ?> data-check="<?= $val_ct['id'] ?>"  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "5"> Rất không hài lòng
                                                <p id="message"></p>
                                            </div>
                                        <?php  } ?>
                                    <?php } ?>
                                </div>
                                <?php  } ?>
                            <?php } ?>
                        </div>
                        <div class="row">
                           <h5 class="text-info mt-3">Theo anh / chị , nội dung chương trình đào tạo của ngành đã học cần được cải tiến ở các phần nào sau đây ( có thể chọn nhiều phương án )</h5>
                           <?php if(isset($daotao) && $daotao !=NULL){?>
                                <?php foreach($daotao as $key => $val){?>
                                    <div class="col-4 border p-3">
                                        <input type="checkbox"  <?= $val['id']==$val['id_daotao']?'checked':'disabled' ?> name="data_daotao[<?= $key ?>][id]" value="<?= $val['id'] ?>" id=""> <?= $val['name'] ?>
                                    </div>
                                <?php } ?>
                           <?php } ?>
                        </div>
                        <div class="row ">
                           <h5 class="text-info mt-3">Theo anh / chị , Nhà trường cần cải tiến gì về cơ sở vật chất để nâng cao chất lượng đào tạo ( có thể chọn nhiều phương án )</h5>
                           <?php if(isset($co_so) && $co_so !=NULL){?>
                                <?php foreach($co_so as $key => $val){?>
                                    <div class="col-4 border p-3">
                                        <input type="checkbox" <?= $val['id']==$val['id_coso']?'checked':'disabled' ?> name="data_coso[<?= $key ?>][id]" value="<?= $val['id'] ?>" id=""> <?= $val['name'] ?>
                                    </div>
                                <?php } ?>
                           <?php } ?>
                        </div>
                        <div class="row mt-2 p-0">
                            <h3 for="">Ý kiến của cựu sinh viên</h3>
                            <div class="col-12 form-group">
                                <textarea name="data_info[y_kien]" disabled class="form-control" cols="30" rows="10"><?= $info['y_kien'] ?></textarea>
                            </div>
                        </div>
                    </div>
                   <div class="form-group mt-5">
                        <a href="<?= base_url('admins/comment_oldsv') ?>" class="btn btn-info">Trở lại</a>
                   </div>
                </form> 
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/03bca92048.js" crossorigin="anonymous"></script>

<script>
  
  $(document).ready(function(){
  var checkradio_dp;
  
    $('button').click(function(e){
        // if (!$("input[name='data_info[dapung]']:checked").val()) {
        //     checkradio_dp = false;
        // }
        // else{
        //     checkradio_dp =  true;
        // }
        // if (checkradio_dp == false ) {
        //     alert('còn trường chưa chọn')
        // }
        // if (checkradio_dp == true ) {
        //     $("#form_cmt").submit();
        // }
    });
  });
</script>

</body>
</html>
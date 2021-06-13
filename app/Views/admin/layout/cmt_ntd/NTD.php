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
            <div class="info col-12 ">
                <div class="title">
                    <h3>Tra cứu thông tin khảo sát</h3>
                </div>
                <div class="col-12 text-center p-3">
                    <h3 class="text-dark">PHIẾU KHẢO SÁT</h3>
                    <p>Ý kiến của nhà tuyển dụng về các lĩnh vực hoạt động của trường</p>
                    <hr>
                    <p>
                    Nhằm khảo sát chất lượng các hoạt động của trường và mức độ đáp ứng công việc của sinh viên tốt nghiệp tại
                    trường Đại Học Kỹ Thuật Công Nghệ Cần Thơ được quý cơ quan tuyển dụng, nhà trường rất mong đón nhận được những
                    ý kiến phản hồi về các nội dung được nêu dưới đây:
                    </p>
                </div>
            </div>
            <div class="col-12">
                <form action="" id="form_cmt" method="post">
                    <h2>A. <span class="text-uppercase">Thông tin nhà tuyển dụng</span></h2>
                    <div class="row border p-3">
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Nhập họ tên</h5>
                                <input type="text" class="form-control" disabled id="fullname" value="<?= $ntd['hoten'] ?>" name="data_info[hoten]">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Chức vụ</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled id="chucvu" value="<?= $ntd['chucvu'] ?>" name="data_info[chucvu]">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Tên cơ quan</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled id="tencoquan" value="<?= $ntd['tencoquan'] ?>" name="data_info[tencoquan]">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Địa chỉ</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled id="diachi" value="<?= $ntd['diachi'] ?>" name="data_info[diachi]">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Số điện thoại</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled id="phone"  value="<?= $ntd['sodienthoai'] ?>" name="data_info[sodienthoai]">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Email</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled id="email" value="<?= $ntd['email'] ?>" name="data_info[email]">
                                <p id="message"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(isset($loaihinh) && $loaihinh !=NULL){?>
                            <div class="col-12 border p-3">
                                <h5>Quý cơ quan hoạt động theo loại hình tổ chức nào?</h5>
                                <div class="row fom-group ">
                                <?php foreach($loaihinh as $key => $val){?>
                                    <div class="col-3 mb-3 fom-group">
                                        <input type="checkbox" id="loaihinh" class="loaihinh" <?= $ntd['loaihinh'] == $val['id']?'checked':'disabled' ?> name="data_info[loaihinh]" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                        <p id="message"></p>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(isset($loaihinh) && $loaihinh !=NULL){?>
                            <div class="col-12 border p-3">
                                <h5>Lĩnh vực hoạt động của quý cơ quan</h5>
                                    <div class="row fom-group">
                                    <?php foreach($loaihinh as $key => $val){?>
                                        <div class="col-6 mb-3">
                                            <input type="checkbox" id="hoatdong" <?= $ntd['hoatdong'] == $val['id']?'checked':'disabled' ?>   name="data_info[hoatdong]" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                            <p id="message"></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if(isset($vitri) && $vitri !=NULL){?>
                            <div class="col-12 border p-3">
                                <h4>Vị trí của các cựu sinh viên tại quý cơ quan</h4>
                                <div class="row">
                                <?php foreach($vitri as $key => $val){?>
                                    <div class="col-6">
                                        <div class="form-group m-2">
                                            <input type="checkbox" id="posi" <?= $ntd['posi'] == $val['id']?'checked':'disabled' ?>  name="data_info[posi]" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                            <p id="message"></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-12 border p-3">
                            <h4>Số lượng cựu sinh viên tại quý cơ quan: <input type="text" disabled value="<?= $ntd['number_sv'] ?>" name="data_info[number_sv]"> </h4>
                        </div>
                        <?php if(isset($phamvi) && $phamvi !=NULL){?>
                            <div class="col-12 border p-3">
                                <h4>Phạm vi hoạt động của quý cơ quan</h4>
                                <div class="row">
                                <?php foreach($phamvi as $key => $val){?>
                                    <div class="col-4">
                                        <input type="checkbox"value="<?= $val['id'] ?>" <?= $ntd['each_data'] == $val['id']?'checked':'disabled' ?> id="each_data" name="data_info[each_data]"> <?= $val['name'] ?>
                                        <p id="message"></p>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-12 border p-3">
                            <h5>Nhu cầu tuyển dụng theo chuyên ngành của quý cơ quan trong thời gian sắp tới!('có thể chọn nhiều phương án')</h5>
                            <div class="row">
                            <?php foreach($nganhhoc as $key => $val){?>
                                <div class="col-6">
                                    <input type="checkbox" name="data_nganh[]" <?= $val['id_branch'] == $val['id']?'checked':'disabled' ?> value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <h2 class="text-uppercase">B. Nhận xét của nhà tuyển dụng về Nhà trường</h2>
                        <div class="row">
                            <?php  if(isset($content) && $content != NULL){?>
                                <?php $i = 1; foreach($content as $key => $val){ ?>
                                <div class="col-12 border p-3" id="data">
                                    <h4 class="text-danger"><?= $i;' '. $val['name_cer'] ?></h4>
                                    <?php if($val['content'] && $val['content'] !=NULL ) {?>
                                        <?php  foreach($val['content'] as $key_ct => $val_ct){?>
                                            <p id="<?= $val_ct['id'] ?>" style="font-weight:bold;"  class="text-dark data"><?= $val_ct['content'] ?></p>
                                            <div class="form-group mt-0 mb-5" >
                                                <input type="hidden" id="kq<?= $val_ct['id'] ?>" data-id ="<?= $val_ct['id'] ?>" value="" name="data_post[<?= $val_ct['id'] ?>][kq]">
                                                <input type="hidden" name="data_post[<?= $val_ct['id'] ?>][id]" value="<?= $val_ct['id'] ?>">
                                                <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 1?'checked':'disabled'?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value="1"> Rất hài lòng
                                                <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 2?'checked':'disabled'?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="2"> Hài lòng
                                                <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 3?'checked':'disabled'?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="3"> Không ý kiến
                                                <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 4?'checked':'disabled'?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "4"> Không hài lòng
                                                <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 5?'checked':'disabled'?>  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "5"> Rất không hài lòng
                                                <p id="message"></p>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <?php $i++; } ?>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <h2 class="text-uppercase">C. Đánh giá về sinh viên tốt nghiệp</h2>
                            <div class="col-12 border p-3">
                                <h5>Quý cơ quan đã tuyển dụng sinh viên tốt nghiệp tại Trường Đại Học Kỹ Thuật Công Nghệ Cần Thơ thuộc ngành đào tạo(chỉ chọn 1)</h5>
                                <div class="row">
                                    <?php foreach($nganhhoc as $key => $val){?>
                                        <div class="col-5 m-3">
                                                <input type="radio" name="data_info[data_tuyendung]" <?= $ntd['data_tuyendung'] == $val['id']?'checked':''?> value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                            </div>
                                    <?php } ?>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h2>D.Nội dung nhận xét</h2>
                            <div class="row">
                                <?php if(isset($datas) && $datas != NULL){?>
                                    <?php $i_1 =1; foreach($datas as $key => $val){ ?>
                                    <div class="col-12 border p-3" id="data">
                                        <h4 class="text-danger"><?= $i_1;' '. $val['tieuchi'] ?></h4>
                                        <?php if($val['child'] && $val['child'] !=NULL ) {?>
                                            <?php $i_2 =1; foreach($val['child'] as $key_ct => $val_ct){?>
                                                <p id="<?= $val_ct['id'] ?>" style="font-weight:bold;"  class="text-dark data"><?= $i_2.' '.$val_ct['tieuchi'] ?></p>
                                                <div class="form-group mt-0 mb-5" >
                                                    <input type="hidden" id="kq<?= $val_ct['id'] ?>" data-id ="<?= $val_ct['id'] ?>" value="" name="data_noidung[<?= $val_ct['id'] ?>][kq]">
                                                    <input type="hidden" name="data_noidung[<?= $val_ct['id'] ?>][id]" value="<?= $val_ct['id'] ?>">
                                                    <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 1?'checked':'disabled' ?> class="noidung" name="ck<?= $val_ct['id'] ?>" value="1"> Kém
                                                    <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 2?'checked':'disabled' ?> class="noidung" name="ck<?= $val_ct['id'] ?>" value ="2"> Yếu
                                                    <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 3?'checked':'disabled' ?> class="noidung" name="ck<?= $val_ct['id'] ?>" value ="3"> Trung bình
                                                    <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 4?'checked':'disabled' ?> class="noidung" name="ck<?= $val_ct['id'] ?>" value = "4"> Khá
                                                    <input type="checkbox" data-check="<?= $val_ct['id'] ?>" <?= $val_ct['status'] == 5?'checked':'disabled' ?>  class="noidung" name="ck<?= $val_ct['id'] ?>" value = "5"> Tốt
                                                </div>
                                            <?php $i_2++;  } ?>
                                        <?php } ?>
                                    </div>
                                    <?php $i_1++; } ?>
                                <?php } ?>
                            </div>
                            <?php if(isset($mucdo) && $mucdo !=NULL){?>
                                <div class="row ">
                                    <h2>E. <h5>Quý cơ quan / doanh nghiệp vui lòng đánh giá mức độ đáp ứng yêu cầu công việc của sinh viên đã tốt nghiệp tại Trường?</h5></h2>
                                    <?php foreach($mucdo as $key => $val){ ?>
                                        <div class="col-12 border p-3">
                                            <input type="checkbox" name="data_info[dapung]" <?= $ntd['dapung'] == $val['id']?'checked':'disabled' ?> value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                   <div class="form-group mt-5">
                        <a href="<?= base_url('admins/commentntd') ?>" class="btn btn-info">Trở lại</a>
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
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<script src="testing/js/validator.js"></script>
<script>

      validator({
        form:"#form_cmt",
        error:"#message",
        formGroup:".form-group",
        rules:[
        validator.isRequired("#fullname"),
        validator.isRequired("#chucvu"),
        validator.isRequired("#diachi"),
        validator.isRequired("#email"),
        validator.isRequired("#phone"),
        validator.isRequired("#tencoquan"),
        validator.isRequired("#loaihinh"),
        validator.isRequired("#hoatdong"),
        validator.isRequired("#posi"),
        validator.isEmail("#email"),
        ],
    });
  
  

</script>
<script>
   $(document).on("click",'.danhgia',function(){
        let danhgia = this.value;
        let current = $(this).attr('data-check');
        $("#kq"+current).val(danhgia);
   });
   $(document).on("click",'.noidung',function(){
        let danhgia = this.value;
        let current = $(this).attr('data-check');
        $("#kq"+current).val(danhgia);
   });
</script>

</body>
</html>
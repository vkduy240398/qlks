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
                    <p>Ý kiến của sinh viên về các lĩnh vực hoạt động của nhà trường</p>
                    <hr>
                    <p>
                        Nhằm nâng cao chất lượng đào tạo. Nhà trường cần ghi nhận ý kiến của sinh viên
                        về hoạt động của trường. Rất mong anh chị đóng góp thẳng thắn và trung thực.
                    </p>
                </div>
            </div>
            <div class="col-12">
                <form action="" id="form_cmt" method="post">
                    <h2 class="pt-3 pb-3">A. <span class="text-uppercase">Thông tin chung</span></h2>
                    <div class="row border">
                        <div class="col-3">
                            <div class="form-group">
                                <h5 class="text-danger">Họ tên</h5>
                                <h6><?= $info['hoten'] ?></h6>
                            </div>
                        </div>
                        <div class="col-2">
                            <h5 class="text-danger">Giới tính:</h5>
                            <div class="form-group">
                                <input type="radio" <?= $info['gioitinh']=="Nam"?'checked':'' ?> name="data_info[gioitinh]" value="Nam"> Nam
                                <input type="radio"<?= $info['gioitinh']=="Nữ"?'checked':'' ?> name="data_info[gioitinh]" value="Nữ"> Nữ
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <h5 class="text-danger">Email</h5>
                                <h6><?= $info['email'] ?></h6>
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-4">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <h5 class="text-danger">Ngành đào tạo</h5>
                                        <h6><?= $info['chuyennganh'] ?></h6>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="row">
                                        <h5 class="text-danger">Khóa</h5>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6><?= $info['start'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <h6><?= $info['end'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h5 class="text-danger">Địa chỉ</h5>
                                    <div class="form-group">
                                        <h6><?= $info['diachi'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <h2 class="text-uppercase pt-3 pb-3">B. Nhận xét của người học</h2>
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
                                                <input type="checkbox" <?= $val_ct['status']==2?'checked':'disabled' ?> data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="2"> Hài lòng
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
                        <div class="row mt-2 mb-2">
                            <h3 class="text-info">Ý kiến đóng góp của sinh viên</h3>
                            <div class="col-12 form-group">
                                <textarea name="data_info[y_kien]" disabled class="form-control" cols="30" rows="10"><?= $info['y_kien'] ?></textarea>
                            </div>
                        </div>
                    </div>
                   <div class="form-group mt-5">
                        <a href="<?= base_url('admins/comment_sv') ?>" class="btn btn-info">Trở lại</a>
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

</body>
</html>
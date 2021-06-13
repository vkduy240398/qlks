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
        <div class="evalute row">
            <div class="info col-12">
                <div class="title">
                    <h3>Tra cứu thông tin khảo sát</h3>
                </div>
                <div class="col-12 text-center">
                    <h3 class="text-dark">PHIẾU KHẢO SÁT</h3>
                    <p>Ý kiến của cán bộ giảng viên về các lĩnh vực hoạt động của trường</p>
                    <hr>
                    <p>Nhằm nâng cao chất lượng giáo dục , Nhà trường kính gửi đến quý Thầy / Cô <strong>" Phiếu khảo sát ý 
                    kiến của cán bộ , giảng viên về các hoạt động của Trường "</strong>. Thông tin trên phiếu được bảo mật
                    và chỉ dùng để cải tiến và nâng cao chất lượng đào tạo.
                    </p>
                </div>
            </div>
            <div class="col-12">
                <form action="" method="post">
                    <h2>A. <span class="text-uppercase">Thông tin chung</span></h2>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Họ và tên</h5>
                                <p><?= $gv['fullname']  ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Trình độ học vị:</h4>
                        <?php foreach($level as $key => $val){?>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="radio" name="id_level" <?= $gv['id_level'] == $val['id']?'checked':''?> value="<?=$val['id']?>"> <?=$val['name']?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <h4 for="">Giới tính</h4>
                            <input type="radio"<?= $gv['gender'] == 'Nam'?'checked':''?> name="gender" value="Nam"> Nam
                            <input type="radio" <?= $gv['gender'] == 'Nữ'?'checked':''?> name="gender" value="Nữ"> Nữ
                        </div>
                    </div>
                    <div class="row">
                        <h4>Độ tuổi</h4>
                        <?php foreach($age as $key => $val){?>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="radio"  <?= $gv['id_age'] == $val['id']?'checked':''?> name="id_age" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <h5>Ngày khảo sát</h5>
                        <div class="col-6"><p class="alert alert-success"><?= date('d/m/Y',strtotime($gv['date_cmt'])) ?></p></div>
                    </div>
                    <h2>B. <span class="text-uppercase">Nhận xét của cán bộ / giảng viên (chọn ô thích hợp)</span></h2>
                    <div class="row">
                        <?php foreach($content as $key => $val){?>
                           <div class="col-12">
                                 <h3><?= $val['name_cer'] ?></h3>
                                 <?php if($val['content'] && $val['content'] !=NULL){?>
                                    <?php foreach($val['content'] as $key_ct => $val_ct){?>
                                        <h5><?= $val_ct['content'] ?></h5>
                                        <div class="form-group mt-0 mb-5">
                                      
                                            <input type="checkbox"  <?= $val_ct['status']==1?'checked':'disabled' ?>   class="danhgia" name="ck<?= $val_ct['id'] ?>" value="1"> Rất hài lòng
                                            <input type="checkbox"  <?= $val_ct['status']==2?'checked':'disabled' ?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="2"> Hài lòng
                                            <input type="checkbox"  <?= $val_ct['status']==3?'checked':'disabled' ?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="3"> Không ý kiến
                                            <input type="checkbox"  <?= $val_ct['status']==4?'checked':'disabled' ?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "4"> Không hài lòng
                                            <input type="checkbox"  <?= $val_ct['status']==5?'checked':'disabled' ?> class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "5"> Rất không hài lòng
                                        </div>
                                    <?php } ?>
                                 <?php } ?>
                           </div>
                        <?php } ?>
                    </div>
                    <a href="<?= base_url('admins/comment') ?>" class="btn btn-info">Trở lại</a>
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

<script>
   $(document).on("click",'.danhgia',function(){
        let danhgia = this.value;
        let current = $(this).attr('data-check');
        $("#kq"+current).val(danhgia);
   });
</script>
<script>
    var input = document.querySelectorAll('#date')[0];
  var dateInputMask = function dateInputMask(elm) {
    elm.addEventListener('keypress', function(e) {
      if(e.keyCode < 47 || e.keyCode > 57) {
        e.preventDefault();
      }

      var len = elm.value.length;
      var valueIn = input.value;
      if(len === 2) {
        elm.value += '/';
      }
      let date = valueIn.split("/");
      let d = date[0];
      let m = date[1];
      let y = date[2];
     
      // If they don't add the slash, do it for them...
      if(len === 5) {
        elm.value += '/';
        
      }
      if (d > 31) {
        elm.value = elm.value.replace(d,"31");
      }
      if (m > 12) {
        elm.value = elm.value.replace(m,"12");
      }
    });
  };
    
  dateInputMask(input);
</script>
</body>
</html>
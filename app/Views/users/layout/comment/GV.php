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
            <div class="info col-12 p-3">
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
            <div class="col-12 ">
                <form action="" id="form_cmt" method="post">
                    <h2>A. <span class="text-uppercase">Thông tin chung</span></h2>
                    <div class="row border p-3">
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Nhập họ tên</h5>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ tên">
                                <p id="message"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row border p-3">
                        <h4>Trình độ học vị:</h4>
                        <?php foreach($level as $key => $val){?>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="radio" name="id_level"  value="<?=$val['id']?>"> <?=$val['name']?>
                                    <p id="message"></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row border p-3">
                        <div class="form-group">
                            <h4 for="">Giới tính</h4>
                            <input type="radio" checked name="gender" value="Nam"> Nam
                            <input type="radio" name="gender" value="Nữ"> Nữ
                        </div>
                    </div>
                    <div class="row border p-3">
                        <h4>Độ tuổi</h4>
                        <?php foreach($age as $key => $val){?>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="radio" name="id_age" value="<?= $val['id'] ?>"> <?= $val['name'] ?>
                                    <p id="message"></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row border p-3">
                        <h5>Ngày khảo sát</h5>
                        <div class="form-group">
                            <div class="col-6"><input type="text" class="form-control" id="date" name="date_on"></div>
                            <p id="message"></p>
                        </div>
                    </div>
                    <h2>B. <span class="text-uppercase">Nhận xét của cán bộ / giảng viên (chọn ô thích hợp)</span></h2>
                    <div class="row ">
                        <?php $i = 1; if(isset($content) && $content != NULL){?>
                            <?php foreach($content as $key => $val){ ?>
                            <div class="col-12 border p-3" id="data">
                                <h5><?= $i.' '.$val['name_cer'] ?></h5>
                                <?php if($val['content'] && $val['content'] !=NULL ) {?>
                                    <?php $i =0; foreach($val['content'] as $key_ct => $val_ct){?>
                                        <p id="<?= $val_ct['id'] ?>" style="font-weight:bold;"  class="text-dark data"><?= $val_ct['content'] ?></p>
                                        <div class="form-group mt-0 mb-5" >
                                            <input type="hidden" id="kq<?= $val_ct['id'] ?>" data-id ="<?= $val_ct['id'] ?>" value="" name="data_post[<?= $val_ct['id'] ?>][kq]">
                                            <input type="hidden" name="data_post[<?= $val_ct['id'] ?>][id]" value="<?= $val_ct['id'] ?>">
                                            <input type="radio" data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value="1"> Rất hài lòng
                                            <input type="radio" data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="2"> Hài lòng
                                            <input type="radio" data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="3"> Không ý kiến
                                            <input type="radio" data-check="<?= $val_ct['id'] ?>"  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "4"> Không hài lòng
                                            <input type="radio" data-check="<?= $val_ct['id'] ?>"  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "5"> Rất không hài lòng
                                            <p id="message"></p>
                                        </div>
                                    <?php $i++; } ?>
                                <?php } ?>
                            </div>
                            <?php $i++; } ?>
                        <?php } ?>
                    </div>
                   <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                        <a href="<?= base_url() ?>" class="btn btn-info">Trở lại</a>
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
  var input = document.querySelectorAll('.data');
  var id = [];
  Array.from(input).forEach(inputs=>{
    var ids = inputs.getAttribute('id');
    id.push('kq'+ids);
  });
  var danhgia = document.querySelectorAll('.data');
  Array.from(danhgia).forEach(cmt=>{
      var id = cmt.getAttribute('id');
      validator({
        form:"#form_cmt",
        error:"#message",
        formGroup:".form-group",
        rules:[
        validator.isRequired("#fullname"),
        validator.isRequired("#date"),
        validator.isRequired('input[name="id_level"]'),
        validator.isRequired('input[name="id_age"]'),
        validator.isRequired('input[name ="ck'+id+'"]'),
        ],
    });
  });
  
  

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
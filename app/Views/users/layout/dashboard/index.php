<?= $this->extend('./users/layout/masterlayout') ?>
<?= $this->section('content');?>
<form action="" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-4">
            <p class="text-dark mt-2" for=""> <span class="font-weight-bolder text-uppercase text-primary">Tài khoản:</span> <span class="text-monospace"><?= $datas?$datas['username']:'' ?></span> </p> 
            <div class="form-group">
                <label class="text-primary" for="">Họ và tên</label>
                <input type="text" class="form-control" required name="data_post[fullname]" value="<?= $datas?$datas['fullname']:'' ?>">
                <div class="invalid-feedback">
                    Vui lòng nhập đầy đủ
                </div>
            </div>
            <div class="form-group">
                <label class="text-primary" for="">Ngày sinh</label>
                <input type="text" class="form-control" required id="date" name="data_post[birthday]" value="<?= $datas['birthday']!=NULL?date('d/m/Y',strtotime($datas['birthday'])):'' ?>" maxlength="10">
                <div class="invalid-feedback">
                    Vui lòng nhập đầy đủ
                </div>
            </div>
            <div class="form-group">
                <label class="text-primary" for="">Giới tính</label>
                <input type="radio" <?= $datas['gender']=="Nam"?'checked':'' ?>  name="data_post[gender]" value="Nam"> Nam
                <input type="radio"  <?= $datas['gender']=="Nữ"?'checked':'' ?> name="data_post[gender]" value="Nữ"> Nữ
            </div>
            <div class="form-group">
                <label class="text-primary" for="">Địa chỉ</label>
                <input type="text" class="form-control" required id="date" name="data_post[address]" value="<?= $datas?$datas['address']:'' ?>" maxlength="10"> 
                <div class="invalid-feedback">
                    Vui lòng nhập đầy đủ
                </div>
            </div>
            <div class="form-group">
                <label class="text-primary" for="">Địa chỉ email</label>
                <input type="email" class="form-control" id="date" name="data_post[email]" value="<?= $datas?$datas['email']:'' ?>"> 
                <div class="invalid-feedback">
                   Email không đúng định dạng
                </div>
            </div>
            <div class="form-group">
                <label class="text-primary" for="">Số điện thoại</label>
                <input type="tel" class="form-control" id="date" name="data_post[phone]" value="<?= $datas?$datas['phone']:'' ?>" maxlength="10"> 
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mt-5"></div>
            <div class="form-group">
                <label class="text-primary" for="">Chức danh</label>
                <select name="data_post[id_role]" class="form-control" id="">
                    <?php if(isset($role) && $role != NULL){?>
                       <?php foreach($role as $key=>$val){?>
                            <option value="<?= $val['id'] ?>" <?= $datas['id_role'] == $val['id']?'selected':'' ?>><?= $val['name'] ?></option>
                       <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="text-primary" for="">Chức vụ</label>
                <input type="text" value="<?= $datas?$datas['posi']:'' ?>" name="data_post[posi]" class="form-control">
            </div> 
            <div class="form-group">
                <label class="text-primary" for="">Cơ quan</label>
                <input type="text" value="<?= $datas?$datas['ori']:'' ?>" name="data_post[ori]" class="form-control">
            </div>   
        </div>
        <div class="col-4">
            <div class="avatarReader info text-center">
                <img src="uploads/users_third/<?= $datas['id'].'/'.$datas['avatar'] ?>" id="readerImage"  height="150" width="150" alt="">
            </div>
            <div class="image">
                <div class="form-group mt-3">
                    <input type="file" class="custom-file-input" name="avatar" id="avatar">
                    <label class="" for="avatar">Chọn ảnh đại diện</label>
                    <p class="text-danger" id="mess_us"></p>
                    <div class="invalid-feedback">Chưa chọn ảnh đại diện</div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-info">Cập nhật thông tin</button>
        </div>
    </div>
</form>
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
<script>
        var avatar = document.querySelector("#avatar");
        var mess_us = document.querySelector("#mess_us");
        var imageReader = document.querySelector("#readerImage");
        avatar.addEventListener("change",(e)=>{
            var file = avatar.files[0];
            if (file) {
                mess_us.innerHTML = "";
                var reader = new FileReader();
                    reader.onload = function(){
                    imageReader.src = reader.result;
                }
                reader.readAsDataURL(file)
            }
            else{
                mess_us.innerHTML = "Chưa chọn ảnh đại diện";
                imageReader.src = "image/avatar.png";
            }
        
        });
    </script>
    <style>
    .image {
        text-align:center;
    }
    .image input[type="file"]{
        display: none;
    }
    .image label{
        color:#ffffff;
        padding:10px 15px;
        background:rgba(100,230,60,1);
        border-radius:5px;
    }
</style>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    <?php if (session()->getFlashdata('success')) {?>
        toastr.success('<?= session()->getFlashdata('success') ?>', 'Chúc mừng') 
    <?php  } ?>
</script>
<?= $this->endSection() ?>
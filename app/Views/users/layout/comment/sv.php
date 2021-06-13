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
                <div class="col-12 text-center">
                    <h3 class="text-dark  p-3">PHIẾU KHẢO SÁT</h3>
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
                    <h2>A. <span class="text-uppercase">Thông tin chung</span></h2>
                    <div class="row border">
                        <div class="col-3">
                            <div class="form-group">
                                <h5>Nhập họ tên</h5>
                                <input type="text" class="form-control" id="fullname" name="data_info[hoten]">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-2">
                            <h5>Giới tính:</h5>
                            <div class="form-group">
                                <input type="radio" checked name="data_info[gioitinh]" value="Nam"> Nam
                                <input type="radio" name="data_info[gioitinh]" value="Nữ"> Nữ
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <h5>Email</h5>
                                <input type="text"  id="email"  name="data_info[email]" class="form-control">
                                <p id="message"></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5 >Ngành đào tạo</h5>
                                        <input type="text" id="chuyennganh" name="data_info[chuyennganh]" class="form-control">
                                        <p id="message"></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <h5 for="">Khóa</h5>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" name="data_info[start]" maxlength="4"  id="start" class="form-control" placeholder="2016">
                                                <p id="message"></p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" name="data_info[end]" maxlength="4"  id="end" class="form-control" placeholder="2020">
                                                <p id="message"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Địa chỉ</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="diachi" name="data_info[diachi]">
                                <p id="message"></p>
                            </div>
                        </div>
                    </div>
                        <h2 class="text-uppercase">B. Nhận xét của người học</h2>
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
                                                <input type="radio" data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value="1"> Rất hài lòng
                                                <input type="radio" data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="2"> Hài lòng
                                                <input type="radio" data-check="<?= $val_ct['id'] ?>" class="danhgia" name="ck<?= $val_ct['id'] ?>" value ="3"> Không ý kiến
                                                <input type="radio" data-check="<?= $val_ct['id'] ?>"  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "4"> Không hài lòng
                                                <input type="radio" data-check="<?= $val_ct['id'] ?>"  class="danhgia" name="ck<?= $val_ct['id'] ?>" value = "5"> Rất không hài lòng
                                                <p id="message"></p>
                                            </div>
                                        <?php  } ?>
                                    <?php } ?>
                                </div>
                                <?php  } ?>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <h3 class="text-info mt-2">Ý kiến của anh chị nếu có</h3>
                            <div class="col-12 form-group">
                                <textarea name="data_info[y_kien]"  class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
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

      validator({
        form:"#form_cmt",
        error:"#message",
        formGroup:".form-group",
        rules:[
        validator.isRequired("#fullname"),
        validator.isRequired("#diachi"),
        validator.isRequired("#email"),
        validator.isEmail("#email"),
        validator.isRequired("#chuyennganh"),
        validator.isRequired("#start"),
        validator.isRequired("#end"),
        ],
    });
  
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
<script>
 
  function FormatNumber(num)
{
    var pattern = "0123456789.";
    var len = num.value.length;
    if (len != 0)
    {
        var index = 0;

        while ((index < len) && (len != 0))
            if (pattern.indexOf(num.value.charAt(index)) == -1)
            {
                if (index == len-1)
                    num.value = num.value.substring(0, len-1);
                else if (index == 0)
                        num.value = num.value.substring(1, len);
                     else num.value = num.value.substring(0, index)+num.value.substring(index+1, len);
                index = 0;
                len = num.value.length;
            }
            else index++;
    }
    val = num.value;
    val = val.replace(/[^\d.]/g,"");
    arr = val.split('.');
    lftsde = arr[0];
    rghtsde = arr[1];
    result = "";
    lng = lftsde.length;
    j = 0;
    for (i = lng; i > 0; i--){
        j++;
        if (((j % 3) == 1) && (j != 1)){
            result = lftsde.substr(i-1,1) + "," + result;
        }else{
            result = lftsde.substr(i-1,1) + result;
        }
    }
    if(rghtsde==null){
        num.value = result;
    }else{
        num.value = result+'.'+arr[1];
    }
}
</script>
</body>
</html>
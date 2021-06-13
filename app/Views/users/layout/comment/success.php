<?= $this->extend('./users/layout/masterlayout') ?>
<?= $this->section('content');?>
    <div class="row">
        <div class="col-12">
            <h3 class="alert-success">Cảm ơn bạn đã đóng góp ý kiến về Trường Đại Học Kỹ Thuật Công Nghệ Cần Thơ</h3>
            <a href="<?= base_url('') ?>">Về trang chính</a>
        </div>
    </div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<?= $this->endSection() ?>
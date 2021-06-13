<?= $this->extend('./users/layout/masterlayout') ?>
<?= $this->section('content');?>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3"><a href="<?= base_url('CommentGV/index') ?>" class="btn btn-primary">Phiếu đánh giá của giảng viên</a></div>
                <div class="col-3"><a href="<?= base_url('CommentNTD/index') ?>" class="btn btn-warning">Phiếu đánh giá của nhà tuyển dụng</a></div>
                <div class="col-3"><a href="<?= base_url('Commentold_sv/index') ?>" class="btn btn-info">Phiếu đánh giá của cựu sinh viên</a></div>
                <div class="col-3"><a href="<?= base_url('Commentsv/index') ?>" class="btn btn-danger">Phiếu đánh giá của  sinh viên</a></div>
            </div>
        </div>
    </div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<?= $this->endSection() ?>
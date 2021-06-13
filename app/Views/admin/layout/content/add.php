<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <form action="" method="post">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <textarea name="data_post[content]" id="" placeholder="Nhập nội dung tiêu chí" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div> 
            </div>
             <div class="form-group col-3">
                 <button type="submit" name="add" class="btn btn-success pr-4 pl-4">Lưu</button>
                 <button type="reset" name="add" class="btn btn-primary pr-4 pl-4">Làm lại</button>
                 <a class="btn btn-info" href="<?= ADMIN.$control.'/index/'.$id ?>">Trở lại</a>
            </div>
    </form>
    </div>
</div>
<?= $this->endSection() ?>
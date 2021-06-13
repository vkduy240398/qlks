<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <form action="" method="post">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <select name="data_post[parentid]" id="" class="form-control">
                            <option value="0">Chọn tiêu chí</option>
                            <?php if(isset($branch) && $branch !=NULL){?>
                                <?php foreach($branch as $key => $val) {?>
                                    <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="data_post[name]" placeholder="Nhập tiêu chí">
                    </div>
                    <div class="form-group">
                        <label for="publish">Hiển thị</label>
                        <input type="checkbox" id="publish" class="" value="1" checked name="data_post[publish]" placeholder="Tên nhóm quyền">
                    </div>
                </div> 
            </div>
             <div class="form-group col-3">
                 <button type="submit" name="add" class="btn btn-success pr-4 pl-4">Lưu</button>
                 <button type="reset" name="add" class="btn btn-primary pr-4 pl-4">Làm lại</button>
                 <a class="btn btn-info" href="<?= ADMIN.$control ?>">Trở lại</a>
            </div>
    </form>
    </div>
</div>
<?= $this->endSection() ?>
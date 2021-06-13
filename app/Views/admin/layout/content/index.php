<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row m-3 mb-0">
        <div class="col-6">
            <a href="<?= ADMIN.$control.'/add/'.$id ?>" class="btn btn-primary">Thêm mới</a>
            <a href="<?= ADMIN.'criteria/index/'.$id_role ?>" class="btn btn-info">Trở lại</a>
            <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger">Xóa tất cả</a>
        </div>
    </div>
    <div class="col-12 p-3">
        <?php if(session()->getFlashdata('success')){?>
            <p class="alert alert-success"><?= session()->getFlashdata('success') ?></p>
        <?php } ?>
        <?php if(session()->getFlashdata('error')){?>
            <p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
        <?php } ?>
    </div>
    
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title.': '.$name_role; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" onClick="toggle(this)"></th>
                        <th style="width:75%">Nội dung</th>
                        <th>Ngày tạo</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($datas) && $datas !=null) {?>
                <?php foreach($datas as $key => $val){?>
                    <tr>
                        <td><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                        <td><?= $val['content'] ?></td>
                        <td><?= date('d/m/Y',strtotime($val['created_at'])) ?></td>
                        <td>
                            <a href="<?= ADMIN.$control.'/edit'.'/'.$val['id']; ?>" class="btn btn-success">Sửa</a>
                            <a href="<?= ADMIN.$control.'/delete'.'/'.$val['id']; ?>" onclick="return confirm('bạn có muốn xóa')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

<?= $this->endSection() ?>
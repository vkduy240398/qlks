<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= ADMIN ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Your Page</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= ADMIN ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lý Admin</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded" id="myTab">
            <a class="collapse-item"  href="<?= ADMIN."Users/index" ?>">Danh sách</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Quản lý</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= ADMIN."branch" ?>">Khoa và Ngành học</a>
            <a class="collapse-item" href="<?= ADMIN."role" ?>">Quyền đánh giá</a>
            <a class="collapse-item" href="<?= ADMIN."age" ?>">Độ tuổi</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Danh sách phiếu đánh giá</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= ADMIN."comment" ?>">Phiếu đánh giá giảng viên</a>    
            <a class="collapse-item" href="<?= ADMIN."commentntd" ?>">Phiếu đánh giá NTD</a>    
            <a class="collapse-item" href="<?= ADMIN."comment_oldsv" ?>">Phiếu đánh giá cựu sinh viên</a>    
            <a class="collapse-item" href="<?= ADMIN."comment_sv" ?>">Phiếu đánh giá sinh viên</a>    
        </div>
    </div>
</li>

<!-- Divider -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Câu hỏi của NTD</span>
    </a>
    <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= ADMIN."Contentcmt" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Nội dung đánh giá</span></a>
            <a class="collapse-item" href="<?= ADMIN."Loaihinh" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Loại hình</span></a>
            <a class="collapse-item" href="<?= ADMIN."hoatdong" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Hoạt động</span></a>
            <a class="collapse-item" href="<?= ADMIN."posi" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Vị trí</span></a>
            <a class="collapse-item" href="<?= ADMIN."phamvi" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Phạm vi</span></a>
            <a class="collapse-item" href="<?= ADMIN."mucdo" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Mức độ</span></a>
            <a class="collapse-item" href="<?= ADMIN."co_so" ?>"><i class="fas fa-fw fa-chart-area"></i><span>Cơ sở</span></a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Câu hỏi của cựu sinh viên</span>
    </a>
    <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= ADMIN."lh_coquan" ?>">Loại hình cơ quan</a>
            <a class="collapse-item" href="<?= ADMIN."chuyenmon" ?>">Kiến thức chuyên môn</a>
            <a class="collapse-item" href="<?= ADMIN."yeuto" ?>">Yếu tố</a>
            <a class="collapse-item" href="<?= ADMIN."nguyennhan" ?>">Nguyên nhân</a>
            <a class="collapse-item" href="<?= ADMIN."daotao" ?>">Chương trình đào tạo</a>
         
        </div>
    </div>
</li>
<!-- Heading -->
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
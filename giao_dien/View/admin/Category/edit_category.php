<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thể loại /</span> Sửa thể loại</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <?php
                        foreach ($TL as $tl) {
                            ?>
                            <form id="tl" method="POST" action="index.php?controller=categoryAdmin&action=update">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <input type="hidden" name="id" value="<?= $tl['id_category'] ?>">
                                        <label for="tl" class="form-label">Tên thể loại</label>
                                        <input class="form-control" type="text" id="tl" name="tl"
                                            value="<?= $tl['Category_name'] ?>" autofocus />
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Sửa</button>
                                    </div>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=categoryAdmin">
                        Hủy bỏ</a>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
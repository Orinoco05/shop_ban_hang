<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thể loại /</span> Thêm thể loại</h4>
        <div style="margin-bottom: 10px;">
            <a class="btn btn-primary me-2" href=index.php?controller=categoryAdmin&action=Add>Add Category</a>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết</h5>
                    <hr class="my-0" />
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th >Category Name</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($array['infor'] as $tl) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $tl['id_category'] ?>
                                        </td>
                                        <td>
                                            <?= $tl['Category_name'] ?>
                                        </td>
                                        <td> <a
                                                href="index.php?controller=categoryAdmin&action=edit&id=<?= $tl['id_category'] ?>"><button
                                                    type="button" class="btn btn-info">Edit</button></a>
                                            <a
                                                href="index.php?controller=categoryAdmin&action=destroy&id=<?= $tl['id_category'] ?>"><button
                                                    type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
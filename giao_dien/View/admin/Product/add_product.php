<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div>
        <?php
        $test = 0;
        if ($test == 1) {
            echo "<div style='color:red' >This name already exists!</div>";
        }
        ?>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Thêm sản phẩm</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Sản phẩm</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="index.php?controller=productAdmin&action=store">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input class="form-control" type="text" id="name" name="name" autofocus required />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Giá</label>
                                    <input class="form-control" type="text" id="price" name="price" required />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Thể loại</label>
                                    <select class="form-control" type="text" id="price" name="id_category">
                                        <option value="" required> - Chọn - </option>
                                        <?php
                                        foreach ($arr as $category) {
                                            ?>
                                            <option value="<?= $category['id_category'] ?>">
                                                <?= $category['Category_name'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                               <div class="mb-3 col-md-6 ">
                                <!-- <div class="input-group"> -->
                                    <label for="inputGroupFile01" class="form-label">Ảnh sản phẩm</label>
                                    <!-- <label class="input-group-text" for="inputGroupFile01">Ảnh sản phẩm</label> -->
                                    <input class="form-control" type="file" name="img" id="inputGroupFile01" required />
                                <!-- </div> -->
                               </div>

                                <div><br></div>
                                <div style="margin-left: 15px;" class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Thêm sản phẩm</button>
                                </div>
                        </form>
                    </div>
                    <div style="margin-top: 10px">
                    <a style="color: #8592a3" href="index.php?controller=productAdmin"><button type="reset"
                            class="btn btn-outline-secondary">Hủy bỏ</button></a></div>
                    <!-- /Account -->
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
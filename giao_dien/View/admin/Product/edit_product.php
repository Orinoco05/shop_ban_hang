<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <?php
    $check = 0;
        if($check == 1){
            echo "<div style='color:red' >This name already exists!</div>";
        }
    ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Sửa sản phẩm</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Sản phẩm</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                    <?php
                        foreach ($array1['products'] as $product){
                    ?>
                        <form id="formAccountSettings" method="POST" action="index.php?controller=productAdmin&action=update">
                            <div class="row">
                            <input type="hidden" name="id" value="<?= $product['ID_product'] ?>">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?=$product['Product_name']?>" autofocus />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Giá</label>
                                    <input class="form-control" type="text" id="price" name="price" value="<?=$product['Price']?>" />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Thể loại</label>
                                    <select class="form-control" type="text" id="price" name="id_category">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($array1['category'] as $category) {
                                        ?>
                                            <option value="<?= $category['id_category'] ?>" 
                                            <?php
                                                if ($category['id_category'] == $product['id_category']) {
                                                    echo 'selected';
                                                    }
                                            ?>>
                                                <?= $category['Category_name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">Ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="img" id="inputGroupFile01" />
                                </div> -->

<div class="mb-3 col-md-6 ">
                                <!-- <div class="input-group"> -->
                                    <label for="inputGroupFile01" class="form-label">Ảnh sản phẩm</label>
                                    <!-- <label class="input-group-text" for="inputGroupFile01">Ảnh sản phẩm</label> -->
                                    <input class="form-control" type="file" name="img" id="inputGroupFile01" required />
                                <!-- </div> -->
                               </div>

                                <div style="margin-left: 15px;" class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Sửa sản phẩm</button>
                                </div>
                        </form>
                    <?php
                        }
                    ?>
                    </div>
                    <div style="margin-top: 10px">
                    <a style="color: #8592a3" href="index.php?controller=productAdmin"><button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button></a></div>
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
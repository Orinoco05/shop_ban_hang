<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <?php
    $check = 0;
    if ($check == 1) {
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
                        foreach ($array1['products'] as $product) {
                            ?>
                            <form id="formAccountSettings" method="POST"
                                action="index.php?controller=detailAdmin&action=update">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $product['ID_product_detail'] ?>">
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Mô tả</label>
                                        <input class="form-control" type="text" id="name" name="des"
                                            value="<?= $product['Description'] ?>" autofocus />
                                    </div>
                                    
                                            <div class="mb-3 col-md-6 ">
                                                <label for="price" class="form-label">Số lượng</label>
                                                <input class="form-control" type="text" id="price" name="quantity"
                                                    value="<?= $product['Quantity'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="price" class="form-label">Sản phẩm</label>
                                        <select class="form-control" type="text" id="price" name="ID_product">
                                            <option value=""> - Chọn - </option>
                                            <?php
                                            foreach ($array1['product'] as $pro) {
                                                ?>
                                                <option value="<?= $pro['ID_product'] ?>" <?php
                                                  if ($pro['ID_product'] == $product['ID_product']) {
                                                      echo 'selected';
                                                  }
                                                  ?>>
                                                    <?= $pro['Product_name'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="price" class="form-label">Size</label>
                                        <select class="form-control" type="text" id="price" name="ID_size">
                                            <option value=""> - Chọn - </option>
                                            <?php
                                            foreach ($array1['size'] as $size) {
                                                ?>
                                                <option value="<?= $size['ID_size'] ?>" <?php
                                                  if ($size['ID_size'] == $product['ID_size']) {
                                                      echo 'selected';
                                                  }
                                                  ?>>
                                                    <?= $size['Size_name'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="price" class="form-label">Color</label>
                                        <select class="form-control" type="text" id="price" name="ID_color">
                                            <option value=""> - Chọn - </option>
                                            <?php
                                            foreach ($array1['color'] as $color) {
                                                ?>
                                                <option value="<?= $color['ID_color'] ?>" <?php
                                                  if ($color['ID_color'] == $product['ID_color']) {
                                                      echo 'selected';
                                                  }
                                                  ?>>
                                                    <?= $color['Color_name'] ?>
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
                        <a style="color: #8592a3" href="index.php?controller=detailAdmin"><button type="reset"
                                class="btn btn-outline-secondary">Hủy bỏ</button></a>
                    </div>
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
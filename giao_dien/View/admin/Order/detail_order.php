<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn chi tiết /</span>Hiển thị
        </h4>
        <div class="row">
            <div class="card">

                <div >
                    <div class="card-body">
                        <div class="row">
                            <?php
                            foreach ($bill['product'] as $infor) {
                                ?>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Tên khách hàng</label>
                                    <input class="form-control" type="text" id="email"
                                        value="<?= $infor['nameCustomer'] ?>" readonly />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Địa chỉ</label>
                                    <input class="form-control" type="text" id="total" value="<?= $infor['addressCustomer'] ?>"
                                        readonly />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Số điện thoại</label>
                                    <input class="form-control" type="text" id="total" value="<?= $infor['phoneCustomer'] ?>"
                                        readonly />
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <h5 class="card-header">Sản phẩm</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($bill['product'] as $product) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $product['Product_name'] ?>
                                    </td>
                                    <td><img src="img/<?= $product['img'] ?>" alt="" width="150px" height="150px"></td>
                                    <td>
                                        <?= $product['Price'] ?>
                                    </td>
                                    <td>
                                        <?= $product['Quantity'] ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="row">
                            <?php
                            foreach ($bill['product'] as $infor) {
                                ?>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Nhân viên</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="<?= $infor['Full_name'] ?>" readonly />
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            foreach ($bill['product'] as $infor) {
                                ?>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Ngày mua</label>
                                    <input class="form-control" type="date" id="email" name="email"
                                        value="<?= $infor['Purchase_date'] ?>" readonly />
                                </div>
                                <!-- <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Tổng giá</label>
                                    <input class="form-control" type="text" id="total" name="total"
                                        value="<?= $infor['total'] ?>" readonly />
                                </div> -->
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Phương thức thanh toán</label>
                                    <input class="form-control" type="text" id="total" name="total"
                                        value="<?= $infor['name_payment'] ?>" readonly />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Phương thức vận chuyển</label>
                                    <input class="form-control" type="text" id="total" name="total"
                                        value="<?= $infor['name_deli'] ?>" readonly />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Trạng thái</label>
                                    <?php if ($infor['Status'] == 0) {
                                    echo '<input class="form-control" type="text" id="total" name="total" value="Chờ xử lý" readonly />';
                                    } elseif ($infor['Status'] == 1) {
                                        echo '<input class="form-control" type="text" id="total" name="total" value="Đang xử lý" readonly />';
                                    } elseif ($infor['Status'] == 2) {
                                        echo '<input class="form-control" type="text" id="total" name="total" value="Đang giao" readonly />';
                                    } elseif ($infor['Status'] == 3) {
                                        echo '<input class="form-control" type="text" id="total" name="total" value="Đã giao hàng" readonly />';
                                    } elseif ($infor['Status'] == 4) {
                                        echo '<input class="form-control" type="text" id="total" name="total" value="Đã hủy" readonly />';
                                    } ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a style="color: #8592a3" href="index.php?controller=billAdmin"><button
                                class="btn btn-outline-secondary">Trở lại</button></a>
                        <!--/ Basic Bootstrap Table -->
                    </div>

                </div>
            </div>
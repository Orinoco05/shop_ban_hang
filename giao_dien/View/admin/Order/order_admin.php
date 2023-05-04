<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn /</span>Hiển thị
        </h4>

        <div class="row">
            <!-- Basic Buttons -->

            <div class="col-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=billAdmin&action=information"><i
                                class="bx bx-plus"></i>Thêm hóa đơn</a>
                    </li>
                </ul>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Danh sách hóa đơn</h5>

                    <!--Tìm kiếm-->
                    <form action="index.php?controller=billAdmin&action=" method="post">
                        <div style="display: flex;justify-content: right">
                            <div class="mb-3 col-md-3">
                                <input class="form-control" type="text" id="name" name="search" value="" autofocus />
                            </div>
                            <button type="submit" class="mb-3" style="display: block;color: #697a8d;
    background-color: #fff;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                <i class="bx bx-search fs-4 lh-0"></i>
                            </button>
                        </div>
                    </form>
                    <!--Tìm kiếm-->

                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Người mua</th>
                                    <th>Ngày mua</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($array['infor'] as $bill) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $bill['id_bill'] ?>
                                        </td>
                                        <td>
                                            <?= $bill['name_customer'] ?>
                                        </td>
                                        <td>
                                            <?= $bill['purchase_date'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($bill['status'] == 0) {
                                                echo "Chờ xử lý";
                                            } elseif ($bill['status'] == 1) {
                                                echo "Đang xử lý";
                                            } elseif ($bill['status'] == 2) {
                                                echo "Đang giao";
                                            } elseif ($bill['status'] == 3) {
                                                echo "Đã giao hàng";
                                            } elseif ($bill['status'] == 4) {
                                                echo "Đã hủy";
                                            } ?>
                                        </td>
                                        <td>
                                            <?= $bill['total'] ?>
                                        </td>
                                        <td>
                                            <a style="color: white"
                                                href="index.php?controller=billAdmin&action=details&id=<?= $bill['id_bill'] ?>"><button
                                                    type="button" class="btn btn-success">Xem chi tiết</button></a>
                                            <?php
                                            if ($bill['status'] == 4) {

                                            } elseif ($bill['status'] == 3) {

                                            } else {
                                                ?>
                                                <a style="color: white"
                                                    href="index.php?controller=billAdmin&action=edit&id=<?= $bill['id_bill'] ?>"><button
                                                        type="button" class="btn btn-info">Sửa</button></a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--                        Chia số trang-->
                        <div class="" style="display: flex ;justify-content: center ; margin-top: 50px">
                            <nav aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <?php
                                    for ($i = 1; $i <= $array['page']; $i++) {
                                        ?>
                                        <li class="page-item">
                                            <form method="post" action="index.php?controller=billAdmin&page=<?= $i ?>">
                                                <input type="hidden" name="search" value="<?= $array['search'] ?>">
                                                <input type="hidden" name="page" value="<?= $i ?>">
                                                <button class="page-link">
                                                    <?= $i ?>
                                                </button>
                                            </form>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <!--                        Chia số trang-->

                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>
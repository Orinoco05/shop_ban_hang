<!-- fix -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php
    include_once "View/Layout/head.php";
    ?>
</head>

<body>
    <?php
    include_once "View/Layout/header.php";
    ?>

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 mt-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php foreach ($infor['cart'] as $key => $value) { ?>
                        <tbody class="align-middle">
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="mr-3">
                                            <img src="img/<?= $value['img'] ?>" alt="" style="width: 100px; height: 120px;">
                                        </div>
                                        <div>
                                            <div class="w-10">
                                                <p class="font-weight-bold">
                                                    <?= $value['product_name'] ?>
                                                </p>
                                            </div>
                                            <div class="text-primary">
                                                <?= $value['color'] ?>
                                            </div>
                                            <div>
                                                <?= $value['size'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </td>
                                <td class="align-middle">
                                    $
                                    <?= $value['price'] ?>
                                </td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <a href="?controller=cartCustomer&action=change_amount&mode=1&key=<?= $key ?>"
                                                class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div>
                                        <input type="number" min="1"
                                            class="form-control input_amount bg-secondary border-0 text-center"
                                            name="amount" value="<?= $value['amount'] ?>">
                                        <div class="input-group-btn">
                                            <a href="?controller=cartCustomer&action=change_amount&mode=2&key=<?= $key ?>"
                                                class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    $
                                    <?= $value['totalPrice'] ?>
                                </td>
                                <td class="align-middle">
                                    <a href="?controller=cartCustomer&action=trashPr&key=<?= $key ?>"
                                        class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>
                                $
                                <?= $infor['totalPrice'] ?>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$0</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5> $
                                <?= $infor['totalPrice'] ?>
                            </h5>
                        </div>
                        <a href="?controller=checkout"
                            class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To
                            Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <?php
    include_once "View/Layout/footer.php";
    ?>
</body>
<script>
    const minusBtn = document.querySelector('.btn-minus');
    const plusBtn = document.querySelector('.btn-plus');
    const inputField = document.querySelector('input[name="amount"]');


    minusBtn.addEventListener('click', function () {
        let oldValue = parseInt(inputField.value);
        let newVal;
        if (oldValue > 1) {
            newVal = oldValue - 1;
        } else {
            newVal = 1;
        }
        inputField.value = newVal;
    });

    plusBtn.addEventListener('click', function () {
        let oldValue = parseInt(inputField.value);
        let newVal = oldValue + 1;
        inputField.value = newVal;
    });
    inputField.addEventListener('blur', function () {
        if (inputField.value <= 0) {
            inputField.value = 1;
        }
    });
</script>

</html>
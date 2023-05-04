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


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form method="POST" action="?controller=checkout&action=checkout">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Billing
                            Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Name</label>
                                <input class="form-control" name="nameCustomer" value="<?= $data['nameCustomer'] ?>"
                                    type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="emailCustomer" value="<?= $data['email'] ?>"
                                    type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" name="phoneCustomer" value="<?= $data['phone'] ?>"
                                    type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Delivery Method</label>
                                <select name="deliveryID" class="custom-select">
                                    <?php foreach ($data['delivery'] as $delivery) { ?>
                                        <option value="<?= $delivery['ID_delivery'] ?>"><?= $delivery['Method_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Order
                            Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            <?php foreach ($data['cart'] as $product) { ?>

                                <div class="d-flex justify-content-between mb-3">
                                    <img src="img/<?= $product['img'] ?>" style="width:30px" alt="">
                                    <p>
                                        <?= $product['product_name'] ?>
                                    </p>
                                    <p>$
                                        <?= $product['price'] ?>
                                    </p>
                                    <p>x
                                        <?= $product['amount'] ?>
                                    </p>
                                    <p>
                                        <span>
                                            <?= $product['color'] ?>/
                                        </span>
                                        <span>
                                            <?= $product['size'] ?>
                                        </span>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>
                                    <?= $data['totalPrice'] ?>
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
                                <h5>
                                    <?= $data['totalPrice'] ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span
                                class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <?php foreach ($data['payment'] as $payment) { ?>
                                <div class="form-group mb-4">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="paymentID" class="custom-control-input"
                                            value="<?= $payment['ID_payment'] ?>" name="payment"
                                            id="<?= $payment['ID_payment'] ?>">
                                        <label class="custom-control-label" for="<?= $payment['ID_payment'] ?>"><?= $payment['Method_name'] ?></label>
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->


    <?php
    include_once "View/Layout/footer.php";
    ?>
</body>

</html>
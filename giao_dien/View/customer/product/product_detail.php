<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Famms - Online Shop Website</title>
    <?php
    include_once "View/Layout/head.php";
?>
</head>

<body>
    <?php
    include_once "View/Layout/header.php";
    ?>
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">

        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <?php foreach($data['data'] as $index => $image){ ?>
                        <div class="carousel-item <?php if($index === 0){echo 'active';}  ?> ">
                            <img class="w-100 h-100" src="img/<?= $image['img_2rd']?>" alt="Image">
                        </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?= $data['product']['Product_name']?></h3>
                    <div class="d-flex mb-3">
                        <small class="pt-1"><?= $data['product']['Category_name']?></small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4 "><?= $data['product']['Price']?> $</h3>
                    <form method="POST" action="?controller=cartCustomer&action=add_to_cart">
                        <input type="hidden" name="id" value="<?= $data['product']['ID_product']?>" />
                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Sizes:</strong>
                            <?php foreach($data['size'] as $size){ ?>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="<?= $size['ID_size']?>" class="custom-control-input"
                                    id="<?= $size['ID_size']?>" name="size">
                                <label class="custom-control-label"
                                    for="<?= $size['ID_size']?>"><?= $size['Size_name']?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="d-flex mb-4">
                            <strong class="text-dark mr-3">Colors:</strong>
                            <?php foreach($data['color'] as $color){ ?>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="<?= $color['ID_color']?>" class="custom-control-input"
                                    id="c<?= $color['ID_color']?>" name="color">
                                <label class="custom-control-label"
                                    for="c<?= $color['ID_color']?>"><?= $color['Color_name']?></label>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                <input type="number" min="1"
                                    class="form-control input_amount bg-secondary border-0 text-center" name="amount"
                                    value="1">
                                <div class="input-group-btn">
                                    <a class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>
                                Add To
                                Cart</button>
                        </div>
                    </form>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
                            </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        asjdhasduasdkahkd
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab"
                            href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?= $data['product']['Description']?></p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Total product:
                                        </li>
                                        <li class="list-group-item px-0">
                                            Category of product:
                                        </li>
                                        <li class="list-group-item px-0">
                                            Size product:
                                        </li>
                                        <li class="list-group-item px-0">
                                            Color of product:
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            <?= $data['total']['total']?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <?= $data['product']['Category_name']?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <?php foreach($data['size'] as $size){
                                                    echo $size['Size_name'] . "  ";
                                                } ?>
                                        </li>
                                        <li class="list-group-item px-0">
                                            <?php foreach($data['color'] as $color){
                                                    echo $color['Color_name'] . "  ";
                                                } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <?php
include_once "View/Layout/footer.php";
?>
    <script>
    const minusBtn = document.querySelector('.btn-minus');
    const plusBtn = document.querySelector('.btn-plus');
    const inputField = document.querySelector('input[name="amount"]');


    minusBtn.addEventListener('click', function() {
        let oldValue = parseInt(inputField.value);
        let newVal;
        if (oldValue > 1) {
            newVal = oldValue - 1;
        } else {
            newVal = 1;
        }
        inputField.value = newVal;
    });

    plusBtn.addEventListener('click', function() {
        let oldValue = parseInt(inputField.value);
        let newVal = oldValue + 1;
        inputField.value = newVal;
    });
    inputField.addEventListener('blur', function() {
        if (inputField.value <= 0) {
            inputField.value = 1;
        }
    });
    </script>
</body>

</html>
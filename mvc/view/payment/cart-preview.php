<?php $totalPrice = 0; ?>
<?php foreach ($orders as $perfume) { ?>
    <?php
    $perfumePriceWithDiscount = $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100);
    $totalPrice += $perfume['quantity'] * $perfumePriceWithDiscount; ?>
    <div class="cart-preview-panel scrollmenu-products">
        <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="cart-preview-productImg"
             alt="عطر">

        <div class="cart-preview-rightside">
            <span class="cart-preview-persionName"><?= $perfume['persionName'] ?> <?= $perfume['perfumeName'] ?></span>
            <span class="cart-preview-newPrice"><?= $perfumePriceWithDiscount ?>
                تومان * <span class="cart-preview-quantity"><?= $perfume['quantity'] ?></span>
            </span>
            <div>
                <span class="fa fa-close cart-preview-close" onclick="removeProduct(<?= $perfume['orderId'] ?>)"></span>
            </div>

        </div>
    </div>
<?php } ?>

<div class="cart-preview-total">
    مبلغ کل:<span style="font-size: 13px;"><?= $totalPrice ?> تومان </span>
    <a class="cart-preview-addToCart-btn" href="/MainProject/productsman/myorders">
        <i class="fa fa-credit-card">
            <span> پرداخت سبد خرید</span>
        </i>
    </a>
</div>

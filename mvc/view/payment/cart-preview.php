<div style="border: 1px solid #ddd;"><?php $totalPrice = 0; ?>
    <?php foreach ($orders as $perfume) { ?>
        <?php
        $perfumePriceWithDiscount = $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100);
        $totalPrice += $perfume['quantity'] * $perfumePriceWithDiscount; ?>
        <div class="cart-preview-panel scrollmenu-products">
            <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="cart-preview-productImg"
                 alt="عطر">

            <div class="cart-preview-rightside">
            <span class="cart-preview-persionName">
                <?php foreach ($densitys as $density) {
                    foreach ($genders as $gender) {
                        foreach ($brands as $brand) {
                            if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                                ?>
                                <span
                                    style="font-size: 13px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل </span>
                                <span style="font-size: 11px;"><?= $perfume['perfumeName'] ?></span>
                            <?php }
                        }
                    }
                } ?>
            </span>

            <span class="cart-preview-newPrice"><?= $perfumePriceWithDiscount ?>
                تومان * <span class="cart-preview-quantity"><?= $perfume['quantity'] ?></span>
            </span>
            <div>
                <span class="fa fa-close cart-preview-close" style="font-size: 11px;"
                      onclick="removeProduct(<?= $perfume['orderId'] ?>)"></span>
            </div>

        </div>
    </div>
<?php } ?>
</div>
<div class="cart-preview-total">
    <span style="font-size: 15px;margin-left: 5px;"> مبلغ کل: </span><span style="font-size: 15px;"><?= $totalPrice ?> تومان </span>
    <a class="cart-preview-addToCart-btn" href="/MainProject/productsman/myorders">
        <i class="fa fa-credit-card" style="margin-left: 5px;">
            <span style="font-size: 13px;margin-bottom: 10px;"> پرداخت سبد خرید</span>
        </i>
    </a>
</div>

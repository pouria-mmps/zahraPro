<?php foreach ($perfumes as $perfume) { ?>

    <div class="product-panel-linear"
         style="margin-top: 40px;background-color: #f7f5f5;box-shadow: 1px 1px 10px 1px #b2b2b2;">
        <div class="product-thumb-wrapper-linear">
            <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg-linear" alt="عطر">
        </div>

        <div class="product-panel-rightside">

            <span class="product-Name-linear"><?= $perfume['persionName'] ?> <?= $perfume['perfumeName'] ?></span>

            <?php if ($perfume['discount'] > 0) { ?>
                <span class="discount-btn-linear">فروش ویژه</span>
            <?php } else { ?>
                <span class="sale-btn-linear">موجود</span>
            <?php } ?>

            <p class="product-breif-linear"><?= $perfume['breif'] ?></p>

            <div class="priceWraper-linear">
                <span class="newPrice-linear"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?> تومان </span>

                <?php if ($perfume['discount'] > 0) { ?>
                    <span class="oldPrice-linear" style="font-size: 16px"><?= $perfume['price'] ?> تومان </span>
                <?php } ?>
            </div>

            <div class="product-wish-add-btns">
                <div class="addToCart-btn-linear" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                    <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                    <span> اضافه به سبد خرید</span>
                </div>
            </div>
            <form class="frm-log" action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                <label hidden>
                    <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                </label>
                <br>
                <button value="details" id="details-btn" class="btn-details-linear"><i class="fa fa-info"
                                                                                       style="padding:0 5px 0 5px;"></i>جزییات
                </button>
            </form>

        </div>
    </div>
<?php } ?>


    <br><br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>
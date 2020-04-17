<?php foreach ($perfumes as $perfume) {
    if ($perfume['deleteLogic'] == 1) {
        ?>

        <div class="product-panel-linear"
             style="margin-top: 40px;background-color: #f7f5f5;box-shadow: 1px 1px 10px 1px #b2b2b2;top: -30px;">
            <div class="product-thumb-wrapper-linear">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg-linear"
                     alt="عطر">
            </div>

            <div class="product-panel-rightside">

                <?php foreach ($densitys as $density) {
                    foreach ($genders as $gender) {
                        foreach ($brands as $brand) {
                            if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                                ?>
                                <span
                                    style="font-size: 19px;margin-top: 20px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل <span
                                        style="font-size: 19px;font-family: 'mitra';"><?= $perfume['perfumeName'] ?></span></span>
                            <?php }
                        }
                    }
                } ?>

                <?php if ($perfume['discount'] > 0 && $perfume['perfumeCounter'] != 0) { ?>
                    <span class="discount-btn">فروش ویژه</span>
                <?php } elseif ($perfume['perfumeCounter'] != 0) { ?>
                    <span class="sale-btn">موجود</span>
                <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                    <span class="nosale-btn">ناموجود</span>
                <?php } ?>

                <p class="product-breif-linear"><?= $perfume['breif'] ?></p>

                <div class="priceWraper-linear">
                    <span class="newPrice-linear"><i
                                style="font-size: larger;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?> </i>تومان </span>

                    <?php if ($perfume['discount'] > 0) { ?>
                        <span class="oldPrice-linear" style="font-size: 16px"><?= $perfume['price'] ?> تومان </span>
                    <?php } ?>
                </div>

                <div class="product-wish-add-btns">
                    <?php if ($managers['accessId'] == 1) { ?>
                        <div class="addToCart-btn-detail4">
                            <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                            <span style="font-size: medium;"> اضافه به سبد خرید</span>
                        </div>

                    <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                        <div class="addToCart-btn-linear2">
                            <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                            <span style="font-size: large;"> اضافه به سبد خرید</span>
                        </div>
                    <?php } else { ?>
                        <div class="addToCart-btn-linear" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                            <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                            <span style="font-size: large;"> اضافه به سبد خرید</span>
                        </div>
                    <?php } ?>
                </div>

                <form action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                    <label hidden>
                        <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                    </label>
                    <br>

                    <button value="details" id="details-btn" class="btn-details-linear"><i class="fa fa-info"
                                                                                           style="padding:0 5px 0 5px;"></i>
                        <span style="font-size: large;">جزییات</span>
                    </button>
                </form>
            </div>
        </div>
    <?php }
} ?>
    <br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>
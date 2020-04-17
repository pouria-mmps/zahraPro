<?php foreach ($perfumes as $perfume) {
    if ($perfume['deleteLogic'] == 1) {
        ?>
        <div class="product-panel-grid" style="margin-top: 30px; top: -20px;">
            <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg" alt="عطر">
            <br><br>

            <?php foreach ($densitys as $density) {
                foreach ($genders as $gender) {
                    foreach ($brands as $brand) {
                        if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                            ?>
                            <span style="font-size: 18px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل </span>
                            <br>

                            <span style="font-size: 18px;font-family: 'mitra';"><?= $perfume['perfumeName'] ?></span>
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

            <div class="priceWraper">
                <span class="newPrice" style="font-size: 18px;"><i
                            style="font-size: larger;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?></i> تومان </span>

                <?php if ($perfume['discount'] > 0) { ?>
                    <span class="oldPrice" style="font-size: 16px;"><?= $perfume['price'] ?>  تومان </span>
                <?php } ?>
            </div>
            <br>

            <?php if ($managers['accessId'] == 1) { ?>
                <div class="addToCart-btn-detail3">
                    <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                    <span style="font-size: medium;"> اضافه به سبد خرید</span>
                </div>

            <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                <span class="addToCart-btn2">
                <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
            </span>
            <?php } else { ?>
                <span class="addToCart-btn" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
            </span>
            <?php } ?>

            <form class="frm-log" action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                <label hidden>
                    <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                </label>
                <br>
                <button value="details" id="details-btn" class="btn-details"><i class="fa fa-info"
                                                                                style="padding:0 5px 0 5px;"></i>جزییات
                </button>
            </form>
        </div>
    <?php }
} ?>

<br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>

<script>
    function detailsPage(perfumeId) {
        $.ajax({
            url: "/MainProject/page/details/" + perfumeId,
            method: 'POST',
        }).done(function (output) {
            window.location.href = "/MainProject/page/details/" + perfumeId;
        });
    }
</script>
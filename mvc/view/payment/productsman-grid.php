<div style="margin-top: -80px">
    <?php foreach ($perfumes as $perfume) {
        if ($perfume['deleteLogic'] == 1) {
            ?>
            <div class="product-panel-grid" style="margin-top: 30px;">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg" alt="عطر">

                <span class="product-persionName"><?= $perfume['persionName'] ?></span>
                <span class="product-perfumeName"><?= $perfume['perfumeName'] ?></span>

                <?php if ($perfume['discount'] > 0) { ?>
                    <span class="discount-btn">فروش ویژه</span>
                <?php } else { ?>
                    <span class="sale-btn">موجود</span>
            <?php } ?>

            <div class="priceWraper">
                <span class="newPrice"
                      style="font-size: 18px;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?> تومان </span>

                <?php if ($perfume['discount'] > 0) { ?>
                    <span class="oldPrice" style="font-size: 16px;"><?= $perfume['price'] ?> تومان </span>
                <?php } ?>
            </div>

            <br>
            <span class="addToCart-btn" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
            <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
        </span>

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
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
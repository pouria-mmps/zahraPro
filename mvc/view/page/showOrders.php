<?php
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br><br><br>

<table style="width: 70%;">
    <tr>
        <td class="th-p-crud">ردیف</td>
        <td class="th-p-crud">تصویر محصول</td>
        <td class="th-p-crud">نام محصول</td>
        <td class="th-p-crud"> تعداد</td>
        <td class="th-p-crud"> قیمت واحد</td>
        <td class="th-p-crud"> تخفیف</td>
        <td class="th-p-crud"> قیمت کل</td>
    </tr>
    <br>

    <?php $i = 1;
    $totalPrice2 = 0; ?>
    <?php foreach ($orders as $product) {
        $totalPrice = 0;
        $perfumePriceWithDiscount = $product['price'] - ($product['price'] * $product['discount'] / 100);
        $totalPrice += $product['quantity'] * $perfumePriceWithDiscount; ?>
        <tr class="tr-cart">
            <td style="padding: 20px;">
                <span style="font-size: larger;"><?php echo $i; ?></span>
                <?php $i++; ?>
            </td>

            <td>
                <img src="/MainProject/image/Perfumes/<?= $product['perfumeId'] ?>.jpg"
                     class="Img-update-address" alt="عطر">
            </td>

            <td>
                <?php foreach ($densitys as $density) {
                    foreach ($genders as $gender) {
                        foreach ($brands as $brand) {
                            if ($product['densityId'] == $density['densityId'] && $product['jenderId'] == $gender['jenderId'] && $product['brandId'] == $brand['brandId']) {
                                ?>
                                <span style="font-size: large;"> <?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل </span>
                                <span style="font-size: large;"><?= $product['perfumeName'] ?></span>
                            <?php }
                        }
                    }
                } ?>
            </td>

            <td style="padding: 20px;">
                <span style="font-size: larger;padding: 10px;"><?= $product['quantity'] ?></span>
            </td>

            <td style="padding: 20px;">
                <span style="font-size: larger;"><?= $product['price'] ?></span> تومان
            </td>

            <td style="padding: 20px;">
                <span style="font-size: larger;"><?= $product['discount'] ?></span> %
            </td>

            <td style="padding: 20px;">
                <span style="font-size: larger;"><?= $totalPrice ?></span> تومان
            </td>
            <?php
            $totalPrice2 += $totalPrice;
            ?>
        </tr>
    <?php } ?>
</table>

<?php if ($hasButton == 'true') { ?>
    <form class="frm-log-cancelOrder"
          action="<?= baseUrl() ?>productsman/cancelOrders/<?= $product['cartId'] ?>"
          method="post">
        <button value="cancelOrder" id="cancelorder-btn" class="btn-cancel-order">
            <label hidden>
                <input type="hidden" name="cartId" value="<?= $product['cartId'] ?>">
                <input type="hidden" name="hasButton" value="true">
            </label>
            <i class="fa fa-close" style="font-size: small;margin-left: 5px;"></i> استرداد وجه
        </button>
    </form>
<?php } ?>


<br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>

<script>
    var btn = $('#button');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });
</script>
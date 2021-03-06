<?php
require_once("PersianCalendar.php");
include("./mvc/view/page/header.php");
$userId = $_SESSION['userId'];
$totalPrice2 = 0;
?>

<a id="button" style="text-decoration: none;"></a>
<br>

<h3 style="margin-right: 70px;text-align: right;"> صورت حساب کلی </h3>
<br><br><br><br><br><br><br><br>


<table style="width: 90%;margin-top: -150px;">
    <tr>
        <td colspan="6" class="td-header">
            <h2 class="header-ftable">فروشگاه اینترنتی عطرشاپ</h2>
            <h3 class="header-ftable" style="color: #777;">صورت حساب فروش کالا و خدمات</h3>
        </td>
        <td style="color: #777;margin-top: 20px;" class="td-header">
            <div style="margin-bottom: 20px;font-size: large;"> تاریخ فاکتور</div>
            <span style="color: #555;">
                <?php echo mds_date("Y/m/d", "now", 1); ?>
            </span>
        </td>
    </tr>

    <tr>
        <td style="font-size: x-large;padding: 30px;background-color: #f2f2f2;" class="td-header">فروشنده</td>
        <td colspan="7" style="text-align: right;padding-right: 50px;" class="td-header">
            <span style="line-height: 30px;font-size: large;color: #777;"> فروشنده: </span> <span
                    style="font-size: large;"> فروشگاه اینترنتی عطرشاپ </span>
            <span style="margin-right: 605px;font-size: large;color: #777;"> تلفن: </span><span
                    style="font-size: large;"> 66580280-021 </span>
            <br>

            <span style="line-height: 40px;font-size: large;color: #777;">آدرس: </span><span style="font-size: large;"> تهران، خیابان ستارخان، خیابان </span>
            شهرآرا، پلاک 12
            <span style="margin-right: 495px;font-size: large;color: #777;"> کد پستی: </span><span
                    style="font-size: large;"> 7896565686 </span>
        </td>
    </tr>

    <tr>
        <?php foreach ($addresses as $address) { ?>
            <td style="font-size: x-large;padding: 30px;background-color: #f2f2f2;" class="td-header">خریدار</td>
            <td colspan="6" style="text-align: right;" class="td-header">
                <span style="line-height: 30px;font-size: large;color: #777;margin-right: 50px;"> خریدار: </span>
                <span style="font-size: large;"><?= $address['tranName'] ?>&nbsp;<?= $address['tranLName'] ?></span>

                <span style="margin-right: 120px;font-size: large;color: #777;"> تلفن: </span>
                <span style="font-size: large;"><?= $address['tranTell'] ?></span>

                <span style="margin-right: 120px;font-size: large;color: #777;"> موبایل: </span>
                <span style="font-size: large;"><?= $address['tranPhone'] ?></span>

                <span style="margin-right: 120px;font-size: large;color: #777;"> کد پستی: </span>
                <span style="font-size: large;"><?= $address['tranPCode'] ?></span>
                <br>

                <span style="line-height: 40px;font-size: large;color: #777;margin-right: 50px;">آدرس: </span>
                <span style="font-size: large;"><?= $address['tranAddress'] ?></span>
            </td>
        <?php } ?>
    </tr>

    <tr>
        <td class="th-p-crud"> ردیف</td>
        <td class="th-p-crud"> تصویر محصول</td>
        <td class="th-p-crud"> نام محصول</td>
        <td class="th-p-crud"> تعداد</td>
        <td class="th-p-crud"> قیمت واحد</td>
        <td class="th-p-crud"> تخفیف</td>
        <td class="th-p-crud"> قیمت کل</td>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ($orders as $product) {
        $totalPrice = 0;
        $perfumePriceWithDiscount = $product['price'] - ($product['price'] * $product['discount'] / 100);
        $totalPrice += $product['quantity'] * $perfumePriceWithDiscount; ?>
        <tr class="tr-cart">
            <td>
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

            <td>
                <span style="font-size: larger;"><?= $product['quantity'] ?></span>
            </td>

            <td>
                <span style="font-size: larger;"><?= $product['price'] ?></span> تومان
            </td>

            <td>
                <span style="font-size: larger;"><?= $product['discount'] ?></span> %
            </td>

            <td>
                <span style="font-size: larger;"><?= $totalPrice ?></span> تومان
            </td>
            <?php
            $totalPrice2 += $totalPrice;
            ?>
        </tr>
        <br>
    <?php } ?>
</table>
<br><br><br><br>


<form class="frm-factor" action="<?= baseUrl() ?>productsman/bankPortal"
      method="post">
    <button value="portal" id="portal-btn" class="btn-portal">
        <label hidden>
            <input type="hidden" name="totalPrice" value="<?= $totalPrice2 + 20000 ?>">
        </label>
        <i class="fa fa-credit-card" style="padding-left:10px;font-size: small;"></i>
        <span style="font-size: medium;"> پرداخت و تکمیل خرید </span>
    </button>
</form>


<table style="width: 40%;float: left;margin-left: 70px;border: none;">
    <tr class="tr-cart" style="border: none;">
        <td style="float: left;border: none;margin-top: 8px;padding: 10px;">
            جمع سبد خرید شما:
        </td>

        <td style="padding: 10px;border: 2px solid #ddd;">
            <span style="font-size: larger;"><?= $totalPrice2 ?></span> تومان
        </td>
    </tr>

    <tr class="tr-cart" style="border: none;">
        <td style="float: left;border: none;margin-top: 8px;padding: 10px;">
            ارسال:
        </td>

        <td style="padding: 10px;border: 2px solid #ddd;">
            <span style="font-size: larger;"> 20000 </span> تومان
        </td>
    </tr>

    <tr style="border: none;" class="tr-cart">
        <td style="float: left;border: none;margin-top: 8px;padding: 10px;">
            مبلغ قابل پرداخت شما:
        </td>

        <td style="padding: 10px;background-color: #f2f2f2;border: 2px solid #ddd;">
            <span style="font-size: larger;"> <?= $totalPrice2 + 20000 ?> </span> تومان
        </td>
    </tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


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
<?php
include("./mvc/view/page/header.php");
if (isset($_SESSION['userEmail'])) {
    $totalPrice = 0; ?>
    <br><br>

    <h3 class="header-ftable"> خلاصه سبد خرید </h3>
    <br>

    <table>
        <tr>
            <td class="th-myorder"> محصول</td>
            <td class="th-myorder"> نام محصول</td>
            <td class="th-myorder"> قیمت واحد</td>
            <td class="th-myorder"> حذف کالا</td>
            <td class="th-myorder"> تعداد کالا</td>
            <td class="th-myorder"> قیمت اعمال شده با تخفیف</td>
        </tr>
        <br>

        <?php foreach ($orders as $perfume) {
            $perfumePriceWithDiscount = $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100);
            $totalPrice += $perfume['quantity'] * $perfumePriceWithDiscount; ?>
            <tr>
                <td>
                    <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg"
                         class="cart-preview-productImg myorder-productImg" alt="عطر">
                </td>

                <td style="text-align: right">
                    <span class="cart-preview-persionName myorder-persionName">
                        <?php foreach ($densitys as $density) {
                            foreach ($genders as $gender) {
                                foreach ($brands as $brand) {
                                    if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                                        ?>
                                        <span style="font-size: 18px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل </span>
                                        <span style="font-size: 19px;"><?= $perfume['perfumeName'] ?></span>
                                    <?php }
                                }
                            }
                        } ?>
                    </span>
                </td>

                <td>
                <span class="cart-preview-newPrice myorder-newPrice"><?= $perfume['price'] ?>  تومان
                </td>

                <td>
                    <span class="fa fa-trash-o myorder-trash" style="font-size: larger;"
                          onclick="removeProduct(<?= $perfume['orderId'] ?>)"></span>
                </td>

                <td>
                    <span class="myorder-quantity"><?= $perfume['quantity'] ?></span>
                </td>

                <td>
                    <span
                            class="cart-preview-newPrice myorder-discountPrice"><?= $perfume['quantity'] * $perfumePriceWithDiscount; ?>  تومان
                </td>
            </tr>
        <?php } ?>

        <td class="th-myorder" colspan="6">
            <span style="font-size: larger;">  مبلغ قابل پرداخت : </span><span class="myorder-total"><?= $totalPrice ?> تومان</span>
        </td>
    </table>
    <br><br>

    <?php if ($totalPrice == 0) { ?>
        <span> </span>
    <?php } else { ?>
        <a class="btn-sale-myorders" href="/MainProject/productsman/getaddress"
           style="font-size: large;padding: 7px 10px 7px 10px;">
            <i class="fa fa-arrow-circle-o-right" style="text-decoration: none; margin-left:7px; margin-top: 3px;"></i>ادامه
            فرآیند خرید
        </a>
    <?php } ?>

<?php } else {
    message('fail', "ابتدا وارد حساب کاربری خود شوید.", true);
} ?>
<br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>

<script>
    <?php if($totalPrice == 0){ ?>
    $(document).ready(function () {
        jQuery(this).css("line-height", "50px");
        alert('برای ادامه فرآیند خرید\n لطفا محصولی را در سبد خرید خود اضافه کنید.');
    });
    <?php }?>

    function removeProduct(perfumeId) {
        $.ajax({
            url: "/MainProject/productsman/removeFromCart/" + perfumeId,
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            location.reload();
        });
    }
</script>
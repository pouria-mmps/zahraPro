<?php
include("./mvc/view/page/header.php");
if (isset($_SESSION['userEmail'])) {
    $totalPrice = 0; ?>

    <h4 class="h4-myorder">خلاصه سبد خرید</h4>

    <table>
        <tr>
            <td class="th-myorder"> محصول</td>
            <td class="th-myorder"> مشخصات محصول</td>
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
                    <span class="cart-preview-persionName myorder-persionName"><?= $perfume['persionName'] ?> <?= $perfume['perfumeName'] ?></span>
                </td>

                <td>
                <span class="cart-preview-newPrice myorder-newPrice"><?= $perfume['price'] ?>  تومان
                </td>

                <td>
                    <span class="fa fa-trash-o myorder-trash"
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
            مبلغ قابل پرداخت:<span class="myorder-total"><?= $totalPrice ?> تومان</span>
        </td>
    </table>
    <br><br>

    <?php if ($totalPrice == 0) { ?>
        <span> </span>
    <?php } else { ?>
        <a class="btn-sale-myorders" href="/MainProject/productsman/getaddress">
            <i class="fa fa-arrow-circle-o-right arrow-myorder" style="text-decoration: none; margin-left:7px;"></i>ادامه
            فرآیند خرید
        </a>
    <?php } ?>

<?php } else {
    message('fail', "ابتدا وارد حساب کاربری خود شوید.", true);
} ?>

<br><br><br><br><br><br><br><br><br>


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

    $(document).ready(function () {
        $('.btn-sale-myorders').click(function () {
            <?php if ($totalPrice == 0) { ?>
            alert("a");
            <?php } ?>
        });
    });

    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
</script>
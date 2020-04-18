<?php
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br><br><br>

<table style="width: 70%;">
    <tr>
        <td class="th-p-crud">ردیف</td>
        <td class="th-p-crud">نام</td>
        <td class="th-p-crud">نام خانوادگی</td>
        <td class="th-p-crud">شماره تماس همراه</td>
        <td class="th-p-crud">وضعیت سفارش</td>
        <td class="th-p-crud">تاریخ ثبت فاکتور</td>
        <td class="th-p-crud">کد رهگیری</td>
        <td class="th-p-crud">عملیات</td>
    </tr>
    <br>

    <?php $i = 1 ?>
    <?php foreach ($orders as $order) {
        if ($order['userId'] != null) {
            ?>
            <tr>
                <td style="padding: 20px;">
                    <span style="font-size: larger;"><?php echo $i; ?></span>
                    <?php $i++; ?>
                </td>

                <td>
                    <span style="font-size: larger;padding: 10px;"><?= $order['userName'] ?></span>
                </td>

                <td>
                    <span style="font-size: larger;padding: 10px;"><?= $order['userFamilyName'] ?></span>
                </td>

                <td>
                    <span style="font-size: larger;"><?= $order['userMobile'] ?></span>
                </td>

                <td style="padding: 15px;font-size: large;">
            <span>
                <?php foreach ($cartStatuses as $cartStatuse) {
                    if ($order['cStatusId'] == $cartStatuse['cStatusId']) {
                        ?>
                        <span style="font-size: 18px;"><?= $cartStatuse['cStatusTitle'] ?></span>
                    <?php }
                } ?>
            </span>
                </td>

                <?php $digit2 = 0; ?>
                <td style="padding: 10px;font-size: large;">
                    <?php
                    if (isset($order['paymentDate'])) {
                        echo $order['paymentDate'];
                    } else {
                        ?>
                        <span>______</span>
                    <?php } ?>
                </td>

                <td style="font-size: large">
                    <?php
                    if (isset($order['trackingCode'])) {
                        echo $order['trackingCode'];
                    } else {
                        ?>
                        <span>______</span>
                    <?php } ?>
                </td>

                <td style="padding: 10px;">
                    <form class="frm-log-showOrders"
                          action="<?= baseUrl() ?>page/showOrdersManager/<?= $order['cartId'] ?>"
                          method="post">
                        <button value="ordersManager" id="orders-manager-btn" class="btn-ordersorders-manager"
                                style="margin-top: 15px;margin-bottom: 0">
                            <label hidden>
                                <input type="hidden" name="cartId" value="<?= $order['cartId'] ?>">
                            </label>
                            <i class="fa fa-check-square-o" style="font-size: small;margin-left: 5px;"></i> نمایش
                        </button>
                    </form>
                </td>
            </tr>
        <?php }
    } ?>
</table>
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
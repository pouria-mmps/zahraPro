<?php
$userId = $_SESSION['userId'];
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br><br>

<h3 class="header-ftable"> آدرس خود را از جدول زیر انتخاب یا در جدول اضافه کنید. </h3>

<a href="<?= baseUrl() ?>productsman/insertAddress" style="text-decoration: none;">
    <span class="fa fa-plus insert-product"></span>
</a>


<table style="width: 90%;">
    <tr>
        <td class="th-p-crud"> ردیف</td>
        <td class="th-p-crud"> نام تحویل گیرنده</td>
        <td class="th-p-crud"> نام خانوادگی تحویل گیرنده</td>
        <td class="th-p-crud"> شماره تلفن</td>
        <td class="th-p-crud"> شماره تلفن همراه</td>
        <td class="th-p-crud"> آدرس پستی</td>
        <td class="th-p-crud"> کدپستی</td>
        <td class="th-p-crud"> عملیات</td>
    </tr>
    <br>

    <?php $i = 1; ?>
    <?php foreach ($addresses as $address) {
        if ($address['userId'] == $userId && $address['deleteLogic'] == 1) { ?>
            <tr>
                <td style="padding: 15px;">
                    <span style="font-size: larger;"><?php echo $i; ?></span>
                    <?php $i++; ?>
                </td>

                <td>
                    <span style="font-size: large;"><?= $address['tranName'] ?></span>
                </td>

                <td>
                    <span style="font-size: large;"><?= $address['tranLName'] ?></span>
                </td>

                <td style="padding: 10px;">
                    <span style="font-size: large;"><?= $address['tranTell'] ?></span>
                </td>

                <td style="padding: 10px;">
                    <span style="font-size: large;"><?= $address['tranPhone'] ?></span>
                </td>

                <td style="padding: 10px;">
                    <span style="font-size: large;"><?= $address['tranAddress'] ?></span>
                </td>

                <td style="padding: 10px;">
                    <span style="font-size: large;"><?= $address['tranPCode'] ?></span>
                </td>

                <td style="padding: 50px 90px 50px 90px;">
                    <form class="frm-select-address"
                          action="<?= baseUrl() ?>productsman/factor"
                          method="post">
                        <button value="select-address" id="select-address-btn" class="btn-select-address">
                            <label hidden>
                                <input type="hidden" name="addressId" value="<?= $address['addressId'] ?>">
                            </label>
                            <i class="fa fa-check-square-o" style="padding:0 6px;font-size: small;"></i>انتخاب
                        </button>
                    </form>

                    <form class="frm-update-address"
                          action="<?= baseUrl() ?>productsman/updateAddress/<?= $address['addressId'] ?>"
                          method="post">
                        <button value="updateAddress" id="update-address-btn" class="btn-update-address">
                            <label hidden>
                                <input type="hidden" name="addressId" value="<?= $address['addressId'] ?>">
                            </label>
                            <i class="fa fa-pencil" style="padding:0 6px;font-size: small;"></i>ویرایش
                        </button>
                    </form>

                    <form class="frm-delete-address"
                          action="<?= baseUrl() ?>productsman/deleteAddress/<?= $address['addressId'] ?>"
                          method="post">
                        <button value="delete-address" id="delete-address-btn" class="btn-delete-address">
                            <label hidden>
                                <input type="hidden" name="addressId" value="<?= $address['addressId'] ?>">
                            </label>
                            <i class="fa fa-close" style="font-size: small;"></i>حذف
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

    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php
$userId = $_SESSION['userId'];
include("./mvc/view/page/header.php");
?>

<a id="button"></a>
<br><br>

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
        <td class="th-p-crud"> انتخاب آدرس</td>
    </tr>
    <br>

    <?php $i = 1; ?>
    <?php foreach ($addresses as $address) {
        if ($address['userId'] == $userId) { ?>
            <tr>
                <td>
                    <?php
                    echo $i;
                    $i++;
                    ?>
                </td>

                <td>
                    <?= $address['tranName'] ?>
                </td>

                <td>
                    <?= $address['tranLName'] ?>
                </td>

                <td>
                    <?= $address['tranTell'] ?>
                </td>
                <td>
                    <?= $address['tranPhone'] ?>
                </td>

                <td style="padding: 45px;">
                    <?= $address['tranAddress'] ?>
                </td>

                <td>
                    <?= $address['tranPCode'] ?>
                </td>

                <td style="padding: 20px;">
                    <form class="frm-select-address"
                          action="<?= baseUrl() ?>productsman/.............../<?= $address['addressId'] ?>"
                          method="post">
                        <button value="select-address" id="select-address-btn" class="btn-select-address">
                            <label hidden>
                                <input type="hidden" name="addressId" value="<?= $address['addressId'] ?>">
                            </label>
                            <i class="fa fa-check-square-o" style="padding:0 6px;font-size: small;"></i>انتخاب
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
<br><br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
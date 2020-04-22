<?php
include("./mvc/view/page/header.php");
?>

    <a id="button" style="text-decoration: none;"></a>
    <br><br><br>

    <table style="width: 85%;">
        <tr>
            <td class="th-p-crud" style="padding: 10px;">ردیف</td>
            <td class="th-p-crud">نام</td>
            <td class="th-p-crud" style="padding: 10px;">نام خانوادگی</td>
            <td class="th-p-crud" style="padding: 10px;">سطح دسترسی</td>
            <td class="th-p-crud" style="padding: 10px;">جنسیت</td>
            <td class="th-p-crud">تلفن تماس</td>
            <td class="th-p-crud" style="padding: 10px;">شماره تلفن همراه</td>
            <td class="th-p-crud">ایمیل</td>
            <td class="th-p-crud">عملیات</td>
        </tr>
        <br>

        <?php $i = 1 ?>
        <?php foreach ($customers as $customer) { ?>
            <tr>
                <td style="padding: 15px;">
                    <span style="font-size: larger;"><?php echo $i; ?></span>
                    <?php $i++; ?>
                </td>

                <td style="font-size: large;padding: 5px;">
                    <?= $customer['userName'] ?>
                </td>

                <td style="font-size: large;">
                    <?= $customer['userFamilyName'] ?>
                </td>

                <td style="font-size: large;">
                    <?= $customer['accessTitle'] ?>
                </td>

                <td style="font-size: large;">
                    <?php if ($customer['jenderId'] == 1) {
                        echo "آقا";
                    } else {
                        echo "خانم";
                    } ?>
                </td>

                <td style="font-size: large;">
                    <?= $customer['userTell'] ?>
                </td>

                <td style="font-size: large;">
                    <?= $customer['userMobile'] ?>
                </td>

                <td style="font-size: large;">
                    <?= $customer['userEmail'] ?>
                </td>

                <td style="padding: 55px;">
                    <?php if ($customer['blockId'] == 1) { ?>
                        <form class="frm-u-crud"
                              action="<?= baseUrl() ?>page/deactiveUser/<?= $customer['userId'] ?>"
                              method="post">
                            <button value="deactiveUser" id="deactive-user-btn" class="btn-deactive-user">
                                <label hidden>
                                    <input type="hidden" name="userId" value="<?= $customer['userId'] ?>">
                                </label>
                                <i class="fa fa-close" style="font-size: small;"></i>غیرفعال
                            </button>
                        </form>

                    <?php } else { ?>
                        <form class="frm-u-crud"
                              action="<?= baseUrl() ?>page/activeUser/<?= $customer['userId'] ?>"
                              method="post">
                            <button value="activeUser" id="active-user-btn" class="btn-active-user">
                                <label hidden>
                                    <input type="hidden" name="userId" value="<?= $customer['userId'] ?>">
                                </label>
                                <i class="fa fa-check" style="font-size: small;"></i>فعال
                            </button>
                        </form>
                    <?php } ?>
                    <?php if ($customer['blockId'] != 2) { ?>
                        <form class="frm-p-crud" action="<?= baseUrl() ?>page/updateUser/<?= $customer['userId'] ?>"
                              method="post">
                            <button value="updateUser" id="update-user-btn" class="btn-update-user">
                                <label hidden>
                                    <input type="hidden" name="userId" value="<?= $customer['userId'] ?>">
                                </label>
                                <i class="fa fa-pencil" style="padding:0 5px;font-size: small;"></i>سطح دسترسی
                            </button>
                        </form>
                    <?php } else { ?>
                        <button value="updateUser" id="update-user-btn" class="btn-update-user2">
                            <label hidden>
                                <input type="hidden" name="userId">
                            </label>
                            <i class="fa fa-pencil" style="padding:0 5px;font-size: small;"></i>سطح دسترسی
                        </button>
                    <?php } ?>

                    <form class="frm-u-crud" action="<?= baseUrl() ?>page/resetUserPass/<?= $customer['userId'] ?>"
                          method="post">
                        <button value="updatePassUser" id="update-pass-user-btn" class="btn-update-pass-user">
                            <label hidden>
                                <input type="hidden" name="userId" value="<?= $customer['userId'] ?>">
                            </label>
                            <i class="fa fa-lock" style="padding:0 5px;font-size: small;"></i>تغییر گذرواژه
                        </button>
                    </form>
                </td>

            </tr>
        <?php } ?>
    </table>
    <br><br><br><br><br><br><br>


<?php
include("./mvc/view/page/footer.php");
?>
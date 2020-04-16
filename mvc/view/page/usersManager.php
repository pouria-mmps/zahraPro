<?php
include("./mvc/view/page/managerHeader.php");
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
    <?php foreach ($users as $user) { ?>
        <tr>
            <td style="padding: 15px;">
                <span style="font-size: larger;"><?php echo $i; ?></span>
                <?php $i++; ?>
            </td>

            <td style="font-size: large;padding: 10px;">
                <?= $user['userName'] ?>
            </td>

            <td style="font-size: large;padding: 10px;">
                <?= $user['userFamilyName'] ?>
            </td>

            <td style="font-size: large;">
                <?= $user['accessTitle'] ?>
            </td>

            <td style="font-size: large;">
                <?php if ($user['jenderId'] == 1) {
                    echo "آقا";
                } else {
                    echo "خانم";
                } ?>
            </td>

            <td style="font-size: large;padding: 10px;">
                <?= $user['userTell'] ?>
            </td>

            <td style="font-size: large;padding: 10px;">
                <?= $user['userMobile'] ?>
            </td>

            <td style="font-size: large;padding: 10px;">
                <?= $user['userEmail'] ?>
            </td>

            <td style="padding: 60px;">
                <?php if ($user['blockId'] == 1) { ?>
                    <form class="frm-u-crud"
                          action="<?= baseUrl() ?>page/deactiveUser/<?= $user['userId'] ?>"
                          method="post">
                        <button value="deactiveUser" id="deactive-user-btn" class="btn-deactive-user">
                            <label hidden>
                                <input type="hidden" name="userId" value="<?= $user['userId'] ?>">
                            </label>
                            <i class="fa fa-close" style="font-size: small;"></i>غیرفعال
                        </button>
                    </form>

                <?php } else { ?>
                    <form class="frm-u-crud"
                          action="<?= baseUrl() ?>page/activeUser/<?= $user['userId'] ?>"
                          method="post">
                        <button value="activeUser" id="active-user-btn" class="btn-active-user">
                            <label hidden>
                                <input type="hidden" name="userId" value="<?= $user['userId'] ?>">
                            </label>
                            <i class="fa fa-check" style="font-size: small;"></i>فعال
                        </button>
                    </form>
                <?php } ?>

                <form class="frm-p-crud" action="<?= baseUrl() ?>page/updateUser/<?= $user['userId'] ?>"
                      method="post">
                    <button value="updateUser" id="update-user-btn" class="btn-update-user">
                        <label hidden>
                            <input type="hidden" name="userId" value="<?= $user['userId'] ?>">
                        </label>
                        <i class="fa fa-pencil" style="padding:0 5px;font-size: small;"></i>اصلاح دسترسی
                    </button>
                </form>

                <form class="frm-u-crud" action="<?= baseUrl() ?>page/resetUserPass/<?= $user['userId'] ?>"
                      method="post">
                    <button value="updatePassUser" id="update-pass-user-btn" class="btn-update-pass-user">
                        <label hidden>
                            <input type="hidden" name="userId" value="<?= $user['userId'] ?>">
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
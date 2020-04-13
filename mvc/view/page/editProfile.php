<?php
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>

<div class="box-updateProfile" style="width: 55%;">
    <form class="frm-update-profile" action="<?= baseUrl() ?>productsman/updateProfileChecking" method="post">

        <label hidden>
            <input type="hidden" name="userId" value="<?= $users['userId'] ?>">
        </label>

        <label class="frm-txt">نام کاربر</label>
        <input type="text" class="frm-profile-name" name="userName" value="<?= $users['userName'] ?>"
               style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">نام خانوادگی کاربر</label>
        <input type="text" class="frm-profile-lname" name="userFamilyName" value="<?= $users['userFamilyName'] ?>"
               style="text-align: center;">
        <br><br><br>

        <label class="frm-txt"> جنسیت </label>
        <span class="sort-products">
                <select class="sort-products theme-construction" id="jenderId" name="jenderId"
                        style="width: 55%;margin-right: 95px;padding: 15px;text-align: center;text-align-last: center;font-size: 20px;">
                    <?php foreach ($genders as $gender) {
                        if ($users['jenderId'] == $gender['jenderId']) { ?>
                            <option value="<?= $gender['jenderId'] ?>" selected
                                    style="text-align: left;"><?= $gender['jenderType'] ?></option>
                        <?php } elseif ($gender['jenderId'] != 3) { ?>
                            <option value="<?= $gender['jenderId'] ?>"
                                    style="text-align: left;"><?= $gender['jenderType'] ?></option>
                        <?php }
                    } ?>
                </select>
            </span>
        <br>

        <label class="frm-txt">تلفن تماس</label>
        <input type="text" class="frm-profile-tell" name="userTell" value="<?= $users['userTell'] ?>"
               style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">شماره تلفن همراه</label>
        <input type="text" class="frm-profile-phone" name="userMobile" value="<?= $users['userMobile'] ?>"
               style="text-align: center;">
        <br><br><br>

        <label class="frm-txt"> ایمیل </label>
        <input type="text" class="frm-profile-email" name="userEmail" value="<?= $users['userEmail'] ?>"
               style="text-align: center;" disabled>
        <br><br><br>

        <button value="register" id="btn-submit-uprofile"><i class="fa fa-pencil-square-o"
                                                             style="margin-left: 5px;font-size: medium;"></i>ویرایش
        </button>

        <button formaction="<?= baseUrl() ?>page/home" id="btn-cancel-uproduct" type="submit"
                value="cancel">
            <i class="fa fa-close" style="margin-left: 5px;font-size: medium;"></i>
            انصراف
        </button>

        <button formaction="<?= baseUrl() ?>productsman/resetPassword/<?= $users['userId'] ?>"
                value="<?= $users['userId'] ?>" id="btn-change-pass" class="btn-change-pass">
            <i class="fa fa-lock" style="font-size: medium;"></i> تغییر رمز عبور
        </button>
        <br><br><br>
    </form>

</div>

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


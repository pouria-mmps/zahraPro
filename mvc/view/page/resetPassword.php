<?php
require_once("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br>


<div class="box-reset">
    <form class="frm-log" action="<?= baseUrl() ?>productsman/passChange" method="post">

        <label class="frm-txt"> گذرواژه </label>
        <input type="password" class="frm-chenge-pass" placeholder="گذرواژه خود را وارد کنید" name="userPassword">
        <br><br><br>

        <label class="frm-txt"> تایید گذرواژه </label>
        <input type="password" class="frm-change-confirm-pass" placeholder="دوباره گذرواژه خود را وارد کنید"
               name="userPasswordConfirm">
        <br><br><br>

        <button id="btn-change-pass" class="btn-change-pass" style="margin-right: 70px;margin-top: 0;">
            <i class="fa fa-lock" style="font-size: medium;"></i> تغییر رمز عبور
        </button>

        <button formaction="<?= baseUrl() ?>productsman/editProfile" id="btn-cancel" type="submit" value="cancel">
            <i class="fa fa-close" style="font-size: medium"></i>انصراف
        </button>
        <br><br>
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

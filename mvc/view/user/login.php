<?php
require_once("./mvc/view/page/header.php");
if (isset($_SESSION['userEmail'])) {
    message('success', "شما در حال حاضر وارد شده اید " . '<a href="/MainProject/page/home"> صفحه ی اصلی </a> یا <a href="/MainProject/user/logout"> خروج از حساب کاربری </a>.<br><br>ایمیل شما :' . $_SESSION['userEmail'], true);
    exit;
}
?>
<br><br>

<a id="button" style="text-decoration: none;"></a>
<h3 class="header-ftable" style="color: #555;">لطفا مشخصات خود را وارد کنید</h3>

<!-- Login Content -->
<div class="box-login">
    <form class="frm-log" action="<?= baseUrl() ?>user/login" method="post">
        <label class="frm-txt">نام کاربری</label>
        <input type="text" class="frm-input-username" placeholder="  نام کاربری خود را وارد کنید" name="userEmail"
               style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">گذرواژه</label>
        <input type="password" class="frm-input-password" placeholder="  گذرواژه خود را وارد کنید" name="userPassword"
               style="text-align: center;">
        <br><br><br>

        <button value="register" id="btn-submit"><i class="fa fa-sign-in fa-lg" style="font-size: 18px;"></i>ورود
        </button>

        <button formaction="<?= baseUrl() ?>" id="btn-cancel" type="submit" value="cancel">
            <i class="fa fa-close" style="font-size: 18px;"></i>انصراف
        </button>
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
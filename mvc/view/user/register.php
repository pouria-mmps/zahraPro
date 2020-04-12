<?php
require_once("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br><br>

<h3 class="header-ftable" style="color: #555;">لطفا فیلدهای ستاره دار را پر کنید</h3>

<div class="box-register">
    <form class="frm-reg" action="<?= baseUrl() ?>user/register" method="post">

        <!--Name-->
        <label class="frm-txt"><i style="color: red;"> * </i>نام</label>
        <input type="text" class="frm-input-fname" placeholder="  نام خود را وارد کنید" name="userName"
               style="text-align: center;">

        <br><br><br>

        <!--Family Name-->
        <label class="frm-txt"><i style="color: red;"> * </i>نام خانوادگی</label>
        <input type="text" class="frm-input-lname" placeholder="  نام خانوادگی خود را وارد کنید" name="userFamilyName"
               style="text-align: center;">

        <br><br><br>

        <!--Gender-->
        <label class="frm-txt"><i style="color: red;"> * </i>جنسیت</label>
        <span>
            <label><input type="radio" name="userGender" value="male" style="margin-right: 140px;"></label>
            <label style="font-size: large;color: #777;">   مرد</label>
            <label><input type="radio" name="userGender" value="female" style="margin-right: 90px;"></label>
            <label style="font-size: large;color: #777;">   زن</label>
        </span>
        <br><br><br>

        <!--Tell-->
        <label class="frm-txt">تلفن</label>
        <input type="tel" class="frm-input-tell" placeholder="  02112345678" name="userTell"
               style="text-align: center;">

        <br><br><br>

        <!--Mobile-->
        <label class="frm-txt">موبایل</label>
        <input type="tel" class="frm-input-mobile" placeholder="  09012345678" name="userMobile"
               style="text-align: center;">

        <br><br><br>

        <!--Email-->
        <label class="frm-txt"><i style="color: red;"> * </i>ایمیل</label>
        <input type="email" class="frm-input-email" placeholder="آدرس ایمیل خود را وارد کنید" name="userEmail">

        <br><br><br>

        <!--Password-->
        <label class="frm-txt"><i style="color: red;"> * </i>گذرواژه</label>
        <input type="password" class="frm-input-pass" placeholder="گذرواژه خود را وارد کنید" name="userPassword">

        <br><br><br>

        <!--Confirm Password-->
        <label class="frm-txt"><i style="color: red;"> * </i>تایید گذرواژه</label>
        <input type="password" class="frm-input-confirm-pass" placeholder="دوباره گذرواژه خود را وارد کنید"
               name="userPasswordConfirm">

        <br><br><br>

        <!--BTN-Register-->
        <button value="register" id="btn-submit-reg"><i class="fa fa-user-plus" style="font-size: 18px;"></i>ثبت اطلاعات
            کاربری
        </button>

        <!--BTN-Cancel-->
        <button formaction="<?= baseUrl() ?>" id="btn-cancel-reg" type="submit" value="cancel"><i
                    class="fa fa-close" style="font-size: 18px;"></i>انصراف
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
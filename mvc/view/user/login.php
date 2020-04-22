<?php
require_once("./mvc/view/page/header.php");
if (isset($_SESSION['userEmail'])) {
    message('success', "شما در حال حاضر وارد شده اید " . '<a href="/MainProject/page/home" style="font-size: large;font-weight: bold;"> صفحه ی اصلی </a> یا <a href="/MainProject/user/logout" style="font-size: large;font-weight: bold;"> خروج از حساب کاربری </a>.<br><br>ایمیل شما :' . $_SESSION['userEmail'], true);
    exit;
}
?>
<br><br>

<a id="button" style="text-decoration: none;"></a>
<h3 class="header-ftable" style="color: #555;">لطفا مشخصات خود را وارد کنید</h3>

<!-- Login Content -->
<div class="box-login">
    <form class="frm-log" id="loginForm" action="<?= baseUrl() ?>user/login" method="post">
        <label class="frm-txt">نام کاربری</label>
        <input type="text" class="frm-input-username" placeholder="  نام کاربری خود را وارد کنید" name="userEmail"
               id="email"
               style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">گذرواژه</label>
        <input type="password" class="frm-input-password" placeholder="  گذرواژه خود را وارد کنید" name="userPassword"
               id="password"
               style="text-align: center;">
        <br>

        <span style="color: red;margin-right: 30px;">در صورت فراموشی رمز عبور با پشتیبانی سایت تماس حاصل کنید. </span>
        <br><br><br>

        <button value="register" id="btn-submit" type="submit"><i class="fa fa-sign-in fa-lg"
                                                                  style="font-size: 18px;"></i>ورود
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
    /*
    $('#email-error').hide();
    $("#email").on('change', function (){
        var $email = $(this).find('#email');

        if (!isEmail($email.val())){
            $('#email-error').show();
        }

        else if (isEmail($email.val())){
            $('#email-error').hide();
        }

        function isEmail(email){
            var pattern = new RegExp(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/);
            console.log(pattern.test(email));
            return pattern.test(email);
        }
    });




    $('form').on('submit', formValidate);
    $('.error').hide();

     function formValidate(e){
         e.preventDefault();
         $('.error').hide();

         var $email = $(this).find('#email');
         var $password = $('#password');

         if (!isEmail($email.val())){
             $('#email-error').show();
         }

         if (!isPassword($password.val())){
             $('#password-error').show();
         }
     }

     function isEmail(email){
         var pattern = new RegExp(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/);
         console.log(pattern.test(email));
         return pattern.test(email);
     }

     function isPassword(password) {
         let inputArray = password.split('');
         // // Flags
          let lower = false;
          let upper = false;
          let number = false;

          for (let char of inputArray){
              let code = char.charCodeAt(0);

         // // lower
              if (code > 96 && code < 123){
                  lower = true;
              }

         // // Upper
              if (code > 64 && code < 91){
                  upper = true;
              }

         // // number
              if (code > 47 && code < 58){
                  number = true;
              }

          }
          return lower && upper && number && password.length > 2;
     }*/


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
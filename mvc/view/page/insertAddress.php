<?php
include("./mvc/view/page/header.php");
?>
<a id="button" style="text-decoration: none;"></a>
<br><br>

<h3 class="txt-address">آدرس محل تحویل سفارش خود را اضافه کنید.</h3>

<form class="modal-content" action="<?= baseUrl() ?>productsman/addAddressToTable" method="post"
      style="margin-top: 50px;">
    <div class="container">
        <input type="text" placeholder=" نام تحویل گیرنده " name="tranName" required class="frm-txt-address">
        <input type="text" placeholder=" نام خانوادگی تحویل گیرنده " name="tranLName" required class="frm-txt-address">
        <input type="text" placeholder=" شماره تلفن " name="tranTell" class="frm-txt-address">
        <input type="text" placeholder=" شماره تلفن همراه " name="tranPhone" class="frm-txt-address">

        <textarea class="tranAdd-textarea" name="tranAddress" placeholder=" آدرس دقیق پستی خود را وارد کنید... "
                  style="margin-top: 5px;"></textarea>

        <input type="text" placeholder=" کدپستی " name="tranPCode" style="margin-top: 8px;" class="frm-txt-address">

        <input type="hidden" name="userId" value="<?= $_SESSION['userId'] ?>">

        <div class="clearfix">
            <button type="submit" class="signupbtn">افزودن</button>
            <button type="button" class="cancelbtn" formaction="<?= baseUrl() ?>" value="cancel">انصراف</button>
        </div>
    </div>
</form>
<br><br><br><br><br><br><br><br>

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
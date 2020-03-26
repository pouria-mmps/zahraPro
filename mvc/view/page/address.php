<?php
include("./mvc/view/page/header.php");
?>

<br><br><br>
<div>
    <p class="txt-address">آدرس محل تحویل سفارش خود را اضافه کنید.</p>
</div>

<form class="modal-content" action="/MainProject/user/address" method="post">
    <div class="container">
        <h2 style="float: right;margin-right: 50px;margin-bottom: 20px;">افزودن آدرس</h2>

        <input type="text" placeholder=" نام تحویل گیرنده " name="tranName" required class="frm-txt-address">
        <input type="text" placeholder=" نام خانوادگی تحویل گیرنده " name="tranLName" required class="frm-txt-address">
        <input type="text" placeholder=" شماره تلفن " name="tranTell" class="frm-txt-address">
        <input type="text" placeholder=" شماره تلفن همراه " name="tranPhone" class="frm-txt-address">

        <textarea class="tranAdd-textarea" name="tranAddress" placeholder=" آدرس دقیق پستی خود را وارد کنید... "
                  style="margin-top: 5px;"></textarea>

        <input type="text" placeholder=" کدپستی " name="tranPostCode" style="margin-top: 8px;" class="frm-txt-address">

        <input type="hidden" name="userEmail" value="<?= $_SESSION['userEmail'] ?>">

        <div class="clearfix">
            <button type="submit" class="signupbtn">افزودن</button>
            <button type="button" class="cancelbtn" formaction="<?= baseUrl() ?>" value="cancel">انصراف</button>
        </div>
    </div>
</form>

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

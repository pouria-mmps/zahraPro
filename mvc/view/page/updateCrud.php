<?php
include("./mvc/view/page/managerHeader.php");
?>

<a id="button"></a>


<?php foreach ($perfumes as $perfume) { ?>
    <div class="box-updateCrud">
        <form class="frm-product-crud" action="<?= baseUrl() ?>page/checkProductCrud" method="post">

            <label class="frm-txt">نام عطر</label>
            <input type="text" class="frm-input-fname" name="userName" value="<?= $perfume['perfumeName'] ?>">
            <br><br><br>

            <label class="frm-txt">غلظت عطر</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['densityTitle'] ?>">
            <br><br><br>

            <label class="frm-txt">جنسیت</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['jenderType'] ?>">
            <br><br><br>

            <label class="frm-txt">برند</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['brandName'] ?>">
            <br><br><br>

            <label class="frm-txt">نوع رایحه</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['typeSmell'] ?>">
            <br><br><br>

            <label class="frm-txt">ساختار رایحه</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['structrueSmell'] ?>">
            <br><br><br>

            <label class="frm-txt">تخفیف</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['discount'] ?>">
            <br><br><br>

            <label class="frm-txt">قیمت</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['price'] ?>">
            <br><br><br>

            <label class="frm-txt">کشور سازنده</label>
            <input type="text" class="frm-input-lname" name="userFamilyName" value="<?= $perfume['countryName'] ?>">
            <br><br><br>

            <label class="frm-txt">توضیات مختصر</label>
            <textarea class="frm-input-textarea" name="userAddress" value="<?= $perfume['breif'] ?>"></textarea>
            <br><br><br>

            <label class="frm-txt">نقد و بررسی</label>
            <textarea class="frm-input-textarea" name="userAddress" value="<?= $perfume['discription'] ?>"></textarea>
            <br><br><br>

            <!--BTN-Register-->
            <button value="register" id="btn-submit-reg"><i class="fa fa-user-plus"></i>ویرایش</button>

            <!--BTN-Cancel-->
            <button formaction="<?= baseUrl() ?>" id="btn-cancel-reg" type="submit" value="cancel"><i
                        class="fa fa-close"></i>
                انصراف
            </button>

        </form>
    </div>
<?php } ?>


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
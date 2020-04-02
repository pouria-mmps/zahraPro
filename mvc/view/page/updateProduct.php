<?php
include("./mvc/view/page/managerHeader.php");
?>

<a id="button"></a>


<?php foreach ($perfumes as $perfume) { ?>
    <div class="box-updateProduct">
        <form class="frm-product-crud" action="<?= baseUrl() ?>page/updateProductChecking" method="post">

            <label hidden>
                <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
            </label>

            <label class="frm-p-txt">نام عطر</label>
            <input type="text" class="frm-perfume-name" name="perfumeName" value="<?= $perfume['perfumeName'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">غلظت عطر</label>
            <input type="text" class="frm-density" name="densityTitle" value="<?= $perfume['densityTitle'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">جنسیت</label>
            <input type="text" class="frm-jender" name="jenderType" value="<?= $perfume['jenderType'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">برند</label>
            <input type="text" class="frm-brand" name="brandName" value="<?= $perfume['brandName'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">نوع رایحه</label>
            <input type="text" class="frm-type-smell" name="typeSmell" value="<?= $perfume['typeSmell'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">ساختار رایحه</label>
            <input type="text" class="frm-structrue-smell" name="structrueSmell"
                   value="<?= $perfume['structrueSmell'] ?>" style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">تخفیف</label>
            <input type="text" class="frm-discount" name="discount" value="<?= $perfume['discount'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">قیمت</label>
            <input type="text" class="frm-price" name="price" value="<?= $perfume['price'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt">کشور سازنده</label>
            <input type="text" class="frm-country" name="countryName" value="<?= $perfume['countryName'] ?>"
                   style="text-align: center;">
            <br><br><br>

            <label class="frm-txt" style="margin-bottom: -115px;">توضیات مختصر</label>
            <textarea class="frm-breif" name="breif"><?= $perfume['breif'] ?></textarea>
            <br><br><br>

            <label class="frm-txt" style="margin-bottom: -135px;">نقد و بررسی</label>
            <textarea class="frm-discription" name="discription"><?= $perfume['discription'] ?></textarea>
            <br><br><br>

            <!-- BTN POST Data -->
            <button value="register" id="btn-submit-uproduct"><i class="fa fa-pencil-square-o"
                                                                 style="margin-left: 10px;"></i>ویرایش
            </button>

            <!-- BTN Cancel -->
            <button formaction="<?= baseUrl() ?>" id="btn-cancel-uproduct" type="submit" value="cancel">
                <i class="fa fa-close" style="margin-left: 5px;"></i>
                انصراف
            </button>
        </form>
    </div>
<?php } ?>


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
<?php
include("./mvc/view/page/managerHeader.php");
?>

<a id="button"></a>

<br><br>
<table style="width: 90%;">
    <tr>
        <td class="th-p-crud">عکس عطر</td>
        <td class="th-p-crud">نام عطر (انگلیسی)</td>
        <td class="th-p-crud">برند</td>
        <td class="th-p-crud">نوع رایحه</td>
        <td class="th-p-crud">ساختار رایحه</td>
        <td class="th-p-crud">کشور سازنده</td>
        <td class="th-p-crud">جنسیت</td>
        <td class="th-p-crud">تخفیف</td>
        <td class="th-p-crud">قیمت</td>
        <td class="th-p-crud">عملیات</td>
    </tr>
    <br>

    <?php foreach ($products as $perfume) { ?>
        <tr>
            <td>
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg-p-crud"
                     alt="عطر">
            </td>

            <td style="padding: 10px;line-height: 25px;">
                <?= $perfume['perfumeName'] ?>
            </td>

            <td style="padding: 5px;line-height: 25px;">
                <?= $perfume['brandName'] ?>
            </td>

            <td style="padding: 10px;line-height: 25px;">
                <?= $perfume['typeSmell'] ?>
            </td>

            <td style="padding: 5px;line-height: 25px;">
                <?= $perfume['structrueSmell'] ?>
            </td>

            <td>
                <?= $perfume['countryName'] ?>
            </td>

            <td>
                <?= $perfume['jenderType'] ?>
            </td>

            <td>
                <?= $perfume['discount'] ?>
            </td>

            <td style="padding: 10px;">
                <?= $perfume['price'] ?>
            </td>

            <td style="padding: 20px;">
                <form class="frm-p-crud" action="<?= baseUrl() ?>page/updateCrud/<?= $perfume['perfumeId'] ?>"
                      method="post">
                    <button value="updateCrud" id="updateCrud-btn" class="btn-updateCrud">
                        <label hidden>
                            <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                        </label>
                        <i class="fa fa-pencil" style="padding:0 5px;font-size: small;"></i>ویرایش
                    </button>
                </form>

                <!--<form class="frm-log-crud" action="<?= baseUrl() ?>page/deleteCrud/<?= $perfume['perfumeId'] ?>" method="post">
                    <button value="deleteCrud" id="deleteCrud-btn" class="btn-deleteCrud">
                        <label hidden>
                            <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                        </label>
                        <i class="fa fa-close"></i>حذف
                    </button>
                </form>-->
            </td>
        </tr>
    <?php } ?>
</table>


<br><br><br><br><br><br>

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
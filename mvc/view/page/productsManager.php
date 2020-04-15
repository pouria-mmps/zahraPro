<?php
include("./mvc/view/page/managerHeader.php");
?>

<a id="button" style="text-decoration: none;"></a>

<!-- Search Box -->
<span class="search-product">
    <span style="margin-right: 100px;font-size: 15px;font-weight: bold;color:#555;">جستجو</span>
    <label for="search"></label>
        <input type="search" value="" id="keyword" class="search-products"
               placeholder="نام محصول یا برند مورد نظرتان را جستجو کنید">
</span>
<br>

<a href="/MainProject/page/insertProduct" style="text-decoration: none;">
    <span class="fa fa-plus insert-product"></span>
</a>

<table style="width: 90%;">
    <tr>
        <td class="th-p-crud">ردیف</td>
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

    <?php $i = 1 ?>
    <?php foreach ($products as $perfume) { ?>
        <tr>
            <td>
                <span style="font-size: larger;"><?php echo $i; ?></span>
                <?php $i++; ?>
            </td>

            <td style="padding: 10px;">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg-p-crud"
                     alt="عطر">
            </td>

            <td style="padding: 10px;line-height: 25px;font-size: large;">
                <?= $perfume['perfumeName'] ?>
            </td>

            <td style="padding: 15px;line-height: 25px;font-size: large;">
                <?= $perfume['brandName'] ?>
            </td>

            <td style="padding: 10px;line-height: 25px;font-size: large;">
                <?= $perfume['typeSmell'] ?>
            </td>

            <td style="padding: 5px;line-height: 25px;font-size: large;">
                <?= $perfume['structrueSmell'] ?>
            </td>

            <td style="font-size: large;">
                <?= $perfume['countryName'] ?>
            </td>

            <td style="font-size: large;">
                <?= $perfume['jenderType'] ?>
            </td>

            <td style="font-size: larger;">
                <?= $perfume['discount'] ?>
            </td>

            <td style="padding: 10px;font-size: larger;">
                <?= $perfume['price'] ?>
            </td>

            <td style="padding: 20px;">
                <form class="frm-p-crud" action="<?= baseUrl() ?>page/updateProduct/<?= $perfume['perfumeId'] ?>"
                      method="post">
                    <button value="updateProduct" id="updateProduct-btn" class="btn-updateProduct">
                        <label hidden>
                            <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                        </label>
                        <i class="fa fa-pencil" style="padding:0 6px;font-size: small;"></i>ویرایش
                    </button>
                </form>

                <?php if ($perfume['deleteLogic'] == 1) { ?>
                    <form class="frm-log-crud"
                          action="<?= baseUrl() ?>page/deleteLogicProduct/<?= $perfume['perfumeId'] ?>"
                          method="post">
                        <button value="deleteCrud" id="deactive-btn" class="btn-deactive">
                            <label hidden>
                                <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                            </label>
                            <i class="fa fa-close" style="font-size: small;"></i>غیرفعال
                        </button>
                    </form>
                <?php } else { ?>
                    <form class="frm-log-crud"
                          action="<?= baseUrl() ?>page/activeProducChecking/<?= $perfume['perfumeId'] ?>"
                          method="post">
                        <button value="deleteCrud" id="active-btn" class="btn-active">
                            <label hidden>
                                <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                            </label>
                            <i class="fa fa-check" style="font-size: small;"></i>فعال
                        </button>
                    </form>
                <?php } ?>
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
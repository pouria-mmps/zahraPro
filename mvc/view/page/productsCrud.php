<?php
include("./mvc/view/page/managerHeader.php");
?>

<br><br>
<table style="width: 90%;">
    <tr>
        <td class="th-p-crud">نام عطر (انگلیسی)</td>
        <td class="th-p-crud">برند</td>
        <td class="th-p-crud">رتبه</td>
        <td class="th-p-crud">سبک عطر</td>
        <td class="th-p-crud">نوع رایحه</td>
        <td class="th-p-crud">ساختار رایحه</td>
        <td class="th-p-crud">کشور سازنده</td>
        <td class="th-p-crud">جنسیت</td>
        <td class="th-p-crud">تخفیف</td>
        <td class="th-p-crud">قیمت</td>
        <td class="th-p-crud">وضعیت</td>
        <td class="th-p-crud">توضیحات مختصر</td>
        <td class="th-p-crud">نقد و بررسی</td>
    </tr>
    <br>

    <?php foreach ($products as $perfume) { ?>
        <tr>
            <td>
                <?= $perfume['perfumeName'] ?>
            </td>

            <td>

            </td>

            <td>
                <?= $perfume['rate'] ?>
            </td>

            <td>

            </td>

            <td>
                <?= $perfume['typeSmell'] ?>
            </td>

            <td style="padding: 10px;">
                <?= $perfume['structrueSmell'] ?>
            </td>

            <td>
                <?php if ($perfume['countryId'] == 1) { ?>
                    <span> فرانسه </span>
                <?php } elseif ($perfume['countryId'] == 2) { ?>
                    <span> ایتالیا </span>
                <?php } elseif ($perfume['countryId'] == 3) { ?>
                    <span> آمریکا </span>
                <?php } elseif ($perfume['countryId'] == 4) { ?>
                    <span> آلمان </span>
                <?php } elseif ($perfume['countryId'] == 5) { ?>
                    <span> سوییس </span>
                <?php } elseif ($perfume['countryId'] == 6) { ?>
                    <span> اسپانیا </span>
                <?php } ?>
            </td>

            <td>
                <?php if ($perfume['jenderId'] == 1) { ?>
                    <span> آقایان </span>
                <?php } elseif ($perfume['jenderId'] == 2) { ?>
                    <span> بانوان </span>
                <?php } else { ?>
                    <span> مشترک </span>
                <?php } ?>
            </td>

            <td>
                <?= $perfume['discount'] ?>
            </td>

            <td style="padding: 10px;">
                <?= $perfume['price'] ?>
            </td>

            <td>
                <?php if ($perfume['status'] == 1) { ?>
                    <span> موجود </span>
                <?php } else { ?>
                    <span> ناموجود </span>
                <?php } ?>
            </td>

            <td style="padding: 10px;">
                <?= $perfume['breif'] ?>
            </td>

            <td style="padding: 15px;">
                <?= $perfume['discription'] ?>
            </td>
        </tr>
    <?php } ?>
</table>


<br><br><br><br><br><br><br><br>

<?php
include("./mvc/view/page/footer.php");
?>

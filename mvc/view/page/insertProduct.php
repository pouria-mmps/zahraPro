<?php
include("./mvc/view/page/managerHeader.php");
?>

<a id="button" style="text-decoration: none;"></a>


<div class="box-updateProduct">
    <form class="frm-product-crud" action="<?= baseUrl() ?>page/insertProductChecking" method="post">

        <label class="frm-txt">نام عطر</label>
        <input type="text" class="frm-perfume-name" name="perfumeName" style="text-align: center;margin-bottom: 60px;">
        <br>

        <label class="frm-txt">غلظت عطر</label>
        <span class="sort-products">
            <select class="sort-products theme-construction" id="densityId" name="densityId"
                    style="width: 55%;margin-right: 54px;padding: 15px;text-align: center;text-align-last: center;font-size: 16px;">
                <?php foreach ($densitys as $density) { ?>
                    <option value="<?= $density['densityId'] ?>"
                            style="text-align: left;"><?= $density['densityTitle'] ?></option>
                <?php } ?>
            </select>
        </span>
        <br>

        <label class="frm-txt">جنسیت</label>
        <span class="sort-products">
            <select class="sort-products theme-construction" id="jenderId" name="jenderId"
                    style="width: 55%;margin-right: 80px;padding: 15px;text-align: center;text-align-last: center;font-size: 16px;">
                <?php foreach ($genders as $gender) { ?>
                    <option value="<?= $gender['jenderId'] ?>"
                            style="text-align: left;"><?= $gender['jenderType'] ?></option>
                <?php } ?>
            </select>
        </span>
        <br>

        <label class="frm-txt">برند</label>
        <span class="sort-products">
            <select class="sort-products theme-construction" id="brandId" name="brandId"
                    style="width: 55%;margin-right: 100px;padding: 15px;text-align: center;text-align-last: center;font-size: 16px;">
                <?php foreach ($brands as $brand) { ?>
                    <option value="<?= $brand['brandId'] ?>"
                            style="text-align: left;"><?= $brand['brandName'] ?></option>
                <?php } ?>
            </select>
        </span>
        <br>

        <label class="frm-txt">کشور سازنده</label>
        <span class="sort-products">
            <select class="sort-products theme-construction" id="countryId" name="countryId"
                    style="width: 55%;margin-right: 46px;padding: 15px;text-align: center;text-align-last: center;font-size: 16px;">
                <?php foreach ($countrys as $country) { ?>
                    <option value="<?= $country['countryId'] ?>"
                            style="text-align: left;"><?= $country['countryName'] ?></option>
                <?php } ?>
            </select>
        </span>
        <br>

        <label class="frm-txt">نوع رایحه</label>
        <input type="text" class="frm-type-smell" name="typeSmell" style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">ساختار رایحه</label>
        <input type="text" class="frm-structrue-smell" name="structrueSmell" style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">تخفیف</label>
        <input type="text" class="frm-discount" name="discount" style="text-align: center;">
        <br><br><br>

        <label class="frm-txt">قیمت</label>
        <input type="text" class="frm-price" name="price" style="text-align: center;">
        <br><br><br>

        <label class="frm-txt" style="margin-bottom: -115px;">توضیات مختصر</label>
        <textarea class="frm-breif" name="breif" style="margin-top:10px;"></textarea>
        <br><br><br>

        <label class="frm-txt" style="margin-bottom: -135px;">نقد و بررسی</label>
        <textarea class="frm-discription" name="discription"
                  style="margin-top:10px;"></textarea>
        <br><br><br>

        <!-- BTN POST Data -->
        <button value="register" id="btn-submit-uproduct"><i class="fa fa-plus"
                                                             style="margin-left: 10px;"></i>ثبت
        </button>

        <!-- BTN Cancel -->
        <button formaction="<?= baseUrl() ?>page/productsManager" id="btn-cancel-uproduct" type="submit"
                value="cancel">
            <i class="fa fa-close" style="margin-left: 5px;"></i>
            انصراف
        </button>
        <br><br><br>
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

<script>
    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>

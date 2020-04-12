<?php
include("./mvc/view/page/header.php");
?>
<br>

<a id="button" style="text-decoration: none;"></a>

<?php foreach ($perfumes as $perfume) { ?>
    <div class="box-details">
        <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg-detail" alt="عطر">

        <div class="product-panel-rightside">
            <span class="product-Name-detail">
                <?php foreach ($densitys as $density) {
                    foreach ($genders as $gender) {
                        foreach ($brands as $brand) {
                            if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                                ?>
                                <span
                                    style="font-size: 22px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل <span
                                        style="font-size: 23px;font-family: 'mitra';"><?= $perfume['perfumeName'] ?></span></span>
                            <?php }
                        }
                    }
                } ?>
            </span>

            <div class="vertical-line"></div>

            <div>
                <img src="/MainProject/image/CashOnSpot.png" class="img-left-detail" id="img-cash-detail" alt="Cash">
                <span class="txt-left-detail" id="txt-cash-detail">پرداخت در محل</span>
            </div>

            <div>
                <img src="/MainProject/image/Express.png" class="img-left-detail" id="img-express-detail" alt="Express">
                <span class="txt-left-detail" id="txt-express-detail">تحویل اکسپرس</span>
            </div>

            <div>
                <img src="/MainProject/image/Support.png" class="img-left-detail" id="img-support-detail" alt="Support">
                <span class="txt-left-detail" id="txt-support-detail">پشتیبانی 24ساعته</span>
            </div>

            <div>
                <img src="/MainProject/image/Return.png" class="img-left-detail" id="img-return-detail" alt="Return">
                <span class="txt-left-detail" id="txt-return-detail">7 روز زمان بازگشت</span>
            </div>

            <div>
                <img src="/MainProject/image/Warranty.png" class="img-left-detail" id="img-warranty-detail"
                     alt="Warranty">
                <span class="txt-left-detail" id="txt-warranty-detail">ضمانت اصل بودن کالا</span>
            </div>


            <?php if ($perfume['showCounter'] >= 0 && $perfume['showCounter'] <= 20) { ?>
                <div class="star-detail">
                    <i class="fa fa-star"></i>
                </div>
            <?php } elseif ($perfume['showCounter'] > 20 && $perfume['showCounter'] <= 40) { ?>
                <div class="star-detail">
                    <?php for ($i = 1; $i <= 2; $i++) { ?>
                        <i class="fa fa-star"></i>
                    <?php } ?>
                </div>
            <?php } elseif ($perfume['showCounter'] > 40 && $perfume['showCounter'] <= 60) { ?>
                <div class="star-detail">
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <i class="fa fa-star"></i>
                    <?php } ?>
                </div>
            <?php } elseif ($perfume['showCounter'] > 60 && $perfume['showCounter'] <= 80) { ?>
                <div class="star-detail">
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <i class="fa fa-star"></i>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="star-detail">
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <i class="fa fa-star"></i>
                    <?php } ?>
                </div>
            <?php } ?>


            <div class="status-detail">
                <span style="font-size: larger;">وضعیت:</span>
                <?php if ($perfume['perfumeCounter'] != 0) { ?>
                    <span style="color:green;font-weight: bold;font-size: large;">موجود</span>
                <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                    <span style="color:#888;font-weight: bold;font-size: large;">نا موجود</span>
                <?php } ?>
            </div>

            <hr class="horizontal-line">
            <br>

            <div class="feture-detail">
                <div style="color: #555;font-size: larger;">ویژگی های محصول:</div>
                <ul>
                    <li style="margin-top:10px;font-weight: bold;font-size: large;"> نوع رایحه: <span
                            style="font-weight: normal;"><?= $perfume['typeSmell'] ?></span></li>

                    <li style="margin-top: 5px;font-weight: bold;font-size: large;"> ساختار رایحه: <span
                            style="font-weight: normal;"><?= $perfume['structrueSmell'] ?></span></li>
                </ul>
            </div>

            <hr class="horizontal-line2">

            <span class="newPrice-detail"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?> تومان </span>

            <div class="wish-add-btn-detail">
                <?php if ($perfume['perfumeCounter'] == 0) { ?>
                    <div class="addToCart-btn-detail2">
                        <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                        <span style="font-size: large;"> اضافه به سبد خرید</span>
                    </div>
                <?php } else { ?>
                    <div class="addToCart-btn-detail" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                        <i class="fa fa-shopping-cart" style="padding-left: 5px;padding-right: 5px;"></i>
                        <span style="font-size: large;"> اضافه به سبد خرید</span>
                    </div>
                <?php } ?>
            </div>

            <?php if ($perfume['discount'] > 0) { ?>
                <div class="discount-detail">
                    <?php if ($perfume['discount'] > 0) { ?>
                        <i class="fa fa-gift discount-detail-btn"></i>
                        <span style="font-size: larger;margin-right: 10px;"> قیمت با <?= $perfume['discount'] ?>% تخفیف خرید اینترنتی: </span>
                        <span style="color: #a2a2a2;font-size: 16px;"><?= $perfume['price'] ?> تومان </span>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div>
<?php } ?>


<hr class="horizontal-line3">
<br><br>


<div class="tab">
    <span class="tablinks" style="font-size: 22px;" onclick="middleNavbar(event, 'Review')">نقد وبررسی</span>
    <span class="tablinks" style="font-size: 22px;margin-right: 20px;"
          onclick="middleNavbar(event, 'Feture')">مشخصات</span>
</div>

<div id="Review" class="tabcontent">
    <p style="margin-right: 70px;line-height: 40px;font-size: large;"><?= $perfume['discription'] ?></p>
</div>

<div class="container">
    <div id="Feture" class="tabcontent">
        <div class="row">
            <div class="col-sm-5">
                <div class="property1"> کشور مبدا برند</div>
                <div class="property1"> مناسب برای</div>
                <div class="property1"> برند</div>
            </div>
            <div class="col-sm-7">
                <div class="property2">
                    <?php
                    if ($perfume['countryId'] == 1) {
                        ?>
                        <span> فرانسه </span>
                    <?php } elseif ($perfume['countryId'] == 2) {
                        ?>
                        <span> ایتالیا </span>
                    <?php } elseif ($perfume['countryId'] == 3) {
                        ?>
                        <span> آمریکا </span>
                    <?php } elseif ($perfume['countryId'] == 4) {
                        ?>
                        <span> آلمان </span>
                    <?php } elseif ($perfume['countryId'] == 5) {
                        ?>
                        <span> سوییس </span>
                    <?php } elseif ($perfume['countryId'] == 6) {
                        ?>
                        <span> اسپانیا </span>
                    <?php } ?>
                </div>

                <div class="property2">
                    <?php
                    if ($perfume['jenderId'] == 1) {
                        ?>
                        <span> آقایان </span>
                    <?php } elseif ($perfume['jenderId'] == 2) {
                        ?>
                        <span> بانوان </span>
                    <?php } else { ?>
                        <span> مشترک </span>
                    <?php } ?>
                </div>

                <div class="property2">
                    <?php foreach ($brands

                    as $brand){
                    if ($perfume['brandId'] == $brand['brandId']) { ?>
                    <span style="font-size: 22px;"><?= $brand['brandName'] ?>
                        <?php }
                        } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br><br><br><br><br><br>
<?php
include("./mvc/view/page/footer.php");
?>

<script>
    function addProduct(perfumeId) {
        $.ajax({
            url: "/MainProject/productsman/addToCart/" + perfumeId,
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            $("#cart-items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

    function removeProduct(perfumeId) {
        $.ajax({
            url: "/MainProject/productsman/removeFromCart/" + perfumeId,
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            $("#cart-items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

    function refreshCartPreview() {
        $.ajax({
            url: "/MainProject/productsman/refreshCartPreview",
            method: 'POST',
            dataType: "json"
        }).done(function (output) {
            $("#cart-items").text(output.cartItemsCount);
            $("#cartPreviewHolder").html(output.cartPreview);
        });
    }

    $(function () {
        reloadData();
        refreshCartPreview();
    });
</script>

<script>
    function middleNavbar(evt, tabNavbar) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabNavbar).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

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
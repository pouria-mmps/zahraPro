<!-- Slide Show IMG -->
<?php
    include("./mvc/view/page/header.php");
?>
<a id="button" style="text-decoration: none;"></a>


<div id="box-slide">
    <div class="slideshow-container">
        <!-- Img1 Slide Show -->
        <div class="mySlides fade">
            <div class="numbertext" style="color: #777;">3 / 1</div>
            <img src="/MainProject/image/SlideShow1.jpg" class="slideshow-img" alt="Atkinsins" style="height: 450px;">
            <div class="text-img-slide">بهترین عطرهای زنانه</div>
        </div>

        <!-- Img2 Slide Show -->
        <div class="mySlides fade">
            <div class="numbertext">3 / 2</div>
            <img src="/MainProject/image/SlideShow2.jpg" class="slideshow-img" alt="Dior" style="height: 450px">
            <div class="text-img-slide" style="color: white;">کلکسیونی از خوش بوترین عطرها</div>
        </div>

        <!-- Img3 Slide Show -->
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="/MainProject/image/SlideShow3.jpg" class="slideshow-img" alt="Perfumes" style="height: 450px">
            <div class="text-img-slide" style="color: white;">بهترین عطرهای مردانه</div>
        </div>
    </div>
    <br>
    <!-- Dots Under the Img -->
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <!-- Slide Show Script -->
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
</div>
<br><br><br><br>


<!-- Men Products -->
<h3 class="h3-header-products">فروش ویژه ی عطرهای مردانه</h3>

<div class="products scrollmenu-products">
    <?php foreach ($perfumes as $perfume) {
        if ($perfume['jenderId'] == 1 && $perfume['deleteLogic'] == 1 && $perfume['discount'] != 0 && $perfume['perfumeCounter'] != 0) {
            ?>
            <div class="product-panel-grid" style="margin-top: -10px;margin-right: 30px;margin-left: 30px">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg" alt="عطر">
                <br><br>

                <?php foreach ($densitys as $density) {
                    foreach ($genders as $gender) {
                        foreach ($brands as $brand) {
                            if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                                ?>
                                <span style="font-size: 18px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل </span>
                                <br>

                                <span style="font-size: 18px;font-family: 'mitra';"><?= $perfume['perfumeName'] ?></span>
                            <?php }
                        }
                    }
                } ?>

                <?php if ($perfume['discount'] > 0 && $perfume['perfumeCounter'] != 0) { ?>
                    <span class="discount-btn">فروش ویژه</span>
                <?php } elseif ($perfume['perfumeCounter'] != 0) { ?>
                    <span class="sale-btn">موجود</span>
                <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                    <span class="nosale-btn">ناموجود</span>
                <?php } ?>


                <div class="priceWraper">
                    <span class="newPrice"
                          style="font-size: 18px;"><i
                                style="font-size: larger;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?></i> تومان </span>

                    <?php if ($perfume['discount'] > 0) { ?>
                        <span class="oldPrice" style="font-size: 15px;"><?= $perfume['price'] ?> تومان </span>
                    <?php } ?>
                </div>
                <br>


                <?php if ($managers['accessId'] == 1) { ?>
                    <div class="addToCart-btn-detail3" style="font-size: medium;">
                        <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                        <span style="font-size: medium;"> اضافه به سبد خرید</span>
                    </div>

                <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                    <span class="addToCart-btn2" style="font-size: medium;">
                        <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
                    </span>
                <?php } else { ?>
                    <span class="addToCart-btn" style="font-size: medium;"
                          onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                        <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
                    </span>
                <?php } ?>

                <form class="frm-log" action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                    <label hidden>
                        <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                    </label>
                    <br>
                    <button value="details" id="details-btn" class="btn-details" style="font-size: medium;"><i
                                class="fa fa-info"
                                style="padding-left: 5px;"></i>جزییات
                    </button>
                </form>
            </div>
        <?php }
    } ?>
</div>
<br><br><br><br><br><br><br><br>


<div class="img-panel-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="img-panel">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4" style="border-left: 2px solid rgba(0,0,0,0.35);">
                                <img src="../image/Perfume.jpg"
                                     style="width: 130px;margin-right: 110px;margin-top: -5px;">
                                <p style="font-size: 18px;margin-right: 120px;margin-top: -10px;">ماندگارتدین رایحه
                                    ها</p>
                            </div>

                            <div class="col-sm-4" style="border-left: 2px solid rgba(0,0,0,0.35);">
                                <img src="../image/Pay.png" style="width: 130px;margin-right: 130px;margin-top: 10px;">
                                <p style="font-size: 18px;margin-right: 125px;margin-top: 15px;">راحتی پرداخت آنلاین</p>
                            </div>

                            <div class="col-sm-4">
                                <img src="../image/Perfume-colection.png"
                                     style="width: 160px;height:100px;margin-right: 130px;margin-top: 5px;">
                                <p style="font-size: 18px;margin-right: 135px;margin-top: 5px;">کلکسیونی از بهترین
                                    عطرها</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>


<!-- Female Products -->
<h3 class="h3-header-products">فروش ویژه ی عطرهای زنانه</h3>

<div class="products scrollmenu-products">
    <?php foreach ($perfumes as $perfume) {
        if ($perfume['jenderId'] == 2 && $perfume['deleteLogic'] == 1 && $perfume['discount'] != 0 && $perfume['perfumeCounter'] != 0) {
            ?>
            <div class="product-panel-grid" style="margin-top: -10px;margin-right: 25px;margin-left: 25px">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg" alt="عطر">
                <br><br>

                <?php foreach ($densitys as $density) {
                    foreach ($genders as $gender) {
                        foreach ($brands as $brand) {
                            if ($perfume['densityId'] == $density['densityId'] && $perfume['jenderId'] == $gender['jenderId'] && $perfume['brandId'] == $brand['brandId']) {
                                ?>
                                <span style="font-size: 18px;"><?= $density['densityTitle'] ?> <?= $gender['jenderType'] ?> <?= $brand['brandName'] ?> مدل </span>
                                <br>

                                <span style="font-size: 18px;font-family: 'mitra';"><?= $perfume['perfumeName'] ?></span>
                            <?php }
                        }
                    }
                } ?>

                <?php if ($perfume['discount'] > 0 && $perfume['perfumeCounter'] != 0) { ?>
                    <span class="discount-btn">فروش ویژه</span>
                <?php } elseif ($perfume['perfumeCounter'] != 0) { ?>
                    <span class="sale-btn">موجود</span>
                <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                    <span class="nosale-btn">ناموجود</span>
                <?php } ?>


                <div class="priceWraper">
                    <span class="newPrice" style="font-size: 18px;">
                        <i style="font-size: larger;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?></i>
                    تومان </span>

                    <?php if ($perfume['discount'] > 0) { ?>
                        <span class="oldPrice" style="font-size: 15px;"><?= $perfume['price'] ?> تومان </span>
                    <?php } ?>
                </div>
                <br>


                <?php if ($managers['accessId'] == 1) { ?>
                    <div class="addToCart-btn-detail3" style="font-size: medium;">
                        <i class="fa fa-shopping-cart" style="padding: 5px;"></i>
                        <span style="font-size: medium;"> اضافه به سبد خرید</span>
                    </div>

                <?php } elseif ($perfume['perfumeCounter'] == 0) { ?>
                    <span class="addToCart-btn2" style="font-size: medium;">
                        <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
                    </span>
                <?php } else { ?>
                    <span class="addToCart-btn" style="font-size: medium;"
                          onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                        <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
                    </span>
                <?php } ?>

                <form class="frm-log" action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                    <label hidden>
                        <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                    </label>
                    <br>
                    <button value="details" id="details-btn" class="btn-details" style="font-size: medium;"><i
                                class="fa fa-info"
                                style="padding-left: 5px;"></i>جزییات
                    </button>
                </form>

            </div>
        <?php }
    } ?>
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
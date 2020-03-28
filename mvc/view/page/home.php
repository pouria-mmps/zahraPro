<!-- Slide Show IMG -->
<?php
include("./mvc/view/page/header.php");
?>

<a id="button"></a>
<br><br>


<div id="box-slide">
    <div class="slideshow-container">
        <!-- Img1 Slide Show -->
        <div class="mySlides fade">
            <div class="numbertext">3 / 1</div>
            <img src="/MainProject/image/SlideShow1.jpg" class="slideshow-img" alt="Atkinsins">
            <div class="text-img-slide">بهترین عطرهای مردانه</div>
        </div>

        <!-- Img2 Slide Show -->
        <div class="mySlides fade">
            <div class="numbertext">3 / 2</div>
            <img src="/MainProject/image/SlideShow2.jpg" class="slideshow-img" alt="Dior" style="height: 450px">
            <div class="text-img-slide">کلکسیونی از خوش بوترین عطرها</div>
        </div>

        <!-- Img3 Slide Show -->
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="/MainProject/image/SlideShow3.jpg" class="slideshow-img" alt="Perfumes" style="height: 450px">
            <div class="text-img-slide">بهترین عطرهای زنانه</div>
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
<br><br><br><br><br><br><br><br>

<!-- IMG Man & Woman -->
<div class="content-img-jender">
    <div class="col-sm-6">
        <a href="#">
            <img src="/MainProject/image/WomanShopping.jpg" class="content-img-woman" alt="Woman Perfumes"
                 style="float: left">
            <div class="overlay">
                <div class="content-text-img">عطرهای زنانه</div>
            </div>
        </a>
    </div>
</div>

<div class="content-img-jender2">
    <div class="row">
        <div class="col-sm-6">
            <a href="#">
                <img src="/MainProject/image/ManShopping.jpg" class="content-img-man" alt="Man Perfumes"
                     style="float: right">
                <div>
                    <div class="overlay-img2">
                        <div class="content-text-img">عطرهای مردانه</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>


<!-- Men Products -->
<a href="#" style="text-decoration: none;">
    <h3 class="h3-header-products">عطرهای مردانه</h3>
</a>

<div class="products scrollmenu-products">
    <?php foreach ($perfumes as $perfume) {
        if ($perfume['jenderId'] == 1) {
            ?>
            <div class="product-panel-grid" style="margin-top: -10px;margin-right: 30px;margin-left: 30px">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg" alt="عطر">

                <span class="product-persionName"><?= $perfume['persionName'] ?></span>
                <span class="product-perfumeName"><?= $perfume['perfumeName'] ?></span>

                <?php if ($perfume['discount'] > 0) { ?>
                    <span class="discount-btn">فروش ویژه</span>
                <?php } else { ?>
                    <span class="sale-btn">موجود</span>
                <?php } ?>

                <div class="priceWraper">
                    <span class="newPrice"
                          style="font-size: 18px;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?> تومان </span>

                    <?php if ($perfume['discount'] > 0) { ?>
                        <span class="oldPrice" style="font-size: 15px;"><?= $perfume['price'] ?> تومان </span>
                    <?php } ?>
                </div>

                <br>
                <span class="addToCart-btn" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                    <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
                </span>

                <form class="frm-log" action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                    <label hidden>
                        <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                    </label>
                    <br>
                    <button value="details" id="details-btn" class="btn-details"><i class="fa fa-info"
                                                                                    style="padding:0 5px 0 5px;"></i>جزییات
                    </button>
                </form>
            </div>
        <?php }
    } ?>
</div>

<br><br><br><br><br><br>

<!-- Female Products -->
<a href="#" style="text-decoration: none">
    <h3 class="h3-header-products">عطرهای زنانه</h3>
</a>

<div class="products scrollmenu-products">
    <?php foreach ($perfumes as $perfume) {
        if ($perfume['jenderId'] == 2) {
            ?>

            <div class="product-panel-grid" style="margin-top: -10px;margin-right: 30px;margin-left: 30px">
                <img src="/MainProject/image/Perfumes/<?= $perfume['perfumeId'] ?>.jpg" class="productImg" alt="عطر">

                <span class="product-persionName"><?= $perfume['persionName'] ?></span>
                <span class="product-perfumeName"><?= $perfume['perfumeName'] ?></span>

                <?php if ($perfume['discount'] > 0) { ?>
                    <span class="discount-btn">فروش ویژه</span>
                <?php } else { ?>
                    <span class="sale-btn">موجود</span>
                <?php } ?>

                <div class="priceWraper">
                    <span class="newPrice"
                          style="font-size: 18px;"><?= $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100) ?> تومان </span>

                    <?php if ($perfume['discount'] > 0) { ?>
                        <span class="oldPrice" style="font-size: 15px;"><?= $perfume['price'] ?> تومان </span>
                    <?php } ?>
                </div>

                <br>
                <span class="addToCart-btn" onclick="addProduct(<?= $perfume['perfumeId'] ?>)">
                    <i class="fa fa-shopping-cart" style="margin-left: 5px"></i>اضافه به سبد خرید
                </span>

                <form class="frm-log" action="<?= baseUrl() ?>page/details/<?= $perfume['perfumeId'] ?>" method="post">
                    <label hidden>
                        <input type="hidden" name="perfumeId" value="<?= $perfume['perfumeId'] ?>">
                    </label>
                    <br>
                    <button value="details" id="details-btn" class="btn-details"><i class="fa fa-info"
                                                                                    style="padding:0 5px 0 5px;"></i>جزییات
                    </button>
                </form>

            </div>
        <?php }
    } ?>
</div>

<br><br><br><br><br><br><br><br>

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
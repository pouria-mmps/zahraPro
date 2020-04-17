<?php
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>
<br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="/MainProject/page/productsManager">
                <div class="hvrbox panel-up">
                    <img src="../image/Perfume-Bottles.png" alt="Mountains" class="hvrbox-layer_bottom">
                    <div class="hvrbox-layer_top">
                        <div class="squre-panel">
                            <div class="hvrbox-text">مدیریت محصولات</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-4">
            <a href="/MainProject/page/ordersManager">
                <div class="hvrbox panel-up">
                    <img src="../image/Order.jpg" alt="Mountains" class="hvrbox-layer_bottom" style="height: 310px;">
                    <div class="hvrbox-layer_top">
                        <div class="squre-panel">
                            <div class="hvrbox-text">وضعیت سفارشات</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-4">
            <a href="/MainProject/page/usersManager">
                <div class="hvrbox panel-up">
                    <img src="../image/User.jpg" alt="Mountains" class="hvrbox-layer_bottom">
                    <div class="hvrbox-layer_top">
                        <div class="squre-panel">
                            <div class="hvrbox-text">مدیریت کاربران</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
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
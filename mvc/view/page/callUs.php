<?php
include("./mvc/view/page/header.php");
?>

<a id="button" style="text-decoration: none;"></a>

<div class="call-panel">
    <br>

    <div class="mapouter" style="float: left;margin-left: 50px;margin-top: 20px;">
        <div class="gmap_canvas">
            <iframe width="800" height="400" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=iran%20tehran%20satarkhan%20shahrara%2021%20street&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">nordvpn discount codes</a></div>
        <style>.mapouter {
                border-radius: 10px;
                position: relative;
                text-align: right;
                height: 400px;
                width: 800px;
            }

            .gmap_canvas {
                overflow: hidden;
                border-radius: 10px;
                background: none !important;
                height: 400px;
                width: 800px;
            }</style>
    </div>

    <br><br><br>
    <h2 style="margin-right: 100px;font-weight: bold;"> تماس با ما </h2>
    <br><br>

    <span style="font-size: large;color: #777;margin-right: 70px;font-weight: bolder;"> تلفن: </span><span
        style="font-size: large;"> 66580280-021 </span>
    <br><br>

    <span style="font-size: large;color: #777;margin-right: 70px;font-weight: bolder;"> کد پستی: </span><span
        style="font-size: large;"> 7896565686 </span>
    <br><br>

    <span style="font-size: large;color: #777;margin-right: 70px;font-weight: bolder;">آدرس: </span><span
        style="font-size: large;"> تهران، خیابان ستارخان، خیابان </span>
    شهرآرا، پلاک 12
    <br><br>

    <span style="font-size: large;color: #777;margin-right: 70px;font-weight: bolder;"> ساعات پاسخ گویی:  </span><span
        style="font-size: large;"> شنبه تا چهارشنبه 9:00 تا 17:00</span>
    <br><br>

</div>

<br><br><br><br><br><br><br>
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
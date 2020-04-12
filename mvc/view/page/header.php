<div class="header">
    <br>

    <!-- Register & Login -->
    <?php
    /** @var TYPE_NAME $isGuest */
    $isGuest = !isset($_SESSION['userEmail']);
    if ($isGuest) { ?>
        <div style="margin-right: 40px">
            <a href="<?= baseUrl() ?>user/login" style="text-decoration: none;">
                <i class="txt-header-register">
                    <i class="fa fa-sign-in" style="margin-left:10px;"></i>ورود</i>
            </a>

            <i class="txt-header-register2">|</i>

            <a href="<?= baseUrl() ?>user/register" style="margin-left: 50px;text-decoration: none;">
                <i class="txt-header-register">
                    <i class="fa fa-user-plus" style="margin-left:10px;"></i>ثبت نام</i>
            </a>

            <span class="cart">
                <span id="cart-items"></span>
                <i class="fa fa-shopping-cart" style="margin-left: 7px;"></i> سبد خرید
            </span>
            <span class="btn-cart vertical-menu">
                <div id="cartPreviewHolder"
                     style="width:250px;display: none;background-color: white;position: relative;box-shadow: 0 0 5px #a2a2a2;border-radius: 5px;"></div>
            </span>
        </div>
    <?php } ?>

    <!-- Buy -->
    <?php if (!$isGuest) { ?>
        <span class="exit-btn">
            <a href="/MainProject/user/logout" style="color: #555;font-size: 17px;">
                <i class="fa fa-sign-out signout-btn"></i>خروج
            </a>
        </span>

        <span class="cart">
            <span id="cart-items"></span>
            <i class="fa fa-shopping-cart" style="margin-left: 5px;"></i> سبد خرید
        </span>
        <span class="btn-cart vertical-menu">
            <div id="cartPreviewHolder"
                 style="width:250px;display: none;background-color: #f7f7f7;position: relative;box-shadow: 0 0 5px #a2a2a2;border-radius: 5px;"></div>
        </span>
    <?php } ?>

    <!-- Logo -->
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
                <img src="/MainProject/image/Logo3.jpg" id="imgLogo" alt="لگو صفحه">
            </div>
        </div>
    </div>
</div>

<!-- Navigation Bar -->
<div class="navbar">
    <a href="<?= baseUrl() ?>page/home" class="menu-item">
        <i class="fa fa-home menu-icon"></i>
        <span style="font-size: 18px;">
            صفحه اصلی
        </span>
    </a>

    <a href="<?= baseUrl() ?>productsman/productsman" class="menu-item">
        <i class="fa fa-pinterest-p menu-icon"></i>
        <span style="font-size: 18px;">
            محصولات
        </span>
    </a>

    <?php if ($isGuest) {
        goto a;
    } elseif (!$isGuest && $_SESSION['userAccess'] == 'user') { ?>
        <a class="menu-item" href="/MainProject/productsman/myorders">
            <img src="/MainProject/image/EmptyProfile.png" class="profile-img" alt="پروفایل">
            <span style="font-size: 18px;"><?= $_SESSION['userEmail'] ?></span>
            <span style="margin-right: 7px;font-size: 18px;">کاربر</span>
        </a>
    <?php } elseif (!$isGuest && $_SESSION['userAccess'] == 'user,admin') { ?>
        <a href="<?= baseUrl() ?>page/manager" class="menu-item">
            <i class="fa fa-user-circle menu-icon"></i>
            <span style="font-size: 18px;">
                فرم مدیریت سایت
            </span>
        </a>

        <a class="menu-item" href="/MainProject/productsman/myorders">
            <img src="/MainProject/image/EmptyProfile.png" class="profile-img" alt="پروفایل">
            <span style="font-size: 18px;"><?= $_SESSION['userEmail'] ?></span>
            <span style="margin-right: 7px;font-size: 18px;">مدیرسایت</span>
        </a>
    <?php }
    a: ?>
</div>


<script>
    $(function () {
        $("#cart-items").on('click', function () {
            $("#cartPreviewHolder").toggle();
        });
    });
</script>
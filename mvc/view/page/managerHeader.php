<div class="header">
    <br>
    <!-- Register & Login -->
    <?php
    /** @var TYPE_NAME $isGuest */
    $isGuest = !isset($_SESSION['userEmail']);
    if ($isGuest) { ?>
        <div style="margin-right: 40px">
            <a href="<?= baseUrl() ?>user/login">
                <i class="txt-header-register">
                    <i class="fa fa-sign-in" style="margin-left:10px;"></i>ورود</i>
            </a>

            <i class="txt-header-register2">|</i>

            <a href="<?= baseUrl() ?>user/register" style="margin-left: 50px">
                <i class="txt-header-register">
                    <i class="fa fa-user-plus" style="margin-left:10px;"></i>ثبت نام</i>
            </a>
        </div>
    <?php } ?>

    <!-- Buy -->
    <?php if (!$isGuest) { ?>
        <span class="exit-btn">
            <a href="/MainProject/user/logout" style="color: #555;">
                <i class="fa fa-sign-out signout-btn"></i>خروج
            </a>
        </span>
    <?php } ?>

    <!-- Logo -->
    <img src="/MainProject/image/Logo_HomePage.png" id="imgLogo" alt="لگو صفحه">
</div>


<!-- Navigation Bar -->
<div class="navbar">
    <a href="<?= baseUrl() ?>page/productsManager" class="menu-item">
        <i class="fa fa-pinterest-p menu-icon"></i>مدیریت محصولات
    </a>

    <a href="<?= baseUrl() ?>page/................." class="menu-item">
        <i class="fa fa-user-circle menu-icon"></i>مدیریت کاربران
    </a>

    <a class="menu-item" href="<?= baseUrl() ?>productsman/myorders">
        <img src="<?= baseUrl() ?>image/EmptyProfile.png" class="profile-img" alt="پروفایل">
        <span style="font-size: medium;"><?= $_SESSION['userEmail'] ?></span>
        <span style="margin-right: 7px;">مدیرسایت</span>
    </a>
</div>
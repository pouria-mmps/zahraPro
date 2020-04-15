<div class="header">
    <br>

    <?php
    $db = Db::getInstance();
    if (isset($_SESSION['userEmail'])) {
        $userEmail = $_SESSION['userEmail'];
        $users = $db->first("SELECT * FROM user WHERE userEmail='$userEmail'");
    }
    ?>

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
        <?php if ($users['jenderId'] == 1) { ?>
            <img src="/MainProject/image/EmptyProfile.png" class="profile-img" alt="پروفایل">
            <span style="font-size: large;"> آقای </span>
            <span
                style="font-size: large;color: red;font-weight: bold;"><?= $users['userName'] ?> <?= $users['userFamilyName'] ?></span>
            <span style="font-size: large;"> خوش آمدید </span>
        <?php } else { ?>
            <img src="/MainProject/image/EmptyProfile.png" class="profile-img" alt="پروفایل">
            <span style="font-size: large;"> خانم </span>
            <span
                style="font-size: large;color: red;font-weight: bold;"><?= $users['userName'] ?> <?= $users['userFamilyName'] ?></span>
            <span style="font-size: large;"> خوش آمدید </span>
        <?php } ?>

        <span class="exit-btn">
            <a href="/MainProject/user/logout" style="color: #555;font-size: 17px; text-decoration: none;">
                <i class="fa fa-sign-out signout-btn" style="font-size: medium;"></i>خروج
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

    <?php if (isset($_SESSION['userEmail']) && $users['userAccess'] == 'user') { ?>
        <a href="<?= baseUrl() ?>productsman/myorders" class="menu-item">
            <i class="fa fa-file-text-o menu-icon"></i>
            <span style="font-size: 18px;">
                لیست سفارشات من
            </span>
        </a>

        <a href="<?= baseUrl() ?>productsman/editProfile" class="menu-item">
            <i class="fa fa-edit menu-icon"></i>
            <span style="font-size: 18px;">
                ویرایش اطلاعات
            </span>
        </a>

        <a href="<?= baseUrl() ?>productsman/ordersStatus" class="menu-item">
            <i class="fa fa-file-text-o menu-icon"></i>
            <span style="font-size: 18px;">
                وضیعیت سفارشات
            </span>
        </a>

    <?php } elseif (isset($_SESSION['userEmail']) && ($users['userAccess'] == 'admin' || $users['userAccess'] == 'user,admin')) { ?>
        <a href="<?= baseUrl() ?>productsman/myorders" class="menu-item">
            <i class="fa fa-file-text-o menu-icon"></i>
            <span style="font-size: 18px;">
                سفارشات من
            </span>
        </a>

        <a href="<?= baseUrl() ?>page/productsManager" class="menu-item">
            <i class="fa fa-adjust menu-icon"></i>
            <span style="font-size: 18px;">
                پنل مدیریت
            </span>
        </a>
    <?php } ?>
</div>


<script>
    $(function () {
        $("#cart-items").on('click', function () {
            $("#cartPreviewHolder").toggle();
        });
    });
</script>



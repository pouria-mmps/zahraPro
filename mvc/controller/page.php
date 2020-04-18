<?php

class PageController
{
    public function home()
    {
        $db = Db::getInstance();
        $products = $db->query("SELECT * FROM perfume");
        $data['perfumes'] = $products;

        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;


        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;


        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;


        View::render("./mvc/view/page/home.php", $data);
    }


    public function details()
    {
        $perfumeId = $_POST['perfumeId'];
        $db = Db::getInstance();
        $userId = getUserId();

        $managers = $db->first("SELECT * FROM user WHERE userId='$userId'");
        $data['managers'] = $managers;

        $perfumes = $db->query("SELECT * FROM perfume WHERE perfumeId='$perfumeId'");
        $data['perfumes'] = $perfumes;

        $showCounter = $db->first("SELECT showCounter FROM perfume WHERE perfumeId='$perfumeId'");

        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;


        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;


        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;

        if ($showCounter['showCounter'] != 100) {
            $db->modify("UPDATE perfume SET showCounter=showCounter+1 WHERE perfumeId='$perfumeId'");
        }

        View::render("./mvc/view/page/details.php", $data);
    }


    public function callUs()
    {
        View::render("./mvc/view/page/callUs.php");
    }


    public function aboutUs()
    {
        View::render("./mvc/view/page/aboutUs.php");
    }


    public function manager()
    {
        View::render("./mvc/view/page/manager.php");
    }


    public function productsManager()
    {
        $db = Db::getInstance();

        $products = $db->query("SELECT * FROM perfume LEFT OUTER JOIN brand ON perfume.brandId=brand.brandId LEFT OUTER JOIN jender ON perfume.jenderId=jender.jenderId LEFT OUTER JOIN country ON perfume.countryId=country.countryId");
        $data['products'] = $products;

        View::render("./mvc/view/page/productsManager.php", $data);
    }


    public function updateProduct()
    {
        $perfumeId = $_POST['perfumeId'];

        $db = Db::getInstance();
        $perfumes = $db->query("SELECT * FROM perfume LEFT OUTER JOIN perfume_density ON perfume.densityId=perfume_density.densityId LEFT OUTER JOIN brand ON perfume.brandId=brand.brandId LEFT OUTER JOIN jender ON perfume.jenderId=jender.jenderId LEFT OUTER JOIN country ON perfume.countryId=country.countryId WHERE perfumeId='$perfumeId'");
        $data['perfumes'] = $perfumes;

        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;

        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;

        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;

        $countrys = $db->query("SELECT * FROM country");
        $data['countrys'] = $countrys;

        View::render("./mvc/view/page/updateProduct.php", $data);
    }


    public function updateProductChecking()
    {
        $perfumeId = $_POST['perfumeId'];
        $perfumeName = $_POST['perfumeName'];
        $densityId = $_POST['densityId'];
        $jenderId = $_POST['jenderId'];
        $brandId = $_POST['brandId'];
        $typeSmell = $_POST['typeSmell'];
        $structrueSmell = $_POST['structrueSmell'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $perfumeCounter = $_POST['perfumeCounter'];
        $countryId = $_POST['countryId'];
        $breif = $_POST['breif'];
        $discription = $_POST['discription'];

        $record = UserModel::fetch_Duplicate_Perfume($perfumeId, $perfumeName, $densityId, $jenderId, $brandId, $typeSmell, $structrueSmell, $discount, $price, $perfumeCounter, $countryId, $breif, $discription);

        $db = Db::getInstance();
        $db->modify("UPDATE perfume 
                           SET perfumeName=:perfumeName, densityId=:densityId, jenderId=:jenderId, brandId=:brandId, typeSmell=:typeSmell, structrueSmell=:structrueSmell, discount=:discount, price=:price, perfumeCounter=:perfumeCounter, breif=:breif, discription=:discription WHERE perfumeId='$perfumeId'", array(
            'perfumeName' => $perfumeName,
            'densityId' => $densityId,
            'jenderId' => $jenderId,
            'brandId' => $brandId,
            'typeSmell' => $typeSmell,
            'structrueSmell' => $structrueSmell,
            'discount' => $discount,
            'price' => $price,
            'perfumeCounter' => $perfumeCounter,
            'countryId' => $countryId,
            'breif' => $breif,
            'discription' => $discription,
        ));

        require_once("./mvc/view/page/managerHeader.php");
        message('success', " ویرایش عطر با موفقیت انجام شد. " . '<br><br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/productsManager"> کلیک </a>' . 'کنید.', true);
    }


    public function insertProduct()
    {
        $db = Db::getInstance();

        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;

        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;

        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;

        $countrys = $db->query("SELECT * FROM country");
        $data['countrys'] = $countrys;

        View::render("./mvc/view/page/insertProduct.php", $data);
    }


    public function insertProductChecking()
    {
        $perfumeId = null;
        $perfumeName = $_POST['perfumeName'];
        $densityId = $_POST['densityId'];
        $jenderId = $_POST['jenderId'];
        $brandId = $_POST['brandId'];
        $typeSmell = $_POST['typeSmell'];
        $structrueSmell = $_POST['structrueSmell'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $countryId = $_POST['countryId'];
        $deleteLogic = 1;
        $breif = $_POST['breif'];
        $discription = $_POST['discription'];

        $record = UserModel::fetch_Duplicate_Perfume($perfumeId, $perfumeName, $densityId, $jenderId, $brandId, $typeSmell, $structrueSmell, $discount, $price, $countryId, $breif, $discription);

        $db = Db::getInstance();
        $db->insert("INSERT INTO perfume (perfumeName,densityId,jenderId,brandId,typeSmell,structrueSmell,discount,price,countryId,deleteLogic,breif,discription)
            VALUES ('$perfumeName','$densityId','$jenderId','$brandId','$typeSmell','$structrueSmell','$discount','$price','$countryId','$deleteLogic','$breif','$discription')"
        );
    }


    public function activeOrdeactive()
    {
        $perfumeId = $_POST['perfumeId'];
        $data['hasButton'] = $_POST['hasButton'];

        $db = Db::getInstance();
        $perfumes = $db->query("SELECT * FROM perfume LEFT OUTER JOIN perfume_density ON perfume.densityId=perfume_density.densityId LEFT OUTER JOIN brand ON perfume.brandId=brand.brandId LEFT OUTER JOIN jender ON perfume.jenderId=jender.jenderId LEFT OUTER JOIN country ON perfume.countryId=country.countryId WHERE perfumeId='$perfumeId'");
        $data['perfumes'] = $perfumes;

        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;

        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;

        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;

        $countrys = $db->query("SELECT * FROM country");
        $data['countrys'] = $countrys;
        View::render("./mvc/view/page/activeOrdeactive.php", $data);
    }


    public function activeProduct()
    {
        $perfumeId = $_POST['perfumeId'];

        $db = Db::getInstance();
        $db->modify("UPDATE perfume SET deleteLogic=1 WHERE perfumeId='$perfumeId'");

        require_once("./mvc/view/page/managerHeader.php");
        message('success', " عطر مورد نظر فعال شد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/productsManager"> کلیک </a>' . 'کنید.', true);
    }


    public function deleteLP()
    {
        $perfumeId = $_POST['perfumeId'];

        $db = Db::getInstance();
        $db->modify("UPDATE perfume SET deleteLogic=2 WHERE perfumeId='$perfumeId'");

        require_once("./mvc/view/page/managerHeader.php");

        message('success', " عطر مورد نظر غیرفعال شد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/productsManager"> کلیک </a>' . 'کنید.', true);
    }


    public function usersManager()
    {
        $db = Db::getInstance();
        $users = $db->query("SELECT * FROM user LEFT OUTER JOIN jender ON user.jenderId=jender.jenderId LEFT OUTER JOIN user_access ON user.accessId=user_access.accessId ");
        $data['users'] = $users;

        View::render("./mvc/view/page/usersManager.php", $data);
    }


    public function activeUser()
    {
        $userId = $_POST['userId'];

        $db = Db::getInstance();
        $db->modify("UPDATE user SET blockId=1 WHERE userId='$userId'");

        require_once("./mvc/view/page/managerHeader.php");

        message('success', " کاربر مورد نظر فعال شد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/usersManager"> کلیک </a>' . 'کنید.', true);

    }


    public function deactiveUser()
    {
        $userId = $_POST['userId'];

        $db = Db::getInstance();
        $db->modify("UPDATE user SET blockId=2 WHERE userId='$userId'");

        require_once("./mvc/view/page/managerHeader.php");

        message('success', " کاربر مورد نظر غیرفعال شد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/usersManager"> کلیک </a>' . 'کنید.', true);
    }


    public function resetUserPass()
    {
        $userId = $_POST['userId'];

        $db = Db::getInstance();
        $userPassword = 1234;

        $hashedPassword = md5($userPassword);
        $db->modify("UPDATE user SET userPassword='$hashedPassword' WHERE userId='$userId'");

        require_once("./mvc/view/page/managerHeader.php");
        message('success', "گذرواژه کاربر به حالت پیش فرض تغییر کرد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/usersManager"> کلیک </a>' . 'کنید.', true);
    }


    public function updateUser()
    {
        $db = Db::getInstance();
        $userId = $_POST['userId'];

        $accessId = $db->first("SELECT * FROM user WHERE userId='$userId'");

        if ($accessId['accessId'] == 1) {
            $db->modify("UPDATE user SET accessId='2' WHERE userId='$userId'");

            require_once("./mvc/view/page/managerHeader.php");
            message('success', "سطح دسترسی به کاربر تغییر یافت." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/usersManager"> کلیک </a>' . 'کنید.', true);
        } elseif ($accessId['accessId'] == 2) {
            $db->modify("UPDATE user SET accessId='1' WHERE userId='$userId'");

            require_once("./mvc/view/page/managerHeader.php");
            message('success', "سطح دسترسی به مدیر سایت تغییر یافت." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/usersManager"> کلیک </a>' . 'کنید.', true);
        }
    }


    public function ordersManager()
    {
        $db = Db::getInstance();

        $orders = $db->query("SELECT * FROM cart LEFT OUTER JOIN user ON cart.userId=user.userId");
        $data['orders'] = $orders;

        $cartStatuses = $db->query("SELECT * FROM cart_status");
        $data['cartStatuses'] = $cartStatuses;

        View::render("./mvc/view/page/ordersManager.php", $data);
    }


    public function showOrdersManager()
    {
        $db = Db::getInstance();
        $cartId = $_POST['cartId'];

        $orders = $db->query("SELECT * FROM pym_order 
                                    LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId='$cartId'");
        $data['orders'] = $orders;

        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;


        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;

        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;

        View::render("./mvc/view/page/showOrdersManager.php", $data);
    }
}

<?php

class PageController
{
    public function home()
    {
        $db = Db::getInstance();
        $products = $db->query("SELECT * FROM perfume");
        $data['perfumes'] = $products;
        View::render("./mvc/view/page/home.php", $data);
    }


    public function details()
    {
        $perfumeId = $_POST['perfumeId'];

        $db = Db::getInstance();
        $perfumes = $db->query("SELECT * FROM perfume WHERE perfumeId='$perfumeId'");
        $data['perfumes'] = $perfumes;
        View::render("./mvc/view/page/details.php", $data);
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
        $countryId = $_POST['countryId'];
        $breif = $_POST['breif'];
        $discription = $_POST['discription'];

        $record = UserModel::fetch_Duplicate_Perfume($perfumeId, $perfumeName, $densityId, $jenderId, $brandId, $typeSmell, $structrueSmell, $discount, $price, $countryId, $breif, $discription);

        $db = Db::getInstance();
        $db->modify("UPDATE perfume 
                           SET perfumeName=:perfumeName, densityId=:densityId, jenderId=:jenderId, brandId=:brandId, typeSmell=:typeSmell, structrueSmell=:structrueSmell, discount=:discount, price=:price, breif=:breif, discription=:discription WHERE perfumeId='$perfumeId'", array(
            'perfumeName' => $perfumeName,
            'densityId' => $densityId,
            'jenderId' => $jenderId,
            'brandId' => $brandId,
            'typeSmell' => $typeSmell,
            'structrueSmell' => $structrueSmell,
            'discount' => $discount,
            'price' => $price,
            'countryId' => $countryId,
            'breif' => $breif,
            'discription' => $discription,
        ));

        message('success', " ویرایش عطر با موفقیت انجام شد. " . '<br><br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/productsManager"> کلیک </a>' . 'کنید', true);
    }


    public function deleteLogicProduct()
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
        View::render("./mvc/view/page/deleteLogicProduct.php", $data);
    }


    public function deleteLP()
    {
        $perfumeId = $_POST['perfumeId'];

        $db = Db::getInstance();
        $db->modify("UPDATE perfume SET deleteLogic=2 WHERE perfumeId='$perfumeId'");
        message('success', "حذف انجام شد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/page/productsManager"> کلیک </a>' . 'کنید', true);
    }
}

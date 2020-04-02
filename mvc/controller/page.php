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

        View::render("./mvc/view/page/updateProduct.php", $data);
    }


    public function updateProductChecking()
    {
        //$this->checkingDuplicatePerfume();

        $perfumeId = $_POST['perfumeId'];
        $perfumeName = $_POST['perfumeName'];
        $densityTitle = $_POST['densityTitle'];
        $jenderType = $_POST['jenderType'];
        $brandName = $_POST['brandName'];
        $typeSmell = $_POST['typeSmell'];
        $structrueSmell = $_POST['structrueSmell'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $countryName = $_POST['countryName'];
        $breif = $_POST['breif'];
        $discription = $_POST['discription'];

        $record = UserModel::fetch_Duplicate_Perfume($perfumeName, $densityTitle, $jenderType, $brandName, $typeSmell, $structrueSmell, $discount, $price, $countryName, $breif, $discription);

        if ($record != null) {
            message('fail', " عطر موردنظر قبلا ثبت شده است. ", true);
        }

        $db = Db::getInstance();
        $db->modify("UPDATE perfume 
                           LEFT OUTER JOIN jender ON perfume.jenderId = jender.jenderId 
                           LEFT OUTER JOIN perfume_density ON perfume.densityId = perfume_density.densityId 
                           SET perfumeName=:perfumeName, densityTitle=:densityTitle, jenderType=:jenderType, typeSmell=:typeSmell, structrueSmell=:structrueSmell, discount=:discount, price=:price, breif=:breif, discription=:discription WHERE perfumeId=$perfumeId", array(
            'perfumeName' => $perfumeName,
            'jenderType' => $jenderType,
            'typeSmell' => $typeSmell,
            'structrueSmell' => $structrueSmell,
            'discount' => $discount,
            'price' => $price,
            'breif' => $breif,
            'discription' => $discription,
        ));

        message('success', " ویرایش عطر با موفقیت انجام شد. ", true);


    }


    public function checkingDuplicatePerfume()
    {
        $perfumeName = $_POST['perfumeName'];
        $densityTitle = $_POST['densityTitle'];
        $jenderType = $_POST['jenderType'];
        $brandName = $_POST['brandName'];
        $typeSmell = $_POST['typeSmell'];
        $structrueSmell = $_POST['structrueSmell'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $countryName = $_POST['countryName'];
        $breif = $_POST['breif'];
        $discription = $_POST['discription'];

        $record = UserModel::fetch_Duplicate_Perfume($perfumeName, $densityTitle, $jenderType, $brandName);

        if ($record != null) {
            message('fail', " عطر موردنظر قبلا ثبت شده است. ", true);
        }
    }


    public function updateProductCrudForm()
    {

    }


    public function deleteLogicProduct()
    {
        View::render("./mvc/view/page/deleteLogicProduct.php");
    }

}
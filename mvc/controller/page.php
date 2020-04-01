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


    public function productsCrud()
    {
        $db = Db::getInstance();
        $products = $db->query("SELECT * FROM perfume LEFT OUTER JOIN brand ON perfume.brandId=brand.brandId LEFT OUTER JOIN jender ON perfume.jenderId=jender.jenderId LEFT OUTER JOIN country ON perfume.countryId=country.countryId");
        $data['products'] = $products;

        View::render("./mvc/view/page/productsCrud.php", $data);
    }


    public function updateCrud()
    {
        $perfumeId = $_POST['perfumeId'];

        $db = Db::getInstance();
        $perfumes = $db->query("SELECT * FROM perfume LEFT OUTER JOIN perfume_density ON perfume.densityId=perfume_density.densityId LEFT OUTER JOIN brand ON perfume.brandId=brand.brandId LEFT OUTER JOIN jender ON perfume.jenderId=jender.jenderId LEFT OUTER JOIN country ON perfume.countryId=country.countryId WHERE perfumeId='$perfumeId'");
        $data['perfumes'] = $perfumes;

        View::render("./mvc/view/page/updateCrud.php", $data);
    }


    public function checkProductCrud()
    {
    }


    public function deleteCrud()
    {
        View::render("./mvc/view/page/deleteCrud.php");
    }

}
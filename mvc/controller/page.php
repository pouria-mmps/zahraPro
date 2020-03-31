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
        $products = $db->query("SELECT * FROM perfume");
        $data['products'] = $products;

        View::render("./mvc/view/page/productsCrud.php", $data);
    }
}
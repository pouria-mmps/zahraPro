<?php

class ProductsmanController
{
    public function productsman()
    {
        View::render("./mvc/view/page/productmale.php");
    }


    public function getaddress()
    {
        $db = Db::getInstance();
        $cart = $this->getLatestCardOrCreate();

        $orders = $db->query("SELECT perfumeName,perfumeCounter,quantity FROM pym_order LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        foreach ($orders as $order) {
            if ($order['perfumeCounter'] >= $order['quantity']) {
                $flag = 1;
            } else {
                $flag = 0;
                $names = $order['perfumeName'];
                $quantity = $order['perfumeCounter'];
            }
        }

        if ($flag == 1) {
            $addresses = $db->query("SELECT * FROM address");
            $data['addresses'] = $addresses;
            View::render("./mvc/view/page/getaddress.php", $data);
        } else {
            message('fail', $quantity . ' عدد از عطر ' . $names . ' باقی مانده است. ' . '<br><br>' . 'برای ویرایش مجدد لطفا ' . '<a href="/MainProject/productsman/myorders"> کلیک </a>' . 'کنید.', true);
        }
    }


    public function insertAddress()
    {
        View::render("./mvc/view/page/insertAddress.php");
    }


    public function addAddressToTable()
    {
        $db = Db::getInstance();

        $userId = $_POST['userId'];
        $tranName = $_POST['tranName'];
        $tranLName = $_POST['tranLName'];
        $tranTell = $_POST['tranTell'];
        $tranPhone = $_POST['tranPhone'];
        $tranAddress = $_POST['tranAddress'];
        $tranPCode = $_POST['tranPCode'];
        $deleteLogic = 1;
        UserModel::insert2($userId, $tranName, $tranLName, $tranTell, $tranPhone, $tranAddress, $tranPCode, $deleteLogic);
        message('success', " افزودن آدرس با موفقیت انجام شد. " . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/productsman/getaddress"> کلیک </a>' . 'کنید.', true);
    }


    public function deleteAddress()
    {
        $db = Db::getInstance();
        $addressId = $_POST['addressId'];

        $db->modify("UPDATE address SET deleteLogic=2 WHERE addressId='$addressId'");

        message('success', "حذف آدرس انجام شد." . '<br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/productsman/getaddress"> کلیک </a>' . 'کنید.', true);
    }


    public function updateAddress()
    {
        $addressId = $_POST['addressId'];

        $db = Db::getInstance();
        $addresses = $db->query("SELECT * FROM address WHERE addressId='$addressId'");
        $data['addresses'] = $addresses;

        View::render("./mvc/view/page/updateAddress.php", $data);
    }


    public function updateAddressChecking()
    {
        $addressId = $_POST['addressId'];
        $tranName = $_POST['tranName'];
        $tranLName = $_POST['tranLName'];
        $tranTell = $_POST['tranTell'];
        $tranPhone = $_POST['tranPhone'];
        $tranAddress = $_POST['tranAddress'];
        $tranPCode = $_POST['tranPCode'];

        $record = UserModel::fetch_Duplicate_Address($addressId, $tranName, $tranLName, $tranTell, $tranPhone, $tranAddress, $tranPCode);

        $db = Db::getInstance();
        $db->modify("UPDATE address 
                           SET tranName=:tranName, tranLName=:tranLName, tranTell=:tranTell, tranPhone=:tranPhone, tranAddress=:tranAddress, tranPCode=:tranPCode WHERE addressId='$addressId'", array(
            'tranName' => $tranName,
            'tranLName' => $tranLName,
            'tranTell' => $tranTell,
            'tranPhone' => $tranPhone,
            'tranAddress' => $tranAddress,
            'tranPCode' => $tranPCode,
        ));

        message('success', " ویرایش آدرس با موفقیت انجام شد. " . '<br><br><br>' . 'برای ادامه لطفا ' . '<a href="/MainProject/productsman/getaddress"> کلیک </a>' . 'کنید.', true);
    }


    public function factor()
    {
        $cart = $this->getLatestCardOrCreate();

        $addressId = $_POST['addressId'];
        $userId = $_SESSION['userId'];
        $db = Db::getInstance();

        $addresses = $db->query("SELECT * FROM address WHERE addressId='$addressId' AND userId='$userId'");
        $data['addresses'] = $addresses;


        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));
        $data['orders'] = $orders;


        $orders = $db->modify("UPDATE cart SET addressId=$addressId WHERE cart.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));


        $densitys = $db->query("SELECT * FROM perfume_density");
        $data['densitys'] = $densitys;


        $genders = $db->query("SELECT * FROM jender");
        $data['genders'] = $genders;

        $brands = $db->query("SELECT * FROM brand");
        $data['brands'] = $brands;

        View::render("./mvc/view/page/factor.php", $data);
    }


    public function bankPortal()
    {
        $totalPrice = 0;
        $db = Db::getInstance();
        $cart = $this->getLatestCardOrCreate();

        $orders = $db->query("SELECT price,discount,feeAmount,orderId,quantity,perfumeCounter FROM pym_order 
                                    LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        foreach ($orders as $order) {
            $perfumePriceWithDiscount = $order['price'] - ($order['price'] * $order['discount'] / 100);
            $totalPrice += $order['quantity'] * $perfumePriceWithDiscount;
            $orderId = $order['orderId'];

            $db->modify("UPDATE perfume LEFT OUTER JOIN pym_order ON perfume.perfumeId=pym_order.perfumeId
                                SET perfumeCounter=:perfumeCounter WHERE cartId=:cartId", array(
                'cartId' => $cart['cartId'],
                'perfumeCounter' => $order['perfumeCounter'] - 1,
            ));

            if ($order['feeAmount'] != $perfumePriceWithDiscount) {
                $db->modify("UPDATE pym_order SET pym_order.feeAmount='$perfumePriceWithDiscount' WHERE pym_order.orderId='$orderId'");
            } else {
                $flag = 0;
            }
        }

        $db->modify("UPDATE cart SET paymentPrice='$totalPrice' WHERE cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        $db->modify("UPDATE cart SET payed=1 WHERE cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        $trand = $db->first("SELECT tranName,tranLName,tranPhone FROM cart LEFT OUTER JOIN address ON cart.addressId=address.addressId WHERE cart.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));
        $data['trand'] = $trand;
        $name = $trand['tranName'];
        $lname = $trand['tranLName'];
        $phone = $trand['tranPhone'];

        //https://idpay.ir/pouria-mmps?amount=10000&name=%D9%85%D8%AD%D9%85%D8%AF&phone=09121234569&desc=%D8%AA%D8%AC%D9%87%DB%8C%D8%B2%D8%A7%D8%AA
        header('Location:https://idpay.ir/pouria-mmps?amount=' . $totalPrice . '&name=' . $name . " " . $lname . '&phone=' . $phone . '&desc=خرید عطر از فروشگاه اینترنتی عطرشاپ');

    }


    public function myorders()
    {
        $db = Db::getInstance();
        $cart = $this->getLatestCardOrCreate();

        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        $data['orders'] = $orders;
        View::render("./mvc/view/page/myorders.php", $data);
    }


    public function getLatestCardOrCreate()
    {
        $db = Db::getInstance();

        $userId = getUserId();
        $sessionId = session_id();

        $lastestCart = $this->findLatestCart();
        if ($lastestCart != null) {
            return $lastestCart;
        }

        $db->insert("INSERT INTO cart (userId, sessionId, payed) VALUES (:userId, :sessionId, 0)", array(
            'userId' => $userId,
            'sessionId' => $sessionId,
        ));

        $lastestCart = $this->findLatestCart();
        return $lastestCart;
    }


    private function findLatestCart()
    {
        $db = Db::getInstance();

        $userId = getUserId();
        $sessionId = session_id();

        $lastestCart = null;

        if ($userId != 0) {
            $lastestCart = $db->first("SELECT * FROM cart WHERE payed!=1 AND userId=:userId", array(
                'userId' => $userId,
            ));
        }

        if ($lastestCart != null) {
            $db->modify("UPDATE cart SET sessionId=:sessionId WHERE cartId=:cartId", array(
                'sessionId' => $sessionId,
                'cartId' => $lastestCart['cartId'],
            ));

            return $lastestCart;
        }

        if ($lastestCart == null) {
            $lastestCart = $db->first("SELECT * FROM cart WHERE payed!=1 AND sessionId=:sessionId", array(
                'sessionId' => $sessionId,
            ));
            if ($userId != 0) {
                $db->modify("UPDATE cart SET userId=:userId WHERE cartId=:cartId", array(
                    'userId' => $userId,
                    'cartId' => $lastestCart['cartId'],
                ));
            }
        }

        if ($lastestCart != null) {
            return $lastestCart;
        }

        return null;
    }


    public function search()
    {
        $sortType = $_POST['sortType'];
        $keyword = $_POST['keyword'];
        $viewType = $_POST['viewType'];

        $db = Db::getInstance();
        $perfumes = $db->query("SELECT * FROM perfume WHERE perfumeName LIKE '%$keyword%' ORDER BY $sortType");
        $data['perfumes'] = $perfumes;

        if ($viewType == 'grid') {
            $_SESSION['viewType'] = 'grid';
            View::render("./mvc/view/payment/productsman-grid.php", $data);
        } else {
            $_SESSION['viewType'] = 'linear';
            View::render("./mvc/view/payment/productsman-linear.php", $data);
        }
    }


    public function previewCart()
    {
        $db = Db::getInstance();
        $cart = $this->getLatestCardOrCreate();

        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        $data['orders'] = $orders;
        View::render("./mvc/view/payment/cart-preview.php", $data);
    }


    public function removeFromCart($orderId)
    {
        $db = Db::getInstance();
        $cart = $this->getLatestCardOrCreate();

        $db->insert("DELETE FROM pym_order WHERE orderId=:orderId", array(
            'orderId' => $orderId,
        ));

        $this->refreshCartPreview($cart);
    }


    public function refreshCartPreview($cart = null)
    {
        $db = Db::getInstance();

        if ($cart == null) {
            $cart = $this->getLatestCardOrCreate();
        }
        $orders = $db->query("SELECT * FROM pym_order LEFT OUTER JOIN perfume ON pym_order.perfumeId=perfume.perfumeId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ));

        if ($orders == null) {
            $orders = array();
        }
        $previewData['orders'] = $orders;

        ob_start();
        View::render("./mvc/view/payment/cart-preview.php", $previewData);
        $cartPreview = ob_get_clean();

        $data['cartPreview'] = $cartPreview;

        $itemCounts = $db->first("SELECT COUNT(pym_order.orderId) AS total FROM pym_order LEFT OUTER JOIN cart ON pym_order.cartId=cart.cartId WHERE pym_order.cartId=:cartId", array(
            'cartId' => $cart['cartId'],
        ), 'total');
        if ($itemCounts == null) {
            $itemCounts = 0;
        }
        $data['cartItemsCount'] = $itemCounts;

        echo json_encode($data);
    }


    public function addToCart($perfumeId)
    {
        $db = Db::getInstance();
        $cart = $this->getLatestCardOrCreate();
        $perfume = $db->first("SELECT price,discount FROM perfume WHERE perfumeId='$perfumeId'");
        $perfumePriceWithDiscount = $perfume['price'] - ($perfume['price'] * $perfume['discount'] / 100);


        $foundOrder = $db->first("SELECT * FROM pym_order WHERE perfumeId=:perfumeId AND cartId=:cartId", array(
            'perfumeId' => $perfumeId,
            'cartId' => $cart['cartId'],
        ));

        if ($foundOrder != null) {
            $db->modify("UPDATE pym_order SET quantity=:quantity WHERE orderId=:orderId", array(
                'orderId' => $foundOrder['orderId'],
                'quantity' => $foundOrder['quantity'] + 1,
            ));
        } else {
            $db->insert("INSERT INTO pym_order (perfumeId, quantity, cartId, feeAmount) VALUES (:perfumeId, :quantity, :cartId, :feeAmount)", array(
                'perfumeId' => $perfumeId,
                'quantity' => 1,
                'cartId' => $cart['cartId'],
                'feeAmount' => $perfumePriceWithDiscount,
            ));
        }

        $this->refreshCartPreview($cart);
    }
}
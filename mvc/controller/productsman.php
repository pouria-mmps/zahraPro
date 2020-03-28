<?php

class ProductsmanController
{
    public function productsman()
    {
        View::render("./mvc/view/page/productmale.php");
    }



    public function address()
    {
        $db = Db::getInstance();
        $users = $db->query("SELECT * FROM user");
        $data['users'] = $users;
        View::render("./mvc/view/page/address.php", $data);
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
            $db->insert("INSERT INTO pym_order (perfumeId, quantity, cartId) VALUES (:perfumeId, :quantity, :cartId)", array(
                'perfumeId' => $perfumeId,
                'quantity' => 1,
                'cartId' => $cart['cartId'],
            ));
        }

        $this->refreshCartPreview($cart);
    }
}
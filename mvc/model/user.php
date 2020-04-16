<?php

class UserModel
{
    public static function insert($userName, $userFamilyName, $jenderId, $userTell, $userMobile, $userEmail, $userPassword)
    {
        $db = Db::getInstance();
        $db->insert("INSERT INTO user (userName,userFamilyName,jenderId,accessId,userTell,userMobile,userEmail,userPassword)
            VALUES ('$userName','$userFamilyName','$jenderId','2','$userTell','$userMobile','$userEmail','$userPassword')"
        );
    }

    public static function fetch_by_email($userEmail)
    {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM user WHERE userEmail='$userEmail'");
        return $record;
    }

    public static function fetch_Duplicate_Perfume($perfumeId, $perfumeName, $densityId, $jenderId, $brandId, $typeSmell, $structrueSmell, $discount, $price, $perfumeCounter, $countryId, $breif, $discription)
    {
        $db = Db::getInstance();

        $record = $db->first("SELECT perfumeId FROM perfume WHERE perfumeName='$perfumeName' AND densityId='$densityId' AND jenderId='$jenderId' AND brandId='$brandId' AND typeSmell='$typeSmell' AND structrueSmell='$structrueSmell' AND discount='$discount' AND price='$price' AND perfumeCounter='$perfumeCounter' AND countryId='$countryId' AND breif='$breif' AND discription='$discription'");
        if ($record != null && (null == $perfumeId || $record != $perfumeId)) {
            require_once("./mvc/view/page/header.php");
            message('fail', " عطر موردنظر قبلا ثبت شده است. " . '<br><br><br>' . 'برای ویرایش مجدد لطفا ' . '<a href="/MainProject/page/updateProduct"> کلیک </a>' . 'کنید.', true);
        }
    }

    public static function insert2($userId, $tranName, $tranLName, $tranTell, $tranPhone, $tranAddress, $tranPCode, $deleteLogic)
    {
        $db = Db::getInstance();
        $db->insert("INSERT INTO address (userId,tranName,tranLName,tranTell,tranPhone,tranAddress,tranPCode,deleteLogic)
            VALUES ('$userId','$tranName','$tranLName','$tranTell','$tranPhone','$tranAddress','$tranPCode','$deleteLogic')"
        );
    }

    public static function fetch_Duplicate_Address($addressId, $tranName, $tranLName, $tranTell, $tranPhone, $tranAddress, $tranPCode)
    {
        $db = Db::getInstance();

        $record = $db->first("SELECT addressId FROM address WHERE tranName='$tranName' AND tranLName='$tranLName' AND tranTell='$tranTell' AND tranPhone='$tranPhone' AND tranAddress='$tranAddress' AND tranPCode='$tranPCode'");
        if ($record != null && (null == $addressId || $record != $addressId)) {
            require_once("./mvc/view/page/header.php");
            message('fail', " آدرس موردنظر قبلا ثبت شده است. " . '<br><br><br>' . 'برای ویرایش مجدد لطفا ' . '<a href="/MainProject/productsman/updateAddress"> کلیک </a>' . 'کنید.', true);
        }
    }

    public static function update($userEmail, $userName, $userFamilyName, $jenderId, $userTell, $userMobile)
    {
        $db = Db::getInstance();
        $db->modify("UPDATE user 
                           SET userName=:userName, userFamilyName=:userFamilyName, jenderId=:jenderId, userTell=:userTell, userMobile=:userMobile WHERE userEmail='$userEmail'", array(
            'userName' => $userName,
            'userFamilyName' => $userFamilyName,
            'jenderId' => $jenderId,
            'userTell' => $userTell,
            'userMobile' => $userMobile,
        ));
    }

    public static function updatePass($userEmail, $userPassword)
    {
        $db = Db::getInstance();
        $db->modify("UPDATE user 
                           SET userPassword=:userPassword WHERE userEmail='$userEmail'", array(
            'userPassword' => $userPassword,
        ));
    }
}
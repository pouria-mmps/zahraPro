<?php

class UserModel
{
    public static function insert($userName, $userFamilyName, $userGender, $userTell, $userMobile, $userEmail, $userPassword, $userAddress)
    {
        $db = Db::getInstance();
        $db->insert("INSERT INTO user (userName,userFamilyName,userGender,userAccess,userTell,userMobile,userEmail,userPassword,userAddress)
            VALUES ('$userName','$userFamilyName','$userGender','user','$userTell','$userMobile','$userEmail','$userPassword','$userAddress')"
        );
    }

    public static function fetch_by_email($userEmail)
    {
        $db = Db::getInstance();
        $record = $db->first("SELECT * FROM user WHERE userEmail='$userEmail'");
        return $record;
    }

    public static function fetch_Duplicate_Perfume($perfumeId, $perfumeName, $densityId, $jenderId, $brandId, $typeSmell, $structrueSmell, $discount, $price, $countryId, $breif, $discription)
    {
        $db = Db::getInstance();

        $record = $db->first("SELECT perfumeId FROM perfume WHERE perfumeName='$perfumeName' AND densityId='$densityId' AND jenderId='$jenderId' AND brandId='$brandId' AND typeSmell='$typeSmell' AND structrueSmell='$structrueSmell' AND discount='$discount' AND price='$price' AND countryId='$countryId' AND breif='$breif' AND discription='$discription'");
        if ($record != null && (null == $perfumeId || $record != $perfumeId)) {
            message('fail', " عطر موردنظر قبلا ثبت شده است. " . '<br><br><br>' . 'برای ویرایش مجدد لطفا ' . '<a href="/MainProject/page/updateProduct"> کلیک </a>' . 'کنید', true);
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
            message('fail', " آدرس موردنظر قبلا ثبت شده است. " . '<br><br><br>' . 'برای ویرایش مجدد لطفا ' . '<a href="/MainProject/productsman/updateAddress"> کلیک </a>' . 'کنید', true);
        }
    }
}
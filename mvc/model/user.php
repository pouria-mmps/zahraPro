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
}
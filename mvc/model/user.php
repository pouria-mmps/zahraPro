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

    public static function insert2($tranName, $tranLName, $tranTell, $tranPhone, $tranAddress, $tranPostCode, $userEmail)
    {
        $db = Db::getInstance();
        $db->insert("INSERT INTO factor (tranName,tranLName,tranTell,tranPhone,tranAddress,tranPostCode,userEmail)
            VALUES ('$tranName','$tranLName','$tranTell','$tranPhone','$tranAddress','$tranPostCode','$userEmail')"
        );
    }
}
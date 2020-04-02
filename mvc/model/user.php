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

    public static function fetch_Duplicate_Perfume($perfumeName, $densityTitle, $jenderType, $brandName, $typeSmell, $structrueSmell, $discount, $price, $countryName, $breif, $discription)
    {
        $db = Db::getInstance();

        $record = $db->first("SELECT * FROM perfume
                                    LEFT OUTER JOIN perfume_density ON perfume.densityId = perfume_density.densityId
                                    LEFT OUTER JOIN jender ON perfume.jenderId = jender.jenderId
                                    LEFT OUTER JOIN brand ON perfume.brandId = brand.brandId
                                    LEFT OUTER JOIN country ON perfume.countryId = country.countryId WHERE perfumeName='$perfumeName' AND densityTitle='$densityTitle' AND jenderType='$jenderType' AND brandName='$brandName' AND typeSmell='$typeSmell' AND structrueSmell='$structrueSmell' AND discount='$discount' AND price='$price' AND countryName='$countryName' AND breif='$breif' AND discription='$discription'");
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
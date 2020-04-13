<?php

class UserController
{
    public function __construct()
    {
    }


    public function logout()
    {
        session_destroy();
        header("Location:/MainProject/user/login");

        session_start();
        session_regenerate_id();

        initializeSettings();
    }


    public function login()
    {
        if (isset($_POST['userEmail'])) {
            $this->LoginCheck();
        } else {
            $this->LoginForm();
        }
    }


    private function LoginCheck()
    {
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        require_once("./mvc/view/page/header.php");

        $record = UserModel::fetch_by_email($userEmail);
        if ($userPassword == null || $userEmail == null) {
            message('fail', "نام کاربری یا گذرواژه خود را وارد نکرده اید" . '<br><br>' . ' برای تلاش مجدد لطفا ' . '<a href="/MainProject/user/login"> کلیک </a>' . 'کنید.', true);
        }

        if ($record == null) {
            message('fail', "نام کاربری یا گذرواژه نادرست است" . '<br><br>' . ' برای تلاش مجدد لطفا ' . '<a href="/MainProject/user/login"> کلیک </a>' . 'کنید.', true);
        } else {
            $hashedPassword = md5($userPassword);
            if ($hashedPassword == $record['userPassword']) {
                $_SESSION['userEmail'] = $record['userEmail'];
                $_SESSION['userId'] = $record['userId'];
                $_SESSION['userAccess'] = $record['userAccess'];
                message('success', "شما با موفقیت وارد شده اید. جهت ورود به صفحه اصلی " . '<a href="/MainProject/page/home"> کلیک </a>' . 'کنید.', true);
            } else {
                message('fail', "گذرواژه شما نادرست است", true);
            }
        }
        return;
    }


    private function LoginForm()
    {
        $data['test'] = array();
        View::render("./mvc/view/user/login.php", $data);
    }


    public function register()
    {
        if (isset($_POST['userEmail'])) {
            $this->registerCheck();
        } else {
            $this->registerForm();
        }
    }


    private function registerCheck()
    {
        $userName = $_POST['userName'];
        $userFamilyName = $_POST['userFamilyName'];
        $userGender = $_POST['userGender'];
        $userTell = $_POST['userTell'];
        $userMobile = $_POST['userMobile'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $userPasswordConfirm = $_POST['userPasswordConfirm'];

        require_once("./mvc/view/page/header.php");

        $record = UserModel::fetch_by_email($userEmail);

        if ($userName == null || $userFamilyName == null || $userGender == null || $userEmail == null || $userPassword == null) {
            message('fail', "لطفا فیلدهای ستاره دار را پر کنید. " . '<br><br><br>' . '<a href="/MainProject/user/register"> تلاش مجدد </a>', true);
        }

        if ($record != null) {
            message('fail', " شما پیشتر با این ایمیل ثبت نام کرده اید کافیست وارد سایت شوید " . '<br><br><br>' . '<a href="/MainProject/user/register"> تلاش مجدد </a>', true);
        }

        if (strlen($userPassword) < 3 || strlen($userPasswordConfirm) < 3) {
            message('fail', "گذرواژه به اندازه کافی قوی نمی باشد" . '<br><br><br>' . '<a href="/MainProject/user/register"> تلاش مجدد </a>', true);
        }

        if ($userPassword != $userPasswordConfirm) {
            message('fail', "گذرواژه ها با هم مطابقت ندارند" . '<br><br><br>' . '<a href="/MainProject/user/register"> تلاش مجدد </a>', true);
        }

        $hashedPassword = md5($userPassword);
        UserModel::insert($userName, $userFamilyName, $userGender, $userTell, $userMobile, $userEmail, $hashedPassword);
        message('success', "با موفقیت ثبت نام شدید" . '<br><br><br>' . '<span style="color: red;font-size: larger;">' . $userName . " " . $userFamilyName . '</span>' . '   ' . ' برای ادامه لطفا' . '<a href="/MainProject/user/login"> کلیک </a>' . 'کنید.', true);
    }


    private function registerForm()
    {
        View::render("./mvc/view/user/register.php", array());
    }


    public function toggleWish($type, $perfumeId)
    {
        $db = Db::getInstance();
        $userId = getUserId();

        if ($userId == 0) {
            return;
        }

        $found = $db->query("SELECT * FROM user_wish WHERE userId=:userId AND perfumeId=:perfumeId AND resourceType=:resourceType", array(
            'userId' => $userId,
            'perfumeId' => $perfumeId,
            'resourceType' => $type,
        ));

        if ($found != null && count($found) > 0) {
            $this->removeFromWish($type, $perfumeId);
        } else {
            $this->addToWish($type, $perfumeId);
        }
    }


    public function removeFromWish($type, $perfumeId)
    {
        $db = Db::getInstance();
        $userId = getUserId();

        if ($userId == 0) {
            return;
        }

        $db->insert("DELETE FROM user_wish WHERE userId=:userId AND perfumeId=:perfumeId AND resourceType=:resourceType", array(
            'userId' => $userId,
            'perfumeId' => $perfumeId,
            'resourceType' => $type,
        ));
    }


    public function addToWish($type, $perfumeId)
    {
        $db = Db::getInstance();
        $userId = getUserId();

        if ($userId == 0) {
            return;
        }

        $db->insert("INSERT INTO user_wish (userId, perfumeId, resourceType) VALUE (:userId, :perfumeId, :resourceType)", array(
            'userId' => $userId,
            'perfumeId' => $perfumeId,
            'resourceType' => $type,
        ));
    }
}


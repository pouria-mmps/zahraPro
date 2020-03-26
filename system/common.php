<?php
function hr($return = false)
{
    if ($return) {
        return "<hr>\n";
    } else {
        echo "<hr>\n";
    }
}

function br($return = false)
{
    if ($return) {
        return "<br>\n";
    } else {
        echo "<br>\n";
    }
}

function dump($var, $return = false)
{
    if (is_array($var)) {
        $out = print_r($var, true);
    } elseif (is_object($var)) {
        $out = var_export(($var), true);
    } else {
        $out = $var;
    }

    if ($return) {
        return "\n<pre>$out</pre>\n";
    } else {
        return "\n<pre>$out</pre>\n";
    }
}

function getFullUrl()
{
    return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function getRequestUri()
{
    return $_SERVER['REQUEST_URI'];
}

function baseUrl()
{
    return "/MainProject/";
}

function strhas($string, $search, $caseSensitive = false)
{
    if ($caseSensitive) {
        return strpos($string, $search) !== false;
    } else {
        return strpos(strtolower($string), strtolower($search)) !== false;
    }
}

function message($type, $message, $mustExit = false)
{
    $data['message'] = $message;
    View::render("./mvc/view/message/$type.php", $data);
    if ($mustExit) {
        exit();
    }
}

function getUserId()
{
    if (isset($_SESSION['userId'])) {
        return $_SESSION['userId'];
    } else {
        return 0;
    }
}

function initializeSettings()
{
    if (!isset($_SESSION['viewType'])) {
        $_SESSION['viewType'] = 'grid';
    }
}
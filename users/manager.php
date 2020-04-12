<?php
session_start();
include 'C:\Users\anton\Desktop\OSPanel\domains\lab2\users.php';
include 'C:\Users\anton\Desktop\OSPanel\domains\lab2\resources\lang.php';

if($_GET["exit"]){
    session_destroy();
    header("Location: ..\auth\login.php");
}

if (isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

if (!(isset($_SESSION['login'])) && (!(isset($_SESSION['password'])))){
    session_destroy();
    header('location: \auth\login.php');
}
if ((!(($_SESSION['role']) == 'admin')) && (!(($_SESSION['role']) == 'manager'))){
    session_destroy();
    header( 'location: \auth\login.php');
}

for ($j = 0; $j < count($users); $j++)
{
    if (($j == 0) && (!isset($_SESSION['lang'])) && ($_SESSION['role'] == 'admin')) {
        if ($users[0]['lang'] == 'ru') {
            echo $lang[0]['ru'] . $users[0]['name'] . $lang[1]['ru'];
        } else if ($users[0]['lang'] == 'en') {
            echo $lang[0]['en'] . $users[0]['name'] . $lang[1]['en'];
        } else if ($users[0]['lang'] == 'ua') {
            echo $lang[0]['ua'] . $users[0]['name'] . $lang[1]['ua'];
        } else if ($users[0]['lang'] == 'it') {
            echo $lang[0]['it'] . $users[0]['name'] . $lang[1]['it'];
        }
        break;
    }
    if(($j == 0) && ($_SESSION['lang'] == 'ru') && ($_SESSION['role'] == 'admin')){
        echo $lang[0]['ru'] . $users[0]['name'] . $lang[1]['ru'];
        break;
    }else if(($_SESSION['lang'] == 'en') && ($_SESSION['role'] == 'admin')){
        echo $lang[0]['en'] . $users[0]['name'] . $lang[1]['en'];
        break;
    }else if(($_SESSION['lang'] == 'ua') && ($_SESSION['role'] == 'admin')){
        echo $lang[0]['ua'] . $users[0]['name'] . $lang[1]['ua'];
        break;
    }else if(($_SESSION['lang'] == 'it') && ($_SESSION['role'] == 'admin')){
        echo $lang[0]['it'] . $users[0]['name'] . $lang[1]['it'];
        break;
    }
}
//var_dump($_SESSION['role']);

for ($k = 0; $k < count($users); $k++) {

    if (($k == 2) && (!isset($_SESSION['lang'])) && ($_SESSION['role'] == 'manager') && ($_SESSION['login'] == $users[2]['login']))
    {
        if ($users[2]['lang'] == 'ru') {
            echo $lang[0]['ru'] . $users[2]['name'] . $lang[2]['ru'];
        } else if ($users[2]['lang'] == 'en') {
            echo $lang[0]['en'] . $users[2]['name'] . $lang[2]['en'];
        } else if ($users[2]['lang'] == 'ua') {
            echo $lang[0]['ua'] . $users[2]['name'] . $lang[2]['ua'];
        } else if ($users[2]['lang'] == 'it') {
            echo $lang[0]['it'] . $users[2]['name'] . $lang[2]['it'];
        }
    } elseif((($k == 2) && ($_SESSION['lang'] == 'ru')) && ($_SESSION['role'] == 'manager') && ($_SESSION['login'] == $users[2]['login'])){
        echo $lang[0]['ru'] . $users[2]['name'] . $lang[2]['ru'];
    }else if(($k == 2) && ($_SESSION['lang'] == 'en') && ($_SESSION['role'] == 'manager') && ($_SESSION['login'] == $users[2]['login'])){
        echo $lang[0]['en'] . $users[2]['name'] . $lang[2]['en'];
    }else if(($k == 2) && ($_SESSION['lang'] == 'ua') && ($_SESSION['role'] == 'manager') && ($_SESSION['login'] == $users[2]['login'])){
        echo $lang[0]['ua'] . $users[2]['name'] . $lang[2]['ua'];
    }else if(($k == 2) && ($_SESSION['lang'] == 'it') && ($_SESSION['role'] == 'manager') && ($_SESSION['login'] == $users[2]['login'])){
        echo $lang[0]['it'] . $users[2]['name'] . $lang[2]['it'];
    }

    if (($k == 4) && (!isset($_SESSION['lang'])) && ($_SESSION['role'] == 'manager') && (($_SESSION['login']) == $users[4]['login']))
    {
        if ($users[4]['lang'] == 'ru') {
            echo $lang[0]['ru'] . $users[4]['name'] . $lang[2]['ru'];
        } else if ($users[4]['lang'] == 'en') {
            echo $lang[0]['en'] . $users[4]['name'] . $lang[2]['en'];
        } else if ($users[4]['lang'] == 'ua') {
            echo $lang[0]['ua'] . $users[4]['name'] . $lang[2]['ua'];
        } else if ($users[4]['lang'] == 'it') {
            echo $lang[0]['it'] . $users[4]['name'] . $lang[2]['it'];
        }
    }elseif (($k == 4) && ($_SESSION['lang'] == 'ru') && ($_SESSION['role'] == 'manager') && (($_SESSION['login']) == $users[4]['login'])) {
        echo $lang[0]['ru'] . $users[4]['name'] . $lang[2]['ru'];
    } else if (($k == 4) && ($_SESSION['lang'] == 'en') && ($_SESSION['role'] == 'manager') && (($_SESSION['login']) == $users[4]['login'])) {
        echo $lang[0]['en'] . $users[4]['name'] . $lang[2]['en'];
    } else if (($k == 4) && ($_SESSION['lang'] == 'ua') && ($_SESSION['role'] == 'manager') && (($_SESSION['login']) == $users[4]['login'])) {
        echo $lang[0]['ua'] . $users[4]['name'] . $lang[2]['ua'];
    } else if (($k == 4) && ($_SESSION['lang'] == 'it') && ($_SESSION['role'] == 'manager') && (($_SESSION['login']) == $users[4]['login'])) {
        echo $lang[0]['it'] . $users[4]['name'] . $lang[2]['it'];
    }
}

?>
<style>
    .b1 {
        background: darkred;
        color: black;
        font-size: 15pt;
    }
    .b2 {
        background: darkgreen;
        color: whitesmoke;
        font-size: 9pt;
    }
</style>
<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit" class="b2" value="Save">
</form>

<form method="GET">
    <input type="submit" class="b1" name="exit"  value="Exit">
</form>

<form name = "test" action = "admin.php" method = "post">
    <button><font color ="black">Admin</font></button>
</form>
<form name = "test" action = "client.php" method = "post">
    <button><font color ="black">Client</font></button>
</form>

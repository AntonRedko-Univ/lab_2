<?php
session_start();
include 'C:\Users\anton\Desktop\OSPanel\domains\lab3\users.php';
include 'C:\Users\anton\Desktop\OSPanel\domains\lab3\resources\lang.php';

if($_GET["exit"]){
    session_destroy();
    header("Location: ..\auth\login.php");
}

if (isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

if (!(isset($_SESSION['login'])) && !(isset($_SESSION['password']))){
    session_destroy();
    header('Location: ..\auth\login.php');
}
if (!(($_SESSION['role']) == 'admin')) {
    session_destroy();
    header("Location: ..\auth\login.php");
}
class User{
    public $login;
    public $password;
    public $name;
    public $surname;
    public $role;
    public $langhi;
    public $langinfo;

    function __construct($login,$password,$name,$surname,$role,$langhi,$langinfo)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->langhi = $langhi;
        $this->langinfo = $langinfo;
    }
}

class admin extends User {

    public function introduce (){
        echo $this ->langhi . $this->name. "  " . $this->surname. "  ". $this ->langinfo;
    }
}

for ($m = 0; $m < count($users); $m++){
    if (($_SESSION['login'] == $users[$m]['login']) && !(isset($_GET['lang']))){
        switch ($users[$m]['lang']){
            case 'ru';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['ru'], $lang[1]['ru']);
                break;
            case 'en';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['en'], $lang[1]['en']);
                break;
            case 'ua';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['ua'], $lang[1]['ua']);
                break;
            case 'it';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['it'], $lang[1]['it']);
                break;
        }
        $admin ->introduce();
    }
    if (($_SESSION['login'] == $users[$m]['login']) && (isset($_GET['lang']))){
        switch ($_GET['lang']){
            case 'ru';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['ru'], $lang[1]['ru']);
                break;
            case 'en';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['en'], $lang[1]['en']);
                break;
            case 'ua';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['ua'], $lang[1]['ua']);
                break;
            case 'it';
                $admin = new admin($users[$m]['login'], $users[$m]['password'], $users[$m]['name'], $users[$m]['surname'], $users[$m]['role'], $lang[0]['it'], $lang[1]['it']);
                break;
        }
        $admin ->introduce();
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

    <form name = "test" action = "manager.php" method = "post">
        <button><font color ="black">Manager</font></button>
    </form>
    <form name = "test" action = "client.php" method = "post">
        <button><font color ="black">Client</font></button>
    </form>


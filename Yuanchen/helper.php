<?php
/**
 * Created by PhpStorm.
 * User: ychen
 * Date: 05/07/2017
 * Time: 13:25
 */

function validEmail ($email, $len = 0)
{
    //含有以下字符基本说明是非法邮箱
    if (!preg_match("/^[\!\#\$\%\&\*\-\/\=\+\_\`\{\|\}\~a-z0-9]+(\.[\!\#\$\%\&\*\-\/\=\+\_\`\{\|\}\~a-z0-9]+)*@([a-z0-9-]+\.)+([a-z]{1,6})$/i", $email)) {
        return (false);
    } elseif (($len > 0) && (strlen($email) > $len)) {
        return (false);
    }
    return (true);
}

function validPhone($phone, $len = 0)
{

    if (!preg_match("/^[0-9]*$/",$phone)) {
        return false;
    }
    if(!(strlen($phone) == 11 or strlen($phone) == 8)) {
        return false;
    }
    return true;
}

function removeSingleInfo($id)
{
    $info = readAllInfo();
    foreach($info as $line => $idx){
        $myarray = unserialize($line);
        if($myarray[0] == $id)
        {
            array_slice($info, $idx, 1);
        }
    }
//    $fp = fopen('data.txt', 'w');
    //需要一个写一行的函数

//    fwrite($fp, $info);
//    fclose($fp);
}
function insertSingleInfo ($id, $name, $gender, $birth, $phone, $mail)
{
    $sstr = '';
    $fp = fopen('data.txt', 'a+');
    if($fp) {
        $array = array($id, $name, $gender, $birth, $phone, $mail);
        $sstr = serialize($array);
        $sstr = $sstr ."\n";
        $flag = fwrite($fp, $sstr);
        echo "<p> + $sstr + </p";
    }
    else{
        echo "Fail to Write...";
    }

    fclose($fp);
}

function readAllInfo ()
{
    $infos = array();
    $fp = fopen('data.txt', 'r');
    if($fp){
        for($i=0; !feof($fp);$i++)
        {
            $tpline = fgets($fp);
            array_push($infos, $tpline);
        }
    }
    else{
            echo "Fail to Read...";
    }
    fclose($fp);
    return $infos;
}


?>
<?php
/**
 * User: xukaiwen@baixing.com
 */

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$birthday = $_POST['birthday'];
require('connectDatabase.php');

$emailRule = '/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';
$birthdayRule = '/^((?:19|20)\d\d)-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/';

if ($name === '' || !preg_match($emailRule,$email) || strlen($mobile) !== 11 || !preg_match($birthdayRule,$birthday)) {
    echo "<script>alert('填写内容错误');</script>";

    /*$post_data = array();
    $post_data['name'] = $name;
    $post_data['email'] = $email;
    $post_data['mobile'] = $mobile;
    $post_data['birthday'] = $birthday;
    $post_data = http_build_query($post_data);

    $opts = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencodedrn" .
                "Content-Length: " . strlen($post_data) . "rn",
            'content' => $post_data
        )
    );

    $context = stream_context_create($opts);
    $html = file_get_contents('add.php', false, $context);

    echo $html;*/
    echo "<script>window.location.href='add.php';</script>";
} else {
    $sql = "INSERT INTO `contacts` (`name`, `email`, `mobile`, `birthday`) VALUES ('$name', '$email', '$mobile','$birthday');";
    $stmt = $db->query($sql);
    echo "<script>alert('新增成功');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
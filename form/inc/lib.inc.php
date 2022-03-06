<?php

function myError($no, $msg, $file, $line) {
    if ($no == E_USER_ERROR){
        echo "Что-то пошло не так..";
        $s = "$msg в $file: $line \n";
        error_log($s, 3, "error.log" );
    }
}
set_error_handler("myError");


function addTODataBase($name, $email, $year, $gender, $topic, $question) {

    try {
        $connect = new PDO('mysql:host=localhost;dbname=form', 'root', 'root');
    } catch (PDOException $e) 
    { 
        $error = $e->getMessage();
        trigger_error($error, E_USER_ERROR);
        die();
    }

    $today = date("Y-m-d H:i:s");

    $sql = "INSERT INTO questions (name, today, e_mail, year_birth, gender, topic, question) 
    VALUES (:name, :today, :email, :year, :gender, :topic, :question)"; 

    $query = $connect->prepare($sql);
    $params = ['name'=>$name, 'today'=>$today, 'email'=>$email, 'year'=>$year, 'gender'=>$gender, 'topic'=>$topic, 'question'=>$question];
    $result = $query->execute($params); 
    if ($result){
        return true;
    }
    else {
        return false;
    }
}

function clearData ($value){
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}



$name = clearData($_POST['username']);
$email = clearData($_POST['email']);
$year = clearData($_POST['year']);
$gender = clearData($_POST['gender']);
$topic = clearData($_POST['topic']);
$question = clearData($_POST['question']);
$checkbox = $_POST['checkbox'];


$pattern_name_en = '/^[a-z]+$/i';
$pattern_name_ru = '/^[а-яЁё]+$/iu';

$error = [];
$notification = [];
$flag = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!preg_match($pattern_name_en, $name) && !preg_match($pattern_name_ru, $name)){
        $error['name'] = '<div class="form__input-error" id = "error-name">Invalid name format</div>';
        $flag = 1;
    }
    if (strlen($name) < 2 || empty($name)){
        $error['name'] = '<div class="form__input-error" id = "error-name">Name is too short</div>';
        $flag = 1;
    }
    if (strlen($name) > 15){
        $error['name'] = '<div class="form__input-error" id = "error-name">Name is too long</div>';
        $flag = 1;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = '<div class="form__input-error" id = "error-email">Invalid email format</div>';
        $flag = 1;
    }
    if (empty($email)){
        $error['email'] = '<div class="form__input-error" id = "error-email">Fill in the field</div>';
        $flag = 1;
    }
    if (empty($year)){
        $error['year'] = '<div class="form__input-error" id = "error-year">Fill in the field</div>';
        $flag = 1;
    }
    if (empty($gender)){
        $error['gender'] = '<div class="form__input-error" id = "error-gender">Choose gender</div>';
        $flag = 1;
    }
    if (empty($topic)){
        $error['topic'] = '<div class="form__input-error" id = "error-topic">Fill in the field</div>';
        $flag = 1;
    }
    if (empty($question)){
        $error['question'] = '<div class="form__input-error" id = "error-question">Fill in the field</div>';
        $flag = 1;
    }
    if (empty($checkbox)){
        $error['checkbox'] = '<div class="form__input-error" id = "error-checkbox">You must be familiar with the terms</div>';
        $flag = 1;
    }
    
    if ($flag == 0){
        $result = addTODataBase($name, $email, $year, $gender, $topic, $question);
        if ($result){
            setcookie("cookie[name]", $name);
            setcookie("cookie[email]", $email);
            setcookie("cookie[year]", $year);
            if($gender=='M') {
                setcookie('cookie[M]', true);
                setcookie('cookie[F]', false);
            } else if($gender=='F') {
                setcookie('cookie[F]', true);
                setcookie('cookie[M]', false);
            }
            Header("Location: index.php?mess=success");  
        } else{
            $error = 'Ошибка подключения базы данных';
            trigger_error($error, E_USER_ERROR);
        }
    }
    //header("Location: " . $_SERVER['PHP_SELF']);
}
if ($_GET['mess'] == 'success'){
    $notification['mess'] = ' <div id="alBox"></div>';
}

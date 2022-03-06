<?php
    ob_start();

    require "inc/lib.inc.php"; 
    set_error_handler("myError");
    $cookie = [];
    if (isset($_COOKIE['cookie'])) {
        foreach ($_COOKIE['cookie'] as $name => $value) {
            
            $cookie[$name] = $value;
            if ($name == 'M'){
                $M=' checked="checked" ';
                $F='';
            }
            else if ($name == 'F'){
                $F=' checked="checked" ';
                $M='';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="Simple-Alert-Dialog-Box-Plugin-For-jQuery-al-js/src/al.css">
    <title>User</title>
</head>
<body>
    <form class="form" action="<?= $_SERVER["PHP_SELF"]?>" method="post" >
        <div class="form__conteiner">
            <h1 class="form__title">Feedback form</h1>

            <div class="form__group">
                <label class="form__label" for="username" >username</label> 
                <div class="form__input">
                    <?php
                        if ($cookie['name']){?>
                            <input type="text" name= "username" id="name" value="<?=$cookie['name']?>">
                         <?}
                         else {?>
                            <input type="text" name= "username" id="name" value="<?=$_POST['username']?>">
                         <?}
                    ?>
                </div>
                <?= $error['name']?>
            </div>

            <div class="form__group">
                <label class="form__label" for="email" >e-mail</label> 
                <div class="form__input">
                    <?php
                        if ($cookie["email"]){?>
                            <input type="text" name= "email" id="email" value="<?=$cookie['email']?>">
                         <?}
                         else {?>
                            <input type="text" name= "email" id="email" value="<?=$_POST['email']?>">
                         <?}
                    ?>
                </div>
                <?= $error['email']?>
            </div>

            <div class="form__group">
                <label class="form__label" for="year">year of birth</label> 
                <div class="form__input">
                    <?php
                        if ($cookie["year"]){?>
                            <select name="year" id="year" value=""><option><?=$cookie['year']?></option></select>
                         <?}
                         else {?>
                            <select name="year" id="year" value=""><option><?=$_POST['year']?></option></select>
                         <?}
                    ?>
                </div>
                <?=$error['year']?>
            </div>

            <div class="form__group">
                <label class="form__label" for="gender">gender</label> 
                <div class="form__gender"> 
                    <input class="gender" id="m" type="radio" name="gender" value="M" <?=$M?>>
                    <label for="m">M</label>
                    <input class="gender" id="f" type="radio" name="gender" value="F" <?=$F?>>
                    <label for="f">F</label>  
                </div>
                <?=$error['gender']?>
            </div>

            <div class="form__group">
                <label class="form__label" for="topic" >topic</label> 
                <div class="form__input">
                    <input type="text" name= "topic" id="topic" value="<?=$_POST['topic']?>">
                </div>
                <?=$error['topic']?>
            </div>
            
            <div class="form__group">
                <label class="form__label" for="question" >your question</label> 
                <div class="form__input">
                    <textarea name= "question" id="question" value=""><?=$_POST['question']?></textarea>
                </div>
                <?=$error['question']?>
            </div>
                
            <div class="form__check">
                <div class="form__checkbox">
                    <input type="checkbox" id="checkbox" name="checkbox">
                    <label class="form__label form__label_check" for="checkbox" >Familiar with the contract</label>
                </div>
                <?=$error['checkbox']?>
            </div>

            <div class="form__submit">
                <input type="submit" value="Send" class="form__login">      
            </div>
        </div>            
    </form>

    <?=$notification['mess']?>
    <script src="Simple-Alert-Dialog-Box-Plugin-For-jQuery-al-js/lib/jquery-1.11.2.min.js"></script>
    <script src="Simple-Alert-Dialog-Box-Plugin-For-jQuery-al-js/src/al.js"></script>
    <script src="js/script.js"></script>
    <script src="js/notification.js"></script>
</body>
</html>

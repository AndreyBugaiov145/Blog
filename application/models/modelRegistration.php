<?php

class ModelRegistration extends Model
{

    public function setUser($userData)
    {
        $dbh = require(ROOT . '/application/core/db.php');
        $error = array();
		strlen(trim($userData['name']))==0?$error[]='Имя должно быть указано':false;
		strlen(trim($userData['surname']))==0?$error[]='Фамили должно быть указано':false;
		strlen(trim($userData['gender']))==0?$error[]='Пол долен быть выбран ':false;
		strlen(trim($userData['email']))==0?$error[]='Почта должна быть указана':false;
		strlen(trim($userData['password']))==0?$error[]='Пароль должен быть указан':false;
		$userData['password']!==$userData['confirm-password']?$error[]='Пароли не совпадают':false;
		(!isset($userData['confirm']))?$error[]='Согласитесь с условаиями':false;
		if(count($error)>0){
			$_SESSION["failRegistration"]= $error;
			setcookie("name",$userData['name'],time()+10);
			setcookie("surname",$userData['surname'],time()+10);
			setcookie("email",$userData['email'],time()+10);
			setcookie("password",$userData['password'],time()+10);
			setcookie("confirm-password",$userData['confirm-password'],time()+10);

			return true;
		}

        try {
            $requiest = $dbh->prepare("INSERT INTO `users`( `name`, `surname`, `gender`, `email`, `password`) VALUES ( :name, :surname, :gender, :email, :password)");
            $respons = $requiest->execute(array('name' => $userData['name'], 'surname' => $userData['surname'], 'gender' => $userData['gender'], 'email' => $userData['email'], 'password' =>md5($userData['password'])));

            $dbh = null;
            if($respons){
                $_SESSION["successRegistrated"] =true;
            }
            return $respons;
        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }

    }
    public function getUser($userData)
    {

		strlen(trim($userData['email']))==0?$error='Авторизация невозможна':false;
		strlen(trim($userData['password']))==0?$error='Авторизация невозможна':false;
		if(isset($error)){
			$_SESSION["failValidate"]= $error;

			return true;
		}


        $dbh = require(ROOT . '/application/core/db.php');
        try {
            $requiest = $dbh->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $requiest->execute(array('email' => $userData['email'], 'password' =>md5($userData['password'])));
            $respons = $requiest->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
            if(is_array($respons)>0){
                 $_SESSION["id"] =$respons['id'] ;
                 $_SESSION["name"]= $respons['name'].$respons['surname'];
                  $_SESSION["AuthDone"] =true ;
             }else{
                $_SESSION["masegeFailLogin"] =true;
             }
           
            return $respons;
        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }

    }



    public function checkEmail($userEmail=null)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        $sth = $dbh->prepare("SELECT * FROM users WHERE email = :email ");
        $sth->execute(array('email' => $userEmail['email']));
        $respons = $sth->fetchAll(PDO::FETCH_CLASS);

        $dbh = null;
        return count($respons);

    }


}


?>
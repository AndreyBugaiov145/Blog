<?php

class modelRegistration extends Model
{

    public function regiserationUser($userData)
    {
        $dbh = require(ROOT . '/application/core/db.php');
        try {
            $requiest = $dbh->prepare("INSERT INTO `users`( `name`, `surname`, `gender`, `email`, `password`) VALUES ( :name, :surname, :gender, :email, :password)");
            $respons = $requiest->execute(array('name' => $userData['name'], 'surname' => $userData['surname'], 'gender' => $userData['gender'], 'email' => $userData['email'], 'password' => $userData['password']));

            if (!$respons) {
                throw new Error (" подключиться к MySQL не получилось");
            }
            $dbh = null;
            return $respons;
        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }

    }

    public function checkEmail($userEmail)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
            $sth = $dbh->query("SELECT *  FROM users WHERE `id` = 1 ");
            $respons = $sth->execute(array('email' => $userEmail['email']));
            //$respons = $respons->fetch(PDO::FETCH_ASSOC);

            $dbh = null;
            return $sth;

        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }

    }


}


?>



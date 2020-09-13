<?php

class ControllerRegistration extends Controller
{

    function __construct()
    {
        $this->model = new modelRegistration();
        $this->view = new View();
    }

    function actionIndex()
    {
        $this->view->generate('registration.php', 'template_view.php');
        return true;
    }

    function actionRegister()
    {
        $respons = $this->model->setUser($_POST);
        if(isset($_SESSION["failRegistration"])){
        	header("location:/registration/index");
        	return  true;
        }
         header("location: /");
        return  true;
    }

    function actionCheckEmail()
    {
      $asUserRegistred = $this->model->checkEmail($_POST);
        echo $asUserRegistred;
        return true;
    }
    function actionAuthorization()
    {
        $user= $this->model->getUser($_POST);
        if(isset($_SESSION["failValidate"])){
        	header("location: /");
            return true;
        }
        if(isset($_SESSION["id"])){
            header("location: /");
            return true;
        }

        header("location: /registration/index");
       
        return true;
    }
    function actionLogout()
    {
		unset($_SESSION["id"]);
		unset($_SESSION["name"]);
        header("location: /");
        return true;
    }


}

?>
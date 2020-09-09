<?php

class controllerRegistration extends Controller
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
        print_r($_POST);
        $r = $this->model->regiserationUser($_POST);
    var_dump($r);
        //header("Location:/");
        return true;
    }

    function actionCheckEmail()
    {
        $r = $this->model->checkEmail($_POST);
   var_dump($r);

       // return 'sadasdasd';
    }


}

?>
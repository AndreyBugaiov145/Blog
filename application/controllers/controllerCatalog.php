<?php

class controllerCatalog extends Controller
{

    function __construct()
    {
        $this->model = new ModelCatalog();
        $this->view = new View();
    }

    function actionIndex()
    {

        $catalogArray = $this->model->getAllData();
        $this->view->generate('catalog.php', 'template_view.php', $catalogArray);
        return true;
    }

    function actionOne($arrayParam)
    {
        $id = $arrayParam[0];
        $publicationData = $this->model->getOnePublication($id);
        $tagsForPublicationArray = $this->model->tagsForPublicationQuery($id);
        $this->view->generate('publication.php', 'template_view.php', $publicationData, $tagsForPublicationArray);
        return true;
    }

    function actionTag($arrayParam)
    {
        $tagId = $arrayParam[0];
        $publicationData = $this->model->getPublicationsByTag($tagId);
       // var_dump($publicationData[0]);
        $this->view->generate('catalog.php', 'template_view.php', $publicationData);
        return true;
    }
}

?>
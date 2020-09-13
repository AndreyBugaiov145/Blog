<?php

class ControllerCatalog extends Controller
{

    function __construct()
    {
        $this->model = new ModelCatalog();
        $this->view = new View();
    }

    function actionStart($arrayParam=null)

    {	
    	header("location: /catalog");
  
        return true;
    }
    function actionIndex($arrayParam=null)
    {	

    	if(isset($arrayParam[0])){
    		$page = $arrayParam[0];
    	}
    	else{
    		$page = 1;
    	}
    	$limit = $this->model->limit;
        $catalogArray = $this->model->getAllData($page,$limit);
        $countPublicaations = $this->model->getCountPublicaations();
        $pagination = new Pagination($countPublicaations,$page ,$limit,'page-');
        $this->view->generate('catalog.php', 'template_view.php', $catalogArray,null,$pagination);
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
       	if(isset($arrayParam[1])){
    		$page = $arrayParam[1];
    		$page =$page *1;

    	}
    	else{
    		$page = 1;
    	}

        $publicationData = $this->model->getPublicationsByTag($tagId,$page);
        $count= $this->model->countPublicationsByTagQuery($tagId);
        $count=$count['count'];
        $limit = $this->model->limit;
        $pagination = new Pagination($count,$page,$limit,'page-');
        $this->view->generate('catalog.php', 'template_view.php', $publicationData,null,$pagination);
        return true;
    }

   function actionUser($arrayParam)
    {
        $userId = $arrayParam[0];
        if(isset($arrayParam[1])){
    		$page = $arrayParam[1];
    		$page =$page *1;
    	}
    	else{
    		$page = 1;
    	}
        $publicationData = $this->model->getPublicationsByUser($userId,$page);
        $countPublicaations = $this->model->getCountPublicaationsByUsers($userId);
        $limit = $this->model->limit;
        $pagination = new Pagination($countPublicaations,$page,$limit,'page-');

        $this->view->generate('catalog.php', 'template_view.php', $publicationData,null,$pagination);
        return true;
    }

     function actionDelete($arrayParam)
    {
    	$id = $arrayParam[0];
        $respons = $this->model->deletePublications($id);

        if($respons){
        	$_SESSION["successDelete"] =true;
        }
        header("location: /");
        return  true;
    }
     function actionUpdatePublication($arrayParam)
    {
    	$id = $arrayParam[0];
        $onePublication = $this->model->updatePublicatio($id);

        if($onePublication){
			$this->view->generate('updatePublication.php', 'template_view.php',$onePublication);
        }
        
        return  true;
    }
    function actionSaveChanges($arrayParam)
    {
    	$id = $arrayParam[0];
		$respons = $this->model->saveChanges($id,$_POST,$_FILES);
		if($respons){
    		header("location:/catalog/updatePublication/{$id}");
    		return true;
    	}

        header("location:/catalog/{$id}");
        return  true;
    }
    function actionCreate()
    {	
    	if(empty($_SESSION["id"])){
    		header("location: /");
    		return true;
    	}
        $this->view->generate('createPublication.php', 'template_view.php');
        return true;
    }
    function actionSave()
    {
    	$respons = $this->model->savePublications($_POST,$_FILES);
    	if($respons){
    		header("location:/catalog/create");
    		return true;
    	}
    	$_SESSION["createMassege"] = true;
    	header("location:/catalog/create");
        return true;
    }

}

?>
<?php

class ModelCatalog extends Model
{
    public $limit = 6;

    public function getCountPublicaationsByUsers($userId)
    {
    	$dbh = require(ROOT . '/application/core/db.php');
    	$sth = $dbh->prepare("SELECT COUNT(id) AS count FROM `articles` WHERE user_id = ?");
    	$sth->execute(array($userId));
        $countId = $sth->fetch(PDO::FETCH_ASSOC);
        return $countId['count'];
    }

    public function getCountPublicaations()
    {
    	$dbh = require(ROOT . '/application/core/db.php');
    	$countId = $dbh->query("SELECT COUNT(id) AS count FROM `articles`");
        $countId = $countId->fetch(PDO::FETCH_ASSOC);
        return $countId['count'];
    }

    static function publicationQuery($id = false,$limit = 6,$page=1)
    {
        $dbh = require(ROOT . '/application/core/db.php');
        $offset=$limit*($page-1);
        try {
            if (!$id) {
                $respons = $dbh->query("SELECT * FROM `articles` LIMIT {$limit} OFFSET {$offset}  ");
                $respons = $respons->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $respons = $dbh->prepare("SELECT articles.* ,users.id as user_id , users.name as user_name , users.surname as user_surname FROM articles
				INNER JOIN users ON users.id = articles.user_id AND articles.id = ? ");
                $respons->execute(array($id));
                $respons = $respons->fetch(PDO::FETCH_ASSOC);
            }
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

    static function tagsForPublicationQuery($id)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
            $respons = $dbh->query("SELECT  tags.tag as tags_tag , tags.id as tag_id FROM articles
			INNER JOIN tag_article 
			INNER JOIN tags ON tags.id =tag_article.tag_id  AND tag_article.article_id = articles.id  AND articles.id = {$id} ");
            $respons->execute(array($id));
            $respons = $respons->fetchAll(PDO::FETCH_ASSOC);

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

    static function countPublicationsByTagQuery($tagId)
    {
        $dbh = require(ROOT . '/application/core/db.php');
        try {
            $respons = $dbh->prepare("SELECT COUNT(tag_article.tag_id) AS count FROM articles
			INNER JOIN tag_article ON tag_article.tag_id = ? AND articles.id = tag_article.article_id ");
            $respons->execute(array($tagId));
            $respons = $respons->fetch(PDO::FETCH_ASSOC);
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
    static function publicationsByTagQuery($tagId,$limit = 6,$page=1)
    {
        $dbh = require(ROOT . '/application/core/db.php');
        $offset= $limit*($page-1);
        try {
            $respons = $dbh->prepare("SELECT articles.* FROM articles
			INNER JOIN tag_article ON tag_article.tag_id = ? AND articles.id = tag_article.article_id  LIMIT {$limit} OFFSET {$offset}");
            $respons->execute(array($tagId));
            $respons = $respons->fetchALL(PDO::FETCH_ASSOC);
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

    public function getAllData($page = 1,$limit=6)
    {
        $catalogArray = self::publicationQuery(false,$limit,$page);
        return $catalogArray;
    }

    public function getOnePublication($id)
    {
        $OnePublication = self::publicationQuery($id);
        return $OnePublication;
    }

    public function getTagsForPublication($id)
    {
        $tagsForPublicationArray = self::tagsForPublicationQuery($id);
        return $tagsForPublicationArray;
    }

    public function getPublicationsByTag($tagId,$page=1)
    {
        $publicationsByTag = self::publicationsByTagQuery($tagId,$this->limit,$page);
        return $publicationsByTag;
    }

    public function deletePublications($id)
    {	 
    	$dbh = require(ROOT . '/application/core/db.php');

    	$OnePublication = self::publicationQuery($id);
    	if($OnePublication['user_id'] ===  $_SESSION["id"]){	
	         try {
	
	         	$sth=$dbh->prepare("DELETE FROM `tag_article` WHERE `article_id` = :id ");
	         	$respons =$sth->execute(array('id'=>$id));
	            $sth = $dbh->prepare("DELETE FROM `articles` WHERE `id` = :id ");
	            $respons =$sth->execute(array('id'=>$id));
	            
	
	            $dbh = null;
	            return $respons;
	
	        } catch (PDOException $e) {
	
	            printme(' подключиться к MySQL не получилось', 1);
	            var_dump("Error!: " . $e->getMessage() . "<br/>");
	            $dbh = null;
	            die();
	        }
	        return true;
	    }
	    return false;
	}

	 public function getPublicationsByUser($userId,$page=1)
    {

    	$dbh = require(ROOT . '/application/core/db.php');
    	$limit = $this->limit;
    	$offset= $limit*($page-1);
        try {
            $respons = $dbh->prepare("SELECT * FROM articles WHERE user_id = ?  LIMIT {$limit} OFFSET {$offset}");
            $respons->execute(array($userId));
            $respons = $respons->fetchALL(PDO::FETCH_ASSOC);
  
            $dbh = null;
            return $respons;

        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }
    }


    static function savePublicationsQuery($POST,$imgName)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
        	$userId = $_SESSION['id'];
            $sth = $dbh->prepare("INSERT INTO `articles`(`header`, `short_description`, `description`, `img_src`, `user_id`) VALUES (:header,:short_description,:description, :img_src ,$userId)");
            $sth->execute(array('header'=>$POST['header'],'short_description'=>$POST['short_description'],'description'=>$POST['description'],'img_src'=>$imgName));
            $autoIncrementPublication= $dbh->lastInsertId();

            $dbh = null;
            return $autoIncrementPublication;

        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }
    }

     static function saveTagQuery($POST)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
        	$arrayTags =explode (',',$POST['tag']); 
        	foreach ($arrayTags as $tag) {
        		$sth = $dbh->prepare("SELECT id FROM tags WHERE tag = ? ");
            	$sth->execute(array($tag));
            	$asTag =$sth->fetch(PDO::FETCH_ASSOC);
            	if(empty($asTag['id'])){
            		$sth = $dbh->prepare("INSERT INTO `tags`(`tag`) VALUES (?)");
            		$sth->execute(array($tag));
            		$autoIncrementTagsArray[]= $dbh->lastInsertId();
            	}else{
            		$autoIncrementTagsArray[]=$asTag['id'];
            	}
        	}

        	return $autoIncrementTagsArray;
        	
        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }
    }

    static function createDependenceTagToPublications($autoIncrementPublication,$autoIncrementTagsArray)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
        	foreach ($autoIncrementTagsArray as $idTag) {
        		$dbh->query("INSERT INTO `tag_article`(`tag_id`, `article_id`) VALUES ($idTag,$autoIncrementPublication)");
        	}
            
            $dbh = null;
            return true;

        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }
    }

     public function savePublications($POST,$FILE)
    {	
    	$error = array();
		strlen(trim($POST['header']))==0?$error[]='Заголовок должно быть указано':false;
		strlen(trim($POST['short_description']))==0?$error[]='Краткое описание должно быть указано':false;
		strlen(trim($POST['description']))==0?$error[]='Описание должно быть указано':false;
		if(count($error)>0){
			$_SESSION["errorPublication"]= $error;
			return true;
		}
    	$imgName = time().$FILE['img']["name"];
    	move_uploaded_file($FILE['img']["tmp_name"], 'users_img/'.$imgName);
    	$autoIncrementPublication =self::savePublicationsQuery($POST,$imgName);
    	$autoIncrementTagsArray =self::saveTagQuery($POST);
    	self::createDependenceTagToPublications($autoIncrementPublication,$autoIncrementTagsArray);
        return true;
    }
    

    public function updatePublicatio($id)
    {	 
    	$dbh = require(ROOT . '/application/core/db.php');

    	$onePublication = self::publicationQuery($id);
    	$tagsForPublicationArray = self::tagsForPublicationQuery($onePublication['id']);
    	foreach ($tagsForPublicationArray as $tag) {
    		$tagsArray[]=$tag['tags_tag'];
    	}
		$tagsStr =implode(',',$tagsArray);
		$onePublication['tags']=$tagsStr;
    	if($onePublication['user_id'] ===  $_SESSION["id"]){
	        return $onePublication;
	    }
	    return false;
	}


	static function updatePublicationsQuery($id,$POST,$imgName)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
        	$userId = $_SESSION['id'];

        	$sth = $dbh->prepare("UPDATE `articles` SET `header`=:header,`short_description`=:short_description,`description`=:description,`img_src`=:img_src WHERE id = :id ");

            $sth->execute(array('header'=>$POST['header'],'short_description'=>$POST['short_description'],'description'=>$POST['description'],'img_src'=>$imgName,'id'=>$id));

            $dbh = null;
            return true;

        } catch (PDOException $e) {

            printme(' подключиться к MySQL не получилось', 1);
            var_dump("Error!: " . $e->getMessage() . "<br/>");
            $dbh = null;
            die();
        }
    }
	public function saveChanges($id,$POST,$FILE)
    {	

    	$error = array();
		strlen(trim($POST['header']))==0?$error[]='Заголовок должно быть указано':false;
		strlen(trim($POST['short_description']))==0?$error[]='Краткое описание должно быть указано':false;
		strlen(trim($POST['description']))==0?$error[]='Описание должно быть указано':false;
		if(count($error)>0){
			$_SESSION["errorPublication"]= $error;
			return true;
		}
    	if(strlen(trim($FILE['img']["name"]))>0){
    	    $imgName = time().$FILE['img']["name"];
    	    move_uploaded_file($FILE['img']["tmp_name"], 'users_img/'.$imgName);
    	}else{
    		 $ipublication = self::publicationQuery($id);
    		 $imgName = $ipublication['img_src'];
    	}
    	self::updatePublicationsQuery($id,$POST,$imgName);
    	$autoIncrementTagsArray =self::saveTagQuery($POST);
    	self::createDependenceTagToPublications($id,$autoIncrementTagsArray);
        return false;
    }

}


?>
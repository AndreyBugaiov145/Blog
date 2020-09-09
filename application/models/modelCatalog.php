<?php

class modelCatalog extends Model
{
    public $limit = 6;
    static function publicationQuery($id = false,$limit = null)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
            if (!$id) {
                $respons = $dbh->query("SELECT * FROM `articles` LIMIT {$limit}");
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

    static function publicationsByTagQuery($tagId,$limit = null)
    {
        $dbh = require(ROOT . '/application/core/db.php');

        try {
            $respons = $dbh->prepare("SELECT articles.* FROM articles
INNER JOIN tag_article ON tag_article.tag_id = ? AND articles.id = tag_article.article_id LIMIT {$limit}");
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

    public function getAllData()
    {
        $catalogArray = self::publicationQuery(null,$this->limit);
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

    public function getPublicationsByTag($tagId)
    {
        $publicationsByTag = self::publicationsByTagQuery($tagId,$this->limit);
        return $publicationsByTag;
    }

}


?>



<?php
// pas d'inclusion grâce à l'autoload de params et appelé dans add.php
class Categorie extends Db //fichier Db dans config.php
{

    public static function Insert(array $data)
    {
        $request="REPLACE INTO categories VALUES(:id_categorie, :name)";
        $response=self::getDb()->prepare($request);
        $response->execute($data);


    }

    public static function ReadAll() //appelée grâce au AppController qui renvoie sur home.php
    {
        $request="SELECT* FROM categories";
        $response=self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC); //jeu de pls résultats attendus

    }

    public static function find(array $data) //pour modifier une catégorie
    {

        $request="SELECT*FROM categories WHERE id_categorie=:id_categorie";
        $response=self::getDb()->prepare($request);
        $response->execute($data);

        return $response->fetch(PDO::FETCH_ASSOC);

    }

    public static function delete(array $data)
    {

        $request="DELETE FROM categories WHERE id_categorie=:id_categorie";
        $response=self::getDb()->prepare($request);
       
        return $response->execute($data);


    }







}
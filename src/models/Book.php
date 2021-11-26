<?php
// pas d'inclusion grâce à l'autoload de params et appelé dans add.php
class Book extends Db //fichier Db dans config.php
{

    public static function InsertInto(array $data)
    {
        $request="INSERT INTO books (title, author, resume, cover, price, publish_date, id_genre)
        VALUES (:title, :author, :resume, :cover, :price, :publish_date, :id_genre)";
        $response=self::getDb()->prepare($request);
        $response->execute($data);


    }





    public static function Insert(array $data)
    {
        $request="REPLACE INTO books VALUES(:id, :title, :author, :resume, :cover, :price, :publish_date, :id_genre)";
        $response=self::getDb()->prepare($request);
        $response->execute($data);


    }

    // public static function ReadAll()
    // {
    //     $request="SELECT* FROM books";
    //     $response=self::getDb()->prepare($request);
    //     $response->execute();

    //     return $response->fetchAll(PDO::FETCH_ASSOC);

    // }

    public static function ReadAll()
    {
        $request="SELECT books.id, books.title, books.author, books.cover, books.price, books.resume, books.publish_date, categories.name
        FROM books 
        INNER JOIN categories
        ON books.id_genre=categories.id_categorie";

        $response=self::getDb()->prepare($request);
        $response->execute();
    
        return $response->fetchAll(PDO::FETCH_ASSOC);

    }



    public static function find(array $data) //pour modifier un livre
    {

        $request="SELECT*FROM books WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($data);

        return $response->fetch(PDO::FETCH_ASSOC);

    }

    public static function delete(array $data)
    {

        $request="DELETE FROM books WHERE id=:id";
        $response=self::getDb()->prepare($request);
       
        return $response->execute($data);


    }







}
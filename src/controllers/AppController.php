<?php

class AppController
{
    public static function index()

   {
       $books=Book::ReadAll();
       $categories=Categorie::ReadAll();
       
        include( VIEWS.'app/home.php');

    }


}
<?php

class BookController
{

////////
    public static function listBook()
    {
        $books=Book::ReadAll();

        // die(var_dump($books));

        include VIEWS.'book/listBook.php';
    }


    public static function addBook()
    {

        //récupération du livre si on est en modif
            if(isset($_GET['id'])):
                $book=Book::find([
                    'id'=>$_GET ['id']                    

                ]);
                // die(var_dump($book));

            endif;

            $genres=Categorie::ReadAll();


// insert et modif
        if(!empty($_POST)):

            // die (var_dump ($_POST));
            if(!empty($_FILES['cover']['name'])):

                $ext=explode('/', $_FILES['cover']['type'])[1];
                // die (var_dump ($_FILES['cover']));
                $coverName=date_format(new DateTime(), 'YmdHis').uniqid().'.'.$ext;
                copy($_FILES['cover']['tmp_name'], PHOTO.$coverName); 
               
                Book::InsertInto([
                    // 'id'=>$_POST['id'],
                    'title'=>$_POST['title'],
                    'author'=>$_POST['author'],
                    'resume'=>$_POST['resume'],
                    'cover'=>$coverName,
                    'price'=>$_POST['price'],
                    'publish_date'=>$_POST['publish_date'],
                    'id_genre'=>$_POST['id_genre']




                ]);

                $_SESSION['messages']['success'][]='Livre édité avec succès';
                header( 'location:../book/list');
                exit();

            endif;
            
        endif;
        
    
        
        
        
        include VIEWS.'book/add.php';

    }
    
    public static function deleteBook()
    {
        Book::delete(
        [
            'id'=>$_GET['id']
        ]
        );

        $_SESSION['messages']['success'][]='Livre supprimé avec succès';
                header( 'location:../genre/list');
                exit();

        include VIEWS.'App/home.php';
    }   

//////////////////////////////// GENRE /////////////////////////////////
    public static function listGenre()
    {


        $genres=Categorie :: ReadAll();





        include VIEWS. 'book/listGenre.php';
    }


}
<?php

class CategorieController
{

    public static function addCategorie()
    {

        //récupération du livre si on est en modif
            if(isset($_GET['id_categorie'])):
                $categorie=Categorie::find([
                    'id_categorie'=>$_GET ['id_categorie']                    

                ]);
                // die(var_dump($categorie));
               
            endif;


// insert et modif
        if(!empty($_POST)):

            // die (var_dump ($_POST));
            
               
                Categorie::Insert([
                    'id_categorie'=>$_POST['id_categorie'],
                    'name'=>$_POST['name']
                    

                ]);

                $_SESSION['messages']['success'][]='Genre édité avec succès';
                header( 'location:../genre/list');
                exit();
        endif;
        
    
        
        
        
        include VIEWS.'categorie/add.php';

    }
    
    public static function deleteCategorie()
    {
        Categorie::delete(
        [
            'id_categorie'=>$_GET['id_categorie']
        ]
        );

        $_SESSION['messages']['success'][]='Genre supprimé avec succès';
                header( 'location:../genre/list');
                exit();

        include VIEWS.'App/home.php';
    }   




}
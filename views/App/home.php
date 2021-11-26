<?php include VIEWS.'inc/header.php';?>


<div class="row justify content-between pt-4">
    <?php foreach ($books as $book) :  //$books défini dans AppController ?> 
    <div class="col-md-3 text-center">
        <div class="card border-success mb-3" style="max-width: 20rem;">

        <img src="<?= COVER.$book['cover']  ?>" alt="">
           
                <div class="card-body">
            <h4 class="card-title"> <?= $book['title'];  ?> </h4>
            <h6> <?=    $book['author'].', paru le '.date('d/m/Y', strtotime($book['publish_date'])); ?></h6>
            <p class="card-text"> <?= $book['resume']  ?></p>
                </div>

                <a href="<?= BASE_PATH.'book/add?id='.$book['id'] ?>" class="btn btn-success">modifier</a>
                <a href="<?= BASE_PATH.'book/delete?id='.$book['id'] ?>" class="btn btn-warning">supprimer</a>
            </div>
        </div>

<?php endforeach;   ?>

<?php foreach ($categories as $categorie) :   ?> 
    <div class="col-md-3 text-center">
        <div class="card border-success mb-3" style="max-width: 20rem;">

        
           
                
            <h4 class="card-title"> <?= $categorie['name'];  ?> </h4>
                     

                <a href="<?= BASE_PATH.'categorie/add?id_categorie='.$categorie['id_categorie'] ?>" class="btn btn-success">modifier</a>
                <a href="<?= BASE_PATH.'categorie/delete?id_categorie='.$categorie['id_categorie'] ?>" class="btn btn-warning">supprimer</a>
            </div>
        </div>

<?php endforeach;   ?>
   

</div>



<?php include VIEWS.'inc/footer.php';?>



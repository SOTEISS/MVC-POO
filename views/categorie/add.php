<?php  include VIEWS.'inc/header.php'; ?>




<form method="post" action="<?= BASE_PATH.'categorie/add' ?>" enctype="multipart/form-data">
    <fieldset>


        

<!--        <div class="form-group">-->
<!--            <label for="exampleSelect1" class="form-label mt-4">Example select</label>-->
<!--            <select class="form-select" id="exampleSelect1">-->
<!--                <option>1</option>-->
<!--                <option>2</option>-->
<!--                <option>3</option>-->
<!--                <option>4</option>-->
<!--                <option>5</option>-->
<!--            </select>-->
<!--        </div>-->

        
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Nom de la catégorie</label>
            <input class="form-control" name="name" type="text" id="formFile">
        </div>
        
        <input type="hidden" name="id_categorie" value="<?= $categorie['id_categorie'] ??  0;   ?>">

        <button type="submit" class="btn btn-primary mb-5">Enregistrer</button>
    </fieldset>
</form>








<?php  include VIEWS.'inc/footer.php'; ?>

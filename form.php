<?php
include_once 'header.php';
include_once 'connexion.php';
if($_POST){
    if(
        isset($_POST['nom'])&& !empty($_POST['nom'])
        &&isset($_POST['prenom'])&& !empty($_POST['prenom'])
        &&isset($_POST['adresse'])&& !empty($_POST['adresse'])
        &&isset($_POST['age'])&& !empty($_POST['age'])
    ){
        $nom=strip_tags($_POST['nom']);
        $prenom=strip_tags($_POST['prenom']);
        $adresse=strip_tags($_POST['adresse']);
        $age=strip_tags($_POST['age']);
        $sql='INSERT INTO `personne`(`nom`,`prenom`,`adresse`,`age`) values(:nom,:prenom,:adresse,:age)';
        $query=$pdo->prepare($sql);
        $query->bindValue(':nom',$nom,PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $query->bindValue(':adresse',$adresse,PDO::PARAM_STR);
        $query->bindValue(':age',$age,PDO::PARAM_INT);
        $query->execute();
        header('location:index.php');
    }
}
?>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
    <label for="exampleInputText" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Adresse</label>
    <input type="text" class="form-control" name="adresse">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Age</label>
    <input type="number" class="form-control" name="age">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
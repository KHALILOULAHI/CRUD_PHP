<?php
session_start();
include_once 'header.php';
include_once 'connexion.php';
include_once 'header.php';
include_once 'navbar.php';
if($_POST){
  // var_dump($_POST);
    if(
      isset($_POST['nom'])&& !empty($_POST['nom'])
      &&isset($_POST['prenom'])&& !empty($_POST['prenom'])
      &&isset($_POST['id'])&& !empty($_POST['id'])
      &&isset($_POST['adresse'])&& !empty($_POST['adresse'])
      &&isset($_POST['age'])&& !empty($_POST['age'])
  ){
      $nom=strip_tags($_POST['nom']);
      $prenom=strip_tags($_POST['prenom']);
      $adresse=strip_tags($_POST['adresse']);
      $age=strip_tags($_POST['age']);
      $id=strip_tags($_POST['id']);
      $sql = "UPDATE `personne` SET `nom`=:nom, `prenom`=:prenom, `adresse`=:adresse, `age`=:age WHERE `id`=:id";
      var_dump($sql);
      $query = $pdo->prepare($sql);
      $query->bindValue(':id', $id, PDO::PARAM_INT);
      $query->bindValue(':nom', $nom, PDO::PARAM_STR);
      $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
      $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
      $query->bindValue(':age', $age, PDO::PARAM_INT);
      $query->execute();
      var_dump($_GET);
      $_SESSION['succes']='modification avec succes';
      header('location:index.php');
  }else{
    $_SESSION['erreur']="impossible de modifier";
  }
}
if(isset($_GET['id'])&& !empty($_GET['id'])){
  var_dump($_GET);
    include_once 'connexion.php';
    $id=strip_tags($_GET['id']);
    // $sql="SELECT *FROM personne WHERE id=:id";  
$sql="SELECT *FROM personne where id=:id;";
// var_dump($sql);
$query=$pdo->prepare($sql);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->execute();
$personne=$query->fetch(PDO::FETCH_ASSOC);
// var_dump($personne);
}else{
    header('location:index.php');
}
?>
<form method="POST">
<div class="mb-3">
    <label for="exampleInputText" class="form-label">Nom</label>
    <input type="hidden" class="form-control" value="<?=$personne['id']?>" name="id" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?=$personne['nom']?>" name="nom" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
    <label for="exampleInputText" class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?=$personne['prenom']?>" name="prenom">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Adresse</label>
    <input type="text" class="form-control" value="<?=$personne['adresse']?>" name="adresse">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Age</label>
    <input type="number" class="form-control" value="<?=$personne['age']?>" name="age">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
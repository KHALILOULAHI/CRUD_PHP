<?php
include_once 'header.php';
include_once 'navbar.php';
if(isset($_GET['id'])&& !empty($_GET['id'])){
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
<div class="card" style="width: 18rem; background:blue;color:white;margin: 10px;">
  <div class="card-body">
  <p><?=$personne['id']?></p>
<p><?=$personne['nom']?></p>
<p><?=$personne['prenom']?></p>
<p><?=$personne['adresse']?></p>
<p><?=$personne['age']?></p>
  </div>
</div>

<?php
include_once 'connexion.php';
if($_GET){
  if(
    isset($_GET['id'])&& !empty($_GET['id'])
  ){
    $id=strip_tags($_GET['id']);
    $sql = "DELETE FROM `personne` WHERE `id`=:id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
  }
  header('location:index.php');
}
?>
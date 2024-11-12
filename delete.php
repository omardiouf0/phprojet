<?php
session_start();
//on inclut la connexin à la base 
require_once('connect.php');
if(isset($_GET['id'])&&!empty($_GET[('id')])){
    $id=strip_tags($_GET['id']);
    $sql= "DELETE FROM `listes` WHERE `id`=:id";
    //on prépare la requête
    $query=$db->prepare($sql);
    //on attache les valeurs
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    //on execute la requête
    $query->execute();
    // on stocke le résultat dans un tableau associatif
    $produit=$query->fetch();
   
        header('location:index.php');   
    
}
?>
<?php
session_start();
//on inclut la connexin à la base 
require_once('connect.php');
if(isset($_GET['id'])&&!empty($_GET[('id')])){
    $id=strip_tags($_GET['id']);
    $sql= "SELECT * FROM `listes` WHERE `id`=:id";
    //on prépare la requête
    $query=$db->prepare($sql);
    //on attache les valeurs
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    //on execute la requête
    $query->execute();
    // on stocke le résultat dans un tableau associatif
    $produit=$query->fetch();
    if(!$produit){
        header('location:index.php');   
    }
}
else{
    header('location:index.php');
}
require_once('close.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Détails sur le produit"<?=$produit['produit']?>"</h1>
    <p>ID:<?=$produit['id']?></p>
    <p>Produit:<?=$produit['produit']?></p>
    <p>Prix:<?=$produit['prix']?></p>
    <p>Nombre:<?=$produit['nombre']?></p>
    <p><a href="edit.php?id=<?=$produit['id']?>">Modifier|</a>
        <a href="delete.php?id=<?=$produit['id']?>">Supprimer</a>
    </p>
    <a href="index.php">Retour</a>
</body>
</html>
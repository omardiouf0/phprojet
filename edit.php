<?php
session_start();
//on inclut la connexin à la base 
require_once('connect.php');
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id=strip_tags($_GET['id']);
    $sql= "SELECT * FROM `listes` WHERE `id`=:id";
    //on prépare la requête
    $query=$db->prepare($sql);
    //on attache les valeurs
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    //on execute la requête
    $query->execute();
    $result=$query->fetch();
}
?>
<?php
 if(isset($_POST['id'])&&!empty($_POST['id'])&&
 isset($_POST['produit'])&&!empty($_POST['produit'])
 &&isset($_POST['prix'])&&!empty($_POST['prix'])
 &&isset($_POST['nombre'])&&!empty($_POST['nombre'])){
     $id=strip_tags($_POST['id']);
     $produit=strip_tags($_POST['produit']);
     $prix=strip_tags($_POST['prix']);
     $nombre=strip_tags($_POST['nombre']);
     $sql="UPDATE `listes` SET `produit`= :produit,
      `prix`=:prix,`nombre`=:nombre WHERE `id` =:id ";
      $query=$db->prepare($sql);
      //on attache les valeurs
      $query->bindValue(':id',$id,PDO::PARAM_INT);
      $query->bindValue(':produit',$produit,PDO::PARAM_STR);
      $query->bindValue(':prix',$prix,PDO::PARAM_INT);
      $query->bindValue(':nombre',$nombre,PDO::PARAM_INT);
      //on execute la requête
      $query->execute();
      header('location:index.php');
      exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form method="post" action="">
            <input type="hidden" name="id"value="<?=$result["id"]?>"> 
        <p>
            <label for="produit">produit</label>
            <input type="text"name="produit"value="<?=$result["produit"]?>">
        </p>
        <p>
            <label for="prix">prix</label>
            <input type="number"name="prix"value="<?=$result["prix"]?>">
        </p>
        <p>
            <label for="nombre">nombre</label>
            <input type="number"name="nombre"value="<?=$result["nombre"]?>">
        </p>
        <button>Modifier</button>
    </form>
</body>
</html>

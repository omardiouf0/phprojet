<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('connect.php');
    if(isset($_POST)){
      if(isset($_POST['produit'])&&!empty($_POST['produit'])
        && isset($_POST['prix'])&&!empty($_POST['prix'])
        &&isset($_POST['nombre'])&&!empty($_POST['nombre'])){
        $produit=strip_tags($_POST['produit']);
        $prix=strip_tags($_POST['prix']);
        $nombre=strip_tags($_POST['nombre']);
        $sql="INSERT INTO `listes`(`produit`,`prix`,`nombre`)VALUES(:produit,:prix,:nombre)";
        $query=$db->prepare($sql);
        $query->bindValue(':produit',$produit,PDO::PARAM_STR);
        $query->bindValue(':prix',$prix,PDO::PARAM_INT);
        $query->bindValue(':nombre',$nombre,PDO::PARAM_INT);
        $query->execute();
        $_SESSION['message']="produit ajouté avec succés !";
        header('Location:index.php');
    }  
    }
    require_once('close.php');
    ?>
    <form method="post" action="">
        <label for="produit">produit</label>
        <input type="text"name="produit"id="prduit">
        <label for="prix">prix</label>
        <input type="number"name="prix"id="prix">
        <label for="nombre">nombre</label>
        <input type="number"name="nombre"id="nombre">
        <button>Enregister</button>
    </form>
</body>
</html>
<?php
    require_once('connect.php');
    //on écrit notre requête
    $sql='SELECT * FROM listes';
    //on prépare la requête
    $query=$db->prepare($sql);
    //on execute la requête
    $query->execute();
    //on stocke le résultat dans un tableau associatif
    $result=$query->fetchAll(PDO::FETCH_ASSOC);
    // on fait la page
    require_once('close.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>produit</th>
            <th>prix</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Acion</th>
            <!-- <td><a href="detais.php?id=<?=$produit['id']?>">Voir|</a>
                <a href="edit.php?id=<?=$produit['id']?>">Modifier|</a>
                <a href="delete.php?id=<?=$produit['id']?>">Supprimer</a>
            </td> -->
        </thead>
        <tbody>
            <?php
            foreach($result as $produit){
            ?>
                <tr>
                    <td><?=$produit['id']?></td>
                    <td><?=$produit['produit']?></td>
                    <td><?=$produit['prix']?></td>
                    <td><?=$produit['nombre']?></td>
                    <td><?=$produit['nombre']?></td>
                    <td><a href="details.php?id=<?=$produit['id']?>">Voir|</a>
                        <a href="edit.php?id=<?=$produit['id']?>">Modifier|</a>
                        <a href="delete.php?id=<?=$produit['id']?>">Supprimer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            <a href="add.php">Ajouter des produits</a>
        </tbody>

    </table>
</body>
</html>
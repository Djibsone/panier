<?php include '../controllers/recuperer_product.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Panier</title>
</head>
<body class="panier">
    <a href="../" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php foreach($check as $data): ?>
                <?php $tbody = '
                    <tr>
                        <td><img src="../assets/<?= $data["img"] ?>" alt=""></td>
                        <td><?= $data["name"] ?></td>
                        <td><?= number_format($data["price"], 2) ?>€</td>
                        <td><?= $_SESSION["panier"][$data["id"]] ?></td>
                        <td><img src="../assets/images/del.png" alt=""></td>
                    </tr>
                '; ?>
            <?php endforeach; ?>
            <tr class="total">
                <th>Total : 25€</th>
            </tr>
        </table>
    </section>
</body>
</html>
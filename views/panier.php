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
<?php include 'msg_error_success.php' ?>
    <a href="../" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <!--tbody-->
                <?= $tbody; ?>
             <!--end tbody-->
             <tr class="total">
                <th>Total : <?= number_format($total, 2) ?>€</th>
            </tr>
        </table>
    </section>
</body>
</html>
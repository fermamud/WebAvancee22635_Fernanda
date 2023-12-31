<?php
if(isset($_GET['id']) && $_GET['id']!=null ){
    $id = $_GET['id'];
    require_once('Classe/CRUD.php');
    $crud = new CRUD;
    $usager = $crud->selectId('usager', $id, 'id_usager');
    extract($usager);
}else{
    header('location:index.php');
}

$genre = $crud->select('genre');

require_once('Classe/Footer.php');
$footer = new Footer;
$footerHTML = $footer->getFooterHTML();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fernanda Mamud</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <img src="assets/img/logo.svg" alt="image_logo">
        <p>Modification</p>
        <img src="assets/img/panier.svg" alt="image_panier">
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Liste des produits</a></li>
            <li><a href="liste-collaborateurs.php">Liste des collaborateurs</a></li>
        </ul>
    </nav>
    <main>
        <h1>Modification des Informations Personnels</h1>
        <form action="collaborateur-update.php" method="post">
            <input type="hidden" name="id_usager" value="<?= $id; ?>">
            <label>Nom :
                <input type="text" name="nom" value="<?= $nom; ?>">
            </label>
            <label>Prenom :
                <input type="text" name="prenom"  value="<?= $prenom; ?>">
            </label>
            <label>Genre :
                <select name="id_genre" >
                    <?php
                        foreach($genre as $row) {
                            if ($id_genre == $row['id_genre']) {
                    ?>
                                <option selected value="<?= $id_genre ?>"><?= $row['nom'] ?></option>
                    <?php
                            } else {
                            ?>
                                <option value="<?= $row['id_genre'] ?>"><?= $row['nom'] ?></option>
                            <?php
                            }
                        }
                    ?>
                </select>
            </label>

            <input type="submit" value="save">
        </form>
    </main>
    <?php
        echo $footerHTML;
    ?>
</body>

</html>
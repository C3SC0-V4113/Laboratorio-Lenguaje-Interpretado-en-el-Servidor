<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Modular</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php
        include("./modules/header.inc.php");
        ?>
    </header>
    <section>
        <article>
            <?php
            include("./modules/tabla.inc.php");
            ?>
        </article>
    </section>
    <footer>
        <?php
        include("./modules/footer.inc.php");
        ?>
    </footer>
</body>
</html>
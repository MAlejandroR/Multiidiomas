<?php
require_once "funciones.php";

session_start();


//

if (isset($_POST['submit']))
    $lang=$_POST['idioma'];
else{
    $lang = $_SESSION['lang'] ?? "es_ES.utf8";
}

$_SESSION['lang']=$lang;



$idioma=set_language($lang);


$user = $_SESSION['user'] ?? $_POST['user'];
$_SESSION['user']=$user;
if (is_null($user))
    header("Location:index.php");



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">

</head>
<body>
<h1><?= _("Aplicación de adaptada a idiomas")." ". _($idioma) ?></h1>


<fieldset class="idioma">
    <form action="sitio.php" method="post">
        <?php echo form_idiomas($lang) ?>
    </form>
</fieldset>
<hr style='margin-top:50px' />

<h2><?= _("Bienvenido a este sition web ")." $user" ?></h2>

    <form action="index.php" method="post">

        <input type="submit" style='float:right' value="<?= _("Volver") ?> ">
        <input type="hidden" name =idioma value = '<?php echo $_POST['idioma'] ?>' >
    </form>

</body>
</html>

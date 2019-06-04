<?php
require_once "funciones.php";
session_start();
unset ($_SESSION['user']);


if (isset($_POST['submit']))
    $lang=$_POST['idioma'];
else{
    $lang = $_SESSION['lang'] ?? "es_ES.utf8";
}

$_SESSION['lang']=$lang;

$idioma=set_language($lang);

$_SESSION['lang']=$lang;

$error =null;

if (isset($_POST['acceder']))
    if ($_POST['user']===""||$_POST['pass']==="")
        $error = _("Debes insertar usuario y password");
    else{
        $_SESSION['user']=$_POST['user'];
        header("Location:sitio.php");
    }

//var_dump($idioma);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">

</head>
<body>
<h1><?php  echo _("Aplicación de adaptada a idiomas")."  ". _($idioma); ?></h1>


<fieldset class="idioma">
    <form action="index.php" method="post">
        <?php echo form_idiomas($lang) ?>
    </form>
</fieldset>
<hr style='margin-top:55px' />
<form action="index.php"  method="post">
    <fieldset class="login">
        <?= $error ?>
        <legend><?= _("Datos de acceso")?></legend>
        <label for="user"> <?= _("Usuario") ?></label><input type="text" name="user"><br />
        <label for="user"><?= _("Password") ?></label><input type="text" name="pass">
        <input type="hidden" name =idioma value = '<?php echo $_POST['idioma'] ?>' >
        <input type="submit" value="<?= _("Acceder")  ?>" name="acceder">
    </fieldset>
</form>

</body>
</html>

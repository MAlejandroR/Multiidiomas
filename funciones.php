<?php

function set_language($idioma)
{
    //$idioma = $_POST[idioma] ?? "es_ES.utf8";
    $lang = _("Castellano");

    $a=putenv("LC_ALL=$idioma");//Establecemos la variable de entorno para configuración regional.
//    echo "<h3>Función putenv retorna $a </h3>";
    $a=setlocale(LC_ALL, $idioma);
//    echo "<h3>Función setlocale  retorna $a </h3>";
//Especificamos la ubicación de los ficheros de traducción
    $dominio = "messages";

    $a=bindtextdomain($dominio, "./locale");
//    echo "<h3>Función bindtextdomain retorna $a </h3>";
    $a=textdomain($dominio);
//    echo "<h3>Función textdomain retorna $a </h3>";
//    var_dump($idioma);
    switch ($idioma) {
        case 'es_ES.utf8':
            $lang= _("Castellano");
            break;
        case 'en_US.utf8':
            $lang=_("Inglés");
            break;
        case 'fr_FR.utf8':
            $lang= _("Francés");
            break;
    }
    return $lang;
}

function form_idiomas($idioma){
    $checked_fr = $idioma=='fr_FR.utf8'? "checked": null;
    $checked_en = $idioma=='en_US.utf8'? "checked": null;
    $checked_es = $idioma=='es_ES.utf8'? "checked": null;
    $select = _("Selecciona idioma");
    $fr= _("Francés");
    $en= _("Inglés");
    $es= _("Español");
    $submit = _("Establecer idioma");
    $html =<<<FIN
        <legend>$select</legend>
<input type='radio' name='idioma'  $checked_fr value="fr_FR.utf8">$fr<br/>
<input type='radio' name='idioma' $checked_en  value='en_US.utf8'>$en<br/>
<input type='radio' name='idioma' $checked_es  value='es_ES.utf8'>$es<br/>
<input type='submit' style='float:right' name='submit' value='$submit'>
FIN;
    return $html;
}





?>
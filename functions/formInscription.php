<?php

function formInscription()
{
    $html = "<form action='index.php?page?formInscription' method=post>";
    $html .= "<label for='nom'>Votre nom</label>";
    $html .= "<input type='text' name='nom' id='nom' value='<?php echo $nom' />";
}
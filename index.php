<?php

session_start();
date_default_timezone_set('Europe/Paris');

spl_autoload_register(function($className) {
    include './classes/' . $className . '.php';
});

$michel = new User();
$michel->setNomUser("dupont");
$michel->setprenomUser("dupond");
$michel->setemail("dupont@gmail.com");
$michel->setdateNaissance("1967-01-11");

$connexion = new Sql();

var_dump($michel);
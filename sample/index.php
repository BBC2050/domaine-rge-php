<?php

include_once '../vendor/autoload.php';

use BBC2050\DomaineRGE\Repository;

$domaines = Repository::get();
$domaine = Repository::getOne('29');
$search = Repository::getBy('Etude');

var_dump($domaine);
var_dump($search);
var_dump($domaines);

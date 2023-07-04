<?php

// j'appelle le model Covid.php
require_once "../models/Covid.php";

// j'instancie un nouvel objet Covid
$covid_objet = new Covid();

// je stock le résultat de la fonction getAllVaccinations() dans une variable $result
$result = $covid_objet->getAllVaccinations();

// j'inclus la vue suivi.php
include "../views/suivi.php"; 

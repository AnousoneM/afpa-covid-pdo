<?php
// Je définis les constantes de connexion à la base de données
require_once "../config.php";

// j'appelle le fichier helpers/Database.php
require_once "../helpers/Database.php";

// j'appelle le model Covid.php
require_once "../models/Covid.php";

// j'inclus la vue suivi.php
include "../views/suivi.php"; 

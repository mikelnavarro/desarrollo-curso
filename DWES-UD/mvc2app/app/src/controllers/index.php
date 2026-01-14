<?php


namespace Mikelnavarro\App;
use Mikelnavarro\App\Models;
include('articles.php');       // En este archivo estará el modelo
$articulos = Model::getAll();  // Este método del modelo nos devuelve la lista de artículos
include('showAllArticles.php');   // En este archivo estará la vista
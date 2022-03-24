<?php

$loader    = "src/views";
$loaderApi = "src/api";
$page;

if(!isset($_GET['uri'])){

    $page = $loader."/home.php";
    require $page;

} else {

    

    switch($_GET['uri']) {

        case 'api/cadastro-alunos':
            $page = $loaderApi."/cadastro-alunos.php";
            break;
        case 'cadastro':
            $page = $loader."/cadastro.php";
            break;
        case 'cadastro-alunos':
            $page = $loader."/cadastro-alunos.php";
            break;
        default:
            $page = $loader."/404.php";
            break;

    }
    require $page;

}


?>
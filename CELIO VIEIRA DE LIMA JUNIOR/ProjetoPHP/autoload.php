<?php

spl_autoload_register(function ($name){
    //projetophp\src\model\vo\AlunoVO
    $require = str_replace("ProjetoPHP","", $name);
    $require = str_replace("\\",DIRECTORY_SEPARATOR, $require);
    require __DIR__.$require.".php";
});
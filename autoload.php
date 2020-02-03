<?php

spl_autoload_register(
    function ($class) {
        $diretorio = "classes/";
        if (file_exists($diretorio . $class . ".php")) {
            require $diretorio . $class . ".php";
        }
    }
);

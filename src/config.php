<?php

    require "connection.php";

    function executeQuery($query,$connection,$protections,$typeQuery) {

        $exeQuery = $connection->prepare($query);

        if($protections){
            protectionSqlInjection($exeQuery,$protections);
        }

        $exeQuery->execute();

        $exeQuery = $exeQuery ? json_encode($exeQuery->fetchAll(PDO::FETCH_ASSOC)) : false; 

        if($exeQuery){
            if ($typeQuery == "get"){
                echo $exeQuery;
            } else if ($typeQuery == "post"){
                echo json_encode("Aluno Cadastrado!");
            }
            http_response_code(200);
        } else {
            http_response_code(500);
            echo json_encode("internal-server-error");
        }

    }

    function protectionSqlInjection($exeQuery,$protections) {

        $count = count($protections);

        for ($i = 0; $i < $count; $i++) {

            if (is_string($protections[$i]) || is_float($protections[$i])) {
                $typeProtection = PDO::PARAM_STR;
            } else if (is_int($protections[$i])) {
                $typeProtection = PDO::PARAM_INT;
            }

            $exeQuery->bindValue($i+1,$protections[$i],$typeProtection);

        }

    }

?>
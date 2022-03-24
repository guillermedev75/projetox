<?php

    require "src/connection.php";
    require "src/config.php";

    if(isset($_POST)){

        $nomeAluno = $_POST["nomeAluno"];
        $turmaAluno = $_POST["turmaAluno"];

        $ifNotes = '';
        $ifNotesValue = '';
        $ifNotesProtection = '';

        $protecions = [$nomeAluno, $turmaAluno];

        if(isset($_POST['nota1'])){

            $nota = $_POST["nota1"];

            $ifNotes .= ',nota1';
            $ifNotesProtection .= ",?";
            array_push($protecions , "$nota");

        } else if(isset($_POST['nota2'])) {

            $nota = $_POST["nota2"];

            $ifNotes .= ',nota2';
            $ifNotesProtection .= ",?";
            array_push($protecions , "$nota");

        } else if(isset($_POST['nota3'])) {

            $nota = $_POST["nota3"];

            $ifNotes .= ',nota3';
            $ifNotesProtection .= ",?";
            array_push($protecions , "$nota");

        } else if(isset($_POST['nota4'])) {

            $nota = $_POST["nota4"];

            $ifNotes .= ',nota4';
            $ifNotesProtection .= ",?";
            array_push($protecions , "$nota");

        }

        $query = "INSERT INTO alunos (nome,turma$ifNotes) VALUES (?,?$ifNotesProtection)";

        executeQuery($query,$connection,$protecions,'post');

    }

?>
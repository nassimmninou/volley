<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../racine.php';
    include_once RACINE . '/service/EtudiantService.php';
    include_once RACINE . '/classes/Etudiant.php';

    create();
}

function create() {
    extract($_POST);
    $es = new EtudiantService();
    $newEtudiant = new Etudiant(1, $nom, $prenom, $ville, $sexe);

    $response = array();

    if ($es->create($newEtudiant)) {
        $response[] = $newEtudiant;
    } else {
        $response['error'] = "Failed to create the student.";
    }

    echo json_encode($response);
}
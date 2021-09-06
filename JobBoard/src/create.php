<?php

// Initialise les fichiers nécessaire au fonctionnement du site ainsi que la liaison à la DB 
include_once 'config/init.php';

// Initialise une nouvelle classe Job
$job = new Job;

if(isset($_GET['submit'])){
    $data = array();
    $data['job_title'] = $_GET['job_title'];
    $data['company'] = $_GET['company'];
    $data['profession_id'] = $_GET['profession'];
    $data['contract_id'] = $_GET['contract'];
    $data['location_id'] = $_GET['location'];
    $data['description'] = $_GET['description'];
    $data['salary'] = $_GET['salary'];
    $data['contact_user'] = $_GET['contact_user'];
    $data['contact_email'] = $_GET['contact_email'];

    if($job->create($data)){
        redirect('index.php', 'Votre offre d\'emploi a été crée !', 'success');
    } else {
        redirect('index.php', 'Oups, il y a eu une erreur ! Votre offre d\'emploi n\'as pas été crée !', 'error');
    }
}

// Initialise une nouvelle classe Template
$template = new Template('templates/job-create.php');

// Affiche les différentes options pour la barre de recherche
$template->professions = $job->getProfession();
$template->locations = $job->getLocation();
$template->contracts = $job->getContract();

// Affiche le template
echo $template;

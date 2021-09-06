<?php

// Initialise les fichiers nécessaire au fonctionnement du site ainsi que la liaison à la DB 
include_once 'config/init.php';

// Initialise une nouvelle classe Job
$job = new Job;

// Initialise une nouvelle classe Template
$template = new Template('templates/frontpage.php');

// Vérifie si les variables sont définie sinon les attribue à null
$_SESSION['profession'] = isset($_GET['profession']) ? $_GET['profession'] : null;
$_SESSION['location'] = isset($_GET['location']) ? $_GET['location'] : null;
$_SESSION['contract'] = isset($_GET['contract']) ? $_GET['contract'] : null;
$_SESSION['orderby'] = isset($_GET['orderby']) ? $_GET['orderby'] : null;

// Forêt de if afin de filtrer les résultat en fonction des variables définie lors de la recherche

if ($_SESSION['orderby'] == 1) {
    if ($_SESSION['profession'] && $_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionContractAndLocationAsc($_SESSION['profession'], $_SESSION['contract'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.contract_id = 1 
        AND jobs.location_id = 1')->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['contract']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByProfessionAndContractAsc($_SESSION['profession'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . ' 
        AND jobs.contract_id = ' . $_SESSION['contract'])->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionAndLocationAsc($_SESSION['profession'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.location_id = 1 ')->fetch_row()[0];
    } else if ($_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAndContractAsc($_SESSION['location'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id
        AND jobs.contract_id = ' . $_SESSION['contract'] . ' 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['profession']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name;
        $template->jobs = $job->getByProfessionAsc($_SESSION['profession']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . '')->fetch_row()[0];
    } else if ($_SESSION['location']) {
        $template->title = 'Offres à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAsc($_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['contract']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByContractAsc($_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.contract_id = ' . $_SESSION['contract'] . '')->fetch_row()[0];
    } else {
        $template->title = 'Toutes les offres';
        $template->jobs = $job->getAllJobsAsc();
    }
} else if($_SESSION['orderby'] == 2) {
    if ($_SESSION['profession'] && $_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionContractAndLocationAlphDesc($_SESSION['profession'], $_SESSION['contract'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.contract_id = 1 
        AND jobs.location_id = 1')->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['contract']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByProfessionAndContractAlphDesc($_SESSION['profession'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . ' 
        AND jobs.contract_id = ' . $_SESSION['contract'])->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionAndLocationAlphDesc($_SESSION['profession'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.location_id = 1 ')->fetch_row()[0];
    } else if ($_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAndContractAlphDesc($_SESSION['location'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id
        AND jobs.contract_id = ' . $_SESSION['contract'] . ' 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['profession']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name;
        $template->jobs = $job->getByProfessionAlphDesc($_SESSION['profession']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . '')->fetch_row()[0];
    } else if ($_SESSION['location']) {
        $template->title = 'Offres à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAlphDesc($_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['contract']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByContractAlphDesc($_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.contract_id = ' . $_SESSION['contract'] . '')->fetch_row()[0];
    } else {
        $template->title = 'Toutes les offres';
        $template->jobs = $job->getAllJobsAlphDesc();
    }
} else if($_SESSION['orderby'] == 3) {
    if ($_SESSION['profession'] && $_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionContractAndLocationAlphAsc($_SESSION['profession'], $_SESSION['contract'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . ' 
        AND jobs.contract_id = ' . $_SESSION['contract'])->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['contract']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByProfessionAndContractAlphAsc($_SESSION['profession'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.contract_id = 1 ')->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionAndLocationAlphAsc($_SESSION['profession'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.location_id = 1 ')->fetch_row()[0];
    } else if ($_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAndContractAlphAsc($_SESSION['location'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id
        AND jobs.contract_id = ' . $_SESSION['contract'] . ' 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['profession']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name;
        $template->jobs = $job->getByProfessionAlphAsc($_SESSION['profession']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . '')->fetch_row()[0];
    } else if ($_SESSION['location']) {
        $template->title = 'Offres à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAlphAsc($_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['contract']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByContractAlphAsc($_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.contract_id = ' . $_SESSION['contract'] . '')->fetch_row()[0];
    } else {
        $template->title = 'Toutes les offres';
        $template->jobs = $job->getAllJobsAlphAsc();
    }
} else {
    if ($_SESSION['profession'] && $_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionContractAndLocation($_SESSION['profession'], $_SESSION['contract'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = '. $_SESSION['profession'].' 
        AND jobs.contract_id = ' . $_SESSION['contract'] .' 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['contract']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByProfessionAndContract($_SESSION['profession'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . ' 
        AND jobs.contract_id = ' . $_SESSION['contract'])->fetch_row()[0];
    } else if ($_SESSION['profession'] && $_SESSION['location']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByProfessionAndLocation($_SESSION['profession'], $_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = 1 
        AND jobs.location_id = 1 ')->fetch_row()[0];
    } else if ($_SESSION['contract'] && $_SESSION['location']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name . ' à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocationAndContract($_SESSION['location'], $_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id
        AND jobs.contract_id = ' . $_SESSION['contract'] . ' 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['profession']) {
        $template->title = 'Offres en tant que ' . $job->getProfessionName($_SESSION['profession'])->name;
        $template->jobs = $job->getByProfession($_SESSION['profession']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.profession_id = ' . $_SESSION['profession'] . '')->fetch_row()[0];
    } else if ($_SESSION['location']) {
        $template->title = 'Offres à ' . $job->getLocationName($_SESSION['location'])->name;
        $template->jobs = $job->getByLocation($_SESSION['location']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.location_id = ' . $_SESSION['location'] . '')->fetch_row()[0];
    } else if ($_SESSION['contract']) {
        $template->title = 'Offres en ' . $job->getContractName($_SESSION['contract'])->name;
        $template->jobs = $job->getByContract($_SESSION['contract']);
        $_SESSION['total_pages'] = $mysqli->query('SELECT COUNT(*) FROM jobs, location, profession, contract 
        WHERE jobs.profession_id = profession.id 
        AND jobs.contract_id = contract.id 
        AND jobs.location_id=location.id 
        AND jobs.contract_id = ' . $_SESSION['contract'] . '')->fetch_row()[0];
    } else {
        $template->title = 'Toutes les offres';
        $template->jobs = $job->getAllJobs();
    }
}



// Affiche les différentes options pour la barre de recherche
$template->professions = $job->getProfession();
$template->locations = $job->getLocation();
$template->contracts = $job->getContract();

// Affiche le template
echo $template;

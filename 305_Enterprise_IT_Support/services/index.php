<?php
include '../common/configuration.php';
include '../model/database.php';
include '../model/requests_db.php';
include '../common/functions.php';

if (isset($_GET['list'])){
    $requests = getRequests('In Progress');
    sort($requests);
    include 'request_list.php';
    exit();
}

if (isset($_GET['random'])){
    $request = getRandomRequest('In Progress');
    include 'request_random.php';
    exit();
}

if (isset($_GET['problemtypes'])){
    $data = getProblemTypes();
    include 'request_problem_types.php';
    exit();
}

?>

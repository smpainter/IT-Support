<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addRequest($teacher_id,$room,$problem_type,$comment){
    global $db;
    $sql = "INSERT INTO `requests`(`teacher_id`, `avtech_id`, `room`, `problem_type`, `status`, `comments`) VALUES "
            . " (?, null, ?, ?, 'In Progress', ?)";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$teacher_id);
    $statement->bindValue(2,$room);
    $statement->bindValue(3,$problem_type);
    $statement->bindValue(4,$comment);
    if ($statement->execute()){
        $last = $db->lastInsertId();
        $result = substr('00000000' . $last, -8);
        $result = 'T'. $result;
        $sql = "update `requests` set confirmation = ? where request_id = ?";
        $statement=$db->prepare($sql);
        $statement->bindValue(1,$result);
        $statement->bindValue(2,$last);
        $statement->execute();
    } else
    {
        $result = false;
    };
    
    $statement->closeCursor();
    
    //result is true on success, false on error
    return $result;
}

function getRequests($status){
    global $db;
    $sql = "SELECT `request_id`, `firstname`, `lastname`, `teacher_id`, `avtech_id`, `room`, `problem_type`, `status`, `comments` FROM `requests`, `people` "
            . " WHERE `status` = :status and `teacher_id` = `people_id`";
    $statement = $db->prepare($sql);
    $statement->bindValue(':status',$status);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    //result is the array of results
    return $result;    
}

function closeRequest($request_id,$avtech_id){
    global $db;
    $sql = "UPDATE `requests` SET status = 'Resolved', `avtech_id` = :avtech_id WHERE request_id = :request_id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':avtech_id',$avtech_id);
    $statement->bindValue(':request_id',$request_id);
    $result = $statement->execute();
    $statement->closeCursor();
    
    //result is true on success, false on error
    return $result;
}

function getProblemTypes(){
    global $db;
    $sql = "SELECT `type` FROM `problem_types` order by displayorder, type ";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    //result is the array of results
    return $result;        
}

function getRandomRequest($status){
    global $db;
    $sql = "SELECT `confirmation`, `request_id`, `firstname`, `lastname`, `teacher_id`, `avtech_id`, `room`, `problem_type`, `status`, `comments` FROM `requests`, `people` "
            . " WHERE `status` = :status and `teacher_id` = `people_id`";
    $statement = $db->prepare($sql);
    $statement->bindValue(':status',$status);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_BOTH);
    $statement->closeCursor();
    //result is the array of results
    $count = count($results);
    $result = '';
    if ($count > 0) {
        $key = mt_rand(0, $count -1);
        $result = $results[$key];
    }
    return $result;    
}
?>
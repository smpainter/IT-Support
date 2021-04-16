<?php

/*if there is not a person match, then return false.  Otherwise return the person_id. */

function loginPeople($username,$password,$type){
    //returns true if the username and password are a good match.  false if not
    global $db;
    $statement = $db->prepare('select people_id from people where username=:username and password = :password and type=:type');
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':type',$type);
    $statement->execute();
    $array = $statement->fetch();
    $statement->closeCursor();
    if (empty($array['people_id'])){
        $result = false;
    } else
    {
        $result = $array['people_id'];
    }
    return $result;    
}

?>
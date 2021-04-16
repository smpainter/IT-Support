<?php include '../common/configuration.php';?>
<?php include "../model/database.php"; ?>
<?php include "../model/people_db.php"; ?>
<?php
$message = "";
$type = filter_input(INPUT_GET,'type');

if (isset($_GET['logout'])){
    include 'people_logout.php';
    exit();
}
if (isset($_POST['go_button']) && $type=='tech')
{
    $headertype = 'Technician Sign In';
    $username = strtolower(filter_input(INPUT_POST,'username'));
    $password = filter_input(INPUT_POST,'password');
    $tech_id = loginPeople($username,$password,'tech');
    if (!empty($tech_id)){
        session_start();
        $_SESSION['LOGGED_IN']='OK';
        $_SESSION['TYPE']='tech';
        $_SESSION['TECH_ID'] = $tech_id;
        $_SESSION['TEACHER_ID'] = null;
        $_SESSION['USERNAME'] = $username;
        header('Location: ../requests/index.php');
        exit();
    } else
    {
        $message = "<div class='alert alert-danger'>Login failed. Please try again.</div>";
        include 'people_login.php';
        exit();
    }
} 

if (isset($_POST['go_button']) && $type=='teacher')
{
    $headertype = 'Teacher Sign In';
    $username = strtolower(filter_input(INPUT_POST,'username'));
    $password = filter_input(INPUT_POST,'password');
    $teacher_id = loginPeople($username,$password,'teacher');
    if (!empty($teacher_id)){
        session_start();
        $_SESSION['LOGGED_IN']='OK';
        $_SESSION['TYPE']='teacher';
        $_SESSION['TECH_ID'] = null;        
        $_SESSION['TEACHER_ID'] = $teacher_id;
        $_SESSION['USERNAME'] = $username;        
        header('Location: ../requests/index.php');
        exit();
    } else
    {
        $message = "<div class='alert alert-danger'>Login failed. Please try again.</div>";
        include 'people_login.php';
        exit();
    }
} 


if ($type=='tech'){
    $headertype = 'Technician Sign In';
    include 'people_login.php';
    exit();
}

if ($type=='teacher'){
    $headertype = 'Teacher Sign In';
    include 'people_login.php';
    exit();
}

//if all else fails
$type ='tech';
$headertype = 'Technician Sign In';
include 'people_login.php';
exit();
?>

<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/UI/viewresultform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Candidate/BC/viewresult.php");

$host  = $_SERVER['HTTP_HOST'];

$rf = new Resultform();
$result = new Result();
session_start();
error_reporting(0);
//not logged in
if (!isset($_SESSION['candidateid']))
{
$errort = $exam->timeoutError();
$ef->displayTimeout($errort);
}
else if(isset($_POST['login']))
header("Location: http://$host/Online Exam Ex_2/Candidate/index.php");
else if (isset($_POST['logout']))
{
session_destroy();
header("Location: http://$host/Online Exam Ex_2/index.php");
}
else if(isset($_POST['welcome']))
header("Location: http://$host/Online Exam Ex_2/Candidate/LOGIC/Candidatewelcomelogic.php");
else if(isset($_POST['certificate']))
{
$result->getResultdetail();
$rf->certificateForm($result);
}
else if(isset($_SESSION['givecertficate']))//only the detail for a single exam is viewed
{
$result->getResultdetail();
$result->calculatePercentage();
$result->checkcompetency();
$result->fetchDate();
$result->insertCompetency();
$result->getResultdetail();
$rf->displayResultdetail($result,$candma);
}
else  
{
$rs=$result->getExamstaken();
/*if(!$rs)
{
//$errorn=$result->noexamTaken();
$ef->displayNoexam($errorn);
}
else
{*/
$rf->displayOverexams($result);
}


?>
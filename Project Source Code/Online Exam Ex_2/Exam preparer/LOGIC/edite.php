<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprewelcomeform.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/BC/exampreparerbc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprepareinterfacee.php");
$exmpr = new prepareexam();
	  $exprf = new Questionform();
	   $rlf=new Adminwelcomeform();
	   error_reporting(0);
		session_start();
	  
	  if (isset($_GET['edit']))
	 { 
	
	  $_SESSION['edit'] = $_GET['edit'];
		
	  $value1=$exmpr->getQuestion($_GET['edit']);
	  if(count($value1)>0)
	  {
	  	$exprf->EditQuestionform($value1);
	  }
		 }
	  
		 
		 
	
	 ?>
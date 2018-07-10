<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprepareinterfacee.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/BC/exampreparerbc.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/UI/examprewelcomeform.php");

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
session_start();
error_reporting(0);
   $exprf = new Questionform();
   $exmpr = new prepareexam();
   $rlf=new Adminwelcomeform();
   
     error_reporting(E_ALL);

  if (isset($_SESSION['name']) && isset($_SESSION['examid']))
	                       {
	 
if (isset($_POST['savea']))
	{   

	 $exmpr->collectexamdata();
	 //collectexam
	 
	 $errorva= $exmpr ->emptyvalidation();
	 
			//empty validation
			if(count($errorva)>0)
			{
			 
				$exprf->Questioncontentform($errorva,"");
			//echo "ceate";
			}
			else
			{
				$errorva=$exmpr->checksamechoice();
		//check if each option have same value or not
				if(count($errorva)>0)
				{
					$exprf->Questioncontentform($errorva,"");
				}
				else
				{
				    $Exist=$exmpr->CheckExistQuestion();
					  if($Exist==false)
					  { 
					$newqnid=$exmpr->generatequestionid();
					
				    $success=$exmpr->createexam($newqnid);
				
					$value1=$exmpr->QuestionChecker();
				
					$exprf->displaytabelquestion($value1,""); }
				else{
				$Exist1=$exmpr->Existerorr();
				$exprf->Questioncontentform($Exist1,"");
				 
				}	}
		
		}
	
		}

	



else if(isset($_POST['viewexam']))
{
$value1=$exmpr->QuestionChecker();

 $exprf->displaytabelquestion($value1);
}


else if (isset($_POST['savem']))
	 {
		$errorva = array();
	  
	 	$exmpr->collectexamdata();
	
	 	$errorva=$exmpr->emptyvalidation();
	
		if(count($errorva)>0)
		{
			echo "There is error";
			$exprf->EditQuestionform("",$errorva);
		}
		else
		{
			$errorva1=$exmpr->checksamechoice();
		//check if each option have same value or not
			if(count($errorva1)>0)
			{
				$exprf ->EditQuestionform($errorva1,"");
			}
			else
			{	
				$qnNum = $_SESSION['edit'];
				$success=$exmpr->updateexam($qnNum);
	     		if($success){
					$value1=$exmpr->QuestionChecker();
					$exprf->displaytabelquestion($value1,"");
				}
			}
		}
	}

	 
 else if (isset($_POST['add']))
	 {

	
	$result = $exmpr->getNumberQuestionsPrepared($_SESSION['examid']);
	if($result["preparedQns"]<$result["totalquestions"])
	      $exprf->Questioncontentform("","");
		
	else if($result["preparedQns"]>=$result["totalquestions"]){
		$status = "You have already prepared enough questions!";
		$value1=$exmpr->QuestionChecker();
		$exprf->displaytabelquestion($value1,$status);
	}
	
	 
	 
	 
	 	
	 }


else
$exprf->Questioncontentform("","");	
			
	}	
 
 if (isset($_POST['cancel']))
	 {
	 	header("Location: http://$host/Online Exam Ex_2/Exam preparer/LOGIC/examprewelcomelogic.php");
	 }	 	
	if(isset($_POST['logout']))
{
session_destroy();
unset ($_SESSION['admname']);
header("Location:http://$host/Online Exam Ex_2/index.php");
}
//}	 
 
?>
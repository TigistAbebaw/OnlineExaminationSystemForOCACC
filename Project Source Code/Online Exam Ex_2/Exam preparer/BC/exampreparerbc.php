<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(E_ALL);
class prepareexam
{
var    $txtQuestion;
var    $txtChoices1;
var    $txtChoices2;
var    $txtChoices3;
var    $txtChoices4;
var    $txtAnswer;
var    $TotalQuestion;  
var    $marks;

    function collectexamdata()
	{
	//collect exam deatil
		$this->txtQuestion = trim($_POST['txtQuestion']);
		$this->txtChoices1 = trim($_POST['txtChoices1']);
		$this->txtChoices2 = trim($_POST['txtChoices2']);
		$this->txtChoices3 = trim($_POST['txtChoices3']);
		$this->txtChoices4= trim($_POST['txtChoices4']);
		$this->txtAnswer = trim($_POST['txtAnswer']);
		$this->marks = trim($_POST['marks']);


	
	}
	function emptyvalidation(){
	 $error=array();
	 if(strcmp($this->txtQuestion,"")==0){
			$error['txtQuestion'] = "Invalid entry for Question";
		}
		if(strcmp($this->txtChoices1,"")==0 ){
			$error['txtChoices1'] = "Invalid entry ";
		}
		if(strcmp($this->txtChoices2,"")==0){
			$error['txtChoices2'] = "Invalid entry ";
		}
		if(strcmp($this->txtChoices3,"")==0){
			$error['txtChoices3'] = "Invalid entry ";
		}
		if(strcmp($this->txtChoices4,"")==0){
			$error['txtChoices4'] = "Invalid entry ";
		}
		if(strcmp($this->txtAnswer,"---Select Answer---")==0){
			$error['txtAnswer'] = "Invalid entry for Answer";
			
		}
		if(strcmp($this->marks,"")==0){
			$error['marks'] = "Invalid entry for Marks";
			}
	return $error;
}
function getNumberQuestionsPrepared($examId){
	$pr = new Persistence();
	$query = "SELECT preparedQns, totalquestions, t2.examId FROM ( SELECT examId, totalquestions FROM `exam` WHERE examId = '".$examId."' )t2 INNER JOIN ( SELECT COUNT( questionno ) AS preparedQns, examId FROM question WHERE examid = '".$examId."' )t3 ON t2.examId = t3.examId";
	
	$result = $pr->search($query);
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
    	$r3 = $row;
	if(!$r3)
		return false;
	else
		return $r3;
}
function checksamechoice(){
	$error1=array();
	if (strcasecmp($this->txtChoices1, $this->txtChoices2) == 0 || strcasecmp($this->txtChoices1, $this->txtChoices3) == 0 || strcasecmp($this->txtChoices1, $this->txtChoices4) == 0 || strcasecmp($this->txtChoices2, $this->txtChoices3) == 0 || strcasecmp($this->txtChoices2,$this->txtChoices4) == 0 || strcasecmp($this->txtChoices3, $this->txtChoices4) == 0) {
	    $error1['same'] = "Two or more options are representing same answers.";
	       
	}
	return $error1;
}
	

function Timeout()
{
$error=array();
$error['$message']="Session Timeout.";
return $error;
}
function Existerorr()
{
$error=array();
$error['Exist']="Sorry, You trying to Enter same question for Same exam.";
return $error;
}

function QuestionChecker()
{
$pr = new Persistence();
$examId_ = $_SESSION['examid'];
  $result3 ="select * from question where examid='" .$examId_. "' order by questionno";
  $result = $pr->search($result3);

                                if (mysql_num_rows($result) == 0) {
                                   
									return false;
                                } 
								else
									return $result;
                
	}
	
	
	function SetOrder()
{
$pr = new Persistence();
$examId_ = $_SESSION['examid'];
  $result3 ="select * from question where examid='" .$examId_. "' order by questionid";
  $result = $pr->search($result3);

                                if (mysql_num_rows($result) == 0) {
                                   
									return false;
                                } 
								else
									return $result;
             
	}
	function getQuestion($qnId)
{ 

$pr = new Persistence();


  $result3 ="select * from question where questionno='" .$qnId. "'";
  $result = $pr->search($result3);

                                if (mysql_num_rows($result) == 0) {
                                   
									return false;
                                } 
								else{
									while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
                					$r3 = $row;
								}
                     return $r3 ;
				// echo $r3['questionid'] ;
	}
   
   function EditConttentPage($Editdata)
{
$pr = new Persistence();
 $result ="select * from question where examid=" . $_SESSION['examid'] . " and questionno='" .$Editdata['questionid']."'"; 
 $result4 = $pr->search($result);
                                if (mysql_num_rows($result4) == 0) {
								  return false;
								   }
                                   
                                 else if ($r = mysql_fetch_array($result4))
								  {
								  
								  return $r;
								 }


}


function createexam($newqnid)
			   {
			   
			    $p = new Persistence();
                  $p->connect();
			   $query="INSERT INTO question (examid,questionno,question,choicea,choiceb,choicec,choiced,correctanswer,marks) VALUES('".$_SESSION['examid']."','".$newqnid."','".htmlspecialchars($this->txtQuestion,ENT_QUOTES)."','".htmlspecialchars($this->txtChoices1,ENT_QUOTES)."','".htmlspecialchars($this->txtChoices2,ENT_QUOTES)."','".htmlspecialchars($this->txtChoices3,ENT_QUOTES)."','".htmlspecialchars($this->txtChoices4,ENT_QUOTES)."','".htmlspecialchars($this->txtAnswer,ENT_QUOTES)."','".htmlspecialchars($this->marks,ENT_QUOTES)."')";
        if ($p->search($query))
		{
            $success=true;
		}	
        else
           $success=false;
  return $success; 
   }
   
  
    function updateexam($newqnid)
			   {
			   
			   $p = new Persistence();
                  $p->connect();
			   $query="update question set
			   question = '".htmlspecialchars($this->txtQuestion,ENT_QUOTES)."', choicea = '".htmlspecialchars($this->txtChoices1,ENT_QUOTES)."',choiceb = '".htmlspecialchars($this->txtChoices2,ENT_QUOTES)."', choicec = '".htmlspecialchars($this->txtChoices3,ENT_QUOTES)."',choiced = '".htmlspecialchars($this->txtChoices4,ENT_QUOTES)."', correctanswer = '".htmlspecialchars($this->txtAnswer,ENT_QUOTES)."',marks = '".htmlspecialchars($this->marks,ENT_QUOTES)."' where questionno = '".$newqnid."'";


          if ($p->search($query))
		{
            $success=true;
		}	
        else
           $success=false;
  return $success; 
   }

 
 function CheckExistQuestion()
 {
  $p = new Persistence();
   $p->connect();
  $result = $p->search("select * from question where examid=" . $_SESSION['examid'] . " and question='" . htmlspecialchars($this->txtQuestion,ENT_QUOTES) . "';");
    if ($Exist =mysql_fetch_array($result)) 
	{             
     return true; 
 
      }
    return false;
    }
 
 
			  
			 function generatequestionid()
			  {
			  $p = new Persistence();
                  if($p->connect())
			  $examId_ = $_SESSION['examid'];
			 {
			 
	
			 $query = "select max(questionno) as qn from question  INNER JOIN exam on exam.examid=question.examid where  exam.examid='".$examId_."'";

			  $result=$p->search($query);
			  
			    }
    $r = mysql_fetch_array($result);
	
    if (is_null($r['qn']))
        $newstd = 0;
    else
        $newstd=$r['qn'] + 1;
		return $newstd;
		 
			 
			  }
			   
		       
 
  

			   
  function  deletexam()
{
 unset($_REQUEST['delete']);
    $hasvar = false;
   
    foreach ($_REQUEST as $variable) {
        if (is_numeric($variable)) { //it is because, some session values are also passed with request
            $hasvar = true;

            if (!@search("delete from question where examid=" . $_SESSION['examid'] . " and questionid=" . htmlspecialchars($variable)))
                $_GLOBALS['message'] = mysql_error();
        }
    }
  
    
    if (!isset($_GLOBALS['message']) && $hasvar == true)
        $_GLOBALS['message'] = "Selected Questions are successfully Deleted";
    else if (!$hasvar) 
        $_GLOBALS['message'] = "First Select the Questions to be Deleted.";
		
		return  $_GLOBALS['message'];
                    
}
	
   

}
?>
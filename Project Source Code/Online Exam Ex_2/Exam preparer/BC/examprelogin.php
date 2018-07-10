<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Exam preparer/LOGIC/prepareQuestion.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");

class Adminaccount
{
var    $name;
var    $password;
var    $TotalQuestion;  
var    $email;
var    $examid;
// 
function collectLogindata()
{
$this->name=trim($_POST['name']);
$this->password=trim($_POST['password']);

}

function validateUser()
{
$error = array();
if($this->name == "")
$error['name'] = "Please enter your name";
if($this->password == "")
$error['pass'] = "Please enter ur password";
return $error;
}

function totalQuestionPageContent()
	{
	$this->TotalQuestion = trim($_POST['TotalQuestion']);
	$this->examid = trim($_POST['examid']);
	}
	
	function validatetotalQuestionPageContent()
	{
	$error = array();
	if(strcmp($this->TotalQuestion,"")==0){
			$error['1'] = "Please fill in TotalQuestion.";
		}
	//if(strcmp($this->TotalQuestion ,$this->TotalQuestion>4)==0){
	//		$error['1'] = "TotalQuestion must be Grater than 35 or Equals to 35.";
	//	}
	if(strcmp($this->examid,"")==0){
			$error['2'] = "Please fill in examid.";
		}
        return $error;
	
		}
function authenticateUser()
{ $p=new Persistence();
  if($p->connect())
  {
 
$mQuery = "select * from exampreparer where name='".htmlspecialchars($this->name,ENT_QUOTES)."' and password='".(htmlspecialchars($this->password,ENT_QUOTES))."'";
  
 $result = $p->executeInsertSQL($mQuery);
//echo $result['password'];
 if(mysql_num_rows($result)>0)
              { $r=array();
              $r = mysql_fetch_array($result);
			//echo $r;
              if(strcmp($r['password'],(htmlspecialchars($this->password,ENT_QUOTES)))==0) 
			  return $r;
			  else 
			  return false;
			  }
    }
		$p ->closedb();
}

	
function authenticateexamid()
{ $p=new Persistence();
  if($p->connect())
  {
$mQuery = "select * from exam where examid='".htmlspecialchars($this->examid,ENT_QUOTES)."'";
 
 $result = $p->executeInsertSQL($mQuery);

 if(mysql_num_rows($result)>0)
              {
              $r = mysql_fetch_array($result);
			  $_SESSION['examid']=$r['examid'];
              if(strcmp($r['examid'],(htmlspecialchars($this->examid,ENT_QUOTES)))==0) 
			  return $r;
			  else 
			  return false;
			  }
    }
		$p ->closedb();
}


function checkexamiderror()
{
$error = array();
$error['3']="Invalid Exam Id";
return $error;
}


function getExamId()
{ $p=new Persistence();
  //if($p->connect())
  
  
$mQuerys = "select examid from exam INNER JOIN exampreparer on exampreparer.examprepid=exam.examprepid where exampreparer.name='".$_SESSION['name']."'";
 
 $result = $p->executeInsertSQL($mQuerys);

 if(mysql_num_rows($result)>0)
              {
              $r = mysql_fetch_array($result);
			  if($r){
			  return $r;
			 }
			  else 
			  return false;
			  }
    
		$p ->closedb();
}	





  
function  errorDisplay()
 {
  $error=array();
  $error['login'] = "Please enter ur username and password correctly";
   return $error;
 }
  




/*function loginUser($r)
{
 session_start();
 $_SESSION['admname']=htmlspecialchars_decode($r['admname'],ENT_QUOTES);
}*/
function CheckExamprepid(){

$pr = new Persistence();
// 
$FachExamprepid="select examprepid from exampreparer where name='" .$_SESSION['name']."'";
$result = $pr->search($FachExamprepid);
 if(mysql_num_rows($result)==0)
              {
              return false;
			  }
			
			  
    else{
	$r = mysql_fetch_array($result);
              if($r){
	$Fachexamid = "select examid from exam where examprepid='" .$r['examprepid']."'";
	//$pr = new Persistence();
	$result1 = $pr->search($Fachexamid);
	if(mysql_num_rows($result1)>0)
              {
              $r1 = mysql_fetch_array($result1);
              if($r1){			  //$Examid=$r1['examid'];
		  return $r1;
		  $_SESSION['examid']=$r1['examid'];
			         //echo "Id".$_SESSION['examid'];          
					  	}
		  else
	             return false;	
			                           
			
			 }
			 
	else
	return false;
	
		//$p ->closedb();
}

else
	return false;
}
}
function QuestionChecker($data)
{
$pr = new Persistence();
  $result3 ="select * from question where examid='" .$data['examid'] . "' order by questionid";
  $result = $pr->search($result3);

                                if (mysql_num_rows($result) == 0) {
                                   
									return false;
                                } 
                $r3 = mysql_fetch_array($result);
return $r3 ;
	}

function EditConttentPage($Editdata,$examid)
{
$pr = new Persistence();
 $result ="select * from question where examid=" . $_SESSION['examid'] . " and questionid=" .$Editdata['edit']."'"; 
 $result4 = $pr->search($result);
                                if (mysql_num_rows($result4) == 0) {
								  return false;
								   }
                                   
                                 else if ($r = mysql_fetch_array($result4))
								  {
								  
								  return $r;
								 }


}
function checkError()
{
$error=array();

$error['$message']="Session Timeout.";
return $error;
}
}
?>


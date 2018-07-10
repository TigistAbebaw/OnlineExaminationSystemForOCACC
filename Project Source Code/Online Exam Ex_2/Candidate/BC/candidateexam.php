<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
Class Examentry
{
var $examname;
var $comment;
var $occupationname;
var $duration;
var $totalquestions;
var $result1=array();
var $result2;
var $question;

function   getExamdetail()
{

$p = new Persistence();
$p->connect();
$mQuery1="select o.occupationid,o.occupationname,c.occupationid from  occupation as o,candidate as c where c.candidateid= '" . $_SESSION['candidateid']."'and o.occupationid=c.occupationid "; 

 $result1 = $p->executeInsertSQL($mQuery1);
  
 $r=mysql_fetch_array($result1);
  $this->result1=$r;
 
 

$mQuery2="select e.* from exam as e where e.occupationid='".$this->result1['occupationid']."' and CURRENT_TIMESTAMP < e.examto and NOT EXISTS(select candidateid,examid from result where examid=e.examid and candidateid=" . $_SESSION['candidateid'] . ");";
                   
				   $result = $p->executeInsertSQL($mQuery2);
                                if (mysql_num_rows($result) == 0)
							    {
                                   return false; 
								} 
								else
								{
								
								{
								return $this->result2= $result;
								}
								}
								
}

function  noexamError()
 {
  $error=array();
  $error['noexam']="Sorry...! For this moment, Examinations on occupation field are active yet.Please refer to the schedule in HOME if future exams are Scheduled.";
  return $error;
  }
 
function  timeoutError()
{
$message="Session Timeout.";
return $message;

}

function  sessionExamid()
{
$_SESSION['examid'] = $_POST['examid'];
}

function  validateExamcode()
{
$this->selectedexamcode = htmlspecialchars($_POST['txtcode']);
				  
$p=new Persistence();
if($p->connect())
{        
  		$mQuery="select examcode as ecode from exam where examid= '" . $_SESSION['examid']."'";
        $result=$p->executeInsertSQL($mQuery);
        $r = mysql_fetch_array($result);
		 	 
			 
		if (strcmp(htmlspecialchars_decode($r['ecode'], ENT_QUOTES), $this->selectedexamcode) == 0)
              return true;
				
		else 
			  return false;
				
				
			
			   
}
}
		  
		  
function    examcodeError()
{
$error=array();
$error['invalidcode']="You have entered an Invalid Test Code.Try again.";
return $error;

}


		  


		  

function    quesnotfoundError()
{
$error=array();
$error['noques']="Exam is not prepared yet.Please Try after some time!";
return  $error;
}

 
 
 

function insertToexam()
{
$p=new Persistence();
if($p->connect()) 
{
$mQuery1="insert into result values('".$_SESSION['examid']."','". $_SESSION['candidateid']."',NULL,NULL,(select CURRENT_TIMESTAMP))";
$result=$p->executeInsertSQL($mQuery1);	
}
}


			   
function inserttoCandidateanswer()		   
{  
$p=new Persistence();
if($p->connect()) 
{	   
   while ($h = mysql_fetch_array($this->question))
{
$mQuery="insert into candidateanswer values('" . $_SESSION['candidateid'] . "','" . $_SESSION['examid'] . "','" . $h['questionno'] . "',NULL)";
   
   $result=$p->executeInsertSQL($mQuery);
 }
   if($result)
   		return true;
   else
		return false;
 
}					
}
function  quesprepError()
{
$error=array();
$error['noQuestion']="Failure while preparing questions for you.Try again.";
return $error;
}

function checkCodeempty()
{
$error=array();
if(empty($_POST['txtcode']))
{
$error['emptycode']="Enter the Test Code First!";
}
return  $error;
}					
						
function   setSession()
{
$p=new Persistence();
if($p->connect()) 
{				
      
	  $mQuery1="select totalquestions,duration from exam where examid=" . $_SESSION['examid'] . ";";
	  $result1 = $p->executeInsertSQL($mQuery1);
                            $r = mysql_fetch_array($result1);
                            $_SESSION['tqn'] = htmlspecialchars_decode($r['totalquestions'], ENT_QUOTES);
                            $_SESSION['duration'] = $r['duration']*60;
	  $mQuery2="select date from result where candidateid='".$_SESSION['candidateid']."'";
	  $result2 = $p->executeInsertSQL($mQuery2);
	                        $r2 = mysql_fetch_array($result2);
							$_SESSION['endtime']=(int)strtotime($r2['date'])+(int)($r['duration']*60);
                            $_SESSION['starttime'] = strtotime($r2['date']);
							
							$_SESSION['qn'] = 1;
                       
     }
  }
  
function   selectQuestion()
{ 
$p=new Persistence();
if($p->connect()) 
{
$mQuery="select * from question where examid='" . $_SESSION['examid'] . " 'order by questionno";
		  
  $result = $p->executeInsertSQL($mQuery);
                if (mysql_num_rows($result) == 0) 
				{ 
				return false;
				} 
				else
				{
				$this->question=$result;
				return true;
                }

}
}
  
       
}

?>
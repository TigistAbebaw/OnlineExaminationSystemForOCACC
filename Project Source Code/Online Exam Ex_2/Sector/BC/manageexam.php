
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(0);
Class Exam
{
var  $create=array();
var $newexmid;
var $occupationid;
var $radio;
var $result;
var $fromtime;
var $totime;
var $location;
var $totalqn;
var $locationlist=array();
var $exampreplist=array();
var $examcode;
var $examname;
var $comment;
var $examtodelete;
var $examtoedit;
var $examprepid;
var $examdetail=array();
var $examid;
var $examtime;
var $message=array();
var $update=array();
function identifyOccupation()
{ 
$this->occupationid=$_SESSION['occupationid'];
}

function radioNotselected()
{
$this->message['notselected']="First Select the Exam to be Deleted/Edited.";
}
 
function accedentalDeletion()
{
$this->exmtodelete=$_POST['radio'];
$p=new Persistence();
$p->connect();
$mQuery="delete from question where examid='".$this->exmtodelete."'";
$mQuery="delete from exam where examid='".$this->exmtodelete."'";
$result=$p->executeInsertSQL($mQuery);
    if(!$result)
	{
                if (mysql_errno () == 1451) 
                    $this->message['accdelete'] = "Candidates have taken the exam,If you still want to delete this Exam, then first delete their related exam records.";
                else
                    $this->message['accdelete'] = mysql_errno();
	return true;				
	}
	else
	return false;
}
function   successfullyDeleted()
{
 $this->message['delete'] = "Selected occupations are successfully Deleted";
}
function fetchData()
{ 
 $this->examto=$_POST['to'];
 $this->examfrom=$_POST['from'];
$this->examname=$_POST['examname'];
$this->comment=$_POST['comment']; 
$this->totalqn=$_POST['totalqn'];
$this->examcode=$_POST['examcode'];
$this->location=$_POST['location'];
$this->level=$_POST['level'];
$this->duration=$_POST['duration'];
$this->examprepid=$_POST['examprepid'];
$this->examid=$_POST['examid'];
}
function getLocation()
{ 
 $p = new Persistence();
 $p->connect();
 $mQuery="select * from location";
 $result=$p->executeInsertSQL($mQuery);
 $this->locationlist=$result;
}
function getExampreparers()
{
 $p = new Persistence();
 $p->connect();
 $mQuery="select examprepid,email from exampreparer";
 $result=$p->executeInsertSQL($mQuery);
$this->exampreplist=$result;
 }

function getOlddata()
{
$this->examtoedit=$_POST['radio'];
$p = new Persistence();
$p->connect();
$mQuery= "select examid,duration,level,locationid,totalquestions,examname,comment,examcode,DATE_FORMAT(examfrom,'%d-%M-%Y') as examfrom,DATE_FORMAT(examto,'%d-%M-%Y %H:%i:%s %p') as examto from exam where examid='".$this->examtoedit."'";
$result=$p->executeInsertSQL($mQuery);
if($result)
$this->examdetail=mysql_fetch_array($result);;
}
function validateDate()
{
if ($this->examfrom > $this->examto || $this->examto < time())
   $this->message['date']="Start date of exam is less than end date or last date of test is less than today's date.<br/>";
}    
function validateEmpty()  
{  

    if (empty($_POST['examname']) || empty($_POST['comment']) || empty($_POST['totalqn']) || empty($_POST['duration']) || empty($_POST['examcode']))
	  {
         $this->message['empty']="Some of the required Fields are Empty.Therefore Nothing is Updated";
	  }
}
function validateEmptydate()
{
if(empty($_POST['from']) || empty($_POST['to']))
   $this->message['emptyd']="date is empty";
}

function updateExam()
{

$p = new Persistence();
$p->connect();
$mQuery = "update exam set occupationid= '" . htmlspecialchars($this->occupationid, ENT_QUOTES)."',locationid='". htmlspecialchars($this->location, ENT_QUOTES) ."',examprepid='" . htmlspecialchars($this->examprepid, ENT_QUOTES)."', examname='" . htmlspecialchars($this->examname, ENT_QUOTES) ."',comment='" . htmlspecialchars($this->comment, ENT_QUOTES) ."',duration='" . htmlspecialchars($this->duration, ENT_QUOTES) . " ',totalquestions= '" . htmlspecialchars($this->totalqn, ENT_QUOTES) . " ',examcode='" . htmlspecialchars($this->examcode, ENT_QUOTES) ."' where examid= '" . $this->examid . "';";
$result=$p->executeInsertSQL($mQuery);
        if (!$result)
               echo $this->update['unsuccupdate']=mysql_error();
        else
            $this->message['succupdate']="Exam Information is Successfully Updated.";
   
}

   

function  generateExamid()
{$p = new Persistence();
 $p->connect();
 
    $mQuery="select max(examid) as exm from exam";
	$result=$p->executeInsertSQL($mQuery);
    $r = mysql_fetch_array($result);
    if (is_null($r['exm']))
        $this->newexmid = 1;
    else
        $this->newexmid=$r['exm'] + 1;
		
}
function insertExam()
{  
$p = new Persistence();
$p->connect();


$mQuery = "insert into Exam values('".$this->newexmid."','".$_SESSION['occupationid']."','".htmlspecialchars($this->location, ENT_QUOTES)."','".htmlspecialchars($this->examprepid, ENT_QUOTES)."','". htmlspecialchars($this->examname, ENT_QUOTES)."','".htmlspecialchars($this->comment, ENT_QUOTES) ."','".htmlspecialchars($this->examfrom, ENT_QUOTES)."','".htmlspecialchars($this->examto, ENT_QUOTES)."','".htmlspecialchars($this->duration, ENT_QUOTES)."','".htmlspecialchars($this->totalqn, ENT_QUOTES)."',1,'".time()."','". htmlspecialchars($this->examcode, ENT_QUOTES)."','".htmlspecialchars($this->level, ENT_QUOTES)."')";
$result=$p->executeInsertSQL($mQuery);

        if (!$result)
		  {if(mysql_error()==1062)
		 $this->message['dup']="duplicatekey for exampreparer or examcode";
			 else
      $this->message['dup']=mysql_error();
			
			}
        else
             $this->create['succcreate']="Exam is Successfully Created.";
}     

function examList() 
{ 
 $p = new Persistence();
 $p->connect();
 
 $mQuery = "select examid,examname,comment,examcode,DATE_FORMAT(examfrom,'%d-%M-%Y') as examfrom,DATE_FORMAT(examto,'%d-%M-%Y %H:%i:%s %p') as examto from exam where occupationid='".$this->occupationid."'order by examfrom";
 $result=$p->executeInsertSQL($mQuery);
                   
                              
          if (mysql_num_rows($result) == 0) 
		        {
				  return false;
                  $this->message['noexam']="No Exams Yet..!";
				} 
		  else  {
		          $this->result=$result; 
                  return $this->result;
			    }
			
}
function unsetVariables()
{
unset($_POST['from']);
unset($_POST['to']);
unset($_POST['examname']);
unset($_POST['comment']);
unset($_POST['totalqn']);
unset($_POST['examcode']);
unset($_POST['location']);
unset($_POST['level']);
unset($_POST['duration']);
unset($_POST['examprepid']);
unset($_POST['examid']);

}
}
?>
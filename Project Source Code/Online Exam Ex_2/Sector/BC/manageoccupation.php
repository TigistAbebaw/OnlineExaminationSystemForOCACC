<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(E_ALL);
Class Occupation
{
var $sectorid;
var $delvar;
var $error;
var $message;
var $occname;
var $newoccid;
var $occtoedit;
var $occdatatoedit;
var $occnameedit;
var $occlist;
var $occtodelete;
var $result;
function identifySector()
{ 
$p=new Persistence();
$p->connect();
$mQuery="select sectorid from sectoradmin where username='".$_SESSION['secname']."'";
$result=$p->executeInsertSQL($mQuery);
$r = mysql_fetch_array($result);
$this->sectorid=$r['sectorid'];
}

function radioNotselected()
{
$this->error['notselected']="First Select the occupation to be Deleted/Edited.";
}
 
function accedentalDeletion()
{
$this->occtodelete=$_POST['radioocclist'];
$p=new Persistence();
$p->connect();

$mQuery="delete from exam where occupationid='".$this->occtodelete."'";
$p->executeInsertSQL($mQuery);
$mQuery="delete from occupation where occupationid='".$this->occtodelete."' and sectorid='".$this->sectorid."'";
$result=$p->executeInsertSQL($mQuery);
    if(!$result)
	{
                if (mysql_errno () == 1451) //Children are dependent value
                    $this->error['accdelete'] = "Too Prevent accidental deletions, system will not allow propagated deletions.<br/><b>Help:</b> If you still want to delete this subject, then first delete the exams that are conducted/dependent on this subject.";
                else
                    $this->error['accdelete'] = mysql_errno();
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
$this->payment=$_POST['payment'];
$this->occname=$_POST['occname'];
}
function updateOccupation()
{
$this->payment=$_POST['payment'];
$this->occtoedit=$_POST['occtoedit'];
$this->occnameedit=$_POST['occnameedit'];
$p=new Persistence();
$p->connect();
$mQuery = "update occupation set occupationname='". htmlspecialchars($this->occnameedit, ENT_QUOTES)."', paymentamount='".$this->payment.
 "'where occupationid= '" .$this->occtoedit."' and sectorid='".$this->sectorid. "'";
        $result=$p->executeInsertSQL($mQuery);
		if($result)
            {
			$this->message['succupdate'] = "occupation Information is Successfully Updated.";
			return true;
			}
			
}
function checkemptyoccupation()
{
$erroremp=false;
if($this->occname=="")
{
$this->error['emptyname']="please enter occupation name";
$erroremp=true;
}
return $erroremp;
}

function generateoccupationid()
{
$p=new Persistence();
$p->connect();
 $mQuery="select max(occupationid) as occ from occupation";
 $result=$p->executeInsertSQL($mQuery);
    $r = mysql_fetch_array($result);
    if (is_null($r['occ']))
        $this->newoccid = 1;
    else
        $this->newoccid=$r['occ'] + 1;
		
}
function insertoccupation()
{
$p=new Persistence();
 $p->connect();
 $mQuery = "insert into occupation values('". $this->newoccid."','".$this->sectorid."','". htmlspecialchars($this->occname, ENT_QUOTES)."','".$this->payment."')";
        $result=$p->executeInsertSQL($mQuery);
		if($result)
           {
		    $this->message['succcreate'] = "Successfully New occupation is Created.";
			return true;
		   }
}
function checkAlreadyexist()
{
$p=new Persistence();
$p->connect();
$mQuery ="select occupationname as occ from occupation where occupationname='" . htmlspecialchars($this->occname, ENT_QUOTES) . "'and sectorid='".$this->sectorid."'";
  $result=$p->executeInsertSQL($mQuery);

  if (mysql_num_rows($result) > 0)
       {
        $this->error['alreadyexist'] = "Sorry occupation Already Exists.";
		 return true;
		}
  else
       {
	     return false;
	   }
}

function  occdataAvailable()
{ 
$p = new Persistence();
$p->connect();
$this->occtoedit=$_POST['radioocclist'];

$mQuery = "select occupationname from occupation where occupationid='" . htmlspecialchars($this->occtoedit, ENT_QUOTES) . "' and sectorid='".$this->sectorid."'";
      $result = $p->executeInsertSQL($mQuery);
      $r=mysql_fetch_array($result);
		$this->occdatatoedit = $r['occupationname'];
		return true;
		
}

function  checkoccAvailabilty()
{
$p=new Persistence();
$p->connect();
 $mQuery="select * from occupation  where sectorid='".$this->sectorid."'order by occupationid";
    $result =$p->executeInsertSQL($mQuery);
	 
		   if (mysql_num_rows($result) == 0) 
		        {
				  return false;
                  $this->error['noocc']="No occupation Yet..!";
                } 
		  else  {
		          $this->result=$result; 
                  return $this->result;
			    }
			
}
function unsetVariables()
{
unset($_POST['edit']);
unset($_POST['radio']);
unset($_POST['add']);
unset($_POST['saveadd']);
unset($_POST['saveedit']);
unset($_POST['radioocclist']);
unset($_POST['occnameedit']);
unset($_POST['occtoedit']);
unset($_POST['payment']);
unset($_POST['occname']);
}
function setnewVariables()
{
$_SESSION['occupationid']=$_POST['radioocclist'];
}
}
?>
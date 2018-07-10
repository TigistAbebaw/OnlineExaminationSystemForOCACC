<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");

Class Registration
{

var $name;
var $password;
var $repass;

var $firstname;
var $middlename;
var $lastname;
//var $username;

var $email;
var $gender;
var $datet;
var $occupation=array();
var $occupaions;

function collectRegistrationdata()
{
$this->name=trim($_POST['name']);
$this->password=trim($_POST['password']);
$this->repass=trim($_POST['repass']);
$this->email=trim($_POST['email']);
$this->firstname=trim($_POST['firstname']);
$this->middlename=trim($_POST['middlename']);
$this->lastname=trim($_POST['lastname']);
$this->password=trim($_POST['password']);

$this->gender=trim($_POST['gender']);
$this->dateofbirth=trim($_POST['datet']);
$this->occupations=trim($_POST['occup']);
}
function fetchOccupation()
{$this->occupation=array();
$p = new Persistence();
$p->connect();
$mQuery="Select * from occupation";
 $result=$p->executeInsertSQL($mQuery);
 $this->occupation=$result;
 }


function checkRegistrationvalidation()
{
$error=array();
if($this->name=="")
$error['name']="please enter your name";
if($this->password=="")
$error['password']="Please enter ur password";
if($this->email=="")
$error['email']="Please enter ur email";
if($this->repass=="")
$error['repass']="Please enter ur confirmation password";
return $error;
}

function registerCandidate($newid)
{
$p = new Persistence();
$p->connect();
 $mQuery="INSERT INTO Candidate values($newid,'".htmlspecialchars($this->firstname,ENT_QUOTES)."','".htmlspecialchars($this->middlename,ENT_QUOTES)."','".htmlspecialchars($this->lastname,ENT_QUOTES)."','".htmlspecialchars($this->name,ENT_QUOTES)."','".htmlspecialchars($this->password,ENT_QUOTES)."','".htmlspecialchars($this->email,ENT_QUOTES)."','".htmlspecialchars($this->gender,ENT_QUOTES)."','".htmlspecialchars($this->datet,ENT_QUOTES)."','".htmlspecialchars($this->occupations,ENT_QUOTES)."')";
     if($p->executeInsertSQL($mQuery))
       { 
	    $success = true;
	    return  $success;
       	}
        else
	  {
	  $success = false;
	  }
	  
}



function generateNewid()
{$p = new Persistence();
if($p->connect())
{
$mQuery = "select max(candidateid) as cand from candidate";

     $result=$p->executeInsertSQL($mQuery);
	 }
	 
     $r=mysql_fetch_array($result);
	 echo $r['cand'];
     if(is_null($r['cand']))
     $newcand=1;
     else
	 $newcand=$r['cand']+1;
	 return $newcand;
	 echo $newcand;
}

function checkNameavailability()
{
$error=array();
$p = new Persistence();

if($p->connect())
{
$mQuery="select username as cand from candidate where username='".htmlspecialchars($this->name,ENT_QUOTES)."'";
$result = $p->executeInsertSQL($mQuery);
}

if(mysql_num_rows($result)>0)
$error['availability'] = "Sorry the Candidate Name is Not Available Try with Some Other name.";
return $error;
}
function validateEmail(){
return eregi("^[A-Za-z0-9\_-]+@[A-Za-z0-9\_-]+.[A-Za-z0-9\_-]+.*",$this->email);
}
}
?>


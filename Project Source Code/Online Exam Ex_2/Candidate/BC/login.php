<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");

Class Account
{
var $name;
var $password;

function collectLogindata()
{
$this->name=trim($_POST['name']);
$this->password=trim($_POST['password']);
}

function authenticateCandidate()
{ $p=new Persistence();
  if($p->connect())
  {
$mQuery = "select *,password as pas from candidate where username='".$this->name."' and password='".$this->password."'";
 
 $result = $p->executeInsertSQL($mQuery);

 if(mysql_num_rows($result)>0)
              {
              $r = mysql_fetch_array($result);
              if(strcmp($r['pas'],$this->password)==0) 
			  return $r;
			  else 
			  return false;
			  }
    }
		$p ->closedb();
}	

  
function  errorDisplay()
 {
  $error=array();
  $error['login'] = "Please enter ur username and password correctly";
   return $error;
 }
  

function validateCandidate()
{
$error = array();
if($this->name == "")
$error['name'] = "Please enter your name";
if($this->password == "")
$error['pass'] = "Please enter ur password";
return $error;
}


function loginCandidate($r)
{
 $_SESSION['candidateid']= $r['candidateid'];
}
}
?>


<?php
include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");

Class Sectoraccount
{
var $name;
var $password;

function collectLogindata()
{
$this->name=trim($_POST['name']);
$this->password=trim($_POST['password']);
}

function authenticateUser()
{ $p=new Persistence();
  if($p->connect())
  {
$mQuery = "select * from sectoradmin where username='".htmlspecialchars($this->name,ENT_QUOTES)."' and password='".htmlspecialchars($this->password,ENT_QUOTES)."'";
 
 $result = $p->executeInsertSQL($mQuery);

 if(mysql_num_rows($result)>0)
              {
              $r = mysql_fetch_array($result);
              if(strcmp($r['password'],htmlspecialchars($this->password,ENT_QUOTES))==0) 
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
  

function validateUser()
{
$error = array();
if($this->name == "")
$error['name'] = "Please enter your name";
if($this->password == "")
$error['pass'] = "Please enter ur password";
return $error;
}


function loginUser($r)
{
 session_start();
 $_SESSION['secname']=htmlspecialchars_decode($r['username'],ENT_QUOTES);
 $_SESSION['secid']=htmlspecialchars_decode($r['sectorid'],ENT_QUOTES);
}
}
?>


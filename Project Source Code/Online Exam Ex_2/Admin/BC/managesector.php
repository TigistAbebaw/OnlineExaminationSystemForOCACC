<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(E_ALL);

Class Sector
{
var $delvar;
var $error;
var $message;
var $secname;
var $newsecid;
var $sectoedit;
var $secdatatoedit;
var $secnameedit;
var $seclist;
var $sectodelete;
var $result;
function radioNotselected()
{
$this->error['notselected']="First Select the Sector to be Deleted/Edited.";
}
 
function accedentalDeletion()
{
$this->sectodelete=$_POST['radioseclist'];
echo "this is".$_POST['radioseclist']; 
$p=new Persistence();
$p->connect();

$mQuery="delete from occupation where sectorid='".$this->sectodelete."'" ;
$p->executeInsertSQL($mQuery);
$mQuery="delete from sector where sectorid='".$this->sectodelete."'" ;
$result=$p->executeInsertSQL($mQuery);
    if(!$result)
	{
                if (mysql_errno () == 1451) //Children are dependent value
                    $this->error['accdelete'] = "Too Prevent accidental deletions, system will not allow propagated deletions.<br/><b>Help:</b> If you still want to delete this subject, then first delete the occupations and exams that are conducted/dependent on this subject.";
                else
                    $this->error['accdelete'] = mysql_errno();
	return true;				
	}
	else
	return false;
}
function   successfullyDeleted()
{
 $this->message['delete'] = "Selected Sectors are successfully Deleted";
}
function fetchData()
{
$this->secname=$_POST['secname'];
}
function updateSector()
{
$this->sectoedit=$_POST['sectoedit'];
$this->secnameedit=$_POST['secnameedit'];
$p=new Persistence();
$p->connect();
$mQuery = "update sector set sectorname='". htmlspecialchars($this->secnameedit, ENT_QUOTES) . "'where sectorid= '" .$this->sectoedit. "';";
        $result=$p->executeInsertSQL($mQuery);
		if($result)
            {
			$this->message['succupdate'] = "Sector Information is Successfully Updated.";
			return true;
			}
			
}
function checkemptySector()
{
$erroremp=false;
if($this->secname=="")
{
$this->error['emptyname']="please enter Sector name";
$erroremp=true;
}
return $erroremp;
}

function generateSectorid()
{
$p=new Persistence();
$p->connect();
 $mQuery="select max(sectorid) as sec from sector";
 $result=$p->executeInsertSQL($mQuery);
    $r = mysql_fetch_array($result);
    if (is_null($r['sec']))
        $this->newsecid = 1;
    else
        $this->newsecid=$r['sec'] + 1;
		
}
function insertSector()
{$p=new Persistence();
 $p->connect();
 $mQuery = "insert into sector values(". $this->newsecid.",'" . htmlspecialchars($this->secname, ENT_QUOTES)."');";
        $result=$p->executeInsertSQL($mQuery);
		if($result)
           {
		    $this->message['succcreate'] = "Successfully New Sector is Created.";
			return true;
		   }
}
function checkAlreadyexist()
{
$p=new Persistence();
$p->connect();
$mQuery ="select sectorname as sec from sector where sectorname='" . htmlspecialchars($this->secname, ENT_QUOTES) . "';";
  $result=$p->executeInsertSQL($mQuery);

  if (mysql_num_rows($result) > 0)
       {
        $this->error['alreadyexist'] = "Sorry Sector Already Exists.";
		 return true;
		}
  else
       {
	     return false;
	   }
}

function  secdataAvailable()
{ 
$p = new Persistence();
$p->connect();
$this->sectoedit=$_POST['radioseclist'];

$mQuery = "select sectorname from sector where sectorid='" . htmlspecialchars($this->sectoedit, ENT_QUOTES) . "';";
      $result = $p->executeInsertSQL($mQuery);
      $r=mysql_fetch_array($result);
		$this->secdatatoedit = $r['sectorname'];
		return true;
		
}

function  checksecAvailabilty()
{
$p=new Persistence();
$p->connect();
 $mQuery="select * from sector order by sectorid;";
    $result =$p->executeInsertSQL($mQuery);
	 
		   if (mysql_num_rows($result) == 0) 
		        {
				  return false;
                  $this->error['nosec']="No Sector Yet..!";
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
unset($_POST['radioseclist']);
}
}
?>
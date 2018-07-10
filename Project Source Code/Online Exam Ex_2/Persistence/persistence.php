<?php 
Class Persistence
{
//This is the name of your server where the MySQL database is running
var $dbserver="localhost";   //username of the MySQL server
var $dbusername="root";      //password
var $dbpassword="";          //database name of the online Examination system
var $dbname="online exam db";
var $conn=false;
var $db=false;
function connect()
{
$this->conn=mysql_connect($this->dbserver,$this->dbusername,$this->dbpassword);

if(!$this->conn)
{
global $message;
return false;
$message= mysql_error($this->conn);
 }
else
{
$this->db = mysql_select_db($this->dbname);
return true;
if(!$this->db)
{return false;
echo mysql_error($this->conn);
}
}
}
function closedb()
{
    if($this->conn)
    {
	mysql_close($this->conn);
	return true;
	}
}
function executeInsertSQL($SQL)
{
//check if connection to database is available
global $message;
$rs = $this->connect();

if($rs===false)
{return false;
echo "not connected";
}
//execute query
else
$r= mysql_query($SQL);

if(!$r)
{
//return false;
$message = mysql_error();
echo $message;
echo mysql_errno(); 
}
else
{ 
return $r;
}
}
 function selectQuery($SQL){

$rs=$this->connect();
if($rs===false)
return false;
else
{
$rs= mysql_query($SQL);
if(!$rs)
{
echo mysql_error();
return false;
}
else 
{
$result=array();
while($row=mysql_fetch_array($rs,MYSQL_BOTH));
array_push($result,$row);
return $result;
}
}
}
  function mQuery($SQL){

$r=$this->connect();
if(!$r)
return false;
$status= mysql_query($SQL);
if(!$status)
{
echo mysql_error();
return false;
}
return true;
                        }
						
   function search($sql){
 $r=$this->connect();
 if(!$r)
 return false;
 
 $resultSet=mysql_query($sql);
 if(!$resultSet)
 {
 echo mysql_error();
return false;
 
 }
 else 
{
 return $resultSet;
}
}}
?>
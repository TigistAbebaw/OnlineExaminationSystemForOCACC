<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(E_ALL);

Class Result
{
var $info;
var $totalmark=array();
var $candmark=array();
var $percentage;
var $competency;
var $datecomp;
var $examname;
var $general;
var $candocc;
var $perc=array();
var $comp;
var $candma=array();

function   getExamstaken()
{ $candmark=array();
$p = new Persistence();
$p->connect();
$mQuery1="select occupationid,candidatename from candidate where candidateid='" . $_SESSION['candidateid']."'";
$result1 = $p->executeInsertSQL($mQuery1);
  
 $r=mysql_fetch_array($result1);
  $this->candocc=$r;
 
$mQuery2="select e.*,r.competency from exam as e,result as r where e.occupationid='".$this->candocc['occupationid']."'and  EXISTS(select candidateid,examid from result where examid=e.examid and candidateid=" . $_SESSION['candidateid'] . ");";

                   
				   $result = $p->executeInsertSQL($mQuery2);
                                if (mysql_num_rows($result) == 0)
							    {
                                   return false; 
								} 
								else
									
								{
								$this->general= $result;
								}
}
								
function  getResultdetail()
{
$p=new Persistence();
$p->connect();
$mQuery1="select examname from exam where examid='".$_SESSION['examid']."'";
 $mQuery2="select c.firstname,c.lastname,o.occupationname from occupation as o,candidate as c
  where c.candidateid='".$_SESSION['candidateid']."'and o.occupationid=c.occupationid"; 
 $mQuery3="select sum(marks) as tm from question where examid= '".$_SESSION['examid']."'";
             $result1=$p->executeInsertSQL($mQuery1);
             $result2=$p->executeInsertSQL($mQuery2);
             $result3=$p->executeInsertSQL($mQuery3);
 
                           $this->examname=mysql_fetch_array($result1);
						   $this->info=mysql_fetch_array($result2);
						   $this->totalmark=mysql_fetch_array($result3);


$mQuery4="select sum(q1.marks) as cm from question as q1 where q1.examid='".$_SESSION['examid']."'and 
q1.questionno in (select ca.questionno from candidateanswer as ca where ca.candanswer=q1.correctanswer and ca.questionno=q1.questionno and ca.examid=q1.examid and ca.candidateid='".$_SESSION['candidateid']."')";


			               $result4=$p->executeInsertSQL($mQuery4);
                           $sum=mysql_fetch_array($result4);
						    $this->candma['sum']=$sum['cm'];
							
						 
}
function calculatePercentage()
{
$a=$this->candma['sum'];
$b=$this->totalmark['tm'];
if($this->candma['sum']="")
{
$this->candma['sum']=0;
}
$c=($a/$b);
$this->percentage['perc']=$c; 
echo $c;
}
function checkcompetency()
{$pass=50;
echo $b=$this->percentage['perc'];
if($b >$pass)
 $this->comp=1;
else
 $this->comp=0;
}

function insertCompetency()
{
$p=new Persistence();
$p->connect();
 $mQuery="update result set percentage='".$this->percentage['perc']."',competency='".$this->comp."where candidateid=".
            $_SESSION['candidateid']."'and examid='".$_SESSION['examid']."'";
 $result1=$p->executeInsertSQL($mQuery);
}
function fetchDate()
{
$p=new Persistence();
$p->connect();
$mQuery="select * from result where candidateid='". $_SESSION['candidateid']."'and examid='".$_SESSION['examid']."'";
 $result1=$p->executeInsertSQL($mQuery);
 $this->datecomp=mysql_fetch_array($result1);
if($this->datecomp['competency']==0)
$this->competency="Notcompetent";
else
$this->competency="Competent";

}

}
?>
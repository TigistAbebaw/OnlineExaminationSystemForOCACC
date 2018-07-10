


<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
error_reporting(E_ALL);

Class Examination
{
var $choice=array();

function  timeoutError()
{
$message="Session Timeout.";
return $message;
}


function  insertCandanswer()
{
$p = new Persistence();
$p->connect(); 

      if(isset($_POST['answer']))
	  {
 $mQuery="update candidateanswer  set candanswer='".$_POST['answer']."'where candidateid='".$_SESSION['candidateid']."'and examid='".$_SESSION['examid']."'and questionno='".$_SESSION['qn']."'";
               
				$result=$p->executeInsertSQL($mQuery);
                if($result)
                {
                return true;
                }
	  }
}

function errorAnswernotinserted()
{
 $error['notupdate']="Your previous answer is not updated.Please answer once again";
 }
 
function incrementQuestions()
{
 if((int)$_SESSION['qn']<(int)$_SESSION['tqn'])
        {
        $_SESSION['qn']=$_SESSION['qn']+1;
         $_SESSION['final']=false;
        }
        if((int)$_SESSION['qn']==(int)$_SESSION['tqn'])
        {
           $_SESSION['final']=true;
		}
		
}


function   createClock() 
{
$p = new Persistence();
$p->connect();   
$mQuery="select CURRENT_TIMESTAMP as time";
$result=$p->executeInsertSQL($mQuery);
$r=mysql_fetch_array($result);
     $elapsed=(int)strtotime($r['time'])-(int)$_SESSION['starttime'];
               if(((int)$elapsed/60)<(int)$_SESSION['duration'])
                {
					$timeleft=((int)$_SESSION['endtime']-(int)strtotime($r['time']));
				    
					$hour=strftime("%H",$timeleft);
					$min=strftime("%M",$timeleft);
					$sec=strftime("%S",$timeleft);
					
                     $time['hour']=$hour; 
                     $time['min']=$min; 
                     $time['sec']=$sec; 
                  }
                else
                {
                    $time['hour']=00;
                    $time['min']=00;
                    $time['sec']=01;
                }
      return $time;

}

function noClockerror()
{
$error['noclock']="Try Again";
}
				
function  fetchQuestions()
{ 
$p = new Persistence();
$p->connect(); 
$mQuery="select * from question where examid='".$_SESSION['examid']."'and questionno='".$_SESSION['qn']."';";
                $result=$p->executeInsertSQL($mQuery);
				$r=mysql_fetch_array($result);
			
				return $r;
}


/*function collectCandidateanswer()
{   
 
 if(isset($_POST['answer']))
      {
          if(strcmp($_POST['answer'],"choicea")==0)
                     $this->choice="choicea";
		  if(strcmp($_POST['answer'],"choiceb")==0)
                     $this->choice="choiceb";
		  if(strcmp($_POST['answer'],"choicec")==0)
                     $this->choice="choicec";
		  if(strcmp($_POST['answer'],"choiced")==0)
                     $this->choice="choiced";
		   else
		             $this->choice="";
				   
		    }	
	  
}

*/
function  chooseNextorFinal()
{
 if($_SESSION['final']==true)
 return "finalsubmit" ;
 else
 return "next"; 
}
}
?>
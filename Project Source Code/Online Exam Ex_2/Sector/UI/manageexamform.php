<html><head>
        <title>Online exam Sector</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		 <link rel="stylesheet" type="text/css" media="all" href="/Online Exam Ex_2/Website/UI/calendar/jsDatePick.css" />
        <script type="text/javascript" src="/Online Exam Ex_2/Website/UI/calendar/jsDatePick.full.1.1.js"></script>
        <script type="text/javascript">
            window.onload = function(){
                new JsDatePick({
                    useMode:2,
                    target:"from"
                   
                });

                new JsDatePick({
                    useMode:2,
                    target:"to"
                    
                });
            };
        </script>

        <script type="text/javascript" src="/Online Exam Ex_2/Website/UI/validate.js" ></script>
    </head>
    <body>

<?php
Class Exampreparationform
{
function displayEditexam($exm)
{
  ?>      <div id="wrap">
            
                <div id="header">
                  <img  height="77" width="156" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  
        </div>
            <form name="exmmng" action="manageexamlogic.php" method="post">
                <div id="menu">
                    <ul id="current">
                      <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
                      <input type="submit" value="Welcome" name="welcome" class="button" title="welcome"/>
					  <input type="submit" value="save" name="saveedit" class="button" title="saveedit"/> 
					   <input type="submit" value="back" name="back" class="button" title="back"/>
                    </ul>
<h1><?php   
			            
						 if(isset($exm->message['accdelete']))
						echo $exm->message['accdelete'];
						 else if(isset($exm->message['emptyd']))
						 $exm->message['emptyd'];
					    else if(isset($exm->message['date']))
						echo $exm->message['date'];
						else if(isset($exm->message['empty']))
						echo $exm->message['empty'];
						else if(isset($exm->message['delete']))
						echo $exm->message['delete'];
						else if(isset($exm->message['dup']))
						echo $exm->message['dup'];
						
						else if(isset($exm->message['noexam']))
						echo $exm->message['noexam'];
				        else if(isset($exm->message['unsuccupdate']))
					    echo $exm->message['unsuccupdate']; 
						 else if(isset($exm->message['delete']))
						 echo $exm->message['delete'];
						  else if(isset($exm->message['notselected']))
						 echo $exm->message['notselected'];
						 else
						 echo "";
						 ?>
			</h1>
                </div>
                <div class="box">
                       <table> <tr>
                            <td>Exam Name</td>
                            <td><input type="text" name="examname" value="<?php if(isset($exm->examdetail['examname']))echo $exm->examdetail['examname']; ?>" size="16" onKeyUp="isalphanum(this)" /></td>
                            <td><b>Note:</b><br/>
                            Exam Name must be Unique<br/>
                             in order to identify different<br/> 
                            Exams on same occupation.</td>
                        </tr>
                       
                        <tr>
                            <td>Total Questions</td>
<td><input type="text" name="totalqn" value="<?php  if(isset($exm->examdetail['totalquestions'])) echo $exm->examdetail['totalquestions']; ?>" size="16" onKeyUp="isnum(this)" /></td>

                        </tr>
                        <tr>
                            <td>Duration(Mins)</td>
                            <td><input type="text" name="duration" value="<?php if(isset($exm->examdetail['duration'])) echo $exm->examdetail['duration']; ?>" size="16" onKeyUp="isnum(this)" /></td>
                        </tr>
                       
                       					
						<tr>
                            <td> location </td>
                            <td><select name="location"><?php while ($r1 = mysql_fetch_array($exm->locationlist)) { ?> 
		     <option value="<?php echo $r1['locationid']; ?>"><?php echo $r1['address'].", hall no".$r1['hallnumber'] ; } ?></option>                                                 
								</select></td>
                        </tr>
						<tr>
                            <td> Exam preparer</td>
                            <td><select name="examprepid"><?php while ($r1 = mysql_fetch_array($exm->exampreplist)) { ?> 
		     <option value="<?php echo $r1['examprepid']; ?>"><?php echo $r1['examprepid'].",".$r1['email'] ; } ?></option>                                                 
								</select></td>
                        </tr>
						
                        <tr>
                            <td>Exam Secret Code</td>
							 <td><input type="text" name="examcode" value="<?php echo $exm->examdetail['examcode'];?>" size="16" onKeyUp="isalphanum(this)" /></td>
                            <td><b>Note:</b><br/>Candidates must enter<br/>this code in order to <br/> 
                            take the exam </td>
                        </tr>
						<tr>
                            <td>Level</td>
    <td><input type="text" name="level" value="<?php echo $exm->examdetail['level']; ?>" size="16" onKeyUp="isnum(this)"/></td>
                        </tr>
						 <tr>
                            <td>Exam comment</td>
         <td><textarea name="comment" cols="20" rows="3" value="" ><?php echo $exm->examdetail['comment']; ?></textarea></td>
                            <td><b>Describe here:</b><br/>
                            What the exam is all about?</td>
                        </tr>
<input type="hidden" name="examid" vaaue="<?php echo $exm->examdetail['examid']; ?>" >
                  </table></form>
 <?php
 }
 function displayAddexam($exm)
{
  ?>      <div id="wrap">
            
    <div id="header">
                  <img  height="77" width="156" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
    </div>
                <form id="exmaddmng" action="manageexamlogic.php" method="post" onSubmit="return validateform('exmaddmng');">
                <div id="menu">
                    <ul id="current">
                      <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
                      <input type="submit" value="Welcome" name="welcome" class="button" title="welcome"/>
					  <input type="submit" value="save" name="saveadd" class="button" title="saveadd" /> 
					  <input type="submit" value="back" name="back" class="button" title="back"/>
                    </ul>
<table><tr><td>
<?php   
			            
						 if(isset($exm->message['accdelete']))
						echo $exm->message['accdelete'];
						 else if(isset($exm->message['emptyd']))
						echo $exm->message['emptyd'];
						  else if(isset($exm->message['date']))
						echo $exm->message['date'];
						else if(isset($exm->message['empty']))
						echo $exm->message['empty'];
						else if(isset($exm->message['delete']))
						echo $exm->message['delete'];
						else if(isset($exm->message['dup']))
						echo $exm->message['dup'];
						
						else if(isset($exm->message['noexam']))
						echo $exm->message['noexam'];
				        else if(isset($exm->message['unsuccupdate']))
					    echo $exm->message['unsuccupdate']; 
						 else if(isset($exm->message['delete']))
						 echo $exm->message['delete'];
						  else if(isset($exm->message['notselected']))
						 echo $exm->message['notselected'];
						 else
						 echo "";
						 ?>
			
                </div>
				</td></tr>
                <div class="box">
                        <tr>
                            <td>Exam Name</td>
                            <td><input type="text" name="examname" value="<?php echo $exm->examname; ?>" size="16" onKeyUp="" /></td>
                            <td><b>Note:</b><br/>
                            Exam Name must be Unique<br/>
                             in order to identify different<br/> 
                            Exams on same occupation.</td>
                        </tr>
                       
                        <tr>
                            <td>Total Questions</td>
							  <td><input type="text" name="totalqn" value="<?php  if (isset($exm->examtotalqn))echo $exm->examtotalqn; ?>" size="16" onKeyUp="isnum(this)" /></td>

                        </tr>
                        <tr>
                            <td>Duration(Mins)</td>
                            <td><input type="text" name="duration" value="<?php if (isset($exm->duration) )echo $exm->duration; ?>" size="16" onKeyUp="isnum(this)" /></td>
                        </tr>
                        <tr>
                            <td>From </td>
                            <td><input id="from" type="text" name="from" value="<?php if(isset($exm->examfrom)) echo $exm->examfrom; ?>" size="16" readonly  /></td>
                        </tr>
                        <tr>
                            <td> To </td>
                            <td><input id="to" type="text" name="to" value="<?php if(isset($exm->examto)) echo $exm->examto; ?>" size="16" readonly /></td>
                        </tr>
						<tr>
                       						
						<tr>
                            <td> location </td>
                            <td><select name="location"><?php while ($r1 = mysql_fetch_array($exm->locationlist)) { ?> 
		     <option value="<?php echo $r1['locationid']; ?>"><?php echo $r1['address'].", hall no".$r1['hallnumber'] ; } ?></option>                                                 
								</select></td>
                        </tr>
						<tr>
                            <td> Exam preparer</td>
                            <td><select name="examprepid"><?php while ($r1 = mysql_fetch_array($exm->exampreplist)) { ?> 
		     <option value="<?php echo $r1['examprepid']; ?>"><?php echo $r1['examprepid'].",".$r1['email'] ; } ?></option>                                                 
								</select></td>
                        </tr>
						
                        <tr>
                            <td>Exam Secret Code</td>
							 <td><input type="text" name="examcode" value="<?php if(isset($exm->examcode)) echo $exm->examcode;?>" size="16" onKeyUp="isalphanum(this)" /></td>
                            <td><b>Note:</b><br/>Candidates must enter<br/>this code in order to <br/> 
                            take the exam </td>
                        </tr>
						<tr>
                            <td>Level</td>
    <td><input type="text" name="level" value="<?php if(isset($exm->level))echo $exm->level; ?>" size="16" onKeyUp="isnum(this)"/></td>
                        </tr>
						 <tr>
                            <td>Exam comment</td>
         <td><textarea name="comment" cols="20" rows="3" value="" ><?php echo $exm->comment; ?></textarea></td>
                            <td><b>Describe here:</b><br/>
                            What the exam is all about?</td>
                        </tr>
<input type="hidden" name="examid" value="<?php echo $exm->examid; ?>" >
                  </table></form>
<?php   
}                 
function displayExamlist($exm)
{ 
?>       
<div id="wrap">
            
                <div id="header">
                  <img  height="77" width="156" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  
        </div>
            <form name="exmmng" action="manageexamlogic.php" method="post">
                <div id="menu">
                    <ul id="current">
                      <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
                      <input type="submit" value="Welcome" name="welcome" class="button" title="welcome"/>
					  <input type="submit" value="save" name="saveedit" class="button" title="saveedit"/> 
                      <input type="submit" value="Add" name="add" class="button" title="Add"/>
                      <input type="submit" value="Delete" name="delete" class="button" title="Delete"/>
					   <input type="submit" value="back" name="back" class="button" title="backtooccupation"/>
                    </ul>

    </div>
				<div class="box" <form name="exmmng" action="manageexamlogic.php" method="post">
				  <table cellpadding="30" cellspacing="10" class="datatable">
                                        <tr>
                                            <th>&nbsp;</th>
											<th>Exam Name</th>
                                            <th>Exam Description</th>
                                            <th>Exam Code</th>
                                            <th>Validity</th>
                                            <th>Edit</th>
                                        </tr>
<?php
                                    while ($r = mysql_fetch_array($exm->result))
									 {
                                       ?>
                                          <tr class=\"alt\">
             <tr><td style="text-align:center;"><input type="radio" name="radio" value="<?php echo $r['examid']; ?>"></td>
			 <td><?php echo $r['examname'];?></td>
			 <td><?php echo $r['comment'];?></td>
			 <td><?php echo $r['examcode']; ?></td>
			 <td><?php echo $r['examfrom']." To ".$r['examto']; ?></td> 
<input type="hidden" value=" <?php echo $r['examid'];?>" name="editid">
              <td><input type="submit" name="edit" value="Edit"></td>
                                    
									<?php } ?>

    </table>  </form>
   </div>
              </div>
    </body>
</html>

<?php
                                }
								
								
function displayError($exm)
{
?>
<body>
 <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="../../Website/UI/images/coc.png" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				         </div>			
			 			
			
             <form name="submng" action="manageexamlogic.php"  method="post">
		   <div id="menu">
			<ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
  <input type="submit" value="back" name="back" class="button" title="back"/></ul></div></form>
			<div class="page">
			<div class="bax">
			<h1><?php   
			            
										
						if(isset($exm->message['noexam']))
						echo $exm->message['noexam'];
				        
						 else
						 echo "";
						 ?>
			</h1>
			</div>
			<div id="footer-right">
          <p style="font-size:70%;color:#ffffff;"> </b><br/> </p><p></p>
      </div></div>
</body>
<?php
	
			
	}
                              }
?>

              
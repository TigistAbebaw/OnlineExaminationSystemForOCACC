<?php 
// session_start();
 class   Questionform 
  {
  
 //session_start();
 
  function  Questioncontentform($error)     
         {
	

	 
        ?>
		<head>
        <title>COC Online Examination System</title>
        <link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/oes.css"/>
		<script type="text/javascript" src="../BC/validate.js" ></script>
    </head> 

    
    <body>
		<div id="wrap">
            
          <div id="header">
                  <img  height="83" width="156" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
		  </div>
                <form name="prepqn" action="exampreparelogic.php" method="post">
                <div class="menu">    <ul id="current"> 

<input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
<input type="submit" value="View Examination" name="viewexam" class="button" title="Prepare Examination"/>
<input type="submit" value="Save" name="savea" class="button" onClick="validateqnform('prepqn')" title="Save the Changes"/>


                <input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/></li>
                    </ul>

    </div>

                <div class="box">
				
<?php if(isset($error['same'])){ echo "<tr><td>".$error["same"]."</tr></td>"; }?>
 <?php if(isset($error['Exist'])){ echo "<tr><td>".$error["Exist"]."</tr></td>"; }?>           
                  <table width="484" cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em;" >
                                        <tr>
                                          <td>Question</td>
										  
                                            <td><textarea name="txtQuestion" cols="40" rows="3"></textarea><?php if(isset($error['txtQuestion'])){ echo "<tr><td>".$error["txtQuestion"]."</tr></td>"; }?></td>
                                        </tr>
										
                                         
										  
                                            
                                        
                                        <tr>
                                            <td>Option A</td>
                                            <td><input type="text" name="txtChoices1" value="" size="30"  /><?php if(isset($error['txtChoices1'])){ echo "<tr><td>".$error["txtChoices1"]."</td></tr>"; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Option B</td>
                                          <td><input type="text" name="txtChoices2" value="" size="30"  /><?php if(isset($error['txtChoices2'])){ echo "<tr><td>".$error["txtChoices2"]."</td></tr>"; }?></td>
                                        </tr>

                                        <tr>
                                            <td>Option C</td>
                                            <td><input type="text" name="txtChoices3" value="" size="30"  /><?php if(isset($error['txtChoices3'])){ echo "<tr><td>".$error["txtChoices1"]."</td></tr>"; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Option D</td>
                                            <td><input type="text" name="txtChoices4" value="" size="30"  /><?php if(isset($error['txtChoices4'])){ echo "<tr><td>".$error["txtChoices1"]."</td></tr>"; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Correct Answer</td>
                                            <td>
                                                <select name="txtAnswer">
												 <option value="---Select Answer---">---Select Answer---</option>
                                                    <option value="choicea">Option A</option>
                                                    <option value="choiceb">Option B</option>
                                                    <option value="choicec">Option C</option>
                                                    <option value="choiced">Option D</option>
                                                </select>
												<?php if(isset($error['txtAnswer'])){ echo "<tr><td>".$error["txtAnswer"]."</td></tr>"; }?>                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Marks</td>
                                            <td><input type="text" name="marks" value="" onKeyUp="isnum(this)" /></td><?php if(isset($error['marks'])){ echo "<tr><td>".$error["marks"]."</td></tr>"; }?>
                                        </tr>
                  </table>
</div>
          </form>
            
        </div>
 <?php
 }
function  EditQuestionform($value)     
         {
		 
        ?>
		
        <title>COC Online Examination System</title>
        <link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/oes.css"/>
    <script type="text/javascript" src="../BC/validate.js" ></script>

    
    <body>
		<div id="wrap">
            
          <div id="header">
                  <img  height="83" width="156" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
		  </div>
                <form name="prepqn" action="exampreparelogic.php" method="post">
                <div class="menu">


                    <ul id="current">
                      <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
                      <input type="submit" value="Save" name="savem" class="button" onClick="validateqnform('prepqn')" title="Save the Changes"/>


                <input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/></li>
                    </ul>

    </div>

                <div class="box">
				

            
                  <table width="484" cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em;" >
                                        <tr>
                                          <td>Question</td>
										  
                                            <td><textarea name="txtQuestion" cols="40" rows="3"><?php echo $value['question']; ?></textarea></td></td>
                                        </tr>
										
                                         								  
                                            
                                        
                                        <tr>
                                            <td>Option A</td>
                                            <td><input type="text" name="txtChoices1" value="<?php echo $value['choicea'];?>" size="30"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Option B</td>
                                          <td><input type="text" name="txtChoices2" value="<?php echo $value['choiceb'];?>" size="30"  /></td>
                                        </tr>

                                        <tr>
                                            <td>Option C</td>
                                            <td><input type="text" name="txtChoices3" value="<?php echo $value['choicec'];?>" size="30"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Option D</td>
                                            <td><input type="text" name="txtChoices4" value="<?php echo $value['choiced'];?>" size="30"  /></td>
                                        </tr>
                                        <tr>
                                            <td>Correct Answer</td>
                                            <td>
                                                <select name="txtAnswer">
									          <option value="choicea" <?php if (strcmp(htmlspecialchars_decode($value['correctanswer'],ENT_QUOTES), "optiona") == 0)
                                        echo "selected"; ?>>Choice A</option>
                                                    <option value="choiceb"<?php if (strcmp(htmlspecialchars_decode($value['correctanswer'],ENT_QUOTES), "optionb") == 0)
                                        echo "selected"; ?>>Choice B</option>
                                                    <option value="choicec"<?php if (strcmp(htmlspecialchars_decode($value['correctanswer'],ENT_QUOTES), "optionc") == 0)
                                        echo "selected"; ?>>Choice C</option>
                                                    <option value="choiced"<?php if (strcmp(htmlspecialchars_decode($value['correctanswer'],ENT_QUOTES), "optiond") == 0)
                                        echo "selected"; ?>>Choice D</option>
                                                </select>
								          </td>
                                        </tr>
                                        <tr>
                                            <td>Marks</td>
                                            <td><input type="text" name="marks" value="<?php echo $value['marks'];?>"  onKeyUp="isnum(this)"/></td>                                       </tr>
                  </table>
</div>
          </form>
           
        </div>
 


        <?php

}
	function displaytabelquestion($data2,$status)
	{
		?>
        <title> COC Online Examination Syste</title>
        <link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/oes.css" />
    </head> 
</html>
<html>
    
    <body>
  
       <div id="wrap">
            
                <div id="header">
                  <img  height="76" width="165" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES" / >
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				 
        </div>
             <div id="menu">

                <form name="adminwelcome" action="../LOGIC/exampreparelogic.php" method="post"  >
                  <ul >
				   <input type="submit" value=" add " name="add" class="button" title="Add Question"/>
				   <input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/>
                  <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/> 
				 
              <?php echo $status; ?>
              

                     <table>  
						 
				<tr><td></td></tr>
                       </table> 
                  </ul>
                </form>
    </div>
	
	<?php 
	//echo $data2['question'];
	if ($data2==false) {
			 echo "<h3 style=\"color:#0000cc;text-align:center;\">No Questions Yet..!</h3>"; }
			 else {
                                  $i = 0;  
			 ?>
			 <table cellpadding="30" cellspacing="10" class="datatable">
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Qn.No</th>
                                            <th>Question</th>
                                            <th>Correct Answer</th>
                                            <th>Marks</th>
                                            <th>Edit</th>
                                        </tr>
 <?php
 									
                                  while ($row = mysql_fetch_array($data2, MYSQL_ASSOC)) 
								 { 
                                       // echo max($row['0']);
									
									//for ( $i=1 ; max($i); $i--){
                                      $i = $i + 1;  
										if ($i % 2 == 0)
                                            echo "<tr class=\"alt\">";
                                        else
                                            echo "<tr>";
                                        echo "<td style=\"text-align:center;\"><input type=\"checkbox\" name=\"d$i\" value=\"" . $row['questionno'] . "\" /></td><td> " . $i. "</td><td>" . $row['question'] . "</td><td>" . htmlspecialchars_decode($row[htmlspecialchars_decode($row['correctanswer'],ENT_QUOTES)],ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($row['marks'],ENT_QUOTES) . "</td>"
                                        . "<td class=\"tddata\"><a title=\"Edit " . $row['questionno'] . "\"href=\"../LOGIC/edite.php?edit=" . $row['questionno'] . "\"><img src=\"../../Website/UI/images/edit.png\" height=\"30\" width=\"40\" alt=\"Edit\" /></a>"
                                       . "</td></tr>";
                  //}                  
                   }  ?>

                                </table>
			  
  
	  
	
	<?php
	}
}
}
?>




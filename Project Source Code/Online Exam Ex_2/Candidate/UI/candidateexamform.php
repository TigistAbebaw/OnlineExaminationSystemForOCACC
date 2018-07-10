<html><head><link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
        <script type="text/javascript" src="../../Website/UI/validate.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php	
Class Examcodeform
{
function displayEntertestcode($error)
{	
    
?>
     <body>        
      <div id="wrap">
            
        <div id="header">
                  <img  height="87" width="130" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
	    </div>
                <form id="stdtest" action="candidateexamlogic.php" method="post">
		
                <div id="menu">
                    <ul id="current">
                        
                        <li><input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/></li>
                        <li><input type="submit" value="Candidate home" name="welcome" class="button" title="Candidate home"/></li>
                  </ul>
              </div>
              <div class="box">
                 
                    <table cellpadding="30" cellspacing="10">
                                    <tr>
                                        <td>Enter Exam Code</td>
                                        <td><input type="text" tabindex="1" name="txtcode" value="" size="16" /></td>
                                        <td><div class="help" style="font-size:10px"><b>Note:</b><br/>Once you press start test<br/>button timer will be started</div></td>
                                    
									<?php if(isset($error['invalidcode'])){?>
									<hr><?php echo $error['invalidcode']; }?></hr>
									<?php if(isset($error['emptycode'])) {?>
									<hr><?php echo $error['emptycode']; }?></hr>
									
									  
                                    <tr>
                                        <td colspan="2">
                                   <input type="submit" tabindex="3" value="Start Test" name="startexam" class="button" />
                                        </td>
                                    </tr>
                </table>
			  </div>
		</form>
<div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"> </b><br/> </p>
          <p>&nbsp;</p>
      </div>
     </div>
        </div>
		
		
		<?php
		}
function displayOfferedtests($exam)
{ 
?>
 <div id="wrap">
            
                <div id="header">
                  <img  height="106" width="154" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  <h2 id="slogan"><i></i></h2>
   </div>
			
			<?php
			
			if(isset($error['no exam']))
			echo $error['no exam'];
			else
			{
              ?>  
			        <table cellpadding="30" cellspacing="10" class="datatable">
                                        <tr>
                                            <th style="color:#660000">Exam Name</th>
                                            <th style="color:#660000">Exam Description</th>
                                            <th style="color:#660000">Occupation Name</th>
                                            <th style="color:#660000">Duration</th>
                                            <th style="color:#660000">Total Questions</th>
                                            <th style="color:#660000">Take Exam </th>
                                       </tr>
									  <?php 
									   while($r = mysql_fetch_array($exam->result2))
									   {
									   ?>
									  <tr>
                                        <td style="color:#660000"> <?php echo $r['examname']; ?></td>
										<td style="color:#660000"> <?php echo $r['comment']; ?></td>
										<td style="color:#660000"> <?php echo $exam->result1['occupationname']; ?></td>
										<td style="color:#660000">  <?php echo $r['duration']; ?></td>
										<td style="color:#660000"> <?php echo $r['totalquestions']; ?></td>
                                         
										
										
									 <form  id="candexam" action="candidateexamlogic.php" method="post">	
		<input type="hidden" tabindex="1" name="examid" value="<?php echo $r['examid'];?>" size="16" />
	<td class=\"tddata\"><input type="submit" tabindex="1" name="askcode" value="Starttest" size="16" /></td>
	    
	</form>
									
									
									
									<?php
									}
									
									}
									?>
   </table>
	
	

			<div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"> </b><br/> </p>
          <p>&nbsp;</p>
      </div>
           
     </div>
		</div>
		</div>
		
<?php			
}
function displayNoexam($error)
{
?>
<body>
 <div id="wrap">
            
                <div id="header">
                  <img  height="83" width="153" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  <h2 id="slogan"><i></i></h2>
   </div>
			
			  <form id="candexam" action="candidateexamlogic.php" method="post">
<a href="../../index.php">HOME</a>
                <ul id="current">
                  <input type="submit" value="Candidate home" name="welcome2" class="button" title="Candidate home"/>
                  <input type="submit" value="LogOut" name="logout2" class="button" title="Log Out"/>
                </ul>
                <div id="menu">
                   
              </div></form>
			  <div class="box">
			<?php if(isset($error['noexam'])) ?><a href="../../index.php"></a>
			<hr><?php echo $error['noexam']; ?></hr>
			<?php if(isset($error['noques'])) ?>
			<hr><?php echo $error['noques']; ?></hr>
		    <?php if(isset($error['noQuestion']))?>
			<hr><?php echo $error['noQuestion'];?></hr>
			</div>
									     
<div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"></b><br/> </p>
          <p>&nbsp;</p>
   </div>
           
     </div>
		</div>
		</div>

<?php 
}
		
				
function displayTimeout($message)
				{
				?>
				<body>
				 <div id="wrap">
            
                <div id="header">
                  <img  height="137" width="132" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  <h2 id="slogan"><i></i></h2>
        </div>
          <div id="menu">
                         
          </div>
      <div class="page">
         <form  action="candidateexamlogic.php" method="post" >
                <h2 style=\"text-align:center;color:#0000ff;\"><?php echo $message;?><br/>
				<td><input type="submit" name="login" value="LogIn Now" class="button"/></td></a></h2>;
          <a href="/Online Exam Ex_2/index.php">HOME</a>
        </form>
			</div>

<div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"> </b><br/> </p>
          <p>&nbsp;</p>
      </div>
      </div>
				<?php
				}
						
				}
				
				?>

    </body>
</html>

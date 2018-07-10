<html><head>

<title>Certificate</title>


<link media="all" href="/Online Exam Ex_2/Candidate/UI/widget61.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="/Online Exam Ex_2/Candidate/UI/index.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="../../Website/UI/oes.css">

</head>
<body>

<?php

Class Resultform
{
function displayResultdetail($result,$candmark)
{
?>

        <div id="wrap">
          <div id="header">
                  <img  height="102" width="159" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
		  </div>
                <form action="../LOGIC/viewresultlogic.php" name="cert" method="post">
           
		
                <div id="menu">
                    <ul id="current">
                        
                        <li><input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/></li>
                        <li><input type="submit" value="Candidate home" name="welcome" class="button" title="Candidate home"/></li><input type="submit" value="Certificate" name="certificate" class="button" title="certificate"/>
                  </ul>
              </div>
              <div class="box">      
			   <table cellpadding="10" cellspacing="7" border="0" style="background:#ffffff;text-align:left;line-height:37px;">
                        <tr>
                            <td colspan="2"><h3 class="at15t_2linkme" style="color:#5c1215;text-align:center;">Exam Summa<span class="style3"></span>ry</h3></td>
                        </tr>
                        <tr>
                          <td height="31" colspan="2" ><hr style="color:#5c1215;border-width:4px;"/></td>
                        </tr>
                        <tr>
                            <td width="216"  style="color:#5c1215;text-align:center; ><span class="style3"></span>Candidate Name</td>
                            <td width="62"><?php echo $result->info['firstname']; ?></td>
                        </tr>
                        <tr>
                            <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Exam</td>
                            <td><?php echo $result->examname['examname']; ?></td>
                        </tr>
                        <tr>
                  <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Occupation name</td>
                            <td><?php echo $result->info['occupationname']; ?></td>
                        </tr>
                        <tr>
                  <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Date of examination </td>
                            <td><?php echo $result->datecomp['date']; ?></td>
                        </tr>
                          <tr>
                             <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Max Marks </td>
                             <td><?php echo $result->totalmark['tm']; ?></td>
                        </tr>
                        <tr>
                            <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Obtained Marks</td>
                            <td><?php if($result->candma['sum']!=0)
							               echo $result->candma['sum']; 
							           else 
												 echo "0"; ?></td>
                        </tr>
                        <tr>
                           <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Percentage </td>
                            <td><?php echo $result->percentage['perc']*100; ?></td>
                        </tr>
						<tr>
                           <td  style="color:#5c1215;text-align:center; ><span class="style3"></span>Competency</td>
                            <td style=""><?php echo $result->competency['competency']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><hr style="color:#5c1215;border-width:2px;"/></td>
                        </tr>
                         
</table>
        </tr>
      </table>
	   </div> </form>
         
 
  </div></body></html>
			<?php 
			}
			
	
function displayOverexams($result)
			{
			?>
			 <div id="wrap">
			 <div id="header">
                  <img  height="102" width="159" src="images/image1.jpg" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  <h2 id="slogan"><i></i></h2>
        </div>
			
          <li><input type="submit" class="home" value="welcome"> 
          </li>
     
	  <li><input type="submit" class="Logout" value="Logout"> 
  </li>
        <li></li>

    <?php
			if(isset($error['no exam']))
			echo $error['no exam'];
			else
			{
              ?>       
			  
			 


            <div align="right">
       <table cellpadding="10" cellspacing="15" border="0" style="background:#ffffff;text-align:left;line-height:37px;">
                        <tr>
                                            <th style="color:#660000">Exam Name</th>
                                            <th style="color:#660000">Competecy</th>
                                             <th style="color:#660000">Take Exam </th>
         </tr>
									  <?php 
									   while($r = mysql_fetch_array($result->general))
									   {
									   ?>
									  <tr>
                                        <td style="color:#660000">> <?php echo $r['examname']; ?></td>
										<td style="color:#660000">> <?php echo $r['competency']; ?></td>
									                                      
										
										
									 <form  id="candexam" action="viewresultlogic.php" method="post">	
		<input type="hidden" tabindex="1" name="examid" value="<?php echo $r['examid'];?>" size="16" />
	<td class=\"tddata\"><input type="submit" tabindex="1" name="askcode" value="Starttest" size="16" /></td>
	    
	</form>
									</tr> 
									
</table>
									</body>
									</html>
									
									<?php
									}}
									?>
									

		
			<?php
			}
			function certificateForm($result)
			{
			?>
			
			<html><head>
			 <script type="text/javascript"></script>
<style type="text/css">

body {
	background-color:#000000;
}

</style></head>
<body bgcolor="#000000">
<form action="../LOGIC/viewresultlogic.php" name="cert">
<input type="submit" name="welcome" value="welcome" align="texttop">
<input type="button"  value="print" onClick="window.print()" align="texttop">
<?php echo $result->candocc['candidatename'];  ?>

</form>
<img src="../../Website/UI/images/certificate.png" align="middle" height="650" width="90%" >


</body>


	</html>
<?php 
}
}

?>
			
      
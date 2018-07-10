
</html>
<html>
    <head>
        <title>OES-DashBoard</title>
        <link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
    </head>
    <body>
        <?php
  Class   Candidatewelcomeform 
  {
  function  displaycandidateWelcomeform()     
         {
        ?>
             
      <div id="wrap">
            
                <div id="header">
                  <img  height="118" width="132" src="../../Website/UI/images/coc.png" alt="OES" align="left"/>
                  <h1 id="logo" align="right">Online Examination System<span class="gray"> For OCACC</span></h1>
				  </div>
              
       <form name="candidatewelcome" action="candidatewelcomelogic.php" method="post">
                  <div id="menu">
				  <ul> <li id="current">
                  
                        <li><input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/></li>
						<li><a href="../../index.php">HOME</a></li>
                    </ul>
         </div>
			  
			      
                 <div class="box"> 
                    <ul id="sidemenu">
                       
						 <table>
				<tr><td>&nbsp;</td></tr>
				
				<tr><td><input type="submit" value="candidateexam" name="candexam" class="button" title="Log Out"/></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				
			<tr><td>&nbsp;</td></tr>
				
				<tr><td>&nbsp;</td></tr>
                       </table> 
                    </ul>
                 </div>
        </form>
              
			  
           <div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"> 
      </div>
      </div>
                <?php 
				}
				function displayRelogin($message)
				{
				?>
				 <div id="wrap">
            
                <div id="header">
                  <img  height="103" width="150" src="../../Website/UI/images/coc.png"  align="left"/>                </div>
              
          <div id="menu">
              
         <form  action="candidatewelcomelogic.php" method="post" >
                <h2 style=\"text-align:center;color:#0000ff;\"><?php echo $message;?><br/>
				<td><input type="submit" name="login" value="LogIn Now" class="button"/></td></a></h2>;
          
	        </form>
			</div>

<div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"> 
      </div>
      </div>
				<?php
				}
						
				}
				?>

            </div>

  </body>
</html>
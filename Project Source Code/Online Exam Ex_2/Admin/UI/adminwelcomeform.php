
</html>
<html>
    <head>
        <title>Online Examination system</title>
        <link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
    </head>
    <body>
        <?php
  Class   Adminwelcomeform 
  {
  function  displayadminWelcomeform()     
         {
        ?>
       <div id="wrap">
            
                <div id="header">
                  <img  height="137" width="132" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
        </div>
            <div id="menu">

                <form name="adminwelcome" action="adminwelcomelogic.php" method="post">
                    <ul id="current">
                        
                       <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
					  <a href="../../index.php">HOME</a>
                    </ul>
            </div>
            <div class="box">
                
                    <ul id="sidemenu">
                       
						 <table>
				
				
		
				<tr><td><input type="submit" value="Manage Sector" name="Managesector" class="button" title="Manage Sector"/></td></tr>
						
					
				
                       </table> 
                    </ul>
                </form>
    </div>
			  
           <div id="footer-right">
          <p style="font-size:70%;color:#ffffff;">&nbsp;</p>
           </div>
      </div>
                <?php 
				}
				function displayRelogin($message)
				{
				?>
				<div id="wrap">
            
                <div id="header">
                  <img  height="80" width="168" src="../../Candidate/UI/images/image1.jpg" alt="OES"/>
                  <h1 id="logo" align="right">Online Examination System<span class="gray"> For OCACC</span></h1>
				 
        </div>
          <div id="menu">
                         
          </div>
      <div class="box">
         <form  action="adminwelcomelogic.php" method="post" >
                <h2 style=\"text-align:center;color:#0000ff;\"><?php echo $message;?><br/>
				<td><input type="submit" name="login" value="LogIn Now" class="button"/></td></a></h2>;
          
        </form>
			</div>

<div id="footer-right">
          <p style="font-size:70%;color:#ffffff;">
      </div>
      </div>
		</div>	
				<?php
				}
						
				}
				?>

            

  </body>
</html>
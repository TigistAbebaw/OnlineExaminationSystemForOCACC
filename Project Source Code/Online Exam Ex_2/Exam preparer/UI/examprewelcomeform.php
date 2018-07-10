     <?php
 class   Adminwelcomeform 
  {
 // $data2
  function  displayadminWelcomeform($status)     
         {
        ?>
		<head>
        <title> COC Online Examination Syste</title>
        <link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/oes.css"/>
    </head> 
</html>
<html>
    
    <body>
  
       <div id="wrap">
            
    <div id="header">
                  <img  height="76" width="165" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
    </div>
                <form name="adminwelcome" action="prepareQuestion.php" method="post">
   <div class="menu">              
                   <ul id="current">
               
                  <i><input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>  
						 
				 <input type="submit" value="Create Question" name="Create" class="button" title="Create Question"/>
				
				<input type="submit" value="View Examination" name="viewexam" class="button" title="Prepare Examination"/></li>
				
				</li></i>
                      
                  <?php echo $status ?></ul> </div>
                </form>
                                  
     
	  
                <?php 
				}
				function displayRelogin($account,$errorauth)
				{
				?>
				<div id="wrap">
            
                <div id="header">
                  <img  height="76" width="163" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  </div>
                <div id="menu">
            </div>             
          </div>
      <div class="box">
         <form  action="examprewelcomelogic.php" method="post" >
               				<h2 style=\"text-align:center;color:#0000ff;\"><?php echo $errorauth['$message'];?><br/>
				<td><input type="submit" name="login" value="LogIn Now" class="button"/></td></a></h2>
         </form>
		 </div>


<?php
				} 
	
	
				}
				
				?>
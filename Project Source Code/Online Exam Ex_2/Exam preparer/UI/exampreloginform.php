<html><head>
</head>
<?php

class AdminLoginform
{
function displayLoginform($account,$error)
{
?>
    <title>COC Online Examination System</title>
    
    <link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/oes.css"/>
  
  <body>
           
      <div id="wrap">
            
        <div id="header">
                  <img  height="66" width="140" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
	    </div>
                <form id="sectorloginform" action="index.php" method="POST">
      <div class="menu">
       
       <ul id="current">
                   
                      <!--  <li></li>-->
           
                       
        </ul>

      </div>
      <div class="box">
              <ul id="currrent">
              <table cellpadding="30" cellspacing="10">
              <tr>
                  <td>Exam Preparer  Name</td>
                  <td><input type="text" tabindex="1" name="name" value="<?php echo $account->name; ?>" size="16" /></td>
              </tr>
			   <?php if(isset($error["name"]))
                 {
                   ?>
               <tr>
           <td ><?php echo $error["name"]; ?></td>
           </tr>
           <?php
              }
             ?>
              <tr>
                  <td>Password</td>
                  <td><input type="password" tabindex="2" name="password" value="<?php echo $account->password; ?>" size="16" /></td>
              </tr>
			   <?php if(isset($error["pass"]))
                 {
                ?>
               <tr>
               <td ><?php echo $error["pass"]; ?></td>
               </tr>
               <?php
                 }
                ?>
				<?php if(isset($error["login"]))
                 {
                ?>
               <tr>
               <td ><?php echo $error["login"]; ?></td>
               </tr>
               <?php
			   	
                 }
				 if(isset($error["notAssigned"])){
				 ?>
				 <tr>
               <td ><?php echo $error["notAssigned"]; ?></td>
               </tr>
			   <?php
			   }
			   ?>

              <tr>
                  <td colspan="2">
                      <input type="submit" tabindex="3" value="Log In" name="admsubmit" class="button" />                  </td><td></td>
              </tr>
            </table>
</ul>
</form> 
      </div>
       

</body>
  <?php
}
}
?>
</html>

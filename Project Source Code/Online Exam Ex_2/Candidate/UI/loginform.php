<html><head><link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/oes.css"/></head>
<?php

Class Loginform
{
function displayLoginform($account,$error)
{
?>
    <title>Online Examination System</title>
    
    <link rel="stylesheet" type="text/css" href="/Online Exam Ex_2/Website/UI/images/coc.png"/>
  
  <body>
           
      <div id="wrap">
            
        <div id="header">
                  <img  height="97" width="132" src="/Online Exam Ex_2/Website/UI/images/coc.png"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
	    </div>
                <form id="stdloginform" action="<?php $_SERVER['DOCUMENT_ROOT'] ?>."/Online Exam Ex_2/Candidate/index.php" method="POST">
     
	  <div id="menu">
       
      <ul> <li id="current">
                   
                      <input type="submit" value="Register" name="register" class="button" title="Register"/></li>
          
        </ul>

      </div>
      <div class="box"> 
        
          <table cellpadding="30" cellspacing="10">
            <tr>
              <td>User Name</td>
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
                ?>
            <tr>
              <td colspan="2"><input type="submit" tabindex="3" value="Log In" name="submit" class="button" />
              </td>
              <td></td>
            </tr>
          </table>
        
       </div>
     </form>

    <div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"><br/> 
      </p><p>&nbsp;</p>
      </div>
      </div>
	  
  </body>
  <?php
}
}
?>
</html>

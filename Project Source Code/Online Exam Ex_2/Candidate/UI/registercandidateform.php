<html><head>
        <title>Online exam Registration</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
        <link rel="stylesheet" type="text/css" media="all" href="../../Website/UI/calendar/jsDatePick.css" />
		<script type="text/javascript" src="../../Website/UI/validate.js"/></script>
        <script type="text/javascript" src="/Online Exam Ex_2/Website/UI/calendar/jsDatePick.full.1.1.js"></script>
        <script type="text/javascript">
            window.onload = function(){
                new JsDatePick({
                    useMode:2,
                    target:"datet"
                   
                });

                new JsDatePick({
                    useMode:2,
                    target:"datet"
                    
                });
            };
        </script>

        <script type="text/javascript" src="../validate.js" ></script>
    </head>
    <body>
<?php
Class Registrationform
{
function displayRegistrationform($candidate,$error)
{
?>
<body >
    <title>Online Examination System</title>
  
             
 <div id="wrap">
            
                <div id="header"><img  height="74" width="155" src="../../Website/UI/images/coc.png" align="left"/>
                  <h1 id="logo" align="right">Online Examination System<span class="gray"> For OCACC</span></h1>
    </div>
                <div id="menu">
         
             <h2 style="text-align:center;color:#ffffff;">New Candidate Registration</h2>
               
    </div>
     <form id="rform" action="registercandidatelogic.php" method="post" onSubmit="return validateform('rform');">       
    <div class="box"> 
               
	        
		      <table cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em" >
              <tr>
                  <td>Cadidate Name</td>
                  <td><input type="text" name="name" value="<?php echo $candidate->name; ?>" size="16" onKeyUp="isalphanum(this)"/></td>
              </tr>
			  <?php if(isset($error["name"]))
{
 ?>
      <tr>
        <td colspan="2"><?php echo $error["name"]; ?></td>
      </tr>
      <?php
}
?>
 <?php if(isset($error["availability"]))
{
 ?>
      <tr>
        <td colspan="2"><?php echo $error["availability"]; ?></td>
      </tr>
      <?php
}
?>

                      <tr>
                  <td>Password</td>
                  <td><input type="password" name="password" value="<?php echo $candidate->password; ?>" size="16" onKeyUp="isalphanum(this)" /></td>
              </tr>
<?php if(isset($error["password"]))
{
 ?>
       <tr>
        <td colspan="2"><?php echo $error["password"]; ?></td>
      </tr>
      <?php
}
?>
                      <tr>
                  <td>Confirm Password</td>
                  <td><input type="password" name="repass" value="<?php echo $candidate->repass; ?>" size="16" onKeyUp="isalphanum(this)" /></td>

              </tr>
			  <?php if(isset($error["repass"]))
{
 ?>
      
      <tr>
        <td colspan="2"><?php echo $error["repass"]; ?></td>
      </tr>
      <?php
}
?>
              <tr>
                  <td>E-mail ID</td>
                  <td><input type="text" name="email" value="<?php echo $candidate->email; ?>" size="16" /></td>
              </tr>
			  <?php if(isset($error["email"]))
{
 ?>
      <tr>
        <td colspan="2"><?php echo $error["email"]; ?></td>
      </tr>
      <?php
}
?>
                       <tr>
                  <td>First Name</td>
                  <td><input type="text" name="firstname" value="<?php echo $candidate->firstname; ?>" size="16" onKeyUp="isalphanum(this)"/></td>
              </tr>
			  
                    
			    <tr>
                  <td>Middle Name</td>
                  <td><input type="text" name="middlename" value="<?php echo $candidate->middlename; ?>" size="16" onKeyUp="isalphanum(this)"/></td>
              </tr>
			  <tr>
                  <td>Last Name</td>
                  <td><input type="text" name="lastname" value="<?php echo $candidate->lastname; ?>" size="16" onKeyUp="isalphanum(this)"/></td>
              </tr>

                  <tr>
                  <td>Gender</td>
                  <td><input  type="radio" name="gender" cols="20" rows="3" value="female">Female
				  <input  type="radio" name="gender" cols="20" rows="3" value="male">Male</td>
              </tr>
                       <tr>
                  <td>Date of Birth</td>
                  <td><input type="text" id="datet" name="datet" value="<?php echo $candidate->datet; ?>" size="16" onKeyUp="isalpha(this)"/></td>
              </tr>
			   <td> Occupation</td>
			  
                            <td><select name="occup" >
							<?php
							 while ($r1=mysql_fetch_array($candidate->occupation))
							 {
							 ?> 
		     <option value="<?php echo $r1['occupationid'];?>"><?php echo $r1['occupationname']; ?></option>                                <?php } ?>                 
								</select></td>
                       <tr>
                  
                       <tr>
                           <td style="text-align:right;"><input type="submit" name="submit" value="Register" class="button" /></td>
                  <td><input type="reset" name="reset" value="Reset" class="button" onClick=""/></td>
              </tr>
            </table>
						
	   </div></form>
        
		

    <div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"> </p>
    </div></body></html>
       <?php
	   	    } 
			
function displaySuccesspage()
{
 ?>
 <html><head></head><body>
    <div id="wrap">
            
                <div id="header"><img  height="59" width="118" src="../../Website/UI/images/coc.png" align="left"/>
                  <h1 id="logo" align="right">Online Examination System<span class="gray"> For OCACC</span></h1>
                </div>
          <div id="menu">
                 
         <form  action="registercandidatelogic.php" method="post" >
                <h2 style=\"text-align:center;color:#0000ff;\"> Thank You For Registering with Online Examination System.<br/>
				  <td>&nbsp;</td>
				  </a>
				  <input type="submit" name="login" value="LogIn Now" class="button" align="middle" />
                </h2>
          
        </form>
		</div>

 <div class="footer-right">
          <p style="font-size:70%;color:#ffffff;">       </div>
 </div></body></html>
		<?php	
	   }
	   }
	   ?>
      
</body>
</html>


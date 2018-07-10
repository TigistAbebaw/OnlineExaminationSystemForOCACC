<?php
Class  Ackform
{
function  displayAcknowledgment()
{   
?>
<html>
  <head>
    <title>OESOCACC-Test Acknowledgement</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
    <script type="text/javascript" src="validate.js"></script>
    </head>
  <body >
        
      <div id="wrap">
            
                <div id="header">
                  <img  height="81" width="157" src="../../Website/UI/images/coc.png" alt="OES" align="left"/>
                  <h1 id="logo" align="right">Online Examination System<span class="gray"> For OCACC</span></h1>
				  
        </div>
           <form id="editprofile" action="examacklogic.php" method="post">
          <div id="menu">
               <ul id="current">
                       
                        <li><input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/></li>
                        <li><input type="submit" value="Candidate Home" name="welcome" class="button" title="welcome"/></li>
                       

               </ul>
          </div>
      <div class="box">
          <h3 style="color:#FFFFFF;text-align:center;">Your answers are Successfully Submitted. To view the Results <b><input type="submit" value="Click Here" name="viewresult" class="button" title="VIEW RESULT"/></b> </h3>
        
      </div>

           </form>
     <div class="footer-right">
          <p style="font-size:70%;color:#ffffff;"><b></b><br/> </p><p></p>
      </div>
      </div>
  </body>
</html>
<?php
}}
?>

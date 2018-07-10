<?php	
Class Examinationform
{
function displayExamination($error,$q,$btnname,$time)//($error,$check,$questions,$btnname,$time)
{
?>	

<html><head><link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
        <script type="text/javascript" src="../../Website/UI/cdtimer.js"></script>
		<script type="text/javascript" src=""></script>
		<script type="text/javascript">
		       <?php 
                    if(isset($time))
					{ 
                     echo "var hour=".$time['hour'].";";
                     echo "var min=".$time['min'].";";
                     echo "var sec=".$time['sec'].";";
                    }
                    else
                    {
                        echo $error['noclock'];
                    }
					?>
		</script>			
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>  
  <?php  if(isset($error['notupdate']))
        echo $error['notupdate']; ?>
    <noscript><h2>For the proper Functionality, You must use Javascript enabled Browser</h2></noscript>
      
       <div id="wrap">
            
                <div id="header">
				<img  height="88" width="206" src="../../Website/UI/images/coc.png" alt="OES" align="left"/>
				  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
        </div>
           <form id="examconducter" action="examconductorlogic.php" method="post">
          <div id="menu" style="text-align:center;">
              <h2 style="font-family:helvetica,sans-serif;font-weight:bolder;font-size:120%;color: #af0a36;padding-top:0.3em;letter-spacing:1px;">OESOCACC:Exam Conducter</h2>
          </div>
      <div class="box">
        <div class="tc">

              <table border="0" width="100%" class="ntab">
                  <tr>
                      <th style="width:40%;"><h3><span id="timer" class="timerclass"></span></h3></th>
                      <th style="width:40%;"><h4 style="font-size:18px;color: #af0a36;">Question No: <?php echo $_SESSION['qn']; ?> </h4></th>
                      <th style="width:20%;"><h4 style="font-size:18px;color: #af0a36;"></h4></th>
                  </tr>
              </table>
             <textarea cols="100" rows="8" name="question" readonly style="width:96.8%;text-align:left;margin-left:2%;margin-top:2px;font-size:120%;font-weight:bold;margin-bottom:0;color:#0000ff;padding:2px 2px 2px 2px;"><?php echo htmlspecialchars_decode($q['question'],ENT_QUOTES); ?></textarea>
              <table border="0" width="100%" class="ntab">
                  <tr><td>&nbsp;</td></tr>
                  <tr><td style="color:">1. <input type="radio" name="answer" value="choicea" ><?php echo $q['choicea']; ?></input></td></tr>
                  <tr><td >2. <input type="radio" name="answer" value="choiceb"> <?php echo $q['choiceb']; ?></input></td></tr>
                  <tr><td >3. <input type="radio" name="answer" value="choicec" > <?php echo $q['choicec']; ?></input></td></tr>
                  <tr><td >4. <input type="radio" name="answer" value="choiced" > <?php echo $q['choiced']; ?></input></td></tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                      <th style="width:80%;"><h4><input type="submit" name="<?php echo $btnname; ?>" value="<?php echo $btnname; ?>" class="button"/></h4></th>
                      
                      <th style="width:8%;text-align:right;"><h4><input type="submit" name="finalsubmit" value="Finalsubmit" class="button" /></h4></th>
                  </tr>
                  

              </table>
              

        </div>
          
      </div>

           </form>
     <div id="footer-right">
           <p style="font-size:70%;color:#ffffff;"><b></b><br/> </p>
           <p>&nbsp;</p>
      </div>
      </div>
  

<?php
 
}

		
				
function displayTimeout($message)
				{
				?>
				<div id="wrap">
            
                < <div id="header">
				<img  height="88" width="206" src="images/image1.jpg" alt="OES" align="left"/>
				<h2 align="center" style="font-size: xx-large">ኢንተርኔት ፈተና <span class="gray"> ለ COC </span></h2>
				
                  <!--<h2 id="slogan"><i>...the first online examination</i></h2>-->
        </div>
          <div id="menu">
                         
          </div>
      <div class="box">
         <form  action="examconductorlogic.php" method="post" >
                <h2 style=\"text-align:center;color:#0000ff;\"><?php echo $message;?><br/>
				<td><input type="submit" name="login" value="login" class="button"/></td></a></h2>;
          
        </form>
			</div>

<div id="footer-right">
          <p style="font-size:70%;color:#ffffff;"> <b</b><br/> </p>
          <p>&nbsp;</p>
      </div>
      </div>
				<?php
				}
						
				}
				
				?>

    </body>
</html>

   

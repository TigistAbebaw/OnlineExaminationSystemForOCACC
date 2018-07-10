<html><head><link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
        <script type="text/javascript" src="../../Website/UI/images" ></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
	
<?php	
Class occupationform
{
function displayoccupationlist($occ)
{	
 ?>
 <body>
 <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="../../Website/UI/images/coc.png" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
        </div>
			<div id="menu"> 
			<ul id="current">
			 <form name="occmng" action="manageoccupationlogic.php" method="post">
                
                 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
                     <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>                    
					 <input type="submit" value="back" name="back" class="button" title="back"/>
                     <input type="submit" value="Add" name="add" class="button" title="Add"/>
	</form>
	       </ul></div>
	 <div class="box">	
             <h2>  <?php if(isset($occ->error['notselected'])) echo $occ->error['notselected'];
			 			else
			              {
						 ?></h2>
 <table cellpadding="30" cellspacing="10" class="datatable">
                        <tr>
                            <th>&nbsp;</th>
                            <th>occupation Name</th>
                            <th>Edit</th>
                        </tr>
	   </table>
   </div>	<div class="box">			
<?php
                    while ($r=mysql_fetch_array($occ->result))
					 { 
					 
                       ?>
					   	

					   <table cellpadding="30" cellspacing="10" class="datatable">
					   <form name="occmng" action="manageoccupationlogic.php" method="post">
						
						<tr>


<td  width="10" height="47" align="left"><input type="radio" name="radio" value="<?php  echo $r['occupationid']; ?>"></td>

<td align="left"   width="300"><?php echo htmlspecialchars_decode($r['occupationname'], ENT_QUOTES); ?></td>


<input type="hidden" name="radioocclist" value="<?php  echo $r['occupationid']; ?>">

<td align="left" width="200"><input type="submit" value="Edit" name="edit" >

<input type="submit" value="Delete" name="delete"  title="Delete" />
<input type="submit" value="Examinations" name="Examinations"  title="Examinations" />

</form></td></tr> <?php 
	  } 
	  }
	  ?>
      </table>
	 

 </div>
	  <div id="footer">
          <p style="font-size:70%;color:#ffffff;"> 
      </div></div>
	  
	  </div>                 
<?php
 }
 
 function displayAddoccupation($occ)
{

?>

             <body>
             <div id="wrap">
				<div id="header">
					  <img  height="59" width="118" src="../../Website/UI/images/coc.png" alt="OES" align"left"/>
					  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
			   </div>
						
						
								
				<form name="occmng" action="manageoccupationlogic.php" method="post">	
				<div id="menu">
								<ul id="current">	
				<input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
				<input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
				<input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/>
				<input type="submit" value="back" name="back" class="button" title="back"/>
				<input type="submit" value="Save" name="saveadd" class="button" onClick="validatesubform('occmng')" title="Save                the Changes"/>
				</ul></div> 
				
				
				<div class="box">
				<table cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em" >
									<tr>
										<td>occupation Name</td>
				 <td><input type="text" name="occname" value="<?php if(isset($occ->occname)) echo $occ->occname; ?>" size="16" onKeyUp="isalphanum(this)"></td>
				 <?php if(isset($occ->error['emptyname'])) echo "<td>". $occ->error['emptyname']. "</td>";?></tr>                     
				<tr><td>Payment Amount</td>
				<td><input type="text" name="payment" value="<?php if(isset($occ->payment)) echo $occ->payment;?>" size="16" onKeyUp="isnum(this)"></td> 
				  <tr>
				<?php if(isset($occ->error['alreadyexist']))echo "<tr><td colspan='2'>".$occ->error['alreadyexist']."</td>";?>
		          </tr></table></form>
				
				</table></div> 
				<div id="footer-right">
					  <p style="font-size:70%;color:#ffffff;">
				</div></div></div>
  </body>
<?php 
}

function displayEditoccupation($occ)
{
?>
<body>
   <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="../../Candidate/UI/images/image1.jpg" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
              </div>
			
			
			<form name="occeditmng" action="manageoccupationlogic.php"  method="post">
			<div id="menu">
           <ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
  <input type="submit" value="back" name="back" class="button" title="back"/>

 <input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/>
 <input type="submit" value="Save" name="saveedit" class="button" title="Save the changes" onClick="validatesubform(occeditmng)"/></ul>
 </div>
  <div class="box">
<table cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em" >
                        <tr>
                            <td>occupation Name </td>
       <td><input type="text" name="occname" value="<?php echo $occ->occdatatoedit ; ?>" size="16" onKeyUp="isalphanum(this)"></td></tr>
					    <tr> <td> new occupation Name </td> 
						<td><input type="text" name="occnameedit" value="" size="16" onKeyUp=""></td></tr>
			<tr><td>Payment Amount</td><td><input type="text" name="payment" value="<?php $occ->payment ?>" size="16" onKeyUp="isnum(this)"></td></tr>
						<td><input type="hidden" name="occtoedit" value="<?php echo $occ->occtoedit;?>" size="16" onKeyUp="isalphanum(this)"></td>
                            
                          <p>&nbsp; </p></td>
                            <?php if(isset($occ->error['emptyname'])) echo "<td>". $occ->error['emptyname']. "</td>";?>
                        </tr>

                        <tr>
						
              </table></form>


   
   
   <div id="footer-right">
          <p style="font-size:70%;color:#ffffff;"> 
     </div></div>
	  </div>
</body>
<?php
}
function displayError($occ)
{
?>

 <body>
 <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="../../Candidate/UI/images/image1.jpg" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
        </div>			
			 
			 
             <form name="occmng" action="manageoccupationlogic.php"  method="post">
			 <div id="menu">
					 
			  <ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
   <input type="submit" value="back" name="back" class="button" title="back"/>
   <input type="submit" value="Add" name="add" class="button" title="Add"/>
   </ul></div></form>
			<div class="box">
			<hr><?php 
				        if(isset($occ->error['accdelete']))
						echo $occ->error['accdelete'];
						else if(isset($occ->error['alreadyexist']))
						echo $occ->error['alreadyexist'];
						else if(isset($occ->error['nooccdata']))
						echo $occ->error['nooccdata'];
						else if(isset($occ->error['noocc']))
						echo $occ->error['noocc'];
						else
						echo "";
						 ?>
			</hr></div>
			
			<div id="footer">
          <p style="font-size:70%;color:#ffffff;"> 
      </div></div>
</body>
<?php
	}
			
	

function displayMessage($occ)
{
?>
<body>
 <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="/Online Exam Ex_2/Website/UI/images/coc.png" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
        </div>			
			 			
			
             <form name="submng" action="manageoccupationlogic.php"  method="post">
		   <div id="menu">
			<ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
  <input type="submit" value="back" name="back" class="button" title="back"/></ul></div></form>
			<div class="page">
			<h1><?php   
			             if(isset($occ->message['succcreate']))
						 echo $occ->message['succcreate'];
				         else if(isset($occ->message['succupdate']))
					     echo $occ->message['succupdate']; 
						 else if(isset($occ->message['delete']))
						 echo $occ->message['delete'];
						 else
						 echo "";
						 ?>
			</h1>
			</div>
			<div id="footer-right">
          <p style="font-size:70%;color:#ffffff;"> 
      </div></div>
</body>
<?php
	
			
	}
	}
?>

</html>


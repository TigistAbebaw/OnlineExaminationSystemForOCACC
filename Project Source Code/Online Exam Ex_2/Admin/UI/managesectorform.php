
</html>
<html>
    <head>
        <title>Online Examination System</title>
        <link rel="stylesheet" type="text/css" href="../../Website/UI/oes.css"/>
    </head>
    <body>

  
     
  </div><?php	
Class Sectorform
{
function displaySectorlist($sec)
{	
 ?>
        <div id="wrap">
            
                <div id="header">
                  <img  height="104" width="170" src="../../Website/UI/images/coc.png" alt="OES"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
        </div>

			
			 <form name="secmng" action="managesectorlogic.php" method="post">
                
                 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
                     <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>                    
					 <input type="submit" value="back" name="back" class="button" title="back"/>
                     <input type="submit" value="Add" name="add" class="button" title="Add"/>
	</form>
	       </ul>
	 <div class="box">	
             <h2>  <?php if(isset($sec->error['notselected'])) echo $sec->error['notselected'];
			 			else
			              {
						 ?></h2>
 <table cellpadding="30" cellspacing="10" class="datatable">
                        <tr>
                            <th>&nbsp;</th>
                            <th>Sector Name</th>
                            <th>Edit</th>
                        </tr>
	   </table>
				
<?php
                    while ($r=mysql_fetch_array($sec->result))
					 { 
					 
                       // $i = $i + 1;
                       ?>
					   	

					   <table cellpadding="30" cellspacing="10" class="datatable">
					   <form name="secmng" action="managesectorlogic.php" method="post">
						
						<tr>


<td  width="10" height="47" align="left"><input type="radio" name="radio" value="<?php  echo $r['sectorid']; ?>"></td>

<td align="left"   width="300"><?php echo htmlspecialchars_decode($r['sectorname'], ENT_QUOTES); ?></td>


<input type="hidden" name="radioseclist" value="<?php  echo $r['sectorid']; ?>">

<td align="left" width="200"><input type="submit" value="Edit" name="edit" >

<input type="submit" value="Delete" name="delete"  title="Delete" /></form></td></tr> <?php 
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
 
 function displayAddsector($sec)
{

?>

             <body>
             <div id="wrap">
			   <div id="header">
					  <img  height="59" width="118" src="../../Candidate/UI/images/image1.jpg" alt="OES" align"left"/>
					  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
			   </div>
				<form name="secmng" action="managesectorlogic.php" method="post">	
				<div id="menu">
								<ul id="current">	
				<input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
				<input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
				<input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/>
				<input type="submit" value="back" name="back" class="button" title="back"/>
				<input type="submit" value="Save" name="saveadd" class="button" onClick="validatesubform('secmng')" title="Save                the Changes"/>
				</ul></div> 
				
				
				<div class="box">
				<table cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em" >
									<tr>
										<td>Sector Name</td>
				 <td><input type="text" name="secname" value="<?php $sec->secname ?>" size="16" onKeyUp="isalphanum(this)"></td>    
				  <?php if(isset($sec->error['emptyname'])) echo "<td>". $sec->error['emptyname']. "</td>";?></tr>                     
				
									<tr>
				<?php if(isset($sec->error['alreadyexist']))echo "<tr><td colspan='2'>".$sec->error['alreadyexist']."</td>";?>
				        </tr></table></form>
				
				</table></div> 
				<div id="footer-right">
					  <p style="font-size:70%;color:#ffffff;">&nbsp;</p>
				</div></div></div>
  </body>
<?php 
}

function displayEditsector($sec)
{
?>
<body>
   <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="../../Candidate/UI/images/image1.jpg" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				 
              </div>
			
			
			<form name="seceditmng" action="managesectorlogic.php"  method="post">
			<div id="menu">
           <ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
  <input type="submit" value="back" name="back" class="button" title="back"/>

 <input type="submit" value="Cancel" name="cancel" class="button" title="Cancel"/>
 <input type="submit" value="Save" name="saveedit" class="button" title="Save the changes" onClick="validatesubform(seceditmng)"/></ul>
 </div>
  <div class="box">
<table cellpadding="20" cellspacing="20" style="text-align:left;margin-left:15em" >
                        <tr>
                            <td>Sector Name </td>
       <td><input type="text" name="secname" value="<?php echo $sec->secdatatoedit ; ?>" size="16" onKeyUp="isalphanum(this)"></td></tr>
					    <tr> <td> new Sector Name </td> 
						<td><input type="text" name="secnameedit" value="" size="16" onKeyUp=""></td>
						<td><input type="hidden" name="sectoedit" value="<?php echo $sec->sectoedit;?>" size="16" onKeyUp="isalphanum(this)"></td>
                            
                          <p>&nbsp; </p></td>
                            <?php if(isset($sec->error['emptyname'])) echo "<td>". $sec->error['emptyname']. "</td>";?>
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
				  <h2 id="slogan"><i>...the first online examination</i></h2>
        </div>			
			 
			 
             <form name="secmng" action="managesectorlogic.php"  method="post">
			 <div id="menu">
					 
			  <ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
   <input type="submit" value="back" name="back" class="button" title="back"/>
   <input type="submit" value="Add" name="add" class="button" title="Add"/>
   </ul></div></form>
			<div class="box">
			<hr><?php 
				        if(isset($sec->error['accdelete']))
						echo $sec->error['accdelete'];
						else if(isset($sec->error['alreadyexist']))
						echo $sec->error['alreadyexist'];
						else if(isset($sec->error['nosecdata']))
						echo $sec->error['nosecdata'];
						else if(isset($sec->error['nosec']))
						echo $sec->error['nosec'];
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
			
	

function displayMessage($sec)
{
?>
<body>
 <div id="wrap">
            <div id="header">
                  <img  height="59" width="118" src="../../Candidate/UI/images/image1.jpg" alt="OES" align"left"/>
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  <h2 id="slogan"><i>...the first online examination</i></h2>
        </div>			
			 			
			
             <form name="submng" action="managesectorlogic.php"  method="post">
		   <div id="menu">
			<ul id="current">
 <input type="submit" value="LogOut" name="logout" class="button" title="Log Out"/>
 <input type="submit" value="Welcome" name="welcome" class="button" title="Welcome"/>
  <input type="submit" value="back" name="back" class="button" title="back"/></ul></div></form>
			<div class="page">
			<h1><?php   
			             if(isset($sec->message['succcreate']))
						 echo $sec->message['succcreate'];
				         else if(isset($sec->message['succupdate']))
					     echo $sec->message['succupdate']; 
						 else if(isset($sec->message['delete']))
						 echo $sec->message['delete'];
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


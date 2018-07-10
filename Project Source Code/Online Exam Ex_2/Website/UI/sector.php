<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<html><head> <link rel="stylesheet" type="text/css" href="../../Candidate/LOGIC/oes.css"/></head>
<body>
<div id="wrap">
<?php include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
?>
            <div id="header">
                  <img  height="59" width="118" src="images/coc.png" />
                  <h1 id="logo">Online Examination System<span class="gray"> For OCACC</span></h1>
				  
        </div>
			<div id="menu"> 
			<ul id="current">
			
					<a href="../../index.php">HOME</a>
	       </ul></div>
	 <div class="box">	
             <h2>  </h2>
 <table cellpadding="30" cellspacing="10" class="datatable">
                        <tr>
                            <th></th>
                            <th>Sector name</th>
							<th></th>
                         </tr>
			
		<?php
		
 
 $p = new Persistence();
 $p->connect();
 $mQuery="select *  from sector";
 $result=$p->executeInsertSQL($mQuery);
 $locationlist=$result;

			      while ($r=mysql_fetch_array($locationlist))
					 { 
					     ?>
						 <tr>
				 <td></td>	   	
			 <td><?php echo $r['sectorname'];?></td>
			 <td></td>
			   
					   <?php 
					   }
					   ?>
</tr></table>
</div>
</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online Examination System</title>
</head>

<body>
</body>
</html>
<html><head><title>Online Examination System</title><link rel="stylesheet" type="text/css" href="oes.css"/></head>
<body>
<div id="wrap">
<?php include_once($_SERVER['DOCUMENT_ROOT']."/Online Exam Ex_2/Persistence/persistence.php");
?>
            <div id="header">
                  <img  height="137" width="132" src="images/coc.png" alt="OES" align"left"/>
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
                            <th>Sector Name</th>
                            <th>Occupation name</th>
							<th>Fee in Birr</th>
      </tr>
			
		<?php
		
 
 $p = new Persistence();
 $p->connect();
 $mQuery="select *  from occupation";
 $result=$p->executeInsertSQL($mQuery);
 $locationlist=$result;

			      while ($r=mysql_fetch_array($locationlist))
					 { 
					     ?>
						 <tr>
				 <td><?php echo $r['sectorid'];?></td>	   	
			 <td><?php echo $r['occupationname'];?></td>
			 <td><?php echo $r['paymentamount'];?></td>
			   
					   <?php 
					   }
					   ?>
</tr></table>
</div>
</div>
</body>
</html>
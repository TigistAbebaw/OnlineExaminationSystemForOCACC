<html><head> <link rel="stylesheet" type="text/css" href="oes.css"/></head>
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
                            <th>Examination Name</th>
                            <th>Assesment Sector</th>
							<th>City</th>
                            <th>Subcity</th>
							<th>Hall no</th>
                        </tr>
			
		<?php
		
 
 $p = new Persistence();
 $p->connect();
 $mQuery="select e.examname ,l.* from location as l,exam as e where (select l.locationid from location where e.locationid=l.locationid) ";
 $result=$p->executeInsertSQL($mQuery);
 $locationlist=$result;

			      while ($r=mysql_fetch_array($locationlist))
					 { 
					     ?>
						 <tr>
				 <td><?php echo $r['examname'];?></td>	   	
			 <td><?php echo $r['address'];?></td>
			 <td><?php echo $r['hallnumber'];?></td>
			<td><?php echo $r['city'];?></td>
			 <td><?php echo $r['subcity'];?></td>	   
					   <?php 
					  echo "</tr><tr></tr>"; }
					   ?>
</table>
</div>
</div>
</body>
</html>
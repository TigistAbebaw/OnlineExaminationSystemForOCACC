<html><head><title>SCHEDULE</title><link rel="stylesheet" type="text/css" href="oes.css"/></head>
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
                            <th>Starting date</th>
							<th>Ending date</th>
      </tr>
			
		<?php
		
 
 $p = new Persistence();
 $p->connect();
 $mQuery="select * from exam";
 $result=$p->executeInsertSQL($mQuery);
 $locationlist=$result;

			      while ($r=mysql_fetch_array($locationlist))
					 { 
					     ?>
						 <tr>
				 <td><?php echo $r['examname'];?></td>	   	
			 <td><?php echo $r['examfrom'];?></td>
			 <td><?php echo $r['examto'];?></td>
				   
					   <?php 
					   }
					   ?>
</tr></table>
</div>
</div>
</body>
</html>
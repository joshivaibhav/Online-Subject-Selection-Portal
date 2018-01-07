<?php
//session_start();

if(!isset($_SESSION["admin"]))
{
  header("Location: login.php");	
}

if(isset($_POST["sem"]))
{
	$sem=$_POST["sem"];
}
else{
	 header("Location: index.php");
}

include 'connection.php';

$sql = "SELECT * FROM userdetail WHERE sem=\"".$sem."\"";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) 
{
?>
	


<?php	
while($row = mysqli_fetch_assoc($result))															//choiced by user
{
	$sqlsubid="SELECT * FROM choice WHERE id=\"".$row["id"]."\"";
	$resultsubid = mysqli_query($con, $sqlsubid);

if (mysqli_num_rows($resultsubid) > 0) 
{
	
	
		while($rowsubid = mysqli_fetch_assoc($resultsubid))															//choiced by user
		{
			if(!isset($count[$rowsubid["subid"]])){
				$count[$rowsubid["subid"]]=0;
				$countname[$rowsubid["subid"]]=array();
				//$countsem[$rowsubid["subid"]]=array();
			}
			$count[$rowsubid["subid"]]++;
			array_push($countname[$rowsubid["subid"]],$rowsubid["id"]);
			//array_push($countsem[$rowsubid["subid"]],$rowsubid["id"]);
			//print_r($count);
			
			//echo $rowsubid["subid"]."count:".$count['$rowsubid["subid"]'];
		}
	}
}
}
	
	$sqlgroup = "SELECT * FROM subchoice WHERE sem=\"".$sem."\" ORDER BY `group` ASC";
	$resultgroup = mysqli_query($con, $sqlgroup);
	$groupcount=1;
	if (mysqli_num_rows($resultgroup) > 0) 
	{
		$i=0;
		while($rowgroup = mysqli_fetch_assoc($resultgroup))															//choiced by user
		{
			
			 
			
			
			
			if($i==0)
			{
				?>
				<div class="section " >
					<div class="container">
						<div class="row" align="center">
							<div class="col-sm-12">
							<h3>Group:<?php echo $groupcount; ?></h3>
							<hr><br>
			<?php
			}
			 if($i!=0 && $rowgroup["group"]!=$track)
			{
				$groupcount++;
				?>
								</div>
							</div>	
						</div>
					</div>
				<div class="section" >
					<div class="container">
						<div class="row" align="center">
							<div class="col-sm-12">
							<h3>Group:<?php echo $groupcount; ?></h3>
							<hr/>
							<br>
				<?php
			}
		
			 $sqlname="SELECT name FROM subject WHERE subid=\"".$rowgroup["subid"]."\"";
			 $resultname = mysqli_query($con, $sqlname);
			 $name=mysqli_fetch_assoc($resultname);	
			
			//echo "Subject".$name["name"]."=".$count[$rowgroup["subid"]]."";
			?>
			<div class="col-sm-4" >
		
			<div style="background-color:white; padding:5px; box-shadow:8px 8px 10px grey; overflow-y: scroll;height:15em">
			<div class="col-sm-6"><h4 align="left"><?php echo ucfirst($name["name"]); ?></h4></div>
			<div class="col-sm-6"><h4 align="right">total:<?php if(isset($count[$rowgroup["subid"]])){echo $count[$rowgroup["subid"]];}else{echo "0";}?></h4></div>
			
			
			<table class="table">
			<tr><td>sem</td><td>Name</td><td>ID</td></tr>
			<?php
			if(isset($countname[$rowgroup["subid"]]))
			{foreach($countname[$rowgroup["subid"]]  as $value)
			{
				
			 $sqlstdname="SELECT fname,id,sem FROM userdetail WHERE id=\"".$value."\"";
			 $resultstdname = mysqli_query($con, $sqlstdname);
			 $stdname=mysqli_fetch_assoc($resultstdname);
			?>
			
			<tr><td><?php echo $stdname["sem"];?></td><td><?php echo $stdname["fname"];?></td><td><?php echo $stdname["id"];?></td></tr>
			
			<?php
			}
			}
			else{?>
						<span style="position:absolute;top:55%;left:20%">No student opted for this subject!</span>
			<?php
			}
			
			?>
			
			</table>
			</div>
			
			</div>
			<?php
			$track=$rowgroup["group"];
			$i++;
			
		}
	}
	
	?>
								</div>
							</div>	
						</div>
					</div>

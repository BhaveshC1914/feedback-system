<?php
	session_start();

	$NL = array("Mint Oil","Melon","Onion","Pepper","Potato","Corn","Pumpkim");
	$NM = array("Corn Wheat","Mint Oil","Onion","Greenchilly");
	$NH =array("Corn Wheat","Mint Oil","Onion","Bringal","Spinach");
	$NE =array("Hop","Lupine","Mint Oil","Sorghum","Raspberry");
	$MgL =array("Ragi","Maze","Raddish","Capsicum","Cabbage");
	$MgM=array("Wheat","Jowar","Coconut","Soabean");
	$MgH=array("Wheat","Jowar","Coconut","Groundnut");
	$MgE=array("Califlower","Cuccumber","Gwar");
	$PhL =array("Arhar","Moong","Drumsticks","Lady Finger");
	$PhM=array("Cotton","Bajra","Jawar","Maze","Arhar");
	$PhH=array("Cotton","Bajra","Paddy","Coupea","Corriender seed");
	$PhE=array("Horses","Grass","Coupea","Beans","Tamarind","Fruit");
	$KL=array("Indian Beans","Bitter guard","Bottle Guard","Ridge guard","Sponge guard");
	$KM=array("Caster seed","Musturd","Sun Flower","Linseed","Wheat","Jowar");
	$KH=array("Groundnut","Musturd","Sun Flower","Soyabean","Wheat","Jowar");
	$KE=array("Moong","Horses","Black gram");

	
	?>
<html>
	<head>
		<title>Soil-data</title>
		<style>
			.merge{
				padding:10px;
				float: left;
				margin:5px;
				border:2px solid #777;
			}
			.table-responsive{
				position: relative;
				margin-left: 50%;
				transform: translate(-50%,0);
				width:1300px;
			}
			.ser-title1{
				width:250px;
			}
		</style>
		<style type="text/css" media="all">
		@import "style_ext.css";
	</style>
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<script type="text/javascript" src="engine1/jquery.js"></script>
		<script src="jquery-2.2.0.js"></script>
		<script src="jquery.js"></script>
		<script src="js/jquery.min.js"></script>

	</head>
	<body>
		<div class="container">
		
			<center>
			<div style="height:50px;font-size:30px;color:white;font-family:Square721 Cn BT;background-color:#438599;display:flex;align-items: center;justify-content: center;" >Soil-data</div>
				
				<div style="background-color:#438599;">

				<div class="col-md-12">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				     
				    </div>

				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
					  	<li class="active"><a href="index.php">Home</a></li>
				        <li class="active"><a href="logout.php">Logout</a></li>
				        <li class="active"><a href="javascript:history.back()">Back</a></li>
				       </ul>
					</div>
				</div>	
				</div>
			</center>
			</div>
			<div>
				<section id="search" class="section-padding">
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<h2 class="ser-title">Welcome<br><br>
									<?php
										echo " ".$_SESSION['name'];
									?></h2>
									<hr class="botm-line">
				
						<h4 class="ser-title ser-title1">These recommendations are as per the data provided by the testing labs. This website does not hold any responsibility of your damaged crops based on our recommendations.</h4>
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="search-info">
											<h3 class="cnt-ttl">Recommendations for your Sample No. <?php 
												echo $_GET['sno'];
											?>
											</h3>
											<br>
											<div class=""> 
												<div class="row">
											<?php
											include("database.php");
											$sno = $_GET['sno'];
											$sql2 = "SELECT * FROM soil_sample where sample_no = '$sno'";
											$rs2 = $cn->query($sql2);
											if ($rs2->num_rows > 0) {
											while($row = $rs2->fetch_assoc()) {
												$sno=$row["sample_no"];
												$f1=$row["magnesium"];
												$f2=$row["nitrogen"];
												$f3=$row["potassium"];
												$f4=$row["phosphorus"];
												$merged = array();
												if($f1 < 60 )
													$merged = array_merge($merged,$MgL);
												if($f1 >= 60 && $f1 <= 200 )
													$merged = array_merge($merged,$MgM);
												if($f1 <= 1000 && $f1 >= 200 )
													$merged = array_merge($merged,$MgH);
												if($f1 > 1000 )
													$merged = array_merge($merged,$MgE);

												if($f2 < 2 )
													$merged = array_merge($merged,$NL);
												if($f2 >= 2 && $f2 <= 9.9 )
													$merged = array_merge($merged,$NM);
												if($f2 <= 20 && $f2 >= 10 )
													$merged = array_merge($merged,$NH);
												if($f2 > 20 )
													$merged = array_merge($merged,$NE);

												if($f3 < 75 )
													$merged = array_merge($merged,$KL);
												if($f3 >= 75 && $f3 <= 200 )
													$merged = array_merge($merged,$KM);
												if($f3 <= 400 && $f3 >= 200 )
													$merged = array_merge($merged,$KH);
												if($f3 > 400 )
													$merged = array_merge($merged,$KE);

												if($f4 < 4.4 )
													$merged = array_merge($merged,$PhL);
												if($f4 >= 4.5 && $f4 <= 13.4 )
													$merged = array_merge($merged,$PhM);
												if($f4 <= 30 && $f4 >= 13.5 )
													$merged = array_merge($merged,$PhH);
												if($f4 > 30 )
													$merged = array_merge($merged,$PhE);

												echo "<div style='width:500px;'>";
												foreach ($merged as $value) {
													echo "<div class='merge'>".$value."</div>";

												}
												echo "<div style='clear:both;'></div></div>";
											}
										}
												
										?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="table-responsive"><table border="0" cellpadding="0" cellspacing="0" style="width:100%" class="table table-striped">
	
					<tbody>
						<tr>
							<td><strong>Nutrient</strong></td>
							<td><strong>Why Nutrient is Needed</strong></td>
							<td><strong>Deficiency Symptoms</strong></td>
							<td><strong>Excess Symptoms</strong></td>
							<td><strong>Comments</strong></td>
						</tr>
						<tr>
							<td>Nitrogen (N)</td>
							<td>• Responsible for rapid foliage growth and green color<br>
							• Easily leaches from soil<br>
							• Mobile in plant, moving to new growth</td>
							<td>• Reduced growth <br>
							• Light-green to yellow foliage (chlorosis)<br>
							• Reds and purples may intensify with some plants<br>
							• Reduced lateral breaks<br>
							• Symptoms appear first on older growth</td>
							<td>• Succulent growth; leaves are dark green, thick, and brittle<br>
							• Poor fruit set<br>
							• Excess ammonia can induce calcium deficiency</td>
							<td style="width:171px">• High N under low light can cause leaf curl<br>
							• Uptake inhibited by high P levels</td>
						</tr>
						<tr>
							<td>Phosphorus (P)</td>
							<td>• Promotes root formation and growth<br>
							• Affects quality of seed, fruit, and flower production<br>
							• Increased disease resistance<br>
							• Does not leach from soil readily<br>
							• Mobile in plant, moving to new growth.</td>
							<td>• Reduced growth<br>
							• Leaves dark-green; purple or red color in older leaves, especially on the underside of the leaf along the veins<br>
							• Leaf shape may be distorted<br>
							• Thin stems<br>
							• Limited root growth</td>
							<td>Shows up as micronutrient deficiency of Zn, Fe, or Co</td>
							<td>• Rapidly fixed on soil particles<br>
							• When applied under acid conditions, fixed with Fe, Mn, and Al<br>
							• High P interferes with micronutrient and N absorption<br>
							• Used in relatively small amounts when compared to N and K<br>
							• Availability is lowest in cold soils</td>
						</tr>
						<tr>
							<td>Potassium (K)</td>
							<td>• Helps plants overcome drought stress<br>
							• Improves winter hardiness<br>
							• Increases disease resistance<br>
							• Improves the rigidity of stalks<br>
							• Leaches from soil<br>
							• Mobile in plant</td>
							<td>• Reduced growth<br>
							• Shortened internodes<br>
							• Margins of older leaves become chlorotic and burned<br>
							• Necrotic (dead) spots on older leaves <br>
							• Reduction of lateral breaks and tendency to wilt readily<br>
							• Poorly developed root systems<br>
							• Weak stalks</td>
							<td>Causes N deficiency and may affect the uptake of other nutrients</td>
							<td>• High N/low K favors vegetative growth<br>
							• Low N/high K promotes reproductive growth (flower, fruit)<br>
							• Calcium excess impedes uptake of K</td>
						</tr>
						<tr>
							<td>Magnesium (Mg)</td>
							<td>• Leaches from sandy soil<br>
							• Mobile in plant</td>
							<td>• Reduction in growth<br>
							• Yellowish, bronze, or reddish color of older leaves, while veins remain green <br>
							• Leaf margins may curl downward or upward with a puckering effect</td>
							<td style="width:172px">• Interferes with Ca uptake<br>
							• Small necrotic spots in older leaves<br>
							• Smaller veins in older leaves may turn brown<br>
							• In advanced stage, young leaves may be spotted</td>
							<td>• Mg is commonly deficient in foliage plants because it is leached and not replaced<br>
							• Epsom salts at a rate of 1 teaspoon per gallon may be used two times a year<br>
							• Mg can be absorbed by leaves if sprayed in a weak solution<br>
							• Dolomitic limestone can be applied in outdoor situations to rectify a deficiency</td>
						</tr>
						<tr>
							<td>Calcium (Ca)</td>
							<td>• Moderately leachable<br>
							• Limited mobility in plant<br>
							• Essential for growth of shoot and root tips</td>
							<td>• Inhibition of bud growth<br>
							• Roots can turn black and rot<br>
							• Young leaves are scalloped and abnormally green<br>
							• Leaf tips may stick together<br>
							• Cupping of maturing leaves<br>
							• Blossom end rot of many fruits <br>
							• Pits on root vegetables; stem structure is weak<br>
							• Premature shedding of fruit and buds</td>
							<td>• Interferes with Mg absorption<br>
							• High Ca usually causes high pH</td>
							<td>Ca is rarely deficient if the correct pH is maintained</td>
						</tr>
						<tr>
							<td>Sulfur (S)</td>
							<td>• Leachable<br>
							• Not mobile<br>
							• Contributes to odor and taste of some vegetables</td>
							<td>• Rarely deficient<br>
							• General yellowing of the young leaves, then the entire plant <br>
							• Veins lighter in color than adjoining interveinal area<br>
							• Roots and stems are small, hard, and woody</td>
							<td style="width:172px">Sulfur excess is usually in the form of air pollution</td>
							<td style="width:171px">Sulfur excess is difficult to control, but rarely a problem</td>
						</tr>
						<tr>
							<td colspan="5"><strong>MICRONUTRIENTS</strong></td>
						</tr>
						<tr>
							<td><strong>Nutrient</strong></td>
							<td><strong>Why Nutrient is Needed</strong></td>
							<td><strong>Deficiency Symptoms</strong></td>
							<td><strong>Excess Symptoms</strong></td>
							<td><strong>Comments</strong></td>
						</tr>
						<tr>
							<td>Iron (Fe)</td>
							<td>• Accumulates in the oldest leaves and is relatively immobile<br>
							• Necessary for the maintenance of chlorophyll</td>
							<td>• Interveinal chlorosis primarily on young tissue, which may become white <br>
							• Fe deficiency may occur even if Fe is in the soil when: soil is high in Ca; soil is poorly drained; soil is oxygen deficient; nematodes attack roots; or soil is high in Mn, pH, or P<br>
							• Fe should be added in the chelate form; the type of chelate needed depends upon the soil pH<br>
							• Foliar fertilization will temporarily correct the deficiency<br>
							• May be deficient in centipede grass where pH and P are high</td>
							<td>Rare except on flooded soils</td>
							<td> </td>
						</tr>
						<tr>
							<td>Boron (B)</td>
							<td>• Important in enabling photosynthetic transfer<br>
							• Very immobile in plants</td>
							<td>• Failure to set seed<br>
							• Internal breakdown of fruit or vegetable<br>
							• Death of apical buds, giving rise to witches' broom<br>
							• Failure of root tip to elongate normally<br>
							• Young leaves become thick, leathery, and chlorotic<br>
							• Rust-colored cracks and corking on young stems, petioles, and flower stalks (such as heart rot of beets, stern crack of celery)<br>
							• Breakdown occurs at the base of the youngest shoots</td>
							<td style="width:172px">
							<p>• Tips and edges of leaves exhibit necrotic spots coalescing into a marginal scorch (similar to high-soluble salts)<br>
							• Oldest leaves are affected first • Can occur in low pH soils • Plants are easily damaged by excess application •Looks like Mg deficiency,green veins on a yellow leaf.</p>
							</td>
							<td> </td>
						</tr>
						<tr>
							<td>Zinc (Zn)</td>
							<td>Needed for enzyme activity</td>
							<td>• Young leaves are very small, sometimes missing leaf blades<br>
							• Short internodes<br>
							• Distorted or puckered leaf margins<br>
							• Interveinal chlorosis</td>
							<td>• Severe stunting, reddening<br>
							• Poor germination<br>
							• Older leaves wilt<br>
							• Entire leaf is affected by chlorosis; edges and main vein often retain more color<br>
							• Can be caused by galvanized metal.</td>
							<td> </td>
						</tr>
						<tr>
							<td>Copper (Cu)</td>
							<td>Needed for enzyme activity</td>
							<td>• New growth small, misshapen, wilted<br>
							• In some species, young leaves may show interveinal chlorosis while tips of older leaves remain green</td>
							<td>• Can occur at low pH<br>
							• Shows up as Fe deficiency</td>
							<td> </td>
						</tr>
						<tr>
							<td>Manganese (Mn)</td>
							<td>Needed for enzyme activity</td>
							<td>• Interveinal chlorosis with smallest leaves remaining green, producing a checkered effect<br>
							• Grey or tan spots usually develop in chlorotic areas<br>
							• Dead spots may drop out of the leaf<br>
							• Poor bloom size and color<br>
							• Induced by excessively high pH</td>
							<td>• Reduction in growth, brown spotting on leaves<br>
							• Shows up as Fe deficiency<br>
							• Found under strongly acidic conditions</td>
							<td> </td>
						</tr>
						<tr>
							<td>Molybdenum (Mo)</td>
							<td>Needed for enzyme activity</td>
							<td>• Interveinal chlorosis on older or midstem leaves<br>
							• Twisted leaves whiptail<br>
							• Marginal scorching and rolling or cupping of leaves<br>
							• Nitrogen deficiency symptoms may develop</td>
							<td>• Intense yellow or purple color in leaves<br>
							• Rarely observed</td>
							<td> </td>
						</tr>
						<tr>
							<td>Chlorine (Cl)</td>
							<td>Needed for enzyme activity</td>
							<td>• Wilted leaves which become bronze, then chlorotic, then die<br>
							• Club roots</td>
							<td>• Salt injury<br>
							• Leaf burn<br>
							• May increase succulence</td>
							<td> </td>
						</tr>
						<tr>
							<td>Cobalt (Co)</td>
							<td>• Needed by plants recently established<br>
							• Essential for nitrogen fixation</td>
							<td>Little is known about its deficiency symptoms</td>
							<td>Little is known about its toxicity symptoms</td>
							<td> </td>
						</tr>
						<tr>
							<td>Nickel (Ni)</td>
							<td>• Needed by plants recently established<br>
							• Essential for seed development</td>
							<td>Little is known about its deficiency symptoms</td>
							<td>Little is known about its toxicity symptoms</td>
							<td> </td>
						</tr>
					</tbody>
</table></div>
				</div>
	</body>
</html>
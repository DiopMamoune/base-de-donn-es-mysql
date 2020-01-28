	<?php
	$db = new PDO("mysql: host=localhost; dbname=samabase","root","");

		function affichage($tab=[]){
			echo '<table class="table table-bordered table-striped">';
			foreach ($tab as  $att) {
				echo "<tr>";
				echo '<td>'.$att->first_name.'</td>';
				echo '<td>'.$att->last_name.'</td>';
				echo '<td>'.$att->email.'</td>';
				echo '<td>'.$att->gender.'</td>';
				echo '<td>'.$att->ip_address.'</td>';
				echo '<td>'.$att->birth_date.'</td>';
				echo '<td>'.$att->country_code.'</td>';
				echo '<td>'.$att->avatar_url.'</td>';
				echo "</tr>";
			}
		echo "</table>";
		}
		function affichage2($tab=[]){
			echo '<table class="table table-bordered table-striped">';
			foreach ($tab as  $att) {
				echo "<tr>";
				echo '<td>'.$att->country_code.'</td>';
				echo '<td>'.$att->compteur.'</td>';
				echo "</tr>";
			}
		echo "</table>";
		}
		function affichage3($tab=[]){
			echo '<table class="table table-bordered table-striped">';
			foreach ($tab as  $att) {
				echo "<tr>";
				echo '<td>'.$att->compteur.'</td>';
				echo "</tr>";
			}
		echo "</table>";
		}
		function affichage4($tab=[]){
			echo '<table class="table table-bordered table-striped">';
			foreach ($tab as  $att) {
				echo "<tr>";

				echo '<td>'.$att->prenom.'</td>';
				echo '<td>'.$att->nom.'</td>';
				echo '<td>'.$att->age.'</td>';

				echo "</tr>";
			}
		echo "</table>";
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>connection</title>
	<link rel="stylesheet" href="bootstrap-cerulean.min.css">
</head>
<body>
	<div class="container">
		<a href="?question1" class="btn btn-success">1</a>
		<a href="?question2" class="btn btn-success">2</a>
		<a href="?question3" class="btn btn-success">3</a>
		<a href="?question4" class="btn btn-success">4</a>
		<a href="?question5" class="btn btn-success">5</a>
		<a href="?question6" class="btn btn-success">6</a>
		<a href="?question7" class="btn btn-success">7</a>
		<a href="?question8" class="btn btn-success">8</a>
	</div>
<?php 
	if (isset($_GET['question1'])) {
				$requet = $db->prepare('select * from `table 1` where last_name="palmer"');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage($test);
	}else if (isset($_GET['question2'])) {
				$requet = $db->prepare('select * from `table 1` where gender="female"');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage($test);
	}else if(isset($_GET['question3'])){
				$requet = $db->prepare('select * from `table 1` where country_code like "%N"');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage($test);
	}
	 else if(isset($_GET['question4'])){
				$requet = $db->prepare('select * from `table 1` where email like "%google%"');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage($test);
	}elseif (isset($_GET['question5'])) {
				$requet = $db->prepare('select country_code, count(country_code) as compteur from `table 1` group by country_code');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage2($test);
	}elseif (isset($_GET['question6'])) {
				$requet = $db->prepare('select count(*) as compteur from `table 1` group by gender');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage3($test);
	}elseif (isset($_GET['question7'])) {
		$requet = $db->prepare('select first_name as prenom, last_name as nom, year(now())-right(birth_date,4) as age from `table 1` ');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage4($test);
	}elseif (isset($_GET['question8'])) {
		$requet = $db->prepare('select nom, prenom, nom from departement natural join membreACS');
				$requet->execute();
				$test = $requet->fetchALL(PDO::FETCH_OBJ);
				affichage4($test);
	}

		
?>

</body>
</html>
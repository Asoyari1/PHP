<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.navbar-nav.navbar-center { 
            position: absolute; 
            left: 50%; 
            transform: translatex(-50%); 
        } 
.form {
	width: 1000px;
	height: 1000px;
}
table,tr,td {
	text-align:center;
	}
table, tr, th, td{
	border:2px solid #ccc;
	}
	
	
</style>
<body>

 <div class="header">
  <img src="logo_light.png" alt="logo"/>
</div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Mustat Renkaat</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Etusivu</a></li>
      <li><a href="#">Renkaat</a></li>
      <li><a href="#">Renkaat1</a></li>
      <li><a href="#">Renkaat2</a></li>
    </ul>
  </div>
</nav>
<?php  

$palvelin= "localhost";  
$kayttajanimi= "root";  
$salasana= "";  
$tietokanta= "form"; 



$yhdista = mysqli_connect($palvelin, $kayttajanimi, $salasana, $tietokanta);  

$query = "SELECT DISTINCT Koko FROM `renkaat`";
$Tulos = mysqli_query($yhdista,$query);
?>
<section>
<h2>Renkaat</h2>
<form method="post" action="">
Koko:<br>
<select name="Koko" style="width:300px; height:30px;">
<?php while($row1 = mysqli_fetch_assoc($Tulos)):;
?>
<option><?php echo $row1["Koko"];?></option>
<?php endwhile; ?>
</select>
<input type="submit" name="submit" value="submit"><br><br><br><br>
<table style="width:75%" align="flex">

<tr>
<th> Merkki </th>
<th> Malli</th>
<th> Tyyppi </th>
<th> Koko </th>
<th> Hinta </th>
<th> Saldo </th>
</tr>
<?php
if(isset($_POST['submit'])){
$Koko = $_POST["Koko"];	
$sql = "SELECT * FROM `renkaat` where Koko = '$Koko' ORDER BY Hinta";
$result = mysqli_query($yhdista,$sql);

while($row2 = mysqli_fetch_assoc($result)){
	echo "<tr>
	<td>".$row2["Merkki"]."</td>
	<td>".$row2["Malli"]."</td>
	<td>".$row2["Tyyppi"]."</td>
	<td>".$row2["Koko"]."</td>
	<td>".$row2["Hinta"]."</td>
	<td>".$row2["Saldo"]."</td>
	</tr>";
	}

}
?>
</table>
</section>
</body>
</html>
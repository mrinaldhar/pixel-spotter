<?php
ob_start();
?>
<html><head><title>Highscores | PixelSpotter</title>
<style>
@font-face {
	src: url('font2.woff');
	font-family: myfont;
}
body {
	font-family: myfont;
	text-align: center;
}
.scoretable {
	width:80%;
	position: relative;
	margin: 0 auto;
}
.scoretable tr:nth-child(odd)
			{
				color:white;
				background-color: rgba(0,0,0,1);
			}
			.scoretable tr:nth-child(even)
			{
				color:black;
				background-color: rgba(255,255,255,1);
			}
			.scoretable tr:nth-child(even) td {
				border:1px black dashed;
			}
			.scoretable tr:nth-child(odd) td {
				border:1px white dashed;
			}
			.scoretable tr td {
				padding: 20px;
			}
			#header {
	font-size: 3em;
	margin-top: 20px;
	margin-bottom: 30px;
}

.btn {
	float:center;
	padding-left: 30px;
	padding-right: 30px;
	margin-top: 10px;
}
</style>
</head>
<body>
	<div id="header">PixelSpotter | Highscores<br /><span style="font-size:0.3em;">Developed by Mrinal Dhar</span><br /><br /><a href="game.php"><button class="btn">Back to Game</button></a></div>
	<table class="scoretable">
<?php
include_once('connectionvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$query = "SELECT * FROM stats ORDER BY score DESC";
$data = mysqli_query($dbc, $query);
if (mysqli_num_rows($data)!=0)
	{
		echo '<tr><td>Name</td><td>Score</td></tr>';
		while ($row=mysqli_fetch_array($data))
{
			echo '<tr><td>' . $row['score'] . '</td><td>' . $row['username'] . '</tr>';	
}
}
else {
	echo '<tr><td colspan="2">No Highscores set</td></tr>';
}
?>
</table>
</body>
</html>
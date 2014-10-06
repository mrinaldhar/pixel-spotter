<?php
ob_start();
?>
<?php
include_once('connectionvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$query = "SELECT * FROM stats ORDER BY score DESC";
$data = mysqli_query($dbc, $query);
if (mysqli_num_rows($data)!=0)
	{
		while ($row=mysqli_fetch_array($data))
{
	$highest = $row['score'];
	$by = $row['username'];
	break;
}
}
else {
	$highest = 0;
	$by = 'No highscores set!';
}
?>
<html>
<head><title>PixelSpotter</title>
<style>
@font-face {
	src: url('font2.woff');
	font-family: myfont;
}
#header {
	font-size: 3em;
}
#canvas {
	margin-top: 10px;
}
#lefttime {
	display:inline-block;
	font-size: 2em;
	float:right;
	color:red;
	position: absolute;
	top:15px;
	right:15px;
}
#scorefield {
	font-size: 2em;
	display: inline-block;
	float: left;
	margin-right: 15px;
	position:absolute;
	top:15px;
	left:25px;
}
body {
	text-align: center;
	font-family: myfont;
}
.btn {
	float:center;
	padding-left: 30px;
	padding-right: 30px;
	margin-top: 10px;
}
#footer {
	position: absolute;
	bottom:0px;
	left:0px;
	right:0px;
	width:100%;
	font-size: 0.8em;
	color:red;
}
</style>
</head><body>
<div id="header"><canvas width="100px" height="100px" id="logo"></canvas>PixelSpotter<br /><span style="font-size:0.3em;">Use your arrow keys to locate the static pixel</span></div>
<div id="scorefield">Score<div id="score">0</div></div>
<div id="lefttime"></div>
<button id="reset" name="reset" onclick="reload()" class="btn">Restart Game</button></a>
<select id="difficulty" onchange="changediff(this.value)"><option>Easy</option><option>Medium</option><option>Hard</option></select>
<br />
<canvas id="canvas" width="1024px" height="600px" style="border: 1px"></canvas>
<div id="footer"><b>Game developed by Mrinal Dhar</b></div>
<script src="game.js"></script>
</body>
</html>
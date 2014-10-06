<html>
<head><title>Pixel Spotter</title>
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
	left:15px;
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
<div id="scorefield">Score<div id="score">0</div><div id="high" style="font-size:0.4em; color:red;">Highest: 1000 | Mrinal Dhar</div></div>
<div id="lefttime"></div>
<button id="reset" name="reset" onclick="reload()" class="btn">Restart Game</button>
<button id="highscore" class="btn" onclick="seehighscores()">View Highscores</button><br />
<canvas id="canvas" width="1024px" height="600px" style="border: 1px"></canvas>
<div id="footer">Developed by Mrinal Dhar</div>
<script src="game.js"></script>
</body>
</html>

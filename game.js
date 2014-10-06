var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var score = document.getElementById('score');
var lefttime = document.getElementById('lefttime');
var c2 = document.getElementById('logo');
var c2x = c2.getContext('2d');
c2.width = 40;
c2.height = 40;
canvas.width = 1000;
canvas.height = 500;
var index = 30;
var mySprite = {
	x:200,
	y:200,
	width:50,
	height:50,
	speed:300,
	color: '#c00'

};
var diff = {
	state: 50
};
var item = {
	x: Math.random() * canvas.width,
	y: Math.random() * canvas.height,
	width:10,
	height:10,
	color:'#bbb'
};
var obstacle = {
	x: Math.random() * canvas.width,
	y: Math.random() * canvas.height,
	width:10,
	height:10,
	color:'#fff'
};
var special = {
		x: Math.random() * canvas.width,
	y: Math.random() * canvas.height,
	width:25,
	height:25,
	color:'#f00'
};
 function changediff(val)
{
	var new2 = val;
	// var new = document.getElementById('difficulty');
	if (new2=='Easy')
	{
		diff.state = 20;
	}
	else if (new2=='Medium')
	{
		diff.state = 50;
	}
	else if (new2=='Hard')
	{
		diff.state = 75;
	}
 }
function update(mod)
{
	if (37 in keysDown) {
		mySprite.x -= mySprite.speed * mod;
	}
	if (38 in keysDown) {
		mySprite.y -= mySprite.speed * mod;
	}
	if (39 in keysDown) {
		mySprite.x += mySprite.speed * mod;
	}
	if (40 in keysDown) {
		mySprite.y += mySprite.speed * mod;
	}
	
	if (
		mySprite.x < item.x + item.width &&
		mySprite.x + mySprite.width > item.x &&
		mySprite.y < item.y + item.height &&
		mySprite.y + mySprite.height > item.y
		)
	{
		item.x = (Math.random() * canvas.width)%canvas.width;
		item.y = (Math.random() * canvas.height)%canvas.height;
		score.innerHTML = parseInt(score.innerHTML)+100;
		index=index+1;
	}
	if (
		index < 10 && parseInt(score.innerHTML)>1000 &&
		mySprite.x < special.x + special.width &&
		mySprite.x + mySprite.width > special.x &&
		mySprite.y < special.y + special.height &&
		mySprite.y + mySprite.height > special.y
		)
	{
		var bet = Math.floor((Math.random() * 1000) % 255) % 2;
		if (bet==0)
		{
		score.innerHTML = parseInt(score.innerHTML)+500;
		}
		else {
		score.innerHTML = parseInt(score.innerHTML)-500;
		index=index-5;	
		}
	}

}

function render() {
	ctx.fillStyle = '#000';
	ctx.fillRect(0,0,canvas.width,canvas.height);
	c2x.fillStyle = 'rgb('+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+')';
	c2x.fillRect(0,0,c2.width/2,c2.height/2);
	c2x.fillStyle = 'rgb('+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+')';
	c2x.fillRect(c2.width/2,c2.height/2,c2.width,c2.height);
	c2x.fillStyle = 'rgb('+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+')';
	c2x.fillRect(c2.width/2,0,c2.width,c2.height/2);
	c2x.fillStyle = 'rgb('+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+','+Math.floor((Math.random() * 1000)%255)+')';
	c2x.fillRect(0,c2.height/2,c2.width/2,c2.height);
	ctx.fillStyle = mySprite.color;
	ctx.fillRect(mySprite.x, mySprite.y, mySprite.width, mySprite.height);
	ctx.fillStyle = item.color;
	ctx.fillRect(item.x, item.y, item.width, item.height);
	for (var i=0; i<diff.state; i++)
	{
	ctx.fillStyle = obstacle.color;
	ctx.fillRect(obstacle.x, obstacle.y, obstacle.width, obstacle.height);
	obstacle.x=Math.random() * canvas.width;
	obstacle.y=Math.random() * canvas.height;
}
if (index<10 && parseInt(score.innerHTML)>1000)
{
	ctx.fillStyle = special.color;
	ctx.fillRect(special.x, special.y, special.width, special.height);
}

}
var keysDown = {};
window.addEventListener('keydown', function(e) {
	keysDown[e.keyCode]=true;
});
window.addEventListener('keyup', function(e) {
	delete keysDown[e.keyCode];
});
function run() {
	update((Date.now() - time)/1000);
	render();
	time=Date.now();
}
var time = Date.now();
var doer = setInterval(run, 10);
var clocker = setInterval(startclock, 1000);
lefttime.innerHTML=''+index+' seconds left';
function startclock(){
	index=index-1;
	lefttime.innerHTML=''+index+' seconds left';
	if (index<=0)
	{
		clearInterval(doer);
		alert('Game Over. You scored ' + score.innerHTML + ' points.');
		clearInterval(clocker);
	}
}
function reload() {
	window.location="game.php";
}

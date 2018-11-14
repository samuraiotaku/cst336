var output;
var pacman;
var redGhost;
var pinkGhost;
var greenGhost;
var blueGhost;

var loopTimer;
var numLoops = 0;

var upArrowDown = false;
var downArrowDown = false;
var leftArrowDown = false;
var rightArrowDown = false;
var direction = 'right';
var walls = new Array();

const PACMAN_SPEED = 10;
const GHOST_SPEED = 5;

var rgDirection; // Red Ghost Direction
var pgDirection; // Pink Ghost Direction
var ggDirection; // Green Ghost Direction
var bgDirection; // Blue Ghost Direction

//var wall_1;


function loadComplete(){
    output = document.getElementById('output');
    pacman = document.getElementById('pacman');
    pacman.style.left = '280px';
    pacman.style.top = '180px';
    pacman.style.width = '40px';
    pacman.style.height = '40px';
    
    redGhost = document.getElementById('redGhost');
    redGhost.style.left = '280px';
    redGhost.style.top = '40px';
    redGhost.style.width = '40px';
    redGhost.style.height = '40px';    

    pinkGhost = document.getElementById('pinkGhost');
    pinkGhost.style.left = '420px';
    pinkGhost.style.top = '40px';
    pinkGhost.style.width = '40px';
    pinkGhost.style.height = '40px';  
    
    greenGhost = document.getElementById('greenGhost');
    greenGhost.style.left = '120px';
    greenGhost.style.top = '40px';
    greenGhost.style.width = '40px';
    greenGhost.style.height = '40px';      

    blueGhost = document.getElementById('blueGhost');
    blueGhost.style.left = '180px';
    blueGhost.style.top = '40px';
    blueGhost.style.width = '40px';
    blueGhost.style.height = '40px'; 
    
    loopTimer = setInterval(loop, 50);
    
    //inside walls
    createWall(220, 220, 160, 100);
    createWall(80, 80, 100, 100);
    createWall(220, 80, 60, 100);
    createWall(320, 80, 60, 100);
    createWall(80, 220, 100, 100);
    createWall(420, 80, 100, 100);
    createWall(420, 220, 100, 100);

    //createWall(200, 280, 200, 40);
    //createWall(200, 280, 200, 40);
    
    
    //top walls
    createWall(-20, 0, 640, 40);
    //leftside walls
    createWall(0,0, 40, 180);
    createWall(0,220,40,180);
    //rightside walls
    createWall(560,0,40,180);
    createWall(560,220,40,180);
    //bottom wall
    createWall(-20,360,640,40);
    
}

function createWall(left,top,width, height) {
    var wall = document.createElement('div');
    wall.className = 'wall';
    wall.style.left = left + 'px';
    wall.style.top = top + 'px';
    wall.style.width = width + 'px';
    wall.style.height = height + 'px';
    gameWindow.appendChild(wall);    
    
    walls.push(wall);
    //output.innerHTML = walls.length;
}

function loop(){
    numLoops++;
    tryToChangeDirection();
    
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    
    if (direction=='up') {
        var pacmanY = parseInt(pacman.style.top) -PACMAN_SPEED;
        if(pacmanY < -30) pacmanY = 390;
        pacman.style.top = pacmanY + 'px';
    }
    if (direction=='down') {
        var pacmanY = parseInt(pacman.style.top) +PACMAN_SPEED;
        if(pacmanY > 390) pacmanY = -30;
        pacman.style.top = pacmanY + 'px';
    }
    if (direction=='left') {
        var pacmanX = parseInt(pacman.style.left) -PACMAN_SPEED;
        if(pacmanX < -30) pacmanX = 590;
        pacman.style.left = pacmanX + 'px';
    }
    if (direction=='right') {
        var pacmanX = parseInt(pacman.style.left) +PACMAN_SPEED;
        if(pacmanX > 590) pacmanX = -30;
        pacman.style.left = pacmanX + 'px';
    }    
    
    if( hitWall(pacman) ){
        pacman.style.left = originalLeft;
        pacman.style.top = originalTop;
    }
    
    moveRedGhost();
    movePinkGhost();
    moveGreenGhost();
    moveBlueGhost();
    
    if( hittest(pacman, redGhost) ){
        output.innerHTML = 'You Died';
        clearInterval(loopTimer);
    }
    if( hittest(pacman, pinkGhost) ){
        output.innerHTML = 'You Died';
        clearInterval(loopTimer);
    }    
    if( hittest(pacman, greenGhost) ){
        output.innerHTML = 'You Died';
        clearInterval(loopTimer);
    }    
    if( hittest(pacman, blueGhost) ){
        output.innerHTML = 'You Died';
        clearInterval(loopTimer);
    }       
    
}

function hitWall(element) {
    var hit = false;
    
    for(var i=0; i<walls.length; i++){
        if(hittest(walls[i], element) ) hit = true;    
    }
    // if(hittest(walls[0], pacman)) hit = true;
    // else if (hittest(walls[1], pacman)) hit = true;
    // else if (hittest(walls[2], pacman)) hit = true;
    // else if (hittest(walls[3], pacman)) hit = true;
    // else if (hittest(walls[4], pacman)) hit = true;
    // else if (hittest(walls[5], pacman)) hit = true;
    // else if (hittest(walls[6], pacman)) hit = true;
    return hit;
}

function tryToChangeDirection(){
    var originalLeft = pacman.style.left;
    var originalTop = pacman.style.top;
    
    if (leftArrowDown) 
    {
        pacman.style.left = parseInt(pacman.style.left) -PACMAN_SPEED + 'px';
        if( ! hitWall(pacman)) {
            //leftArrowDown = true;
            direction = 'left';
            pacman.className = "flip-horizontal";            
        }
    }
    if (upArrowDown){
        pacman.style.top = parseInt(pacman.style.top) -PACMAN_SPEED + 'px';
        if( ! hitWall(pacman)) {
            //upArrowDown = true;
            direction = 'up';
            pacman.className = "rotate270";
        }
    }
    if (rightArrowDown) {
        pacman.style.left = parseInt(pacman.style.left) +PACMAN_SPEED + 'px';
        if( ! hitWall(pacman)) {
            //rightArrowDown = true;
            direction = 'right';
            pacman.className = "";    
        }        
    }
    if (downArrowDown){
        pacman.style.top = parseInt(pacman.style.top) +PACMAN_SPEED + 'px';
        if( ! hitWall(pacman)) {
            //downArrowDown = true;
            direction = 'down';
            pacman.className = "rotate90";        
        }
    }
    
    pacman.style.left = originalLeft;
    pacman.style.top = originalTop;
}

function moveRedGhost(){
    
    //Move Red Ghost
    var rgX = parseInt(redGhost.style.left);
    var rgY = parseInt(redGhost.style.top);
    
    var rgNewDirection;
    
    var rgOppositeDirection;
    if(rgDirection=='left') rgOppositeDirection = 'right';
    else if(rgDirection=='right') rgOppositeDirection = 'left';
    else if(rgDirection=='down') rgOppositeDirection = 'up';
    else if(rgDirection=='up') rgOppositeDirection = 'down';

do{
    redGhost.style.left = rgX + 'px';
    redGhost.style.top = rgY + 'px';

    do{
        var r = Math.floor(Math.random()*4); //0=right, 1=left, 2=down, 3=up
        if(r==0) rgNewDirection = 'right';
        else if (r==1) rgNewDirection = 'left';
        else if (r==2) rgNewDirection = 'down';
        else if (r==3) rgNewDirection = 'up';
    } while( rgNewDirection == rgOppositeDirection );
    
    if(rgNewDirection == 'right') {
        if(rgX>590) rgX = -30;
        redGhost.style.left = rgX + GHOST_SPEED + 'px';
    }else if (rgNewDirection == 'left'){
        if(rgX<-30) rgX = 590;
        redGhost.style.left = rgX - GHOST_SPEED + 'px';        
    }
    else if (rgNewDirection == 'down'){
        if(rgY>390) rgY = -30;
        redGhost.style.top = rgY + GHOST_SPEED + 'px';        
    }
    else if (rgNewDirection == 'up'){
        if(rgY<-30) rgY = 390;
        redGhost.style.top = rgY - GHOST_SPEED + 'px';        
    }    
    
} while (hitWall(redGhost) );
    
    rgDirection = rgNewDirection;
        
}

function movePinkGhost(){
    
    //Move Pink Ghost
    var pgX = parseInt(pinkGhost.style.left);
    var pgY = parseInt(pinkGhost.style.top);
    
    var pgNewDirection;
    
    var pgOppositeDirection;
    if(pgDirection=='left') pgOppositeDirection = 'right';
    else if(pgDirection=='right') pgOppositeDirection = 'left';
    else if(pgDirection=='down') pgOppositeDirection = 'up';
    else if(pgDirection=='up') pgOppositeDirection = 'down';

do{
    pinkGhost.style.left = pgX + 'px';
    pinkGhost.style.top = pgY + 'px';

    do{
        var r = Math.floor(Math.random()*4); //0=right, 1=left, 2=down, 3=up
        if(r==0) pgNewDirection = 'right';
        else if (r==1) pgNewDirection = 'left';
        else if (r==2) pgNewDirection = 'down';
        else if (r==3) pgNewDirection = 'up';
    } while( pgNewDirection == pgOppositeDirection );
    
    if(pgNewDirection == 'right') {
        if(pgX>590) pgX = -30;
        pinkGhost.style.left = pgX + GHOST_SPEED + 'px';
    }else if (pgNewDirection == 'left'){
        if(pgX<-30) pgX = 590;
        pinkGhost.style.left = pgX - GHOST_SPEED + 'px';        
    }
    else if (pgNewDirection == 'down'){
        if(pgY>390) pgY = -30;
        pinkGhost.style.top = pgY + GHOST_SPEED + 'px';        
    }
    else if (pgNewDirection == 'up'){
        if(pgY<-30) pgY = 390;
        pinkGhost.style.top = pgY - GHOST_SPEED + 'px';        
    }    
    
} while (hitWall(pinkGhost) );
    
    pgDirection = pgNewDirection;
        
}

function moveGreenGhost(){
    
    //Move Green Ghost
    var pgX = parseInt(greenGhost.style.left);
    var pgY = parseInt(greenGhost.style.top);
    
    var pgNewDirection;
    
    var pgOppositeDirection;
    if(ggDirection=='left') pgOppositeDirection = 'right';
    else if(ggDirection=='right') pgOppositeDirection = 'left';
    else if(ggDirection=='down') pgOppositeDirection = 'up';
    else if(ggDirection=='up') pgOppositeDirection = 'down';

do{
    greenGhost.style.left = pgX + 'px';
    greenGhost.style.top = pgY + 'px';

    do{
        var r = Math.floor(Math.random()*4); //0=right, 1=left, 2=down, 3=up
        if(r==0) pgNewDirection = 'right';
        else if (r==1) pgNewDirection = 'left';
        else if (r==2) pgNewDirection = 'down';
        else if (r==3) pgNewDirection = 'up';
    } while( pgNewDirection == pgOppositeDirection );
    
    if(pgNewDirection == 'right') {
        if(pgX>590) pgX = -30;
        greenGhost.style.left = pgX + GHOST_SPEED + 'px';
    }else if (pgNewDirection == 'left'){
        if(pgX<-30) pgX = 590;
        greenGhost.style.left = pgX - GHOST_SPEED + 'px';        
    }
    else if (pgNewDirection == 'down'){
        if(pgY>390) pgY = -30;
        greenGhost.style.top = pgY + GHOST_SPEED + 'px';        
    }
    else if (pgNewDirection == 'up'){
        if(pgY<-30) pgY = 390;
        greenGhost.style.top = pgY - GHOST_SPEED + 'px';        
    }    
    
} while (hitWall(greenGhost) );
    
    ggDirection = pgNewDirection;
        
}

function moveBlueGhost(){
    
    //Move Pink Ghost
    var pgX = parseInt(blueGhost.style.left);
    var pgY = parseInt(blueGhost.style.top);
    
    var pgNewDirection;
    
    var pgOppositeDirection;
    if(bgDirection=='left') pgOppositeDirection = 'right';
    else if(bgDirection=='right') pgOppositeDirection = 'left';
    else if(bgDirection=='down') pgOppositeDirection = 'up';
    else if(bgDirection=='up') pgOppositeDirection = 'down';

do{
    blueGhost.style.left = pgX + 'px';
    blueGhost.style.top = pgY + 'px';

    do{
        var r = Math.floor(Math.random()*4); //0=right, 1=left, 2=down, 3=up
        if(r==0) pgNewDirection = 'right';
        else if (r==1) pgNewDirection = 'left';
        else if (r==2) pgNewDirection = 'down';
        else if (r==3) pgNewDirection = 'up';
    } while( pgNewDirection == pgOppositeDirection );
    
    if(pgNewDirection == 'right') {
        if(pgX>590) pgX = -30;
        blueGhost.style.left = pgX + GHOST_SPEED + 'px';
    }else if (pgNewDirection == 'left'){
        if(pgX<-30) pgX = 590;
        blueGhost.style.left = pgX - GHOST_SPEED + 'px';        
    }
    else if (pgNewDirection == 'down'){
        if(pgY>390) pgY = -30;
        blueGhost.style.top = pgY + GHOST_SPEED + 'px';        
    }
    else if (pgNewDirection == 'up'){
        if(pgY<-30) pgY = 390;
        blueGhost.style.top = pgY - GHOST_SPEED + 'px';        
    }    
    
} while (hitWall(blueGhost) );
    
    bgDirection = pgNewDirection;
        
}



document.addEventListener('keydown', function(event){
    if (event.keyCode == '37') leftArrowDown = true;
    if (event.keyCode == '38') upArrowDown = true;
    if (event.keyCode == '39') rightArrowDown = true;
    if (event.keyCode == '40') downArrowDown = true;    
});

document.addEventListener('keyup', function(event){
    if (event.keyCode == '37') leftArrowDown = false;
    if (event.keyCode == '38') upArrowDown = false;
    if (event.keyCode == '39') rightArrowDown = false;
    if (event.keyCode == '40') downArrowDown = false;    
});

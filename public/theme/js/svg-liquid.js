$(document).ready(function() {
$('.water-jar').css('display', 'block');

var cnt=document.getElementById("count");
 
var water=document.getElementById("water");
 
var percent=cnt.innerText;
 
var interval;
 
interval=setInterval(function(){
 
  percent++;
 
  cnt.innerHTML = percent;
 
  water.style.transform='translate(0'+','+(100-percent)+'%)';
 
  if(percent==50){ //change 100 to result
 
    clearInterval(interval);
 
  }
 
},60);

});
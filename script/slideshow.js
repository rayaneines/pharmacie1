  var slides, slideindex, dots;
  function initGallery(){
slideindex=0;
slides=document.getElementsByClassName("imageHolder");
slides[slideindex].style.opacity=1;

dots=[];
var dotsContainer=document.getElementById("dotsContainer");
  for (var i=0;i<slides.length;i++){
var dot=document.createElement("span");
dot.classList.add("dots");
dot.setAttribute("onclick","moveSlide("+i+")");
dotsContainer.append(dot);
dots.push(dot);

}

dots[slideindex].classList.add("active");

  }
initGallery();


function moveSlide(n){
var i,current,next;
var moveSlideAnimClass={
  forcurrent:"",
  fornext:""
}
if (n>slideindex) {
  if (n>=slides.length){n=0}
moveSlideAnimClass.forcurrent="moveLeftCurrentSlide";
moveSlideAnimClass.fornext="moveLeftNextSlide";
} else if(n<slideindex){

    if (n<0) {n=slides.length-1}
moveSlideAnimClass.forcurrent="moveRightCurrentSlide";
moveSlideAnimClass.fornext="moveRightNextSlide";

}
      if (n!=slideindex) {
      next=slides[n];
      current=slides[slideindex];
            for (i=0;i<slides.length;i++) {
              slides[i].className="imageHolder";
              slides[i].style.opacity=0;
              dots[i].classList.remove("active");

            }
            current.classList.add(moveSlideAnimClass.forcurrent);
            next.classList.add(moveSlideAnimClass.fornext)
     dots[n].classList.add("active");
     slideindex=n;
      }
}
function plussSlides(n){
   moveSlide(slideindex+n);
}

var timer=null;
function setTimer()
{
  timer=setInterval (function(){
plussSlides(1);
  },2500)
}
setTimer();

function playPauseSlides(){

var playPauseBtn=document.getElementById("playPauseBtn");
if (timer==null) {
  setTimer();
  playPauseBtn.style.backgroundPositionY="0px";
} else {
  clearInterval(timer);
  timer=null;
  playPauseBtn.style.backgroundPositionY="-30px";
}

}



function delet() {
  var x= document.getElementById("footer");
    if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}

function moins() {
  var x= document.getElementById("index_info");
    if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}


function plus() {
  var x= document.getElementById("index_info");
    if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}

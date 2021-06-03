
function togglePwd(id)
{
  var x = document.getElementById("pw");
  x.type = (x.type === "password")? "text" : "password";
}
/* ----------------------------effecer la pharmacie------------------------------------ */
function afficher1() {
	var x= document.getElementsByClassName("action")[0];
	if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}

function annuler1() {
	var x= document.getElementsByClassName("action")[0];
		if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}
/* ----------------------------modifier le nom du pharmacie ------------------------------------ */
function afficher2() {
	var x= document.getElementsByClassName("action")[1];
	if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}

function annuler2() {
	var x= document.getElementsByClassName("action")[1];
		if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}
/* ----------------------------modifier le nom du proprietaire de pharmacie ------------------------------- */
function afficher3() {
	var x= document.getElementsByClassName("action")[2];
	if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}

function annuler3() {
	var x= document.getElementsByClassName("action")[2];
		if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}
/* ----------------------------modifier le numero du telephon ------------------------------------ */
function afficher4() {
	var x= document.getElementsByClassName("action")[3];
	if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}

function annuler4() {
	var x= document.getElementsByClassName("action")[3];
		if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}
/* ----------------------------modifier le mot de pass ------------------------------------ */
function afficher5() {
	var x= document.getElementsByClassName("action")[4];
	if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}

function annuler5() {
	var x= document.getElementsByClassName("action")[4];
		if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}
//--------------------------- aide ajout produit-------------------------------------
function aide() {
  var x= document.getElementById("aide");
  if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'block';
  }
}
function annuler6() {
  var x= document.getElementById("aide");
    if (x.style.display == 'block')
  {
       x.style.display = 'none'; 
  }
  else
  {
       x.style.display = 'none';
  }
}
//-------------------- Ajout des ligne en vente au public-----------------------

function addRow(){
     var tableau = document.getElementById("tab");
    //Calcul du nombre de cellule par ligne dans le tableau -> on regarde combien il y a de td dans le premier tr
  // var tds = tableau.getElementsByTagName('tr')[0].getElementsByTagName('td').length;
     
    var tr= document.createElement('tr');
    //On créé une ligne
var produit=document.getElementById('prod');
var unite=document.getElementById('unit');
var quantite=document.getElementById('quant');
var prix=document.getElementById('prix');
var totale=document.getElementById('totale');
    //On ajoute autant les cellules
    //for(var i=0; i<tds; i++){
       var td1 = document.createElement('td');
            var input = document.createElement("input");
              input.name ="prod";
              input.value=produit.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td1.appendChild(input);

        tr.appendChild(td1);
       var td2 = document.createElement('td');
          var input = document.createElement("input");
              input.name ="unite";
              input.value=unite.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td2.appendChild(input);
        tr.appendChild(td2);
        var td3 = document.createElement('td');
          var input = document.createElement("input");
              input.name ="quant";
              input.value=quantite.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td3.appendChild(input);
        tr.appendChild(td3);
        var td4 = document.createElement('td');
            var input = document.createElement("input");
              input.name ="prix";
              input.value=prix.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td4.appendChild(input);
        tr.appendChild(td4);
        var td5= document.createElement('td');
          var input = document.createElement("input");
              input.name ="totale";
              input.style.width='100px';
              input.value=totale.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              input.classList.add("totale1");
              td5.appendChild(input);
        tr.appendChild(td5);
          var td6 = document.createElement('td');
          var img= document.createElement("img");
          img.src = "../images/icons/1.png";
          img.onclick=function deletline(){ 
                                              tr.parentNode.removeChild(tr);
                                              totvene();
                                              var nb=tableau.getElementsByTagName('tr').length;
                                              var nbprod=document.getElementById('nbprod');
                                              nbprod.value=nb-2;
                                              var nbp=nb-2;
                                               } ;
          img.classList.add("img");
          img.classList.add("img1");
          td6.appendChild(img);
        tr.appendChild(td6);
         
       // prod unit quant prix totale
        //td6.innerHTML = 'Une nouvelle cellule'+n+v1+v2+v3+v4+v5;
   //}
     
    //On ajoute la ligne créée au tableau 
   if (produit.value!='' && unite.value!='' && quantite.value!='' && quantite.value!=0 && prix.value!='') {
    if(tableau.firstChild.tagName == 'TBODY'){
        tableau.firstChild.appendChild(tr);
    }
    else{
        tableau.appendChild(tr);
        quantite.value=null;
var nb=tableau.getElementsByTagName('tr').length;
var nbprod=document.getElementById('nbprod');
nbprod.value=nb-2;
var nbp=nb-2;
totvene();
    }
    }
}
function determinePrix(){
  var p=prod.selectedIndex;
  var pr=prix.options[p].value;  
  var uni=unit.options[p].value;
unit.options[0].innerHTML=uni;
  prix.options[0].innerHTML=pr;
     var quantite=document.getElementById('quant');
var prix1=document.getElementById('prix');
var totale=document.getElementById('totale');
  totale.value=prix1.value*quantite.value;
}
function determineTotale() {
   var quantite=document.getElementById('quant');
var prix1=document.getElementById('prix');
var totale=document.getElementById('totale');
  totale.value=prix1.value*quantite.value;
}
function totvene(){ 
                                            var tableau = document.getElementById("tab");
                                            var nbp=tableau.getElementsByTagName('tr').length;
                                            var tot=0;
                                            for (var i =0; i< nbp-2; i++) {
                                              var toto=document.getElementsByClassName('totale1')[i].value;
                                                  tot+=parseFloat(toto);
                                            }
                                            var totven=document.getElementById("tot");
                                            totven.value=parseFloat(tot);
                                            var donne=document.getElementById("donner");
                                            donne.value=totven.value;
                                               } 
//-----------------------------------------vente en gros -------------------

function determineTotale1() {
   var quantite=document.getElementById('quant');
var prix1=document.getElementById('prix');
var totale=document.getElementById('totale');
var sol=document.getElementById('sold');
          if (typeof  sol!== "undefined" && sol.value!=0){

            totale.value=Math.round(((prix1.value*quantite.value)-prix1.value*quantite.value*(sol.value/100))*100)/100;
          }else totale.value=prix1.value*quantite.value;
}
function totvene1(){ 
                                            var tableau = document.getElementById("tab");
                                            var nbp=tableau.getElementsByTagName('tr').length;
                                            var tot=0;
                                            for (var i =0; i< nbp-2; i++) {
                                              var toto=document.getElementsByClassName('totale1')[i].value;
                                                  tot+=parseFloat(toto);
                                            }
                                            var totven=document.getElementById("tot");
                                            totven.value=parseFloat(tot);

                                            var donne=document.getElementById("donner");
                                            var sold=document.getElementById('red');

          if (typeof  sold!== "undefined" && sold.value!=0){
            donne.value=Math.round(((totven.value-totven.value*sold.value/100))*100)/100;
          }else donne.value=totven.value;
                                            
                                               } 

     function addRow1(){
     var tableau = document.getElementById("tab");
    //Calcul du nombre de cellule par ligne dans le tableau -> on regarde combien il y a de td dans le premier tr
  // var tds = tableau.getElementsByTagName('tr')[0].getElementsByTagName('td').length;
     
    var tr= document.createElement('tr');
    //On créé une ligne
var produit=document.getElementById('prod');
var unite=document.getElementById('unit');
var quantite=document.getElementById('quant');
var prix=document.getElementById('prix');
var totale=document.getElementById('totale');
    //On ajoute autant les cellules
    //for(var i=0; i<tds; i++){
       var td1 = document.createElement('td');
            var input = document.createElement("input");
              input.name ="prod";
              input.value=produit.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td1.appendChild(input);

        tr.appendChild(td1);
       var td2 = document.createElement('td');
          var input = document.createElement("input");
              input.name ="unite";
              input.value=unite.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td2.appendChild(input);
        tr.appendChild(td2);
        var td3 = document.createElement('td');
          var input = document.createElement("input");
              input.name ="quant";
              input.value=quantite.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td3.appendChild(input);
        tr.appendChild(td3);
        var td4 = document.createElement('td');
            var input = document.createElement("input");
              input.name ="prix";
              input.value=prix.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              td4.appendChild(input);
        tr.appendChild(td4);
        var td5= document.createElement('td');
          var input = document.createElement("input");
              input.name ="totale";
              input.style.width='100px';
              input.value=totale.value;
              input.disabled="disable";
              input.classList.add("inputtext");
              input.classList.add("totale1");
              td5.appendChild(input);
        tr.appendChild(td5);
          var td6 = document.createElement('td');
          var img= document.createElement("img");
          img.src = "../images/icons/1.png";
          img.onclick=function deletline(){ 
                                              tr.parentNode.removeChild(tr);
                                              totvene1();
                                              var nb=tableau.getElementsByTagName('tr').length;
                                              var nbprod=document.getElementById('nbprod');
                                              nbprod.value=nb-2;
                                              var nbp=nb-2;
                                               } ;
          img.classList.add("img");
          img.classList.add("img1");
          td6.appendChild(img);
        tr.appendChild(td6);
         
       
   //}
     
    //On ajoute la ligne créée au tableau 
   if (produit.value!='' && unite.value!='' && quantite.value!='' && quantite.value!=0 && prix.value!='') {
    if(tableau.firstChild.tagName == 'TBODY'){
        tableau.firstChild.appendChild(tr);
    }
    else{
        tableau.appendChild(tr);
        quantite.value=null;
var nb=tableau.getElementsByTagName('tr').length;
var nbprod=document.getElementById('nbprod');
nbprod.value=nb-2;
var nbp=nb-2;
totvene1();
    }
    }
}

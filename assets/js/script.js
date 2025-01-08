
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
  navigator.serviceWorker.register('/service-worker.js').then(registration => {
  console.log('Service Worker enregistré avec succès:', registration);
  }).catch(error => {
  console.log('Échec de l\'enregistrement du Service Worker:', error);
  });
  });
  }

//fonction d'affichage de la page d'accueil de nouvelle fonction
function formnewfonctions(){

    if(window.XMLHttpRequest){
        //Mozilla, safari, IE7+...
        xhr = new XMLHttpRequest();
    }else if(window.ActiveXObject){
        //IE 6 et anterieur
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
  xhr.onreadystatechange = function (){ 
    if(xhr.readyState == 1 && xhr.status == 200){
      let spinner = document.getElementById('spinner').style.display="block";
     }
     if(xhr.readyState == 2 && xhr.status == 200){
      let spinner = document.getElementById('spinner').style.display="block"; 
     }
     if(xhr.readyState == 3 && xhr.status == 200){
      let spinner = document.getElementById('spinner').style.display="block";
     }
    if(xhr.readyState == 4 && xhr.status == 200){ 
      let spinner = document.getElementById('spinner').style.display="none";
      let corplogiciel = document.getElementById('corplogiciel').innerHTML = xhr.responseText;
      comptefonctionenregistre();
     }
}
  xhr.open('GET','formnewfonction.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();

   }

   //fonction d'affichage de l'entete(nom, bouton nombre ligne) de la page nouvelle fonction
   function entetepagenewfonctions(){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let entetepagenewfonction = document.getElementById('entetepagenewfonction').innerHTML = xhr.responseText;
    formnewfonctions();
   }
}
xhr.open('GET','entetepagenewfonctions.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

   //fonction peremttant de compte le nombre de fonction enregistrer
   function comptefonctionenregistre(){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 

  if(xhr.readyState == 4 && xhr.status == 200){ 
    let comptfonction = document.getElementById('comptfonction').innerHTML = xhr.responseText;
   }
}
xhr.open('GET','comptefonctionenregistre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des nouvelles fonction
function insertnewfonctions(){
   let nomfonction = document.getElementById('nomfonction');  
   let checkinscription = document.getElementById('checkinscription');  
   let checkscolarite = document.getElementById('checkscolarite');  
   let checkgestprof = document.getElementById('checkgestprof');  
   let checkdisciplineleve = document.getElementById('checkdisciplineleve');  
   let checkautre = document.getElementById('checkautre');  
   let checkenseignent = document.getElementById('checkenseignent');  

  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let resultinsertfonction = document.getElementById('resultinsertfonction').innerHTML = xhr.responseText;
    let re = xhr.responseText;
    if(re == '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Enregistrement reussi</strong>. Nouvelle fonction enregistrer<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'){
      nomfonction.value = '';
      checkinscription.checked = false;
      checkscolarite.checked = false;
      checkgestprof.checked = false;
      checkdisciplineleve.checked = false;
      checkautre.checked = false;
      checkenseignent.checked = false;
    }
    formnewfonctions();
   }
}
let form = new FormData();
form.append('nomfonction', nomfonction.value);
form.append('checkinscription', checkinscription.checked);
form.append('checkscolarite', checkscolarite.checked);
form.append('checkgestprof', checkgestprof.checked);
form.append('checkdisciplineleve', checkdisciplineleve.checked);
form.append('checkautre', checkautre.checked);
form.append('checkenseignent', checkenseignent.checked);
xhr.open('POST','insertnewfonction.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

 }


 
   //fonction d'affichage des fonction pour suppression
   function listfonctionPoursupp(){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel').innerHTML = xhr.responseText;
    comptefonctionenregistre();
   }
}
xhr.open('GET','listfonctionPoursupp.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


  //fonction d'affichage des fonction pour suppression
  function suppfonction(ident){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    listfonctionPoursupp();
   }
}
xhr.open('GET','suppfonction.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

 
   //fonction d'affichage des fonction pour modification
   function listfonctionPourmodif(){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel').innerHTML = xhr.responseText;
   }
}
xhr.open('GET','listfonctionPourmodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}



//fonction d'insertion des modification d'une fonction
function insertmodifonction(ident){
  let nomfonction = document.getElementById('nommodifonct'+ident);  
  let checkinscription = document.getElementById('modifinscript'+ident);  
  let checkscolarite = document.getElementById('modifscolarite'+ident);  
  let checkgestprof = document.getElementById('modifgestprof'+ident);  
  let checkdisciplineleve = document.getElementById('modifdiscipeleve'+ident);  
  let checkautre = document.getElementById('modifautre'+ident);  
  let checkenseignent = document.getElementById('modifenseignement'+ident);  

 if(window.XMLHttpRequest){
     //Mozilla, safari, IE7+...
     xhr = new XMLHttpRequest();
 }else if(window.ActiveXObject){
     //IE 6 et anterieur
     xhr = new ActiveXObject("Microsoft.XMLHTTP");
 }
xhr.onreadystatechange = function (){ 
 if(xhr.readyState == 1 && xhr.status == 200){
   let spinner = document.getElementById('spinner').style.display="block";
  }
  if(xhr.readyState == 2 && xhr.status == 200){
   let spinner = document.getElementById('spinner').style.display="block"; 
  }
  if(xhr.readyState == 3 && xhr.status == 200){
   let spinner = document.getElementById('spinner').style.display="block";
  }
 if(xhr.readyState == 4 && xhr.status == 200){ 
   let spinner = document.getElementById('spinner').style.display="none";
   listfonctionPourmodif();
  }
}
let form = new FormData();
form.append('nomfonction', nomfonction.value);
form.append('checkinscription', checkinscription.checked);
form.append('checkscolarite', checkscolarite.checked);
form.append('checkgestprof', checkgestprof.checked);
form.append('checkdisciplineleve', checkdisciplineleve.checked);
form.append('checkautre', checkautre.checked);
form.append('checkenseignent', checkenseignent.checked);
form.append('ident', ident);
xhr.open('POST','insertmodifonction.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

   //fonction d'affichage de l'entete de l'espace nouveau employer
   function entetepagenewemployer(){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('entetepagenewfonction').innerHTML = xhr.responseText;
    listemploye();
  }
}
xhr.open('GET','entetepagenewemployer.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

   //fonction d'affichage du formulaire de creation d'un nouveau employer
   function formnewemployer(){
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let critere = document.getElementById('searchcritere').style.display ='none';
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width ='100%';
    listemployerdeselect();
   }
}
xhr.open('GET','formnewemployer.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

   
   //fonction d'insertion d'un nouveau employer
   function insertnewemployer(){
    let nomemployer = document.getElementById('nomemployers');
    let phone1employer = document.getElementById('phone1employer');
    let phone2employer = document.getElementById('phone2employer');
    let sexeemployer = document.getElementById('sexeemployer');
    let mailemployer = document.getElementById('mailemployer');
    let quartieremployer = document.getElementById('quartieremployer');
    let fonctionemployer = document.getElementById('fonctionemployer');
    let datenaissemployer = document.getElementById('datenaissemployer');
    let travaildepuisemployer = document.getElementById('travaildepuisemployer');
    let diplomemployer = document.getElementById('diplomemployer');
    let specialitemployer = document.getElementById('specialitemployer');
    let cvemployer = document.getElementById('cvemployer');
    let numerourgence = document.getElementById('numerourgence');
    let mdpemployer = document.getElementById('mdpemployer');
    let salaireemployer = document.getElementById('salaireemployer');
 
    if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('resultinsertemployer').innerHTML = xhr.responseText;
    let re = xhr.responseText;
    if(re == '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouveau employer enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'){
     nomemployer.value = '';
     phone1employer.value = '';
     phone2employer.value = '';
     sexeemployer.value ='';
     mailemployer.value = '';
     quartieremployer.value = '';
     fonctionemployer.value ='';
     datenaissemployer.value ='';
     travaildepuisemployer.value ='';
     diplomemployer.value ='';
     specialitemployer.value ='';
     cvemployer.value ='';
     numerourgence.value ='';
     mdpemployer.value ='';
     salaireemployer.value ='';
  
    }
  }
}
let form = new FormData();
form.append('nomemployer',nomemployer.value);
form.append('phone1employer',phone1employer.value);
form.append('phone2employer',phone2employer.value);
form.append('sexeemployer',sexeemployer.value);
form.append('mailemployer',mailemployer.value);
form.append('quartieremployer',quartieremployer.value);
form.append('fonctionemployer',fonctionemployer.value);
form.append('datenaissemployer',datenaissemployer.value);
form.append('travaildepuisemployer',travaildepuisemployer.value);
form.append('diplomemployer',diplomemployer.value);
form.append('specialitemployer',specialitemployer.value);
form.append('cvemployer',cvemployer.files[0]);
form.append('numerourgence',numerourgence.value);
form.append('mdpemployer',mdpemployer.value);
form.append('salaireemployer',salaireemployer.value);
xhr.open('POST','insertnewemployer.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}


   //fonction d'affichage de la liste des employés
function listemploye(){
  let searchcritere = document.getElementById('searchcritere');
  searchcritere.style.display ='block';
  searchcritere.style.wordWrap = 'wrap';
  searchcritere.style.display = 'flex';
  let sexeemployersearch = document.getElementById('sexeemployersearch').value;
  let diplomemployersearch = document.getElementById('diplomemployersearch').value;
  let fonctionemployersearch = document.getElementById('fonctionemployersearch').value;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
    if(xhr.readyState == 1 && xhr.status == 200){
      let spinner = document.getElementById('spinner').style.display="block";
    }
    if(xhr.readyState == 2 && xhr.status == 200){
      let spinner = document.getElementById('spinner').style.display="block"; 
    }
    if(xhr.readyState == 3 && xhr.status == 200){
      let spinner = document.getElementById('spinner').style.display="block";
    }
    if(xhr.readyState == 4 && xhr.status == 200){ 
      let spinner = document.getElementById('spinner').style.display="none";
      let corplogiciel = document.getElementById('corplogiciel');
      corplogiciel.innerHTML = xhr.responseText;
      corplogiciel.style.width = '1500px';
      listemployerdeselect();
    }
  }
  xhr.open('GET','listemployer.php?sexe='+sexeemployersearch+'&diplome='+diplomemployersearch +'&fonction='+fonctionemployersearch);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();

}


function listemployersupp(){
  let sexeemployersearch = document.getElementById('sexeemployersearch').value;
  let diplomemployersearch = document.getElementById('diplomemployersearch').value;
  let fonctionemployersearch = document.getElementById('fonctionemployersearch').value;
 
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';
  let searchcritere = document.getElementById('searchcritere');
  searchcritere.style.display ='block';
  searchcritere.style.wordWrap = 'wrap';
  searchcritere.style.display = 'flex';

}
}
xhr.open('GET','listemployersupp.php?sexe='+sexeemployersearch+'&diplome='+diplomemployersearch +'&fonction='+fonctionemployersearch);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les liste d'employer selectionnez pour suppression
function listemployerselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listemployerselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


// fonction permettant de déselectionné automatiquement les employer selectionnez pour suppression
function listemployerdeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listemployerdeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de supprimer un seul ligne( un employer)
function suppUnEmployer(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listemployersupp();

}
}
xhr.open('GET','suppUnEmployer.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// liste des employer pour modification
function listemployermodif(){
  let sexeemployersearch = document.getElementById('sexeemployersearch').value;
  let diplomemployersearch = document.getElementById('diplomemployersearch').value;
  let fonctionemployersearch = document.getElementById('fonctionemployersearch').value;
 
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';
  let searchcritere = document.getElementById('searchcritere');
  searchcritere.style.display ='block';
  searchcritere.style.wordWrap = 'wrap';
  searchcritere.style.display = 'flex';
  listemployerdeselect();
}
}
xhr.open('GET','listemployermodif.php?sexe='+sexeemployersearch+'&diplome='+diplomemployersearch +'&fonction='+fonctionemployersearch);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


// formulaire de modification des informations d'un employer
function formemployermodif(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let searchcritere = document.getElementById('searchcritere');
  searchcritere.style.display ='none';
}
}
xhr.open('GET','formemployermodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


 //fonction de modification d'un nouveau employer
 function modifemployer(ident){
  let nomemployer = document.getElementById('nomemployersmodif');
  let phone1employer = document.getElementById('phone1employermodif');
  let phone2employer = document.getElementById('phone2employermodif');
  let sexeemployer = document.getElementById('sexeemployermodif');
  let mailemployer = document.getElementById('mailemployermodif');
  let quartieremployer = document.getElementById('quartieremployermodif');
  let fonctionemployer = document.getElementById('fonctionemployermodif');
  let datenaissemployer = document.getElementById('datenaissemployermodif');
  let travaildepuisemployer = document.getElementById('travaildepuisemployermodif');
  let diplomemployer = document.getElementById('diplomemployermodif');
  let specialitemployer = document.getElementById('specialitemployermodif');
  let cvemployer = document.getElementById('cvemployermodif');
  let numerourgence = document.getElementById('numerourgencemodif');
  let salaireemployer = document.getElementById('salaireemployermodif');

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertemployermodif').innerHTML = xhr.responseText;
 
}
}
let form = new FormData();
form.append('nomemployer',nomemployer.value);
form.append('phone1employer',phone1employer.value);
form.append('phone2employer',phone2employer.value);
form.append('sexeemployer',sexeemployer.value);
form.append('mailemployer',mailemployer.value);
form.append('quartieremployer',quartieremployer.value);
form.append('fonctionemployer',fonctionemployer.value);
form.append('datenaissemployer',datenaissemployer.value);
form.append('travaildepuisemployer',travaildepuisemployer.value);
form.append('diplomemployer',diplomemployer.value);
form.append('specialitemployer',specialitemployer.value);
form.append('cvemployer',cvemployer.files[0]);
form.append('numerourgence',numerourgence.value);
form.append('salaireemployer',salaireemployer.value);
form.append('ident',ident);
xhr.open('POST','modifemployer.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage d'entete de page des sessions
function entetepagenewsession(){

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction').innerHTML = xhr.responseText;
  listsession();
}
}

xhr.open('GET','entetepagenewsession.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction du formulaire de creation des sessions
function formnewsession(){

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptsession = document.getElementById('comptsession').style.display = 'none';
  listsessiondeselect();
}
}

xhr.open('GET','formnewsession.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion d'une nouvelle session
function insertnewsession(){
  var selectnomsession = document.getElementById('nomsession');
  var nomsession = selectnomsession.value;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertsession');
  corplogiciel.innerHTML = xhr.responseText;

}
}

xhr.open('POST','insertnewsession.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomsession='+encodeURI(nomsession));

}

//fonction d'afichage des session creer
function listsession(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptsession = document.getElementById('comptsession').style.display = 'block';
  comptsessions();

}
}

xhr.open('GET','listsession.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'afichage du nombre de fonction enregistrer
function comptsessions(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('comptsession');
  corplogiciel.innerHTML = xhr.responseText;
  listsessiondeselect();
}
}

xhr.open('GET','comptsession.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'afichage de la liste des session pour suppression
function listsessionsupp(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  let comptsession = document.getElementById('comptsession').style.display = 'none';

}
}

xhr.open('GET','listsessionsupp.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les sessions selectionnez pour suppression
function listsessionselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listsessionselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de deselection des session selectionnez pour suppression
function listsessiondeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listsessiondeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de suppression d'une ligne de session
function supplignsession(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listsessionsupp();

}
}
xhr.open('GET','supplignsession.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'afichage de la liste des sessions pour modification
function listsessionmodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  let comptsession = document.getElementById('comptsession').style.display = 'block';
  listsessiondeselect();
}
}
xhr.open('GET','listsessionmodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'affichage du formulaire de modification d'une session
function formsessionmodif(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  let comptsession = document.getElementById('comptsession').style.display = 'none';
}
}
xhr.open('GET','formsessionmodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la modification d'une session
function insertmodifsession(ident){
  let nomsessionmodif = document.getElementById('nomsessionmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertsessionmodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertmodifsession.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomsessionmodif='+encodeURI(nomsessionmodif)+'&ident='+encodeURI(ident));

}


//fonction d'affichage de l'entete de la section
function entetenewsection(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listesection();
}
}
xhr.open('GET','entetenewsection.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du ormulaire de creation des sections
function formnewsection(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptsection = document.getElementById('comptsection').style.display = 'none';
  listsectiondeselect();
}
}
xhr.open('GET','formnewsection.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des nouvelle section
function insertnewsection(){
  let nomsection = document.getElementById('nomsection').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertsection');
  corplogiciel.innerHTML = xhr.responseText;

}
}
xhr.open('POST','insertnewsection.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomsection='+encodeURI(nomsection));

}

//fonction d'afichage de la liste des sections
function listesection(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptsection = document.getElementById('comptsection').style.display = 'block';
  comptsections();
}
}
xhr.open('GET','listesection.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

function comptsections(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('comptsection');
  corplogiciel.innerHTML = xhr.responseText;
  listsectiondeselect();
}
}

xhr.open('GET','comptsection.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}
//fonction d'afichage de la liste des section pour suppression
function listsectionsupp(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptsession = document.getElementById('comptsection').style.display = 'none';

}
}

xhr.open('GET','listsectionsupp.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les sessions selectionnez pour suppression
function listsectionselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listsectionselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de deselection des sections selectionnez pour suppression
function listsectiondeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listsectiondeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de suppression d'une seul ligne dans la table section
function suppUneSection(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listsectionsupp();
}
}
xhr.open('GET','suppUneSection.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'afichage de la liste des sections pour modification
function listsectionmodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  let comptsession = document.getElementById('comptsection').style.display = 'block';
  listsectiondeselect();
}
}
xhr.open('GET','listsectionmodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de modification d'une section
function formsectionmodif(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  let comptsession = document.getElementById('comptsection').style.display = 'none';
}
}
xhr.open('GET','formsectionmodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la modification de la section
function insertsectionmodif(ident){
  let nomsectionmodif = document.getElementById('nomsectionmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertsectionmodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertsectionmodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomsectionmodif='+encodeURI(nomsectionmodif)+'&ident='+encodeURI(ident));

}

//fonction d'affichage de l'entete de la creation de la classe
function entetenewclasse(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listclasse();
}
}
xhr.open('GET','entetenewclasse.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de creation d'une nouvelle classe
function formnewclasse(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('comptclasse').style.display = 'none';
  listclassedeselect();
}
}
xhr.open('GET','formnewclasse.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'insertion d'une nouvelle classe
function insertnewclasse(){
  let nomclasse = document.getElementById('nomclasse');
  let montscolarite = document.getElementById('montscolarite');
  let montinscription = document.getElementById('montinscription');
  let sectionclasse = document.getElementById('sectionclasse');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertclasse');
  corplogiciel.innerHTML = xhr.responseText;
}
}
let form = new FormData();
form.append('nomclasse', nomclasse.value);
form.append('montscolarite', montscolarite.value);
form.append('montinscription', montinscription.value);
form.append('sectionclasse', sectionclasse.value);
xhr.open('POST','insertnewclasse.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage des classe
function listclasse(){
  var sectionsearch = document.getElementById('sectionsearch').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('comptclasse').style.display = 'block';
  listclassedeselect();
}
}
xhr.open('GET','listclasse.php?search='+sectionsearch);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion d'une nouvelle classe
function insertnewclasse(){
  let nomclasse = document.getElementById('nomclasse');
  let montscolarite = document.getElementById('montscolarite');
  let montinscription = document.getElementById('montinscription');
  let sectionclasse = document.getElementById('sectionclasse');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertclasse');
  corplogiciel.innerHTML = xhr.responseText;
  let re = xhr.responseText;
  if(re == '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvelle classe enregistré avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'){
     nomclasse.value = '';
     montscolarite.value = '';
     montinscription.value = '';
     sectionclasse.value = '';
  }
}
}
let form = new FormData();
form.append('nomclasse', nomclasse.value);
form.append('montscolarite', montscolarite.value);
form.append('montinscription', montinscription.value);
form.append('sectionclasse', sectionclasse.value);
xhr.open('POST','insertnewclasse.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage de la liste des classes pour modification
function listclassemodif(){
  var sectionsearch = document.getElementById('sectionsearch').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('comptclasse').style.display = 'block';
  listclassedeselect();
}
}
xhr.open('GET','listclassemodif.php?search='+sectionsearch);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de modification d'une classe
function formclassemodif(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('comptclasse').style.display = 'none';

}
}
xhr.open('GET','formclassemodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'insertion des modification d'ine classe
function insertmodifclasse(ident){
  let nomclasse = document.getElementById('nomclassemodif');
  let montscolarite = document.getElementById('montscolaritemodif');
  let montinscription = document.getElementById('montinscriptionmodif');
  let sectionclasse = document.getElementById('sectionclassemodif');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertmodifclasse');
  corplogiciel.innerHTML = xhr.responseText;
}
}
let form = new FormData();
form.append('nomclasse', nomclasse.value);
form.append('montscolarite', montscolarite.value);
form.append('montinscription', montinscription.value);
form.append('sectionclasse', sectionclasse.value);
form.append('ident', ident);
xhr.open('POST','insertmodifclasse.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}


//fonction d'affichage de la liste des classes pour suppression
function listclassesupp(){
  var sectionsearch = document.getElementById('sectionsearch').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('comptclasse').style.display = 'block';

}
}
xhr.open('GET','listclassesupp.php?search='+sectionsearch);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les classes selectionnez pour suppression
function listclasselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listclasseselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de deselection des classes selectionnez pour suppression
function listclassedeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listclassedeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de suppression d'une classe
function suppUnClasse(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listclassesupp()

}
}
xhr.open('GET','suppUnClasse.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de la creation des types de matieres
function entetenewtypmatier(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listtypmatiere();
}
}
xhr.open('GET','entetenewtypmatier.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de creation des types de matières
function formnewtypmatiere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let compttypmatiere = document.getElementById('compttypmatiere').style.display = 'none';
  listtypmatdeselect();
}
}
xhr.open('GET','formnewtypmatiere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des types de matières
function insertnewtypmatiere(){
  var nomtypmatiere = document.getElementById('nomtypmatiere').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinserttypmatiere');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertnewtypmatiere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomtypmatiere='+encodeURI(nomtypmatiere));

}

//fonction d'affichage de la liste des types de matiéres creer
function listtypmatiere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let compttypmatiere = document.getElementById('compttypmatiere').style.display = 'block';
  comptypmatiere();
}
}
xhr.open('GET','listtypmatiere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de comptage du nombre de type de matiere enregistrer
function comptypmatiere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('compttypmatiere');
  corplogiciel.innerHTML = xhr.responseText;
  listtypmatdeselect();
}
}
xhr.open('GET','comptypmatiere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des types de matiéres pour modification
function listtypmatieremodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let compttypmatiere = document.getElementById('compttypmatiere').style.display = 'block';
  comptypmatiere();
}
}
xhr.open('GET','listtypmatieremodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire pour modifier un type de matiere
function formtypmatieremodif(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let compttypmatiere = document.getElementById('compttypmatiere').style.display = 'none';
  listtypmatdeselect();
}
}
xhr.open('GET','formtypmatieremodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modification du type de matiere
function inserttypmatieremodif(ident){
  let nomtypmatmodif = document.getElementById('nomtypmatmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertypmatmodif');
  corplogiciel.innerHTML = xhr.responseText;
  let compttypmatiere = document.getElementById('compttypmatiere').style.display = 'none';

}
}
xhr.open('POST','inserttypmatieremodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('ident='+encodeURI(ident)+'&nomtypmatmodif='+encodeURI(nomtypmatmodif));

}

//fonction d'affichage de la liste des types de matiéres pour suppression
function listtypmatieresupp(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let compttypmatiere = document.getElementById('compttypmatiere').style.display = 'none';

}
}
xhr.open('GET','listtypmatieresupp.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les types de matiere selectionnez pour suppression
function listtypmatselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listtypmatselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de deselection des types de matiere selectionnez pour suppression
function listtypmatdeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listtypmatdeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de suppression d'Une seul ligne des type de matiere
function suppUnTypmat(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listtypmatieresupp();

}
}
xhr.open('GET','suppUnTypmat.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de la creation des matieres
function entetenewmatiere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listmatiere();
}
}
xhr.open('GET','entetenewmatiere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de creation des matières
function formnewmatiere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptmatiere = document.getElementById('comptmatiere').style.display = 'none';
  listmatieredeselect();
}
}
xhr.open('GET','formnewmatiere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'insertion d'une nouvelle matière
function insertnewmatiere(){
  let nomatiere = document.getElementById('nomatiere');
  let typmatmatiere = document.getElementById('typmatmatiere');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertmatiere');
  corplogiciel.innerHTML = xhr.responseText;
  let re = xhr.responseText;
  if(re == '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvelle matière enregistré avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'){
    nomatiere.value ='';
    typmatmatiere.value = '';
  }
}
}
let form = new FormData();
form.append('nomatiere', nomatiere.value);
form.append('typmatmatiere', typmatmatiere.value);
xhr.open('POST','insertnewmatiere.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage des matieres creer
function listmatiere(){
  let comptmatiere = document.getElementById('comptmatiere');
  comptmatiere.style.display = 'block';
  let search = document.getElementById('typmatsearch').value;


  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  listmatieredeselect();
}
}

xhr.open('GET','listmatiere.php?search='+search);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des matieres pour modification
function listmatieremodif(){
  let comptmatiere = document.getElementById('comptmatiere');
  comptmatiere.style.display = 'block';
  let search = document.getElementById('typmatsearch').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  listmatieredeselect();

}
}

xhr.open('GET','listmatieremodif.php?search='+search);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de modification d'Une matiere
function formmatieremodif(ident){
  let comptmatiere = document.getElementById('comptmatiere');
  comptmatiere.style.display = 'none';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}

xhr.open('GET','formmatieremodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modification de la matière
function insertmatieremodif(ident){
  let nomatieremodif = document.getElementById('nomatieremodif').value;
  let typmatmodif = document.getElementById('typmatmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertmodifmatiere');
  corplogiciel.innerHTML = xhr.responseText;
}
}

xhr.open('POST','insertmatieremodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('ident='+encodeURI(ident)+'&nomatieremodif='+encodeURI(nomatieremodif)+'&typmatmodif='+encodeURI(typmatmodif));

}

//fonction d'affichage des matieres pour suppression
function listmatieresupp(){
  let comptmatiere = document.getElementById('comptmatiere');
  comptmatiere.style.display = 'block';
  let typmatsearch = document.getElementById('typmatsearch').value;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
}
}

xhr.open('GET','listmatieresupp.php?search='+typmatsearch);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les matieres selectionnez pour suppression
function listmatiereselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listmatiereselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de deselection des matieres selectionnez pour suppression
function listmatieredeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listmatieredeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de suppression d'une seul ligne
function suppUneMatiere(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listmatieresupp();

}
}
xhr.open('GET','suppUneMatiere.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de la creation des eleves
function enteteneweleve(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listneweleve();
}
}
xhr.open('GET','enteteneweleve.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire d'enregistrement d'un nouveau élève
function formneweleve(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('searchcritereleve').style.display = 'none';
  listelevedeselect();
}
}
xhr.open('GET','formneweleve.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion d'un nouveau élève
function insertneweleve(){
  let nomeleve = document.getElementById('nomcompleteleve');
  let matriculeleve = document.getElementById('matriculeleve');
  let datenaisseleve = document.getElementById('datenaisseleve');
  let lieunaisseleve = document.getElementById('lieunaisseleve');
  let prenomcompleteleve = document.getElementById('prenomcompleteleve');
  let sexeleve = document.getElementById('sexeleve');
  let nationalite = document.getElementById('nationalite');
  let adresse = document.getElementById('adresse');
  let maladie = document.getElementById('maladie');
  let apteEPS = document.getElementById('apteEPS');
  let autreinfo = document.getElementById('autreinfo');
  let photoeleve = document.getElementById('photoeleve');
  let nompere = document.getElementById('nompere');
  let telephonepere = document.getElementById('telephonepere');
  let nomere = document.getElementById('nomere');
  let telephonemere = document.getElementById('telephonemere');
  let nomtitteur = document.getElementById('nomtitteur');
  let phonetitteur = document.getElementById('phonetitteur');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinserteleve');
  corplogiciel.innerHTML = xhr.responseText;
  let re = xhr.responseText;
  if(re == '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouveau élève enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'){
   nomeleve.value = '';
   matriculeleve.value = '';
   datenaisseleve.value = '';
   sexeleve.value = '';
   adresse.value ='';
   maladie.value = '';
   apteEPS.value = 'oui';
   autreinfo.value = '';
   photoeleve.value = '';
   nompere.value ='';
   telephonepere.value = '';
   nomere.value = '';
   telephonemere.value = '';
   nomtitteur.value ='';
   phonetitteur.value = '';
   prenomcompleteleve.value = '';
  }
}
}
let form = new FormData();
form.append('nomeleve',nomeleve.value);
form.append('prenomeleve',prenomcompleteleve.value);
form.append('matriculeleve',matriculeleve.value);
form.append('datenaisseleve',datenaisseleve.value);
form.append('lieunaisseleve',lieunaisseleve.value);
form.append('sexeleve',sexeleve.value);
form.append('nationalite',nationalite.value);
form.append('adresse',adresse.value);
form.append('maladie',maladie.value);
form.append('apteEPS',apteEPS.value);
form.append('autreinfo',autreinfo.value);
form.append('photoeleve',photoeleve.files[0]);
form.append('nompere',nompere.value);
form.append('telephonepere',telephonepere.value);
form.append('nomere',nomere.value);
form.append('telephonemere',telephonemere.value);
form.append('nomtitteur',nomtitteur.value);
form.append('phonetitteur',phonetitteur.value);
xhr.open('POST','insertneweleve.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}


//fonction d'affichage de la liste des élèves enregistre
function listneweleve(){
  let sexeelevesearch = document.getElementById('sexeelevesearch').value;
  let nomeleve = document.getElementById('nomeleve').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';
  let comptclasse = document.getElementById('searchcritereleve');
  comptclasse.style.display = 'block';
  comptclasse.style.wordWrap = 'wrap';
  comptclasse.style.display = 'flex';
  compteleveenreg();
}
}
xhr.open('GET','listneweleve.php?sexe='+sexeelevesearch+'&nom='+nomeleve);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du nombre d'élève enregistrer
function compteleveenreg(){
  let sexeelevesearch = document.getElementById('sexeelevesearch').value;
  let nomeleve = document.getElementById('nomeleve').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('nbreelevenreg');
  corplogiciel.innerHTML = xhr.responseText;
  listelevedeselect();
}
}
xhr.open('GET','compteleveenreg.php?sexe='+sexeelevesearch+'&nom='+nomeleve);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des élèves enregistrer pour modification
function listnewelevemodif(){
  let sexeelevesearch = document.getElementById('sexeelevesearch').value;
  let nomeleve = document.getElementById('nomeleve').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';
  let comptclasse = document.getElementById('searchcritereleve');
  comptclasse.style.display = 'block';
  comptclasse.style.wordWrap = 'wrap';
  comptclasse.style.display = 'flex';
  listelevedeselect();
 }
}
xhr.open('GET','listnewelevemodif.php?sexe='+sexeelevesearch+'&nom='+nomeleve);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de modification de l'enregistrement d'un eleve
function formnewelevemodif(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  let comptclasse = document.getElementById('searchcritereleve');
  comptclasse.style.display = 'none';

 }
}
xhr.open('GET','formnewelevemodif.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modification d'un eleve
function insertmodifeleve(ident){
  let nomeleve = document.getElementById('nomelevemodif');
  let matriculeleve = document.getElementById('matriculelevemodif');
  let datenaisseleve = document.getElementById('datenaisselevemodif');
  let datentreeleve = document.getElementById('datentreelevemodif');
  let sexeleve = document.getElementById('sexelevemodif');
  let nationalite = document.getElementById('nationalitemodif');
  let adresse = document.getElementById('adressemodif');
  let maladie = document.getElementById('maladiemodif');
  let apteEPS = document.getElementById('apteEPSmodif');
  let autreinfo = document.getElementById('autreinfomodif');
  let photoeleve = document.getElementById('photoelevemodif');
  let nompere = document.getElementById('nomperemodif');
  let telephonepere = document.getElementById('telephoneperemodif');
  let nomere = document.getElementById('nomeremodif');
  let telephonemere = document.getElementById('telephonemeremodif');
  let nomtitteur = document.getElementById('nomtitteurmodif');
  let phonetitteur = document.getElementById('phonetitteurmodif');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertmodifeleve');
  corplogiciel.innerHTML = xhr.responseText;
  
}
}
let form = new FormData();
form.append('nomeleve',nomeleve.value)
form.append('matriculeleve',matriculeleve.value)
form.append('datenaisseleve',datenaisseleve.value)
form.append('datentreeleve',datentreeleve.value)
form.append('sexeleve',sexeleve.value)
form.append('nationalite',nationalite.value)
form.append('adresse',adresse.value)
form.append('maladie',maladie.value)
form.append('apteEPS',apteEPS.value)
form.append('autreinfo',autreinfo.value)
form.append('photoeleve',photoeleve.files[0])
form.append('nompere',nompere.value)
form.append('telephonepere',telephonepere.value)
form.append('nomere',nomere.value)
form.append('telephonemere',telephonemere.value)
form.append('nomtitteur',nomtitteur.value)
form.append('phonetitteur',phonetitteur.value)
form.append('ident',ident)
xhr.open('POST','insertmodifeleve.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage de la liste des élèves enregistrer pour suppression
function listnewelevesupp(){
  let sexeelevesearch = document.getElementById('sexeelevesearch').value;
  let nomeleve = document.getElementById('nomeleve').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';
  let comptclasse = document.getElementById('searchcritereleve');
  comptclasse.style.display = 'block';
  comptclasse.style.wordWrap = 'wrap';
  comptclasse.style.display = 'flex';
  compteleveenreg();
 }
}
xhr.open('GET','listnewelevesupp.php?sexe='+sexeelevesearch+'&nom='+nomeleve);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

// fonction permettant de savoir les eleves selectionnez pour suppression
function listeleveselectsupp(ident){
  let ligne = document.getElementById('ligne'+ident);
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resul = xhr.responseText;
  if(resul == 'oui'){
    ligne.style.background = 'rgba(149, 212, 250, 0.919)';
  }else if(resul == 'non'){
    ligne.style.background = 'white';
  }

}
}
xhr.open('GET','listeleveselectsupp.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de deselection des eleves selectionnez pour suppression
function listelevedeselect(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";


}
}
xhr.open('GET','listelevedeselect.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de suppression d'Une ligne d'eleve
function suppUneleve(ident){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listnewelevesupp();

 }
}
xhr.open('GET','suppUneleve.php?ident='+ident);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de l'inscription d'un élève
function enteteinscription(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listeleveinscript();
}
}
xhr.open('GET','enteteinscription.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des élèves enregistrer pour inscription 
function listelevenregInscription(){
  let searcheleveAinscript = document.getElementById('searcheleveAinscript');
  searcheleveAinscript.style.display = 'block';
  
  let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAinscript').value;

  let searcheleveAinsc = document.getElementById('searchcritereleve');
  searcheleveAinsc.style.display = 'block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','listelevenregInscription.php?nom='+nomeleveAinscript);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire d'inscription
function formInscription(ident){
  let searcheleveAinscript = document.getElementById('searchcritereleve');
  searcheleveAinscript.style.display = 'none';
  let sessionencours = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','formInscription.php?ident='+ident+'&sessionencours='+sessionencours);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'affichage des classe en fornction de la section choisi
function filtreclasse(){
  let searcheleveAinscript = document.getElementById('sectioninscript').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('classeinscriptionauto');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','filtreclasse.php?section='+searcheleveAinscript);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du montant a payer pour la classe choisi pour inscription
function montantclasseinscript(){
  let searcheleveAinscript = document.getElementById('classeinscriptionauto').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('montapayeinscript');
  corplogiciel.value = xhr.responseText;
}
}
xhr.open('GET','montantclasseinscript.php?classe='+searcheleveAinscript);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion d'une inscription
function insertinscription(){
  let nomeleveinscript = document.getElementById('nomeleveinscript');
  let matriculeinscript = document.getElementById('matriculeinscript');
  let sectioninscript = document.getElementById('sectioninscript');
  let classeinscriptionauto = document.getElementById('classeinscriptionauto');
  let montapayeinscript = document.getElementById('montapayeinscript');
  let montverseinscript = document.getElementById('montverseinscript');
  let redoublantinscript = document.getElementById('redoublantinscript');
  let dateinscript = document.getElementById('dateinscript');
  let sessionencour = document.getElementById('sessionencour');
  let heureinscript = document.getElementById('heureinscript');
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertinscription');
  corplogiciel.innerHTML = xhr.responseText;
  let re = xhr.responseText;
  if(re == '<div class="alert alert-success alert-dismissible fade show" role="alert">Inscription enregistrer avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'){
    affichrecuinscription(matriculeinscript,sessionencour);
  }
}
}
let form = new FormData();
form.append('nomeleveinscript',nomeleveinscript.value);
form.append('matriculeinscript',matriculeinscript.value);
form.append('sectioninscript',sectioninscript.value);
form.append('classeinscriptionauto',classeinscriptionauto.value);
form.append('montapayeinscript',montapayeinscript.value);
form.append('montverseinscript',montverseinscript.value);
form.append('redoublantinscript',redoublantinscript.value);
form.append('dateinscript',dateinscript.value);
form.append('heureinscript',heureinscript.value);
form.append('sessionencour',sessionencour.innerHTML);
xhr.open('POST','insertinscription.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage du reçu de payement de l'inscription
function affichrecuinscription(matricule,session){

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.style.width = '100%';
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','affichrecuinscription.php?matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'affichage de la liste des élèves inscript
function listeleveinscript(){
   let nomeleveAinscript = document.getElementById('nomeleveAinscript').value;
   let session = document.getElementById('sessionencour').innerHTML;
   let searcheleveAinscript = document.getElementById('searcheleveAinscript');
   searcheleveAinscript.style.display = 'none';
   
   let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.style.width = '1200px';
  corplogiciel.innerHTML = xhr.responseText;
  comptligneinscript();
}
}
xhr.open('GET','listeleveinscript.php?nomeleve='+nomeleveAinscript+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du nombre de ligne inscript
function comptligneinscript(){
  let session = document.getElementById('sessionencour').innerHTML;
 if(window.XMLHttpRequest){
   //Mozilla, safari, IE7+...
   xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
   //IE 6 et anterieur
   xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
 let spinner = document.getElementById('spinner').style.display="block";
}
if(xhr.readyState == 2 && xhr.status == 200){
 let spinner = document.getElementById('spinner').style.display="block"; 
}
if(xhr.readyState == 3 && xhr.status == 200){
 let spinner = document.getElementById('spinner').style.display="block";
}
if(xhr.readyState == 4 && xhr.status == 200){ 
 let spinner = document.getElementById('spinner').style.display="none";
 let corplogiciel = document.getElementById('nbreeleveinscript');
 corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','comptligneinscript.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des élèves inscript pour modification 
function listelevemodifInscription(){
  let searcheleveAinscript = document.getElementById('searcheleveAinscript');
  searcheleveAinscript.style.display = 'block';
  
  let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAinscript').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let searcheleveAinsc = document.getElementById('searchcritereleve');
  searcheleveAinsc.style.display = 'block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';

}
}
xhr.open('GET','listelevemodifInscription.php?nom='+nomeleveAinscript+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des details de versement des inscriptions
function affichdetailinscription(matricule){
  let searcheleveAinscript = document.getElementById('searcheleveAinscript');
  searcheleveAinscript.style.display = 'none';
  
  let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'none';
  let session = document.getElementById('sessionencour').innerHTML;
  let searcheleveAinsc = document.getElementById('searchcritereleve');
  searcheleveAinsc.style.display = 'none';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.style.width = '100%';
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','affichdetailinscription.php?matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'insertion du montant versé pour inscription
function insertmontverseinscription(ident,matricule){
  let searcheleveAinscript = document.getElementById('searcheleveAinscript');
  searcheleveAinscript.style.display = 'none';
  
  let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'none';
  let session = document.getElementById('sessionencour').innerHTML;
  let searcheleveAinsc = document.getElementById('searchcritereleve');
  searcheleveAinsc.style.display = 'none';
  let newmont = document.getElementById('newversecaisse').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  affichdetailinscription(matricule);
}
}
xhr.open('POST','insertmontverseinscription.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matricule)+'&session='+encodeURI(session)+'&ident='+encodeURI(ident)+'&newmont='+encodeURI(newmont));

}

//fonction de suppression d'un versement pour inscription
function suppversementinscription(ident,matricule){

  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  affichdetailinscription(matricule);
}
}
xhr.open('POST','suppversementinscription.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matricule)+'&session='+encodeURI(session)+'&ident='+encodeURI(ident));

}

//fonction d'affichage du recu d'un versement dans details
function affichrecudetail(ident,matricule){

  let session = document.getElementById('sessionencour').innerHTML;
  let blockrecuinscriptdetail = document.getElementById('blockrecuinscriptdetail').style.display='block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let contenurecudetail = document.getElementById('contenurecudetail');
  contenurecudetail.innerHTML = xhr.responseText;
}
}
xhr.open('POST','affichrecudetail.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matricule)+'&session='+encodeURI(session)+'&ident='+encodeURI(ident));

}

//block de code permettant l'impression
function imprime_bloc(titre,objet){
   //definition de la zone a imprimer
   var zone=document.getElementById(objet).innerHTML;
   //overture du popup
   var fen=window.open("","","height=500,width=600,toolbar=0,menubar=0,scrollbars=1,resizable=1,status=0,location=0,left=30,top=10");
   //style du popup
   fen.document.body.style.color='#000000';
   fen.document.body.style.backgroundColor='#FFFFFF';
   fen.document.body.style.padding="20px";
   fen.document.body.style.textAlign="center";
   fen.document.body.style.width="95%";
   fen.document.body.style.backgroundImage="url('./eleve/9d8b625991014e904b309f301fdea7f7.jpg')";
   //ajout des donnees a imprimer
   fen.document.title=titre;
   fen.document.body.innerHTML+=""+zone+"";
   //impression du popup
   fen.window.print();
   //fermeture du popup
   fen.window.close();
   return true;
}


//fonction de modification de l'inscription d'un élève
function formodifinscription(ident,matricule){
  let searcheleveAinscript = document.getElementById('searcheleveAinscript');
  searcheleveAinscript.style.display = 'none';
  let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'none';
  let searcheleveAinsc = document.getElementById('searchcritereleve');
  searcheleveAinsc.style.display = 'none';
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let contenurecudetail = document.getElementById('corplogiciel');
  contenurecudetail.style.width = '100%';
  contenurecudetail.innerHTML = xhr.responseText;
}
}
xhr.open('POST','affichformodifinscript.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matricule)+'&session='+encodeURI(session)+'&ident='+encodeURI(ident));

}

//fonction d'affichage de la classe de l'eleve pour modification
function afichclassinscriptmodif(){
 let section = document.getElementById('newsectioninscript').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let contenurecudetail = document.getElementById('newclasseinscript');
  contenurecudetail.innerHTML = xhr.responseText;
}
}
xhr.open('GET','afichclassinscriptmodif.php?section='+section);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la modification de l'inscription
function insertmodifinscription(ident,matricule){
  let section = document.getElementById('newsectioninscript').value;
  let classe = document.getElementById('newclasseinscript').value;
  let session = document.getElementById('sessionencour').innerHTML;
   if(window.XMLHttpRequest){
     //Mozilla, safari, IE7+...
     xhr = new XMLHttpRequest();
 }else if(window.ActiveXObject){
     //IE 6 et anterieur
     xhr = new ActiveXObject("Microsoft.XMLHTTP");
 }
 xhr.onreadystatechange = function (){ 
 if(xhr.readyState == 1 && xhr.status == 200){
   let spinner = document.getElementById('spinner').style.display="block";
  }
  if(xhr.readyState == 2 && xhr.status == 200){
   let spinner = document.getElementById('spinner').style.display="block"; 
  }
  if(xhr.readyState == 3 && xhr.status == 200){
   let spinner = document.getElementById('spinner').style.display="block";
  }
 if(xhr.readyState == 4 && xhr.status == 200){ 
   let spinner = document.getElementById('spinner').style.display="none";
   let contenurecudetail = document.getElementById('resultmodifinscript');
   contenurecudetail.innerHTML = xhr.responseText;
 }
 }
 xhr.open('POST','insertmodifinscription.php');
 xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhr.send('section='+encodeURI(section)+'&classe='+encodeURI(classe)+'&session='+encodeURI(session)+'&ident='+encodeURI(ident)+'&matricule='+encodeURI(matricule));
 
 }

 //fonction d'affichage de la liste des élèves inscript pour suppression
function listelevesuppInscription(){
  let searcheleveAinscript = document.getElementById('searcheleveAinscript');
  searcheleveAinscript.style.display = 'block';
  
  let nbreeleveinscript = document.getElementById('blocknbrelign').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAinscript').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let searcheleveAinsc = document.getElementById('searchcritereleve');
  searcheleveAinsc.style.display = 'block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1500px';

}
}
xhr.open('GET','listelevesuppInscription.php?nom='+nomeleveAinscript+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction de suppression des inscriptions
function suppInscription(ident,matricule){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listelevesuppInscription();

}
}
xhr.open('GET','suppInscription.php?ident='+ident+'&matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete des scolarite
function entetescolarite(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listeleveScolarite();
}
}
xhr.open('GET','entetescolarite.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des élèves inscript(ayant fini la scolarité) pour payement de la scolarité 
function listeleveInscriptScolarite(){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'block';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAscolarite').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let rechercheclassescolarite = document.getElementById('rechercheclassescolarite').value;
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','listeleveInscriptScolarite.php?nom='+nomeleveAinscript+'&session='+session+'&classe='+rechercheclassescolarite);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


//fonction d'affichage du formulaire de payement de la scolarité
function formverseScolarite(matricule){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'none';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'none';
  let session = document.getElementById('sessionencour').innerHTML;
  let searchcriterelevescolarite = document.getElementById('searchcriterelevescolarite').style.display = 'none';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','formverseScolarite.php?matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion du versement de la scolarite
function insertScolarite(){
    let session = document.getElementById('sessionencour').innerHTML;
    let matriculescolarite = document.getElementById('matriculescolarite').value;
    let montversescolarite = document.getElementById('montversescolarite').value;
    let datescolarite = document.getElementById('datescolarite').value;
    let heurescolarite = document.getElementById('heurescolarite').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertscolarite');
  corplogiciel.innerHTML = xhr.responseText;
  affichrecuscolarite(matriculescolarite,session);
}
}
xhr.open('POST','insertScolarite.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matriculescolarite)+'&session='+encodeURI(session)+'&montverse='+encodeURI(montversescolarite)+'&date='+encodeURI(datescolarite)+'&heure='+encodeURI(heurescolarite));

}

//fonction d'affichage de la liste des élèves ayant versé les frais scolaire 
function listeleveScolarite(){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'block';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAscolarite').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let rechercheclassescolarite = document.getElementById('rechercheclassescolarite').value;
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1200px';

}
}
xhr.open('GET','listeleveScolarite.php?nom='+nomeleveAinscript+'&session='+session+'&classe='+rechercheclassescolarite);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des scolarite pour modification
function listeleveScolaritemodif(){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'block';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAscolarite').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let rechercheclassescolarite = document.getElementById('rechercheclassescolarite').value;
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'block';
  let searchcriterelevescolarite = document.getElementById('searchcriterelevescolarite');
  searchcriterelevescolarite.style.display='block';
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1200px';

}
}
xhr.open('GET','listeleveScolaritemodif.php?nom='+nomeleveAinscript+'&session='+session+'&classe='+rechercheclassescolarite);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des details de versement de la scolarite
function detailScolarite(matricule){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'none';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let session = document.getElementById('sessionencour').innerHTML;
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'none';
  let searchcriterelevescolarite = document.getElementById('searchcriterelevescolarite').style.display='none';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','detailScolarite.php?matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modification d'un ersement
function insertmodifersescolarite(ident,matricule){
  let newversecaissescolarite = document.getElementById('newmontscolarite'+ident).value;
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
  detailScolarite(matricule);
}
}
xhr.open('POST','insertmodifersescolarite.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('ident='+encodeURI(ident)+'&montverse='+encodeURI(newversecaissescolarite)+'&session='+encodeURI(session)+'&matricule='+encodeURI(matricule));

}

//fonction de supprression d'un versement pour la scolarite
function suppversescolarite(ident,matricule){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  detailScolarite(matricule);
}
}
xhr.open('POST','suppversescolarite.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('ident='+encodeURI(ident)+'&matricule='+encodeURI(matricule)+'&session='+encodeURI(session));

}

//fonction d'affichage du recu d'un versement dans details pour scolarite
function affichrecudetailscolarite(ident,matricule){

  let session = document.getElementById('sessionencour').innerHTML;
  let blockrecuinscriptdetail = document.getElementById('blockrecuinscriptdetail').style.display='block';
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let contenurecudetail = document.getElementById('contenurecudetail');
  contenurecudetail.innerHTML = xhr.responseText;
}
}
xhr.open('POST','affichrecudetailscolarite.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matricule)+'&session='+encodeURI(session)+'&ident='+encodeURI(ident));

}

//fonction d'affichage du reçu de payement de la scolarite
function affichrecuscolarite(matricule,session){

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.style.width = '100%';
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','affichrecuscolarite.php?matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des scolarite pour supression
function listeleveScolaritesupp(){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'block';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAscolarite').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let rechercheclassescolarite = document.getElementById('rechercheclassescolarite').value;
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'block';
  let searchcriterelevescolarite = document.getElementById('searchcriterelevescolarite');
  searchcriterelevescolarite.style.display='block';
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1200px';

}
}
xhr.open('GET','listeleveScolaritesupp.php?nom='+nomeleveAinscript+'&session='+session+'&classe='+rechercheclassescolarite);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}



//fonction d'affichage de la liste des scolarite pour supression
function listeleveScolaritesupp(){
  let searcheleveAinscript = document.getElementById('searcheleveAscolarite');
  searcheleveAinscript.style.display = 'block';
  let nbreeleveinscript = document.getElementById('blocknbrelignscolarite').style.display = 'none';
  let nomeleveAinscript = document.getElementById('nomeleveAscolarite').value;
  let session = document.getElementById('sessionencour').innerHTML;
  let rechercheclassescolarite = document.getElementById('rechercheclassescolarite').value;
  let searchclassescolarite = document.getElementById('searchclassescolarite').style.display = 'block';
  let searchcriterelevescolarite = document.getElementById('searchcriterelevescolarite');
  searchcriterelevescolarite.style.display='block';
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '1200px';

}
}
xhr.open('GET','listeleveScolaritesupp.php?nom='+nomeleveAinscript+'&session='+session+'&classe='+rechercheclassescolarite);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}
//fonction de suppression de tous les versement de la scolarite pour une session precise
function versementScolaritesupp(matricule,ident){
  let session = document.getElementById('sessionencour').innerHTML;
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listeleveScolaritesupp();
}
}
xhr.open('POST','versementScolaritesupp.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('matricule='+encodeURI(matricule)+'&ident='+encodeURI(ident)+'&session='+encodeURI(session));

}

//fonction d'affichage de l'entete de programmation des professeur
function enteteprogrameprof(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','enteteprogrammeprof.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des scolarite pour modification
function listnewprogrammeprof(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'block';
  let nomprofprogramme = document.getElementById('nomprofprogramme').value;
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','listnewprogrammeprof.php?nomprof='+nomprofprogramme);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de la gestion des jours de cours
function entetepjourcour(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listjourcour();
}
}
xhr.open('GET','entetepjourcour.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de creation des jour de cours
function formnewjour(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','formnewjour.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des jour de cours
function insertnewjour(){
  let nomjourcour = document.getElementById('nomjourcour').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertjour');
  corplogiciel.innerHTML = xhr.responseText;

}
}
xhr.open('POST','insertnewjour.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomjourcour='+encodeURI(nomjourcour));

}

//fonction d'affichage de la liste des cours
function listjourcour(){
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','listjourcour.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des cours pour modification
function listjourcourmodif(){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('GET','listjourcourmodif.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

  //fonction d'affichage du formulaire de modification des jours de cour
function formmodifjour(ident){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('GET','formmodifjour.php?ident='+ident);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

    //fonction d'insertion des modification des jours de cours
function insertmodifjour(ident){
  let modifnomjourcour = document.getElementById('modifnomjourcour').value;
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('resultinsertmodifjour');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('POST','insertmodifjour.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('ident='+encodeURI(ident)+'&nomjour='+encodeURI(modifnomjourcour));
  
  }

  //fonction d'affichage de la liste des cours pour suppression
function listjourcoursupp(){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('GET','listjourcoursupp.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

    //fonction de suppression des jours de cours
function suppjourcour(ident){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    listjourcoursupp();
  }
  }
  xhr.open('GET','suppjourcour.php?ident='+ident);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

  //fonction d'affichage de l'entete de la gestion des heures de cours
function enteteheurecour(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listperiode();
}
}
xhr.open('GET','enteteheurecour.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de creation des heures de cours
function formnewheure(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('GET','formnewheure.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des période de cours
function insertperiode(){
  let heurdebutperiode = document.getElementById('heurdebutperiode').value;
  let heurfinperiode = document.getElementById('heurfinperiode').value;
  let typeperiode = document.getElementById('typeperiode').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertperiode');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('POST','insertperiode.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('heurdebutperiode='+encodeURI(heurdebutperiode)+'&heurfinperiode='+encodeURI(heurfinperiode)+'&typeperiode='+encodeURI(typeperiode));

}

//fonction d'insertion des période de cours
function listperiode(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';

}
}
xhr.open('POST','listperiode.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des periodes pour modification
function listperiodemodif(){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('GET','listperiodemodif.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

  //fonction d'affichage du formulaire de modification des periodes
function formodifperiode(ident){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('GET','formodifperiode.php?ident='+ident);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

 //fonction d'insertion des modification des heures de cours
function insertmodifperiode(ident){
  let heurdebutperiodemodif = document.getElementById('heurdebutperiodemodif').value;
  let heurfinperiodemodif = document.getElementById('heurfinperiodemodif').value;
  let typeperiodemodif = document.getElementById('typeperiodemodif').value;
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('resultinsertmodifperiode');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('POST','insertmodifperiode.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('ident='+encodeURI(ident)+'&heurdebutperiodemodif='+encodeURI(heurdebutperiodemodif)+'&heurfinperiodemodif='+encodeURI(heurfinperiodemodif)+'&typeperiodemodif='+encodeURI(typeperiodemodif));
  
  }

  //fonction d'affichage de la liste des périodes pour suppression
function listperiodesupp(){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  
  }
  }
  xhr.open('GET','listperiodesupp.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

  //fonction de suppression des periodes
function supplistperiode(ident){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    listperiodesupp();
  }
  }
  xhr.open('GET','supplistperiode.php?ident='+ident);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

    //fonction d'affichage du formulaire de programmation des cours
function formprogrammeprof(ident){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('GET','formprogrammeprof.php?ident='+ident);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }


     //fonction de calcul du nombre d'heure de cours dans un classe
function nbreheurecours(){
  let heuredeubutprogram = document.getElementById('heuredeubutprogram').value;
  let heurefinprogram = document.getElementById('heurefinprogram').value;
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let nbreheurprogram = document.getElementById('nbreheurprogram');
    nbreheurprogram.value = xhr.responseText;
  }
  }
  xhr.open('POST','nbreeurecours.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('heuredeubutprogram='+encodeURI(heuredeubutprogram)+'&heurefinprogram='+encodeURI(heurefinprogram));
  
  }

      //fonction d'insertion de la programmation d'un professeur
function insertprogramprof(ident){
  let matiereprogramme = document.getElementById('matiereprogramme');
  let classeprogramme = document.getElementById('classeprogramme');
  let jourprogramme = document.getElementById('jourprogramme');
  let heuredeubutprogram = document.getElementById('heuredeubutprogram');
  let heurefinprogram = document.getElementById('heurefinprogram');
  let paieheurprogram = document.getElementById('paieheurprogram');
  let session = document.getElementById('sessionencour');
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let resultinsertprogram = document.getElementById('resultinsertprogram');
    resultinsertprogram.innerHTML = xhr.responseText;
  }
  }
  let form = new FormData();
  form.append('ident', ident);
  form.append('matiereprogramme', matiereprogramme.value);
  form.append('classeprogramme', classeprogramme.value);
  form.append('jourprogramme', jourprogramme.value);
  form.append('heuredeubutprogram', heuredeubutprogram.value);
  form.append('heurefinprogram', heurefinprogram.value);
  form.append('paieheurprogram', paieheurprogram.value);
  form.append('session', session.innerHTML);
  xhr.open('POST','insertprogramprof.php');
  //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(form);
  
  }

       //fonction d'affichage de la liste des classe pour emploi de temps
function kelemploitemps(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','kelemploitemps.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }


         //fonction d'affichage des emplois de temps d'une classe
function emploitempsclasse(ident){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','emploitempsclasse.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('ident='+encodeURI(ident)+'&session='+encodeURI(session));
  
  }

          //fonction d'affichage de l'heure de fin apres le choix de l'heure de debut
function affichheurefinprogram(){
  let heuredeubutprogram = document.getElementById('heuredeubutprogram').value;

  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementyId('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let heurefinprogram = document.getElementById('heurefinprogram');
    heurefinprogram.value = xhr.responseText;
  }
  }
  xhr.open('GET','affichheurefinprogram.php?heuredebut='+heuredeubutprogram);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

        //fonction d'affichage de la liste des professeurs pour emploi de temps
function kelprofpoueemploitemps(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','kelprofpoueemploitemps.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

           //fonction d'affichage des emplois de temps d'un professeur
function emploitempsprof(ident){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','emploitempsprof.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('ident='+encodeURI(ident)+'&session='+encodeURI(session));
  
  }

     //fonction d'affichage des classes pour la modification de l'emploi de temps
function classepourmodification(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','classepourmodification.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

       //fonction d'affichage de tout les professeurs programmé dans une classe x pour modification
function profprogrammemodif(ident){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','profprogrammemodif.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('ident='+encodeURI(ident));
  
  }

     //fonction d'affichage de l'heure de fin apres le choix de l'heure de debut dans la modification
function affichheurefinprogrammodif(identprog){
  let heuredebutmodifprogram = document.getElementById('heuredebutmodifprogram'+identprog).value;

  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementyId('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let heurefinmodifprogram = document.getElementById('heurefinmodifprogram'+identprog);
    heurefinmodifprogram.value = xhr.responseText;
  }
  }
  xhr.open('GET','affichheurefinprogrammodif.php?heuredebut='+heuredebutmodifprogram);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

        //fonction d'insertion des modification de la programmation d'un prof dans une classe x
function insertmodifprogramprof(ident,identprogram){
  let matiereprogramme = document.getElementById('matieremodifprogram'+identprogram);
  let classeprogramme = ident+identprogram;
  let jourprogramme = document.getElementById('jourmodifprogram'+identprogram);
  let heuredeubutprogram = document.getElementById('heuredebutmodifprogram'+identprogram);
  let heurefinprogram = document.getElementById('heurefinmodifprogram'+identprogram);
  let paieheurprogram = document.getElementById('paieheurmodifprogram'+identprogram);
  let profmodifprogram = document.getElementById('profmodifprogram'+identprogram);
  let session = document.getElementById('sessionencour');
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let resulmodifprogram = document.getElementById('resulmodifprogram');
    resulmodifprogram.innerHTML = xhr.responseText;
    profprogrammemodif(ident);
  }
  }
  let form = new FormData();
  form.append('ident', profmodifprogram.value);
  form.append('matiereprogramme', matiereprogramme.value);
  form.append('classeprogramme', ident);
  form.append('jourprogramme', jourprogramme.value);
  form.append('heuredeubutprogram', heuredeubutprogram.value);
  form.append('heurefinprogram', heurefinprogram.value);
  form.append('paieheurprogram', paieheurprogram.value);
  form.append('session', session.innerHTML);
  form.append('identprogram', identprogram);
  xhr.open('POST','insertmodifprogramprof.php');
  //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(form);
  
  }

      //fonction d'affichage des classes pour la suppression de l'emploi de temps
function classepoursuppression(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','classepoursuppression.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

    //fonction d'affichage de tout les professeurs programmé dans une classe x pour la suppression
function profprogrammesupp(ident){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }
  xhr.open('POST','profprogrammesupp.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('ident='+encodeURI(ident));
  
  }

       //fonction de suppression de la programmation d'un prof dans une classe x
function suppprogramprof(ident,identprogram){
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    profprogrammesupp(ident);
  }
  }

  xhr.open('POST','suppprogramprof.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('identprogram='+encodeURI(identprogram));
  
  }

 //fonction d'affichage des type d'exportation
function typexportation(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }

  xhr.open('POST','typexportation.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

   //fonction d'affichage des classe a choisir pour exportation
function classeexportemploitemps(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }

  xhr.open('POST','classeexportemploitemps.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

    //fonction d'affichage des professeurs a choisir pour exportation
function profexportemploitemps(){
  let searchcriterprogramprof = document.getElementById('searchcriterprogramprof');
  searchcriterprogramprof.style.display = 'none';
  if(window.XMLHttpRequest){
      //Mozilla, safari, IE7+...
      xhr = new XMLHttpRequest();
  }else if(window.ActiveXObject){
      //IE 6 et anterieur
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange = function (){ 
  if(xhr.readyState == 1 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
   if(xhr.readyState == 2 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block"; 
   }
   if(xhr.readyState == 3 && xhr.status == 200){
    let spinner = document.getElementById('spinner').style.display="block";
   }
  if(xhr.readyState == 4 && xhr.status == 200){ 
    let spinner = document.getElementById('spinner').style.display="none";
    let corplogiciel = document.getElementById('corplogiciel');
    corplogiciel.innerHTML = xhr.responseText;
    corplogiciel.style.width = '100%';
  }
  }

  xhr.open('POST','profexportemploitemps.php');
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
  
  }

  
//fonction d'affichage de l'entete des notes
function enteteNotes(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','entetenewnotes.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

      //fonction d'affichage des classes pour la le remplisage des notes
      function classepournewnotes(){
        let searchnote = document.getElementById('searchnote').style.display = 'none';
        if(window.XMLHttpRequest){
            //Mozilla, safari, IE7+...
            xhr = new XMLHttpRequest();
        }else if(window.ActiveXObject){
            //IE 6 et anterieur
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function (){ 
        if(xhr.readyState == 1 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
         if(xhr.readyState == 2 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block"; 
         }
         if(xhr.readyState == 3 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
        if(xhr.readyState == 4 && xhr.status == 200){ 
          let spinner = document.getElementById('spinner').style.display="none";
          let corplogiciel = document.getElementById('corplogiciel');
          corplogiciel.innerHTML = xhr.responseText;
          corplogiciel.style.width = '100%';
        }
        }
        xhr.open('POST','classepournewnote.php');
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
        
        }

        //fonction d'affichage des eleves d'une classe x pour attribution de note
      function listelevenote(ident){
        let searchnote = document.getElementById('searchnote').style.display = 'none';
        let session = document.getElementById('sessionencour').innerHTML;
        if(window.XMLHttpRequest){
            //Mozilla, safari, IE7+...
            xhr = new XMLHttpRequest();
        }else if(window.ActiveXObject){
            //IE 6 et anterieur
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function (){ 
        if(xhr.readyState == 1 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
         if(xhr.readyState == 2 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block"; 
         }
         if(xhr.readyState == 3 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
        if(xhr.readyState == 4 && xhr.status == 200){ 
          let spinner = document.getElementById('spinner').style.display="none";
          let corplogiciel = document.getElementById('corplogiciel');
          corplogiciel.innerHTML = xhr.responseText;
          corplogiciel.style.width = '100%';
        }
        }
        xhr.open('GET','listelevenote.php?idclasse='+ident+'&session='+session);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
        
        }

     //fonction d'insertion des notes d'une classe
      function insertnoteclasse(ident,param){
        if(param == '0'){
          let searchnote = document.getElementById('searchnote').style.display = 'none';
          let session = document.getElementById('sessionencour');
        }
        if(param == '1'){
          let session = '';
        }
        
        let seqnote = document.getElementById('seqnote');
        let matierenote = document.getElementById('matierenote');
        let coefnote = document.getElementById('coefnote');
        let nbreligneeleve = document.getElementById('nbreligneeleve');
        
        if(window.XMLHttpRequest){
            //Mozilla, safari, IE7+...
            xhr = new XMLHttpRequest();
        }else if(window.ActiveXObject){
            //IE 6 et anterieur
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function (){ 
        if(xhr.readyState == 1 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
         if(xhr.readyState == 2 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block"; 
         }
         if(xhr.readyState == 3 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
        if(xhr.readyState == 4 && xhr.status == 200){ 
          let spinner = document.getElementById('spinner').style.display="none";
           let resultinsertnote = document.getElementById('resultinsertnote');
           resultinsertnote.innerHTML = xhr.responseText;
        }
        }
        let nbrli = nbreligneeleve.value;
        let form = new FormData();
        for(let not = 1;not < nbrli; not++){
          let notess = document.getElementById('note'+not);
          form.append('notes'+not, notess.value);
        }
        for(let matr = 1;matr < nbrli; matr++){
          let matricul = document.getElementById('mat'+matr);
          form.append('matricule'+matr, matricul.value);
        }
        form.append('seqnote', seqnote.value);
        form.append('matierenote', matierenote.value);
        form.append('coefnote', coefnote.value);
        form.append('nbreligneeleve', nbreligneeleve.value);
        if(param == '0'){
          form.append('session', session.innerHTML);
        }
        if(param == '1'){
          form.append('session', '');
        }
        
        form.append('ident', ident);
        xhr.open('POST','insertnoteeleve.php');
        //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(form);
        
        }

     //fonction d'affichage des classes pour la liste des note
     function classepourlistnotes(){
      let searchnote = document.getElementById('searchnote').style.display = 'none';
      if(window.XMLHttpRequest){
          //Mozilla, safari, IE7+...
          xhr = new XMLHttpRequest();
      }else if(window.ActiveXObject){
          //IE 6 et anterieur
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xhr.onreadystatechange = function (){ 
      if(xhr.readyState == 1 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block";
       }
       if(xhr.readyState == 2 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block"; 
       }
       if(xhr.readyState == 3 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block";
       }
      if(xhr.readyState == 4 && xhr.status == 200){ 
        let spinner = document.getElementById('spinner').style.display="none";
        let corplogiciel = document.getElementById('corplogiciel');
        corplogiciel.innerHTML = xhr.responseText;
        corplogiciel.style.width = '100%';
      }
      }
      xhr.open('POST','classepourlistnote.php');
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();
      
      }

           //fonction d'affichage de la liste des notes d'une classe x
     function listnoteclasseX(classe){
      let searchnote = document.getElementById('searchnote').style.display = 'none';
      if(window.XMLHttpRequest){
          //Mozilla, safari, IE7+...
          xhr = new XMLHttpRequest();
      }else if(window.ActiveXObject){
          //IE 6 et anterieur
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xhr.onreadystatechange = function (){ 
      if(xhr.readyState == 1 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block";
       }
       if(xhr.readyState == 2 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block"; 
       }
       if(xhr.readyState == 3 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block";
       }
      if(xhr.readyState == 4 && xhr.status == 200){ 
        let spinner = document.getElementById('spinner').style.display="none";
        let corplogiciel = document.getElementById('corplogiciel');
        corplogiciel.innerHTML = xhr.responseText;
        corplogiciel.style.width = '100%';
      }
      }
      xhr.open('GET','listnoteclasseX.php?classe='+classe);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();
      
      }

      //fonction d'affichage des classes pour la modification des notes
     function classepourmodifnotes(){
      let searchnote = document.getElementById('searchnote').style.display = 'none';
      if(window.XMLHttpRequest){
          //Mozilla, safari, IE7+...
          xhr = new XMLHttpRequest();
      }else if(window.ActiveXObject){
          //IE 6 et anterieur
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xhr.onreadystatechange = function (){ 
      if(xhr.readyState == 1 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block";
       }
       if(xhr.readyState == 2 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block"; 
       }
       if(xhr.readyState == 3 && xhr.status == 200){
        let spinner = document.getElementById('spinner').style.display="block";
       }
      if(xhr.readyState == 4 && xhr.status == 200){ 
        let spinner = document.getElementById('spinner').style.display="none";
        let corplogiciel = document.getElementById('corplogiciel');
        corplogiciel.innerHTML = xhr.responseText;
        corplogiciel.style.width = '100%';
      }
      }
      xhr.open('POST','classepourmodifnote.php');
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();
      
      }

         //fonction d'affichage de la liste des notes d'une classe x pour modification
         function listnoteclassemodif(classe){
          let searchnote = document.getElementById('searchnote').style.display = 'none';
          if(window.XMLHttpRequest){
              //Mozilla, safari, IE7+...
              xhr = new XMLHttpRequest();
          }else if(window.ActiveXObject){
              //IE 6 et anterieur
              xhr = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xhr.onreadystatechange = function (){ 
          if(xhr.readyState == 1 && xhr.status == 200){
            let spinner = document.getElementById('spinner').style.display="block";
           }
           if(xhr.readyState == 2 && xhr.status == 200){
            let spinner = document.getElementById('spinner').style.display="block"; 
           }
           if(xhr.readyState == 3 && xhr.status == 200){
            let spinner = document.getElementById('spinner').style.display="block";
           }
          if(xhr.readyState == 4 && xhr.status == 200){ 
            let spinner = document.getElementById('spinner').style.display="none";
            let corplogiciel = document.getElementById('corplogiciel');
            corplogiciel.innerHTML = xhr.responseText;
            corplogiciel.style.width = '100%';
          }
          }
          xhr.open('GET','listnoteclassemodif.php?classe='+classe);
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhr.send();
          
          }


       //fonction d'affichage des notes pour modification d'une matiere
       function choixseqmqtiere(){
        let searchnote = document.getElementById('searchnote').style.display = 'none';
        let seqnotemodif = document.getElementById('seqnotemodif').value;
        let matierenotemodif = document.getElementById('matierenotemodif').value;
        let classenote = document.getElementById('classenote').value;
        let session = document.getElementById('sessionencour').innerHTML;

        if(window.XMLHttpRequest){
            //Mozilla, safari, IE7+...
            xhr = new XMLHttpRequest();
        }else if(window.ActiveXObject){
            //IE 6 et anterieur
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function (){ 
        if(xhr.readyState == 1 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
         if(xhr.readyState == 2 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block"; 
         }
         if(xhr.readyState == 3 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
        if(xhr.readyState == 4 && xhr.status == 200){ 
          let spinner = document.getElementById('spinner').style.display="none";
          let corplogiciel = document.getElementById('zonenotemodif');
          corplogiciel.innerHTML = xhr.responseText;
        }
        }
        xhr.open('GET','choixseqmqtiere.php?sequence='+seqnotemodif+'&matiere='+matierenotemodif+'&classenote='+classenote+'&session='+session);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
        
        }


//fonction d'insertion des modification des notes d'une classe
function insertmodifnoteclasse(classe){
let searchnote = document.getElementById('searchnote').style.display = 'none';
let coefinsertmodif = document.getElementById('coefinsertmodif');
let nbrelignmodif = document.getElementById('nbrelignmodif');
let matierenotmodif = document.getElementById('matierenotmodif');
let sequencenotmodif = document.getElementById('sequencenotmodif');
let session = document.getElementById('sessionencour');
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
  }
  if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
  }
  if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
  }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
    let resultinsertmodifnote = document.getElementById('resultinsertmodifnotes');
    resultinsertmodifnote.innerHTML = xhr.responseText;
}
}
let nbrli = nbrelignmodif.value;
let form = new FormData();
for(let not = 1;not < nbrli; not++){
  let notess = document.getElementById('noteinsertmodif'+not);
  form.append('notes'+not, notess.value);
}
for(let matr = 1;matr < nbrli; matr++){
  let matricul = document.getElementById('matriinsertmodif'+matr);
  form.append('matricule'+matr, matricul.value);
}

form.append('coefinsertmodif', coefinsertmodif.value);
form.append('nbrelignmodif', nbrelignmodif.value);
form.append('matierenotmodif', matierenotmodif.value);
form.append('sequencenotmodif', sequencenotmodif.value);
form.append('session', session.innerHTML);
form.append('classe', classe);
xhr.open('POST','insertmodifnoteclasse.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage de l'entete de la discipline des élèves
function entetedisciplineeleve(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','entetedisciplineeleve.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des classes pour effectuer un appel
function listclassappel(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listclassappel.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste d'appel d'une classe x
function listappel(classe){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listappel.php?classe='+classe);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'heure de fin de la periode des absence
function finperiodeabsence(classe){
  let heuredebutabsence = document.getElementById('heuredebutabsence').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let heurefinabsence = document.getElementById('heurefinabsence');
  heurefinabsence.value = xhr.responseText;
  ficheappel(classe);
}
}
xhr.open('GET','finperiodeabsence.php?debut='+heuredebutabsence);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la fiche d'appel
function ficheappel(classe){
  let heuredebutabsence = document.getElementById('heuredebutabsence').value;
  let heurefinabsence = document.getElementById('heurefinabsence').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let heurefinabsence = document.getElementById('zoneficheappel');
  heurefinabsence.innerHTML = xhr.responseText;
}
}
xhr.open('POST','ficheappel.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('heurfin='+encodeURI(heurefinabsence)+'&heuredebut='+encodeURI(heuredebutabsence)+'&classe='+classe);

}

//fonction d'insertion de l'absence d'un eleve
function insertabsenceeleve(matricule){
  let heuredebutabsence = document.getElementById('heurdebutinsertabsence').value;
  let heurefinabsence = document.getElementById('heurfininsertabsence').value;
  let classe = document.getElementById('classeinsertabsence').value;
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resultinsertappel = document.getElementById('resultinsertappel');
  resultinsertappel.innerHTML = xhr.responseText;
  ficheappel(classe);
}
}
xhr.open('POST','insertabsenceeleve.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('heurfin='+encodeURI(heurefinabsence)+'&heuredebut='+encodeURI(heuredebutabsence)+'&classe='+classe+'&matricule='+encodeURI(matricule)+'&session='+encodeURI(session));

}

//fonction d'affichage des classes pour avoir la liste des absents
function listabsentclass(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listabsentclass.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des élèves absent dans une classe x
function listabsent(classe){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listabsent.php?classe='+classe+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des classes pour justifier une absence
function listclassjustifiabsence(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listclassjustifiabsence.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des élèves absent dans une classe x pour justification
function listabsentjustifier(classe){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listabsentjustifier.php?classe='+classe+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la justification d'une absence
function insertabsentjustifier(idabsent,classe){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listabsentjustifier(classe);
}
}
xhr.open('GET','insertabsentjustifier.php?idabsent='+idabsent);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage et de programmation des conseil de discipline
function gestconseildiscipline(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','gestconseildiscipline.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion d'un nouveau conseil de discipline
function insertnewconseil(){
  let session = document.getElementById('sessionencour').innerHTML;
  let lieuconseil = document.getElementById('lieuconseil').value;
  let dateconseil = document.getElementById('dateconseil').value;
  let heurconseil = document.getElementById('heurconseil').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resultinsertconseil = document.getElementById("resultinsertconseil");
  resultinsertconseil.innerHTML = xhr.responseText;
  listconseilprogramme();
}
}
xhr.open('POST','insertnewconseil.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('session='+encodeURI(session)+'&lieu='+encodeURI(lieuconseil)+'&date='+encodeURI(dateconseil)+'&heurconseil='+encodeURI(heurconseil));

}

//fonction d'affichage de la liste des conseil programmé
function listconseilprogramme(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let resultinsertconseil = document.getElementById("zoneaffichconseil");
  resultinsertconseil.innerHTML = xhr.responseText;
}
}
xhr.open('POST','listconseilprogramme.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}



//fonction d'affichage des classes pour trauire un ou plusieurs élève(s) au conseil de discipline 
function listclasstraduireconseil(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listclasstraduireconseil.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des élèves d'une classe x pour choisir un élève au conseil de discipline
function listelevetraduit(classe){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listelevetraduit.php?classe='+classe);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de traduction de l'élève x au conseil de discipline
function formtraduitconseil(matricule,classe){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formtraduitconseil.php?matricule='+matricule+'&classe='+classe+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des traduction d'un eleve au conseil de discipline
function inserttraduitconseil(matricule){
  let session = document.getElementById('sessionencour').innerHTML;
  let idclassetraduit = document.getElementById('idclassetraduit').value;
  let idconseiltraduir = document.getElementById('idconseiltraduir').value;
  let motiftraduit = document.getElementById('motiftraduit').value;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resulttraduitconseil');
  corplogiciel.innerHTML = xhr.responseText;

}
}
xhr.open('POST','inserttraduitconseil.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('session='+encodeURI(session)+'&idclasse='+encodeURI(idclassetraduit)+'&idconseil='+encodeURI(idconseiltraduir)+'&motif='+encodeURI(motiftraduit)+'&matricule='+encodeURI(matricule));

}

//fonction d'affichage des conseil programmé pour avoir la liste des eleves traduit au conseil x
function listconseilprogramme(){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listconseilprogrammeeleve.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des eleves traduit au conseil x
function listeleveconseilx(idconseil){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listeleveconseilx.php?idconseil='+idconseil);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des conseil programmé pour enregistrer la decision du conseil disciplinaire 
function listconseilprogrammedecision(){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listconseilprogrammedecision.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des eleves traduit au conseil x pour entrée la decision du conseil
function listeleveconseilxpourdecision(idconseil){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listeleveconseilxpourdecision.php?idconseil='+idconseil);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire d'insertion de la decision du conseil pour le conseil x et élève y
function formconseilxpourdecision(idconseil,matricule){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formconseilxpourdecision.php?idconseil='+idconseil+'&matricule='+matricule+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des informations supplementaire sur la sanction d'un élève
function infosupplesanction(){
  let sanctioneleve = document.getElementById('sanctioneleve').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('infosanction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','infosupplesanction.php?sanctioneleve='+sanctioneleve);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la sanction d'un élève
function insertsanction(idconseil,matricule){
  let sanctioneleve = document.getElementById('sanctioneleve');

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultnewdecision');
  corplogiciel.innerHTML = xhr.responseText;
}
}
let form = new FormData();
form.append('sanctioneleve', sanctioneleve.value);
let sanction = sanctioneleve.value;
if(sanction == 'L\'exclusion temporaire de la classe' || sanctioneleve == 'L\'exclusion temporaire de l\'établissement'){
  let nbrejoursanction = document.getElementById('nbrejoursanction');
  let datedebutsanction = document.getElementById('datedebutsanction');
  form.append('nbrejoursanction', nbrejoursanction.value);
  form.append('datedebutsanction', datedebutsanction.value);
}
form.append('idconseil', idconseil);
form.append('matricule', matricule);
xhr.open('POST','insertsanction.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage des conseil programmé pour supprimer un élève du conseil
function listconseilprogrammesuppeleve(){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listconseilprogrammesuppeleve.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des eleves traduit au conseil x pour une possible suppression
function listeleveconseilxpoursupp(idconseil){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listeleveconseilxpoursupp.php?idconseil='+idconseil);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de suppression d'un élève du conseil de discipline
function suppeleveconseildiscipline(idconseil,matricule){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listeleveconseilxpoursupp(idconseil);
}
}
xhr.open('GET','suppeleveconseildiscipline.php?idconseil='+idconseil+'&matricule='+matricule);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des conseil programmé pour modification
function listconseilprogrammemodif(){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listconseilprogrammemodif.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la modification des information d'un conseil disciplinaire(lieu,date,heure)
function insertmodifconseilprogramme(idconseil){
 let lieumodifdiscipline = document.getElementById('lieumodifdiscipline').value;
 let datemodifdiscipline = document.getElementById('datemodifdiscipline').value;
 let heuremodifdiscipline = document.getElementById('heuremodifdiscipline').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";

}
}
xhr.open('POST','insertmodifconseilprogramme.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('lieu='+encodeURI(lieumodifdiscipline)+'&date='+encodeURI(datemodifdiscipline)+'&heure='+encodeURI(heuremodifdiscipline)+'&idconseil='+encodeURI(idconseil));

}

//fonction d'affichage des conseil programmé pour une suppression
function listconseilprogrammesuppression(){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listconseilprogrammesuppression.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction de suppression d'un conseil programmé
function suppconseilprogramme(idconseil){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  listconseilprogrammesuppression();
}
}
xhr.open('GET','suppconseilprogramme.php?idconseil='+idconseil);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete des buletin
function entetebuletin(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','entetebuletin.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction des pour buletin sequentiel
function buletinsequentiel(sequence){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','classebuletinsequentiel.php?session='+session+'&sequence='+sequence);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction des pour buletin sequentiel
function affichbuletin(classe,sequence){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','affichbuletin.php?session='+session+'&sequence='+sequence+'&classe='+classe);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de génération des cartes scolaire
function entetecartescolarite(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
  listclasscartescolaire();
}
}
xhr.open('GET','entetecartescolarite.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des classes pour la génération des cartes scolaire 
function listclasscartescolaire(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listclasscartescolaire.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des cartes scolaire de la classe x
function affichcartescolaire(classe){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','affichcartescolaire.php?classe='+classe+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete de parametrage de la biblitheque
function entetesettingbibliotheque(){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','entetesettingbibliotheque.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire d'abonnement (eleves et le personnel)
function affichformabonneeleve(tiers){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','affichformabonneeleve.php?tiers='+tiers);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du champ de saissi du prix d'abonnement si la bibliotheque est payant
function affichchampmontabonnpayant(){
  let abonnebibliotheq = document.getElementById('abonnebibliotheq').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('montab');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','affichchampmontabonnpayant.php?choixabonne='+abonnebibliotheq);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des paramentre d'abonnement des élèves
function insertparaabonneeleve(tiers){
  let abonnebibliotheq = document.getElementById('abonnebibliotheq');
  let typabon = abonnebibliotheq.value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertabonneleve');
  corplogiciel.innerHTML = xhr.responseText;
}
}
let form = new FormData();
form.append('choix', abonnebibliotheq.value);
if(typabon == 'payant'){
 let montab = document.getElementById('montabonnemois');
form.append('montabon', montab.value);
}
form.append('tiers', tiers);
xhr.open('POST','insertparaabonneeleve.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage du formulaire de modification des paramètre d'abonnement
function affichformmodifabonnpara(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','affichformmodifabonnpara.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage ou cache le champ de saissi du prix de l'abonnement pour modifier
function affichchampmodifabonneleve(){
  let choixmodif = document.getElementById('abonnebibliotheqmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('choixmodifelevebibilioabonne');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','affichchampmodifabonneleve.php?choixmodif='+choixmodif);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insert modif parametre abonnement eleve
function insertmodifparabonneelelve(){
  let choixmodif = document.getElementById('abonnebibliotheqmodif');
  let verifie = choixmodif.value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertabonnelevemodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
let form = new FormData();
form.append('choixmodif', choixmodif.value);
if(verifie == 'payant'){
  let montmodif = document.getElementById('montabonnemoismodif');
  form.append('montmodif', montmodif.value);
}
xhr.open('POST','insertmodifparabonneelelve.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage ou cache le champ de saissi du prix de l'abonnement pour modifier du personnel
function affichchampmodifabonnpersonnel(){
  let choixmodif = document.getElementById('abonnebibliotheqmodifpersonnel').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('choixmodifpersonnelbibilioabonne');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','affichchampmodifabonnpersonnel.php?choixmodif='+choixmodif);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insert modif parametre abonnement personnel
function insertmodifparabonnepersonnel(){
  let choixmodif = document.getElementById('abonnebibliotheqmodifpersonnel');
  let verifie = choixmodif.value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertabonnpersonnelmodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
let form = new FormData();
form.append('choixmodif', choixmodif.value);
if(verifie == 'payant'){
  let montmodif = document.getElementById('montabonnemoismodifpersonnel');
  form.append('montmodif', montmodif.value);
}
xhr.open('POST','insertmodifparabonnepersonnel.php');
//xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(form);

}

//fonction d'affichage du formulaire d'enregistrement de la durée d'un emprunt
function formdureemprunt(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formdureemprunt.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la duree d'un emprunt
function insertdureemprunt(){
  let dureemprunt = document.getElementById('dureemprunt').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertdureemprunt');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertdureemprunt.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('dureemprunt='+encodeURI(dureemprunt));

}

//fonction d'affichage du formulaire de la durr d'un emprunt
function formmodifdureemprunt(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formmodifdureemprunt.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la modification de la duree d'un emprunt
function insertmodifdureemprunt(){
  let dureemprunt = document.getElementById('dureempruntmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertmodifdureemprunt');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertmodifdureemprunt.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('dureemprunt='+encodeURI(dureemprunt));

}

//fonction d'affichage du formulaire de creation des étagères
function formnewetagere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formnewetagere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion de la modification de la duree d'un emprunt
function insertnewetagere(){
  let nometagere = document.getElementById('nometagere').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertetagere');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertnewetagere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nometagere='+encodeURI(nometagere));

}

//fonction d'affichage des etageres créé
function listetagere(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listetagere.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage des etageres pour une modification
function listetageremodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listetageremodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modification des étagère
function insertetageremodif(idetagere){
  let nometageremodif = document.getElementById('nometageremodif'+idetagere).value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";

}
}
xhr.open('GET','insertetageremodif.php?etagere='+nometageremodif+'&idetagere='+idetagere);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de l'entete d'enregistrement des livres
function enteteenreglivres(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('entetepagenewfonction');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','enteteenreglivres.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de creation des type de livre
function formtyplivre(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formtyplivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des type de livre
function inserttyplivre(){
  let nomtypelivre = document.getElementById('nomtypelivre').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinserttyplivre');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','inserttyplivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomtype='+encodeURI(nomtypelivre));

}

//fonction d'affichage de la liste des typpes de livre
function listyplivre(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listyplivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des typpes de livre pour modification
function listyplivremodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listyplivremodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de modification d'un type de livre
function formmodiftyplivre(idtyplivre){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formmodiftyplivre.php?idtype='+idtyplivre);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modifications
function insertmodiftyplivre(idtyplivre){
  let nomtypelivremodif = document.getElementById('nomtypelivremodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinserttyplivremodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertmodiftyplivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomtypmodif='+encodeURI(nomtypelivremodif)+'&idtyplivre='+encodeURI(idtyplivre));

}

//fonction d'affichage du formulaire d'enregistrement des livres des livre
function formenreglivre(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','formenreglivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des livres
function insertlivre(){
  let nomlivre = document.getElementById('nomlivre').value;
  let typlivre = document.getElementById('typlivre').value;
  let etagerelivre = document.getElementById('etagerelivre').value;
  let qtelivre = document.getElementById('qtelivre').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertlivre');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertlivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomlivre='+encodeURI(nomlivre)+'&typlivre='+encodeURI(typlivre)+'&etagere='+encodeURI(etagerelivre)+'&qte='+encodeURI(qtelivre));

}

//fonction d'affichage de la liste des livres
function listlivre(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listlivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des livres avec criteres
function listlivrecriteres(){
  let typlivrelist = document.getElementById('typlivrelist').value
  let etagerelivrelist = document.getElementById('etagerelivrelist').value
  let nomlivrelist = document.getElementById('nomlivrelist').value
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('zonelistlivre');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','listlivrecriteres.php?typlivre='+typlivrelist+'&etagere='+etagerelivrelist+'&nomlivre='+nomlivrelist);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des livres pour une modification
function listlivremodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listlivremodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage de la liste des livres avec criteres pour une possible modification
function listlivrecriteresmodif(){
  let nomlivrelist = document.getElementById('nomlivrelistmodif').value
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('zonelistlivremodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','listlivrecriteresmodif.php?nomlivre='+nomlivrelist);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de modification du livre x
function formlivremodif(idlivre){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','formlivremodif.php?idlivre='+idlivre);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'insertion des modification d'un livre
function insertmodiflivre(idlivre){
  let nomlivre = document.getElementById('nomlivremodif').value;
  let typlivre = document.getElementById('typlivremodif').value;
  let etagerelivre = document.getElementById('etagerelivremodif').value;
  let qtelivre = document.getElementById('qtelivremodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertmodiflivre');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('POST','insertmodiflivre.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('nomlivre='+encodeURI(nomlivre)+'&typlivre='+encodeURI(typlivre)+'&etagere='+encodeURI(etagerelivre)+'&qte='+encodeURI(qtelivre)+'&idlivre='+encodeURI(idlivre));

}

//fonction d'affichage de la liste des livres present en bibliotheque
function listlivrepourmodif(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listlivrepourmodif.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage d'un livre Commençant par x
function listlivremodifcomx(){
  let nomlivrelistpourmodif = document.getElementById('nomlivrelistpourmodif').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('zonelistlivrepourmodif');
  corplogiciel.innerHTML = xhr.responseText;
}
}
xhr.open('GET','listlivremodifcomx.php?noml='+nomlivrelistpourmodif);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}


       //fonction d'affichage des notes pour modification d'une matiere
       function choixseqmqtiereListeNote(){
        let searchnote = document.getElementById('searchnote').style.display = 'none';
        let seqnotemodif = document.getElementById('seqnotemodif').value;
        let matierenotemodif = document.getElementById('matierenotemodif').value;
        let classenote = document.getElementById('classenote').value;
        let session = document.getElementById('sessionencour').innerHTML;

        if(window.XMLHttpRequest){
            //Mozilla, safari, IE7+...
            xhr = new XMLHttpRequest();
        }else if(window.ActiveXObject){
            //IE 6 et anterieur
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function (){ 
        if(xhr.readyState == 1 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
         if(xhr.readyState == 2 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block"; 
         }
         if(xhr.readyState == 3 && xhr.status == 200){
          let spinner = document.getElementById('spinner').style.display="block";
         }
        if(xhr.readyState == 4 && xhr.status == 200){ 
          let spinner = document.getElementById('spinner').style.display="none";
          let corplogiciel = document.getElementById('zonenotemodif');
          corplogiciel.innerHTML = xhr.responseText;
        }
        }
        xhr.open('GET','choixseqmqtiereListeNote.php?sequence='+seqnotemodif+'&matiere='+matierenotemodif+'&classenote='+classenote+'&session='+session);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
        
        }


//fonction des pour buletin trimestriel
function buletintrimestriel(trimestre){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','classebuletintrimestre.php?session='+session+'&trimestre='+trimestre);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction des pour buletin trimestriel
function affichbuletintrimestriel(classe,trimestre){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','affichbuletintrimestriel.php?session='+session+'&trimestre='+trimestre+'&classe='+classe);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction des report de note
function classReportNote(){
  let session = document.getElementById('sessionencour').innerHTML;

  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','classReportNote.php?session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du formulaire de report de notes
function affichformreportnotes(classe){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','affichformreportnotes.php?classe='+classe+'&session='+session);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}
//fonction de traitement des report des notes
function insertReportNote(classe){
  let corplogiciel = document.getElementById('resultreportNote');
  corplogiciel.innerHTML = `<br/><div class="alert alert-warning bg-warning text-light" role="alert" style="font-size: 14px;">
   Veuillez patienter svp....
  </div>`;
  let session = document.getElementById('sessionencour').innerHTML;
  let seqdepart = document.getElementById('seqdepart').value;
  let seqarrive = document.getElementById('seqarrive').value;
  let valcheck = document.getElementById('gardeNote');
  gardeNote = '';
  if(valcheck.checked == true){
    gardeNote = 'true';
  }else{
    gardeNote = 'false';
  }
if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  
   console.log(xhr.responseText);
  const data = JSON.parse(xhr.responseText);

  if(data.Message == "success")
    {
      corplogiciel.innerHTML = `<br/><div class="alert alert-success bg-success text-light" role="alert" style="font-size: 14px;">
      Notes reporter avec succès
      Elèves inscrit : ${data.NbreEleveInscrit} <br> Notes reporter : ${data.DataInsert}
      </div>`;
    }else{
      corplogiciel.innerHTML = `<br/><div class="alert alert-danger bg-danger text-light" role="alert" style="font-size: 14px;">
      Un problème est survenu lors du report des notes. Veuillez reéssayer svp!
      </div>`;
    }

}
}
xhr.open('POST','insertReportNote.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('session='+encodeURI(session)+'&seqdepart='+encodeURI(seqdepart)+'&seqarrive='+encodeURI(seqarrive)+'&gardeNote='+encodeURI(gardeNote)+'&classe='+encodeURI(classe));

}

//fonction d'affichage des classes pour enregistrer une absence
function listclassnewAbsence(){
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listclassnewAbsence.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}
//fonction d'affichage de la liste des élèves de la classe selectionner pour enregistrer une absence
function listElevenewAbsence(classe){
  let session = document.getElementById('sessionencour').innerHTML;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('corplogiciel');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('GET','listElevenewAbsence.php?classe='+encodeURI(classe)+'&session='+encodeURI(session));
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

//fonction d'affichage du form new absence
function formNewAbs(eleve){
  let session = document.getElementById('sessionencour').innerHTML;
  document.getElementById('formnewAb').style.display='block';
  document.getElementById('elev').value = eleve;
  document.getElementById('matr').innerHTML = eleve;

}

//fonction d'insertion une absence
function insertnewAbsence(){
  let session = document.getElementById('sessionencour').innerHTML;
  let classe = document.getElementById('class').value;
  let matricul = document.getElementById('elev').value;
  let time = document.getElementById('nbreTime').value;
  if(window.XMLHttpRequest){
    //Mozilla, safari, IE7+...
    xhr = new XMLHttpRequest();
}else if(window.ActiveXObject){
    //IE 6 et anterieur
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
xhr.onreadystatechange = function (){ 
if(xhr.readyState == 1 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
 if(xhr.readyState == 2 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block"; 
 }
 if(xhr.readyState == 3 && xhr.status == 200){
  let spinner = document.getElementById('spinner').style.display="block";
 }
if(xhr.readyState == 4 && xhr.status == 200){ 
  let spinner = document.getElementById('spinner').style.display="none";
  let corplogiciel = document.getElementById('resultinsertabs');
  corplogiciel.innerHTML = xhr.responseText;
  corplogiciel.style.width = '100%';
}
}
xhr.open('POST','insertnewAbsence.php');
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send('session='+encodeURI(session)+'&classe='+encodeURI(classe)+'&matricul='+encodeURI(matricul)+'&time='+encodeURI(time));

}
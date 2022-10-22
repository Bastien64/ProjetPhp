
const btnboot = document.querySelector ('.btnboot');
const barre = document.querySelector ('.barre');

btnboot.addEventListener ('click', function(){
    console.log('bouton clike')
    barre.style.opacity = "0";
    barre.style.width = "0";
});

const btn = document.getElementById ('open');  //Bootstrap bottum in my page
const x = document.getElementsByClassName('statut');
btn.addEventListener ('click', function(){
for (let i = 0; i < x.length; i++) {
    var price = x[i].innerHTML.includes('STATUT : Close');
    console.log (price);
    if (price !== false ) {
        x[i].style.display="none";
    } else {console.log("");
    }
}}) ; 

const btnred = document.getElementById ('close');  //Bootstrap bottum in my page
const y = document.getElementsByClassName('statutclose');
btnred.addEventListener ('click', function(){
for (let i = 0; i < x.length; i++) {
    var price = x[i].innerHTML.includes('STATUT : Close');
    console.log (price);
    if (price == false ) {
        x[i].style.display="none";
    } else {console.log("");
    }
}}) ; 


function search_ville() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('animals');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)){
        console.log(!x[i].innerHTML) 
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";                 
        }
    }
}



const btnboot = document.querySelector ('.btnboot');
const barre = document.querySelector ('.barre');

btnboot.addEventListener ('click', function(){
    console.log('bouton clike')
    barre.style.opacity = "0";
    barre.style.width = "0";
});


const btn = document.getElementById ('open');  //Bootstrap bottum in my page
const boite = document.getElementsByClassName('boite');
const statut = document.getElementsByClassName('statut');
console.log (statut)
console.log (statut.length)


btn.addEventListener ('click', function(){
for (let i = 0; i < statut.length; i++) {
    var price = statut[i].innerText;
    const prices = new Array(price);
    console.log(prices);
    if (prices == "STATUT : Open" ) {
        console.log("Ce magasin est ouvert");
        document.getElementById('p1').innerHTML = "Des Franchises sont effectivement ouvertes, la liste se trouve ci dessous.";
    } else {console.log("Ce magasin est ferme");
    }
/*
    const pricesConcat = prices.concat(prices);
    console.log(pricesConcat)
    */
}}) ; 
    /*

*/

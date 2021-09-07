let click_plus = 0;
let click_moins = 0;
const compter_click = ()=>
{
    const plus = document.querySelectorAll('.plus');
    const moins = document.querySelectorAll('.moins');
    

    plus.forEach(plus =>
        {
            plus.addEventListener('click',()=>
            {
                var plusId = '#'+ plus.id;
                console.log('id du plus :  ',plusId);
                click_plus ++;
                console.log('clic plus',click_plus);
            });
        });

    moins.forEach(moins =>
        {
            moins.addEventListener('click',()=>
            {
                var moinsId = '#'+ moins.id;
                console.log('id du plus :  ',moinsId);
                click_plus --; // si on click sur - on décrémente
                console.log('clic moins',click_plus);
            });
        });
}
// on compte les clicks, et quand on fera ajax sur la boutton modifier, c'est la quantité correspondra à la valeur du click
// si j'avais  une quantite de 1, je fais  + 2 fois j'ai une quantité de 3, et clic = 2, je retire donc 2  à mon stock pour ce produit
compter_click();

(function($){
    $('.btn-suppr').on('click', function (e) {
        //e.preventDefault();
        var btn = $(this);
      //  var idBTN = $(this.id);
        var nom = document.querySelector('#'+this.id+'_nom').innerHTML;
        var quantite = document.querySelector('.'+this.id+'_quantite').value;
        $.ajax(
        {
            url:"stock_bdd.php",
            type: "POST",
            data : {nom:nom,quantite:quantite,modif:click_plus,action:'suppr'},
            success: function (resultat) {
                console.log('btn',btn);
                console.log('nom',nom);
                console.log('quantite',quantite);
        } 
        });
    });
    $('.btn-modif').on('click', function (e) {
        
        //e.preventDefault();
        var btn = $(this);
      //  var idBTN = $(this.id);
        var nom = document.querySelector('.'+this.id+'_nom').innerHTML;
        $.ajax(
        {
            url:"stock_bdd.php",
            type: "POST",
            data : {nom:nom, modif:click_plus,action:'modif'},
            success: function (resultat) {
                console.log('btn',btn);
                console.log('nom',nom);
                console.log(click_plus);
        } 
        });
    });
    $('.btn-add').on('click', function (e) {
        
       //e.preventDefault();
        var btn = $(this);
      //  var idBTN = $(this.id);
        var nom = document.querySelector('#'+this.id+'nom').innerHTML;
        var quantite = document.querySelector('.'+this.id+'quantite').value;
        $.ajax(
        {
            url:"stock_bdd.php",
            type: "POST",
            async:true,
            data : {nom:nom, quantite:quantite,action:'add'},
            success: function (resultat) {
                console.log('btn',btn);
                console.log('nom',nom);
                console.log('quantite',quantite);
        } 
        });
    });
    $('.btn-deco').on('click', function (e) {
       // e.preventDefault();
        console.log('ALLLLLLOOOO');
         $.ajax(
         {
             url:"stock_bdd.php",
             type: "POST",
             data : {action:'deco'},
             success: function (resultat) {
                 console.log('deco');
         } 
         });
     });

})(jQuery);
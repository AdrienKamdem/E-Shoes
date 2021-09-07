
/* INSCRIPTION */
let count = 0;
//console.log(count);
// LES DDN n'ont pas de placeholder, on en crée un manuellement et on fait une fonction pour le display ou non

const displayLabel = ()=>
{
    const inputDDN = document.querySelector('#ddn');
    //const labelDDN = document.querySelector('.label-ddn');
    const typeDDN = inputDDN.getAttribute('type');
    //console.log(inputDDN,typeDDN);
    if (inputDDN.value!="") {
        inputDDN.setAttribute('type','date');
    }
    inputDDN.addEventListener('focusout',()=>
    {
        if (inputDDN.value=="") {
            inputDDN.setAttribute('type','text');
        } else {
            inputDDN.setAttribute('type','date');
        }
    });


    inputDDN.addEventListener('focusin',()=>
    {
        //console.log('focusin');
       inputDDN.setAttribute('type','date');
       //console.log(inputDDN,typeDDN);
    });

}
displayLabel();
setInterval(displayLabel, 300);
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/* TEST POUR LES CHAMPS TEXTE BASICS : NOM PRENOM VILLE ADRESSE */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const validInputs=()=>
{
    console.log('validInputs');
    const inputs = document.querySelectorAll('.input');
    const test = document.querySelectorAll('.wrong');
    inputs.forEach(inputs =>
    {
        // Afin de récuperer  le div error correspond a la bonne input
        const errorid = "#error"+inputs.id;
        const error = document.querySelector(errorid);
        if (inputs.value==""){
            inputs.classList.add('wrong');
            error.classList.add('error-is-active');
        } else {
            inputs.classList.remove('wrong');
            error.classList.remove('error-is-active');
        }
    });
}
const testInputs=()=>
{
    const inputs = document.querySelectorAll('.input');
    const test = document.querySelectorAll('.wrong');
    
    //console.log(inputs);
    inputs.forEach(inputs => {
        // Afin de récuperer  le div error correspond a la bonne input
        const errorid = "#error"+inputs.id;
        const error = document.querySelector(errorid);
        inputs.addEventListener('input',()=>
        {
            if (inputs.value==""){
                inputs.classList.add('wrong');
                error.classList.add('error-is-active');
            } else {
                inputs.classList.remove('wrong');
                error.classList.remove('error-is-active');
            }
        //console.log(inputs,error);
        });
        inputs.addEventListener('focusout',()=>
        {
            if (inputs.value==""){
                inputs.classList.add('wrong');
                error.classList.add('error-is-active');
            } else {
                inputs.classList.remove('wrong');
                error.classList.remove('error-is-active');
            }
        //console.log(inputs,error);
        });
    });
}
testInputs();
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/*  TeSt SUR LAnnee de la DDN  :   */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const validDate=()=>
{
    const dateactuel = new Date();
    const ddn = document.querySelector('#ddn');
    const datevalue = new Date(ddn.value);
    const error = document.querySelector('#errorddn');

   const annee= datevalue.getFullYear();
   console.log(ddn.value);
    console.log('year=',annee.toString());
    console.log(annee>dateactuel.getFullYear());
    if( (annee>dateactuel.getFullYear()) ||(ddn.value=="") ||(annee.toString()=="NaN") ){
        ddn.classList.add('wrong');
        error.classList.add('error-is-active');
    } else {
        ddn.classList.remove('wrong');
        error.classList.remove('error-is-active');
    }
}
const testDate=()=>
{
    const dateactuel = new Date();
    const ddn = document.querySelector('#ddn');
    const datevalue = new Date(ddn.value);
    const error = document.querySelector('#errorddn');

   const annee= datevalue.getFullYear();
   console.log(ddn.value);
    console.log('year=',annee);
    ddn.addEventListener('input',()=>
    {
        console.log('inpuut');
        validDate();
    });
    ddn.addEventListener('focusout',()=>
    {
        console.log('focusout');
        validDate();
    });
}
testDate();
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/*  TeSt SUR LE CODE POSTAL  :  5 CHIFFRES EXACTEMENT */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const validCP =()=>
{console.log('validCP');
    const CP = document.querySelector('#CP');
    const errorCP = document.querySelector('.errorCP'); 
    const valid = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;// ou juste [0-9]{5}
    //valid.test(CP.value);
    //console.log(valid.test(CP.value));
    const suggestionCP = document.querySelector('.suggestionCP');
    if ((CP.value=="") ||(!valid.test(CP.value))){
        CP.classList.add('wrong');
        errorCP.classList.add('error-is-active');
        suggestionCP.classList.remove('suggestionCP-is-ok');
    } else {
        CP.classList.remove('wrong');
        errorCP.classList.remove('error-is-active');
        suggestionCP.classList.add('suggestionCP-is-ok');
    }
//console.log(CP,errorCP);
}


const testCP = () =>
{
    const CP = document.querySelector('#CP');
    const errorCP = document.querySelector('.errorCP'); 
    const valid = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;// ou juste [0-9]{5}
    //valid.test(CP.value);
    //console.log(valid.test(CP.value));
    const suggestionCP = document.querySelector('.suggestionCP');

    CP.addEventListener('input',()=>
    {
        validCP();
    });
    CP.addEventListener('focusout',()=>
    {
        validCP();
    });
}
testCP();
setInterval(testCP, 300);



/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/*  TeSt SUR LE MAIL  :  blabla@bla.bla */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

const validMail=()=>
{console.log('Mail');
    const mail = document.querySelector('#mail');
    const errorMail = document.querySelector('#errormail');
    const valid = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;

    if ( (mail.value=="") || (!valid.test(mail.value)) ){
        mail.classList.add('wrong');
        errorMail.classList.add('error-is-active');
    }
    else{
        mail.classList.remove('wrong');
        errorMail.classList.remove('error-is-active');
    }
}
const testMail=()=>
{
    //console.log("fct mail test");
    const mail = document.querySelector('#mail');
    const errorMail = document.querySelector('#errormail');
    const valid = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/;
    mail.addEventListener('input',()=>
    {
        //console.log('inpuuut');
        validMail();
    });
    mail.addEventListener('focusout',()=>
    {
        //console.log('focusouuut');
        validMail();
    });


}


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/*  TeSt SUR LE MDP  : 4 caractères; 1 maj, 1min, 1 chiffre*/
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const validMDP=()=>
{console.log('validMDP');
    const mdp = document.querySelector('#mdp');
    const errormdp=document.querySelector('.errormdp');
    const suggestionMDP = document.querySelector('.suggestionMDP');
    const validLongueur = document.querySelector('.valid-longueur-mdp');
    const validmaj = document.querySelector('.valid-maj-mdp');
    const contientMaj=/[A-Z]{1,}/;
    const validmin = document.querySelector('.valid-min-mdp');
    const contientMin=/[a-z]{1,}/;
    const validchiffre = document.querySelector('.valid-chiffre-mdp');
    const contientChiffre=/[0-9]{1,}/;
// test vide
    if (mdp.value=="") {
        mdp.classList.add('wrong');
        errormdp.classList.add('error-is-active');
    }else{
        mdp.classList.remove('wrong');
        errormdp.classList.remove('error-is-active');
    }
    // test 4 carac
    if (mdp.value.length<4) {
        mdp.classList.add('wrong');
        errormdp.classList.add('error-is-active');
        validLongueur.classList.remove('condition-is-ok');
    }else{
        mdp.classList.remove('wrong');
        errormdp.classList.remove('error-is-active');
        validLongueur.classList.add('condition-is-ok');
    }
    // test maj
    if (contientMaj.test(mdp.value)==false) {
        //console.log(contientMaj.test(mdp.value));
        mdp.classList.add('wrong');
        errormdp.classList.add('error-is-active');
        validmaj.classList.remove('condition-is-ok');
    }else{
        mdp.classList.remove('wrong');
        errormdp.classList.remove('error-is-active');
        validmaj.classList.add('condition-is-ok');
    }
    // test min
    if (contientMin.test(mdp.value)==false) {
        mdp.classList.add('wrong');
        errormdp.classList.add('error-is-active');
        validmin.classList.remove('condition-is-ok');
    }else{
        mdp.classList.remove('wrong');
        errormdp.classList.remove('error-is-active');
        validmin.classList.add('condition-is-ok');
    }
    // test chiffre
    if (contientChiffre.test(mdp.value)==false) {
        mdp.classList.add('wrong');
        errormdp.classList.add('error-is-active');
        validchiffre.classList.remove('condition-is-ok');
    }else{
        mdp.classList.remove('wrong');
        errormdp.classList.remove('error-is-active');
        validchiffre.classList.add('condition-is-ok');
    }

}
const testMDP=()=>
{

    const mdp = document.querySelector('#mdp');
    const errormdp=document.querySelector('.errormdp');
    const suggestionMDP = document.querySelector('.suggestionMDP');
    const validLongueur = document.querySelector('.valid-longueur-mdp');
    const validmaj = document.querySelector('.valid-maj-mdp');
    const contientMaj=/[A-Z]{1,}/;
    const validmin = document.querySelector('.valid-min-mdp');
    const contientMin=/[a-z]{1,}/;
    const validchiffre = document.querySelector('.valid-chiffre-mdp');
    const contientChiffre=/[0-9]{1,}/;
    mdp.addEventListener('input',()=>
    {
        //console.log('inpuuut');
        validMDP();
    });
    mdp.addEventListener('focusout',()=>
    {
        //console.log('focusouuut');
        validMDP();
        confirmMDP();//  pour si on change le mdp apres avoir rempli confirmation
    });
}

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/*  TeSt SUR la confirmation du mot de passe*/
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const confirmMDP=()=>
{console.log('co,firmMDP');
    const mdp = document.querySelector('#mdp');
    const mdp2 = document.querySelector('#mdp2');
    const errormdp2 = document.querySelector('#errormdp2');
    if (mdp2.value=="") {
        mdp2.classList.add('wrong');
        errormdp2.classList.add('error-is-active');
        errormdp2.innerHTML='Veuillez confirmer le mot de passe';
    }else{
        if (mdp2.value != mdp.value) {
            mdp2.classList.add('wrong');
            errormdp2.classList.add('error-is-active');
            errormdp2.innerHTML = 'Les mots de passes ne correspondent pas';
        } else {
            mdp.classList.remove('wrong');
            errormdp2.classList.remove('error-is-active');
        }
    }
}
const testconfirmMDP = () =>
{
    const mdp = document.querySelector('#mdp');
    const mdp2 = document.querySelector('#mdp2');
    const errormdp2 = document.querySelector('#errormdp2');
    mdp2.addEventListener('input',()=>
    {
        //console.log('inpuuut');
        confirmMDP();
    });
    mdp2.addEventListener('focusout',()=>
    {
        //console.log('focusouuut');
        confirmMDP();
    });
}

const test = () =>
{
    const testCount = document.querySelectorAll('.test');
    //console.log(testCount);
    testCount.forEach(testCount => {
        
        if (testCount.value!="") {
            count++;
        }
        
    });
    //console.log(count);
}

test();

    if (count >0) {
        validCP();
        validMDP();
        validInputs();
        validMail();
        confirmMDP();
        validDate();
    }
testCP();
testInputs();
testMail();
testMDP();
testconfirmMDP();

const testSubmit=() =>
{
    console.log('testSubmit');
    const submit = document.querySelector('#registerBTN');
    
    submit.addEventListener('click',function(event)
    {
        

        validCP();
        validMDP();
        validInputs();
        validMail();
        confirmMDP();
        validDate();
        const wrong = document.querySelectorAll('.wrong');
        console.log(wrong);
            if (9-wrong.length != 9) {
                event.preventDefault();
                alert('Veuillez vérifier tous les champs');
            } else {
                alert('Formulaire envoyé avec succès');
            } 
    });
}
testSubmit();
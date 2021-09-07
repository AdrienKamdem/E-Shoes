/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
let count=0;
// CONTACT  //
const displayLabel = ()=>
{
    const inputddc = document.querySelector('#ddc');
    //const labelddc = document.querySelector('.label-ddc');
    const typeddc = inputddc.getAttribute('type');
    //console.log(inputddc,typeddc);
    if (inputddc.value!="") {
        inputddc.setAttribute('type','date');
    }
    inputddc.addEventListener('focusout',()=>
    {
        if (inputddc.value=="") {
            inputddc.setAttribute('type','text');
        } else {
            inputddc.setAttribute('type','date');
        }
    });


    inputddc.addEventListener('focusin',()=>
    {
        //console.log('focusin');
       inputddc.setAttribute('type','date');
       //console.log(inputddc,typeddc);
    });

}
displayLabel();
setInterval(displayLabel, 300);
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/* %%%%%%%    TEST SUR LES INPUTS DE BASES    %%%% */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const validInputs=()=>
{
    const inputs = document.querySelectorAll('.input');
    console.log(inputs);
    inputs.forEach(inputs => {
        const errorid = '#error'+inputs.id;
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

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
/* %%%%%%%    TEST SUR la validité de la date    %%%% */
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
const validDate =()=>
{
    const ddc= document.querySelector('#ddc');
    const error = document.querySelector('#errorddc');

    const dateActuel = new Date();

    const ddcDate = new Date(ddc.value);
    const jour = ddcDate.getDate();
    const mois = ddcDate.getMonth()+1;// car décalage
    const annee = ddcDate.getFullYear();
    console.log(jour==dateActuel.getDate());
    console.log(mois==dateActuel.getMonth()+1);
    console.log(annee==dateActuel.getFullYear());
    if( (jour == dateActuel.getDate()) && (mois == dateActuel.getMonth()+1) &&(annee == dateActuel.getFullYear()) ){
        console.log('c le bon');
        ddc.classList.remove('wrong');
        error.classList.remove('error-is-active');
        
    } else{
        ddc.classList.add('wrong');
        error.classList.add('error-is-active');
    }
    
}

const testDate=()=>
{
    const ddc= document.querySelector('#ddc');
    const error = document.querySelector('#errorddc');

    const dateActuel = new Date();

    const ddcDate = new Date(ddc.value);
    const jour = ddcDate.getDate();
    const mois = ddcDate.getMonth()+1;// car décalage
    const annee = ddcDate.getFullYear();
   
    ddc.addEventListener('input',()=>
    {
        console.log('inpuut');
        validDate();
    });
    ddc.addEventListener('focusout',()=>
    {
        console.log('focusout');
        validDate();
    });
}
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


setInterval(() => {
    if (count >0) {
        validDate();
        validInputs();
        validMail();
    }
}, 300);
const testSubmit=() =>
{
    console.log('testSubmit');
    const submit = document.querySelector('#registerBTN');
    
    submit.addEventListener('click',function(event)
    {
        validDate();
        validInputs();
        validMail();
        const wrong = document.querySelectorAll('.wrong');
        console.log(wrong);
            if (6-wrong.length != 6) {
                event.preventDefault();
                alert('Veuillez vérifier tous les champs');
            } else {
                alert('Formulaire envoyé avec succès');
            } 
    });
}
testInputs();
test();
testDate();
testMail();
testSubmit();
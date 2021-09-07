/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
/*%%%%%%%%%% valider le formulaire  %%%%%%%%%%%%%%*/
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
const validform = () =>
{
    const inputs = document.querySelectorAll('.inputC');
    //console.log(inputs);
    inputs.forEach(inputs => {
        inputs.addEventListener('focusout',() =>
        {
            const idErreur = ".erreur"+inputs.id;
            const erreur = document.querySelector(idErreur);
            //console.log(erreur);

            if (inputs.value=="") {
                erreur.style.display="flex";
                inputs.style.border="solid 1px red";
                if (inputs.classList.toggle('ok')) {
                    inputs.classList.toggle('ok');
                }

            } else {
                erreur.style.display="none";
                inputs.style.border="";
                if (!inputs.classList.toggle('ok')) {
                    inputs.classList.toggle('ok');
                }
            }
        });
    });
}
validform();

const validMailC = () =>
{
    const mail = document.querySelector('#mailC');
    const regMail = /^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$/;
    const errreurmail = document.querySelector('.erreurmailC');
    console.log(mail);
    mail.addEventListener('focusout',() =>
        {
            
            //console.log(erreur);

            if ((mail.value=="") || (regMail.test(mail.value)==false) ) {
                errreurmail.style.display="flex";
                errreurmail.innerHTML="Entrer une addresse mail de la forme : blabla@bla.blom";
                mail.style.border="solid 1px red";

                if (mail.classList.toggle('ok')) {
                    mail.classList.toggle('ok');
                }

            } else {
                errreurmail.style.display="none";
                mail.style.border="";
                if (!mail.classList.toggle('ok')) {
                    mail.classList.toggle('ok');
                }
            }
        });
}
validMailC();
disabledSubmit=() =>
{ 
    
    const registerBTN = document.querySelector('#submitConnexion');

registerBTN.addEventListener('click',function(event){
    const listeOk = document.querySelectorAll('.ok');
    console.log(listeOk);
    if (listeOk.length == 2) {
        //registerBTN.disabled = false;
        alert('formulaire envoyé ');
    }
    else{
        //registerBTN.disabled = true;
       alert('Veuillez vérifier tous les champs');
       event.preventDefault();
    }
    
});


}
disabledSubmit();
//setInterval(disabledSubmit, 300);
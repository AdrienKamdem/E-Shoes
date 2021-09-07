const navSlide = ()=>
{
    const burger=document.querySelector('.burger');
    const nav = document.querySelector('.nav-menuH ul');
    const navLinks=document.querySelectorAll('.nav-menuH li');
    const backgroundSideBar = document.querySelector('.background-side-bar');
    
    burger.addEventListener('click',()=>
    {
        //toggle Nav
        nav.classList.toggle('ul-menuH-is-active');
        backgroundSideBar.classList.toggle('background-side-bar-is-active');

        // Animations liens
        /*
        navLinks.forEach((link, index) => {
            if (link.style.animation)
                {
                    link.style.animation ='';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index/7 + 0.3}s`;
                }

    }); */
// animation du burger
burger.classList.toggle('toggle');
    });
 
}



const clickSearchBar = ()=>
{
    const loupe = document.querySelector('#open-searchBar');
    const activSearchBar2 = document.querySelector('.bar-recherche2');
    const containerSearchBar2 = document.querySelector('.container-searchBar2');
    const closebtn = document.querySelector(".pre-close-search");
    const logo = document.querySelector(".container-eshoes");
    loupe.addEventListener('click',()=>
    {
        logo.classList.toggle('container-eshoes-is-active');
        activSearchBar2.classList.toggle('bar-recherche2-is-active');
        closebtn.classList.toggle('pre-close-search-is-active');
        containerSearchBar2.classList.toggle('container-searchBar2-is-active');
        activSearchBar2.style.animation='';
        console.log(closebtn.style.animation);

                /*
        navLinks.forEach((link, index) => {
            if (link.style.animation)
                {
                    link.style.animation ='';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index/7 + 0.3}s`;
                }
    }); */

    });
    /* Pour fermer */
    closebtn.addEventListener('click',()=>
    {   
        // Pour faire l'animation inverse
        activSearchBar2.style.animation='searchClose 1.5s ease forwards';

        // POur tout refermer
        logo.classList.toggle('container-eshoes-is-active');
        activSearchBar2.classList.toggle('bar-recherche2-is-active');
        closebtn.classList.toggle('pre-close-search-is-active');
        containerSearchBar2.classList.toggle('container-searchBar2-is-active');
        
    });


    
}

const filtreSlide = ()=>
{
    const filtre = document.querySelector('.container-icon-filtre');
    const iconFiltre = document.querySelector('.icon-filtre');
    const navMenuV = document.querySelector('.nav-menuV2');
    const navV = document.querySelector('.navV2');


    filtre.addEventListener('click',()=>
    {
        iconFiltre.classList.toggle('icon-filtre-is-toggle');
        navMenuV.classList.toggle('nav-menuV2-is-active');
        navV.classList.toggle('navV2-is-active');
    });
}

const closeFiltre = ()=>
{
    const filtre = document.querySelector('.container-icon-filtre');
    const iconFiltre = document.querySelector('.icon-filtre');
    const navMenuV = document.querySelector('.nav-menuV2');
    const navV = document.querySelector('.navV2');
    const closebtnFiltre =document.querySelector('.container-btn-close-filtre');


    closebtnFiltre.addEventListener('click',()=>
    {
        iconFiltre.classList.toggle('icon-filtre-is-toggle');
        navMenuV.classList.toggle('nav-menuV2-is-active');
        navV.classList.toggle('navV2-is-active');
        closebtnFiltre.classList.toggle('container-btn-close-filtre-is-active');
    });
}

/* $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ */
//Pour lier les 2 nav verticales
const ifChecked = ()=>
{
    const stock = document.querySelector('#aff-stock');
    const checkboxStock = document.querySelector('#icon-tic-stock');
    const stock2 = document.querySelector('#aff-stock2');
    const checkboxStock2 = document.querySelector('#icon-tic-stock2');


    stock.addEventListener('click', () =>
    {
        if (checkboxStock.checked) 
        {
 
            checkboxStock2.checked = true;
            stock.innerHTML='Masquer le stock ';
            stock2.innerHTML='Masquer le stock ';
        }else{

            checkboxStock2.checked = false;
            stock.innerHTML='Afficher le stock disponible ';
            stock2.innerHTML='Afficher le stock disponible';
            

        }


    });

    stock2.addEventListener('click', () =>
    {
        if (checkboxStock2.checked) 
        {

            checkboxStock.checked = true;
            stock.innerHTML='Masquer le stock ';
            stock2.innerHTML='Masquer le stock ';
        }else{
 
            checkboxStock.checked = false;
            stock.innerHTML='Afficher le stock disponible';
            stock2.innerHTML='Afficher le stock disponible';
        }

    });  
    checkboxStock.addEventListener('click', () =>
    {
        if (checkboxStock.checked) 
        {

            checkboxStock2.checked = true;
            stock.innerHTML='Masquer le stock ';
            stock2.innerHTML='Masquer le stock ';
            
        }else{
            checkboxStock2.checked = false;
            stock.innerHTML='Afficher le stock disponible';
            stock2.innerHTML='Afficher le stock disponible';
        }
    });

    checkboxStock2.addEventListener('click', () =>
    {  
        if (checkboxStock2.checked) 
        {

            checkboxStock.checked = true;
            stock.innerHTML='Masquer le stock ';
            stock2.innerHTML='Masquer le stock ';
        }else{

            checkboxStock.checked = false;
            stock.innerHTML='Afficher le stock disponible';
            stock2.innerHTML='Afficher le stock disponible';
        }

    }); 
}
/* $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ */
/* $$$$$$$$$$$$$ AFFICHER/MASQUER LE STOCK $$$$$$$$$$$$$$$$$ */
const affStock = ()=>
{
    const divStock = document.querySelectorAll('.stock');
    const checkStock = document.querySelector('#icon-tic-stock');
    const checkStock2 = document.querySelector('#icon-tic-stock2');
    checkStock.addEventListener('click',()=>
    {
        console.log('click');
        console.log(checkStock.checked);
        if (checkStock.checked) {
            for (let i = 0; i < divStock.length; i++) {
                divStock[i].style.display = 'flex';
            }
            
            
        } else {
            for (let i = 0; i < divStock.length; i++) {
                divStock[i].style.display = 'none';
            }
        }
    });
    checkStock2.addEventListener('click',()=>
    {
        if (checkStock2.checked) {
            for (let i = 0; i < divStock.length; i++) {
                divStock[i].style.display = 'flex';
            }
            
        } else {
            for (let i = 0; i < divStock.length; i++) {
                divStock[i].style.display = 'none';
            }
        }
    });

}
// BOUTON PLUS Incrementer
const addStk = () =>
{
    const plus = document.querySelectorAll('.plus');
    

    plus.forEach(plus =>
        {
            plus.addEventListener('click',()=>
            {
                var plusId = '#'+ plus.id;
                console.log('id du plus :  ',plusId);
                var stkId = '.stk' + plus.id;
                var stk= document.querySelector(stkId);
                console.log('stk :  ',stk);
                var moinsId = '.'+ plus.id;
                var moins= document.querySelector(moinsId);
                console.log('moins :  ',moins);
                var valstk='.valstock'+plus.id;
                var valstkId = document.querySelector(valstk);
                console.log('stock dispo :',valstkId.innerHTML);

                moins.disabled = false;
                if (stk.value >=valstkId.innerHTML - 1) {
                    plus.disabled = true;

                } else {
                    plus.disabled = false;

                }
                stk.value ++;

            });
        });
}
// BOUTON moins Decrementer
const removeStk = () =>
{
    const moins = document.querySelectorAll('.moins');
    

    moins.forEach(moins =>
        {
            moins.addEventListener('click',()=>
            {
                var moinsId = '#'+ moins.id;
                console.log('id du moins :  ',moinsId);
                var stkId = '.stk' + moins.id;
                var stk= document.querySelector(stkId);
                console.log('stk :  ',stk);
                var plusId = '.'+ moins.id;
                var plus= document.querySelector(plusId);
                console.log('plus :  ',plus);
                var valstk='.valstock'+moins.id;
                var valstkId = document.querySelector(valstk);
                console.log('stock dispo :',valstkId.innerHTML);


                plus.disabled = false;

                if (stk.value <=1) {
                    moins.disabled = true;

                } else {
                    moins.disabled = false;

                }
                stk.value --;
            });
        });
}

const zoomProduit=()=>
{
    const lastImg = document.querySelectorAll('.img');
    console.log(lastImg);
    const newImg = document.querySelector('#newImg');
    console.log(newImg);
    const backgroundZoom = document.querySelector('#zoom');
    
    
    lastImg.forEach(lastImg => {
      
        lastImg.addEventListener('click',()=>{
            backgroundZoom.classList.toggle('pre-window-product-is-active');
            console.log(backgroundZoom);
            newImg.src = lastImg.src;
        });
        
    });
/* pour fermer au click sur le bouton en haut a droite */

    const btnClose = document.querySelector('.btn-close-product');
    btnClose.addEventListener('click',()=>{
        backgroundZoom.classList.toggle('pre-window-product-is-active');
    });
}


/* Appel des fonctions */
navSlide();
filtreSlide();
clickSearchBar();
closeFiltre();
ifChecked();
affStock();
addStk();
removeStk();
addToCart();
zoomProduit();
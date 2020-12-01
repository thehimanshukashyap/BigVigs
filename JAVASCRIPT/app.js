const navSlide1 = ()=>{
    const burger =document.querySelector('.burger');
    const nav = document.querySelector('.list-item');
    const navLinks = document.querySelectorAll('.list-item a');
    // Toggle nav
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
        // Animate nav-links
        navLinks.forEach((link,index)=>{
            if(link.style.animation){
                link.style.animation = '';
            }
            else{
                link.style.animation = `navLinkFade 1.5s ease forwards`;
            }
        });
        // burger animation
        burger.classList.toggle('toggle');
    });
}

navSlide1();
const navSlide = ()=>{
    const burger =document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');
    // Toggle nav
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
        // Animate nav-links
        navLinks.forEach((link,index)=>{
            if(link.style.animation){
                link.style.animation = '';
            }
            else{
                link.style.animation = `navLinkFade 1.5s ease forwards`;
            }
        });
        // burger animation
        burger.classList.toggle('toggle');
    });
}

navSlide();
// open navbar
const menu = document.querySelector('.menu');
const navbar = document.querySelector('nav');

menu.addEventListener('click', () => {
  navbar.classList.toggle('active-nav');
})

// close navbar when clicking nav links
const navLinks = document.querySelectorAll('nav ul li a');

navLinks.forEach( anchor => {
  anchor.addEventListener('click', directingNav);
})

function directingNav() {
  navbar.classList.remove('active-nav');
}

//animation on scroll
const aosElements = document.querySelectorAll('.aos');

window.addEventListener('scroll', ScrollElements);

function ScrollElements() {

  aosElements.forEach(e => {
    if (isVisable(e)) {
      e.classList.add('active');
    } 
  });

}

function isVisable(e) {
  const elementPosition = e.getBoundingClientRect();
  const distanceFromTop = -400;

  return elementPosition.top - window.innerHeight < distanceFromTop ? true : false;
}

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

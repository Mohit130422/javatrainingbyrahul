//navbar toggle on mobile view
let menuIcon = document.querySelector('#btn-menu');
let navbar =  document.querySelector('.nav-links');

menuIcon.onclick = () =>{
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('nav-on');
}

//scroll header section
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () =>{
  sections.forEach(sec => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 100;
    let height = sec.offsetHeight;
    let id  = sec.getAttribute('id');

    if (top >= offset && top < offset + height){
      navLinks.forEach(links => {
        links.classList.remove('active-link');
        document.querySelector('header nav a[href*=' + id + ']').classList.add('active-link');
      });
    }

    let header = document.querySelector('header');
    header.classList.toggle('scroll-head', window.scrollY > 100)

    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('nav-on');

  });
}

$(".video-img").click(function() {
  var video = $(this).closest('.intro-vdo').find('video')[0];
  video.paused ? video.play() : video.pause();
});
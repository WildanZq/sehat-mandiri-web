const navBtn = document.getElementById('nav-btn');
const navMobile = document.getElementById('nav-mobile');

navBtn.onclick = function() {
    navBtn.classList.toggle('active');
    navMobile.classList.toggle('active');
}

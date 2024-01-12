let slides = document.querySelectorAll(".slider img");

let currentSlide = 0;

function showSlide(n) {
  slides[currentSlide].classList.remove("active");
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add("active");
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function previousSlide() {
  showSlide(currentSlide - 1);
}

setInterval(nextSlide, 3000); // Thay đổi slide sau 5 giây

showSlide(currentSlide); // Hiển thị slide đầu tiên


const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$('.menu-menu-main > li');
console.log(tabs);
const tabActive = $('.menu-menu-main > li.active');
const line = $('.line');
line.style.left = tabActive.offsetLeft + 'px';
line.style.width = tabActive.offsetWidth + 'px';

tabs.forEach((tab, index) => {
  tab.addEventListener("mouseover", function () {
    line.style.left = this.offsetLeft + 'px';
    line.style.width = this.offsetWidth + 'px';
    $('.menu-menu-main > li.active').classList.remove('active');
    this.classList.add('active');
  })
});


// login
const buyBtns = document.querySelectorAll('.js-login')
const modal = document.querySelector('.modal')
const modalContainer = document.querySelector('.js-modal-container')
const modalClose = document.querySelector('.js-modal-close')

function showlogin() {
  modal.classList.add('open')
}

function hidelogin() {
  modalContainer.classList.add('unrebound');
  setTimeout(function(){
    modal.classList.remove('open')
    modalContainer.classList.remove('unrebound');
  }, 150);
}

for (const buyBtn of buyBtns) {
  buyBtn.addEventListener('click', showlogin)
}

modalClose.addEventListener('click', hidelogin)

modal.addEventListener('click', hidelogin)

modalContainer.addEventListener('click', function (event) {
  event.stopPropagation()
})

// register

const registerBtn = document.querySelector("#register");
const form_register = document.querySelector(".modal-booking");
const cloes_modal = document.querySelector(".modal-booking-close");


function show_register() {
  form_register.classList.add('open');
}

function hide_rigister() {
  form_register.classList.add('unrebound');
  setTimeout(function(){
    form_register.classList.remove('open')
    form_register.classList.remove('unrebound');
  }, 150);
}

registerBtn.addEventListener('click', show_register);

cloes_modal.addEventListener('click', hide_rigister);

// show service

const service_btn = document.querySelector("#menu-item-321");
const view_service = document.querySelector(".data_service");
const close_service = document.querySelector("#show_service .close");


function show_service() {
  view_service.classList.add('open_service');
  view_service.classList.add('dialog-rebound');
}

function hide_service() {
  view_service.classList.add('unrebound');
  setTimeout(function(){
    view_service.classList.remove('open_service')
    view_service.classList.remove('unrebound');
    view_service.classList.remove('dialog-rebound');
  }, 150);
}

service_btn.addEventListener('click', show_service);

close_service.addEventListener('click', hide_service);
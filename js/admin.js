var tabs_content = document.querySelectorAll(".tabs_content");
var length_tabs_content = tabs_content.length;

for (i = 1; i < length_tabs_content; ++i) {
  tabs_content[i].style.display = "none";
}

function onpen_list(e, id) {
  var i, tabs_link;

  for (i = 0; i < length_tabs_content; ++i) {
    tabs_content[i].style.display = "none";
  }

  tabs_link = document.querySelectorAll(".tabs_link");
  var length_tabs_link = tabs_link.length;

  for (i = 0; i < length_tabs_link; i++) {
    tabs_link[i].className = tabs_link[i].className.replace(" active", "");
  }

  document.getElementById(id).style.display = "block";
  e.currentTarget.className += " active";
}

// tạo lịch hẹn

const calendar_btn = document.querySelector(".calendar_btn");
const form_create_calendar = document.querySelector(".modal_calendar");
const cloes_modal = document.querySelector(".close-create-calendar");


function show_calendar() {
  form_create_calendar.classList.add('open');
}

function hide_calendar() {
  form_create_calendar.classList.add('unrebound');
  setTimeout(function(){
    form_create_calendar.classList.remove('open')
    form_create_calendar.classList.remove('unrebound');
  }, 150);
}

calendar_btn.addEventListener('click', show_calendar);

cloes_modal.addEventListener('click', hide_calendar);

// tạo khoa

const department_btn = document.querySelector(".department_btn");
const form_create_department = document.querySelector(".modal_department");
const close_department = document.querySelector(".close-create-department");


function show_department() {
  form_create_department.classList.add('open');
}

function hide_department() {
  form_create_department.classList.add('unrebound');
  setTimeout(function(){
    form_create_department.classList.remove('open')
    form_create_department.classList.remove('unrebound');
  }, 150);
}

department_btn.addEventListener('click', show_department);

close_department.addEventListener('click', hide_department);
// end


const setting_btn = document.querySelector(".setting_btn");
const subnav = document.querySelector(".subnav");

function show_subnav() {
  subnav.classList.add("open_subnav");
}

function hide_subnav() {
  subnav.classList.add("fadeOut_subnav");
  setTimeout(function() {
    subnav.classList.remove("open_subnav");
    subnav.classList.remove("fadeOut_subnav");
  }, 250);
}

setting_btn.addEventListener('click', function() {
  if(subnav.style.display == 'block') {
    // hide_subnav();
    subnav.style.animation = 'fadeOut .5s ease';
    setTimeout(function() {
      subnav.style.display = 'none';
    }, 200);
  }
  else {
    // show_subnav();
    subnav.style.display = 'block';
    subnav.style.animation = 'fadeIn .5s ease';
  }
});

// update password

const update_btn = document.querySelector(".update_btn");
const form_update_password = document.querySelector("#form_update_password");
const close_update = document.querySelector(".close_form_password");


function show_update() {
  form_update_password.classList.add('open');
}

function hide_update() {
  form_update_password.classList.add('unrebound');
  setTimeout(function(){
    form_update_password.classList.remove('open')
    form_update_password.classList.remove('unrebound');
    form_update_password.style.display = 'none';
  }, 150);
}

update_btn.addEventListener('click', show_update);

close_update.addEventListener('click', hide_update);


// show password

const show_btn = document.querySelectorAll(".show_password");
const input = document.querySelectorAll("#form_update_password .information input");
let array_show_btn = [...show_btn];
const lengthShow_btn = array_show_btn.length;
for(let i = 0; i < lengthShow_btn; i++){
  show_btn[i].addEventListener('click', function() {
    if(input[i].type == 'password'){
      input[i].type = "text";
    }
    else {
      input[i].type = "password";
    }
  });
}

// login success

const toast = document.querySelector("#toast_message");
const close_toast = document.querySelector(".icon_close");

function show_message() {
  toast.classList.add('open');
  toast.classList.add('dialog-rebound');
}

function hide_message() {
  toast.classList.add('unrebound');
  setTimeout(function(){
    toast.classList.remove('open')
    toast.classList.remove('unrebound');
  }, 500);
}

if(toast) {
  setTimeout(function() {
    show_message();
  },100);
  
  setTimeout(function() {
    hide_message();
  }, 5000);
  close_toast.addEventListener('click', hide_message);
}




const slides = document.querySelectorAll("#admin_home img");
const next = document.querySelector(".next_slide");
const prev = document.querySelector(".prev_slide");
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

next.addEventListener("click", nextSlide);
prev.addEventListener("click", previousSlide);

setInterval(() => showSlide(currentSlide + 1), 5000);
showSlide(currentSlide); 

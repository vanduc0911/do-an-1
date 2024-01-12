const toast = document.querySelector("#toast_message");
const close_toast = document.querySelector(".icon_close");

if(toast) {
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
  
  setTimeout(function() {
    show_message();
  },100);
  
  setTimeout(function() {
    hide_message();
  }, 5000);
  
  
  close_toast.addEventListener('click', hide_message);
}


// show calendar

const calendar_btn = document.querySelector(".calendar");
const view_calendar = document.querySelector(".data_calendar");
const close_calendar = document.querySelector(".close_calendar");


function show_calendar() {
  view_calendar.classList.add('open_calendar');
  view_calendar.classList.add('dialog-rebound');
}

function hide_calendar() {
  view_calendar.classList.add('unrebound');
  setTimeout(function(){
    view_calendar.classList.remove('open_calendar')
    view_calendar.classList.remove('unrebound');
    view_calendar.classList.remove('dialog-rebound');
  }, 150);
}

calendar_btn.addEventListener('click', show_calendar);

close_calendar.addEventListener('click', hide_calendar);

//show my info

const info_btn = document.querySelector(".my_info_btn");
const view_info = document.querySelector(".my_info");
const close = document.querySelector(".my_info .close");

function show_my_info() {
  view_info.classList.add('open_my_info');
  view_info.classList.add('dialog-rebound');
}

function hide_my_info() {
  view_info.classList.add('unrebound');
  setTimeout(function(){
    view_info.classList.remove('open_my_info')
    view_info.classList.remove('unrebound');
    view_info.classList.remove('dialog-rebound');
  }, 150);
}

info_btn.addEventListener('click', show_my_info);

close.addEventListener('click', hide_my_info);


// showw patient

const patient_btn = document.querySelector(".patient_btn");
const view_patient = document.querySelector("#view_patient");
const close_patient = document.querySelector("#view_patient .close");

function show_patient() {
  view_patient.classList.add('open_patient');
  view_patient.classList.add('dialog-rebound');
}

function hide_patient() {
  view_patient.classList.add('unrebound');
  setTimeout(function(){
    view_patient.classList.remove('open_patient')
    view_patient.classList.remove('unrebound');
    view_patient.classList.remove('dialog-rebound');
  }, 150);
}

patient_btn.addEventListener('click', show_patient);

close_patient.addEventListener('click', hide_patient);

// show menu user 

const name_doctor_btn = document.querySelector(".name_doctor");
const menu_user = document.querySelector(".menu-user");

function show_menu_user() {
  menu_user.classList.add('open_menu_user');
  menu_user.classList.add('dialog_menu_user');
}

function hide_menu_user() {
  menu_user.classList.add('undialog_menu_user');
  setTimeout(function(){
    menu_user.classList.remove('open_menu_user')
    menu_user.classList.remove('undialog_menu_user');
    menu_user.classList.remove('undialog_menu_user');
  }, 150);
}

name_doctor_btn.addEventListener('click', function() {
  if(menu_user.style.display == 'block') {
    menu_user.style.animation = 'undialog_menu_user .5s ease';
    setTimeout(function() {
      menu_user.style.display = 'none';
    }, 200);
  }
  else {
    menu_user.style.display = 'block';
    menu_user.style.animation = 'dialog_menu_user .5s ease';
  }
});

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

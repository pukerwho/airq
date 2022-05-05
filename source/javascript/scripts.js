$('.hamburger-toggle').on('click', function(){
  $(this).toggleClass('open');
  $('.mobile-menu').toggleClass('hidden').toggleClass('z-10');
  $('.modal-bg').toggleClass('hidden').toggleClass('z-2');
  $('body').toggleClass('overflow-hidden');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 70) {
    $('.header').addClass('header-fixed');
  } else {
    $('.header').removeClass('header-fixed');
  }
})

if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.remove('dark')
}

$('.js-toggle-light').on('click', function(){
  dataLight = $(this).data('light');
  if (dataLight === 'on') {
    document.documentElement.classList.add('dark');
    localStorage.theme = 'dark';
    
  } else {
    document.documentElement.classList.remove('dark');
    localStorage.theme = 'light';
  }
});

// Modals
function openModal(attrModal) {
  $('.modal[data-modal='+attrModal+']').addClass('open');
  $('.modal-bg').removeClass('hidden').addClass('z-10');
  $('body').addClass('overflow-hidden');
}

function closeModal(attrModal) {
  $('.modal').removeClass('open');
  $('.modal-bg').addClass('hidden').removeClass('z-10');
  $('body').removeClass('overflow-hidden');
}

$('.modal-js').on('click', function(e){
  var clickModalData = $(this).data('modal');
  var clickModalTitle = $(this).data('title');
  openModal(clickModalData);
});

$('.modal_content_close').on('click', function(){
  closeModal();
});

document.addEventListener('click', function(e){
  if(e.target.classList.value === 'modal open') {
    closeModal();
  }
});

// Forms
const modalScriptURL = 'https://script.google.com/macros/s/AKfycbzofVPeIlVakQxjDcvPudor2HQmERMZdAd6s4XQ1Q/exec'

// Форма - Консультація 
const form_consultation = document.forms['form_consultation']
if (form_consultation) {
  form_consultation.addEventListener('submit', e => {
    e.preventDefault()
    let this_form = form_consultation
    let data = new FormData(form_consultation)
    fetch(modalScriptURL, { method: 'POST', mode: 'cors', body: data})
      .then(response => consultationSuccessMessage(data, this_form))
      .catch(error => console.error('Error!', error.message))
  })  
}

function consultationSuccessMessage(data, this_form){
  this_form.reset();
  $('.form_consultation_success').addClass('block my-4').removeClass('hidden');
  // ga('send', {
  //   hitType: 'event',
  //   eventCategory: 'Форма',
  //   eventAction: 'Отправили вопрос',
  // })
}

// Форма - Callback 
const form_callback = document.forms['form_callback']
if (form_callback) {
  form_callback.addEventListener('submit', e => {
    e.preventDefault()
    let this_form = form_callback
    let data = new FormData(form_callback)
    fetch(modalScriptURL, { method: 'POST', mode: 'cors', body: data})
      .then(response => callbackSuccessMessage(data, this_form))
      .catch(error => console.error('Error!', error.message))
  })  
}

function callbackSuccessMessage(data, this_form){
  this_form.reset();
  $('.form_callback_success').addClass('block my-4').removeClass('hidden');
  // ga('send', {
  //   hitType: 'event',
  //   eventCategory: 'Форма',
  //   eventAction: 'Отправили вопрос',
  // })
}
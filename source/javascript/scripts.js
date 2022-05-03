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

// Form - Q
const modalScriptURL = 'https://script.google.com/macros/s/AKfycby3eCPQ5PoEgs2GKrjOiLkB7otoc1PHiDRtKGYDrTkYEIYsC_3_IKZc55QHFCERSDrQ/exec'
const form_q = document.forms['form_q']
if (form_q) {
  form_q.addEventListener('submit', e => {
    e.preventDefault()
    let this_form = form_q
    let data = new FormData(form_q)
    fetch(modalScriptURL, { method: 'POST', mode: 'cors', body: data})
      .then(response => showSuccessMessage(data, this_form))
      .catch(error => console.error('Error!', error.message))
  })  
}

function showSuccessMessage(data, this_form){
  this_form.reset();
  $('.form_q_success').addClass('block my-4').removeClass('hidden');
  ga('send', {
    hitType: 'event',
    eventCategory: 'Форма',
    eventAction: 'Отправили вопрос',
  })
  setTimeout(function(){
    $('.form_q_success').removeClass('block my-4').addClass('hidden');
  }, 4500)
}
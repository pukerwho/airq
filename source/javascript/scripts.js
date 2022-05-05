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

// Forms
const modalScriptURL = 'https://script.google.com/macros/s/AKfycbzu0XxkJ0fFOM2UVbo3G-o4oZOh1O_InTs8TWKfs5SjzFdet-_z7XQOHXQLlojJUR9t7g/exec'

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
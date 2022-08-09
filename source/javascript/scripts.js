$(".hamburger-toggle").on("click", function () {
  $(this).toggleClass("open");
  $(".mobile-menu").toggleClass("hidden").toggleClass("z-10");
  $(".modal-bg").toggleClass("hidden").toggleClass("z-2");
  $("body").toggleClass("overflow-hidden");
});

$(window).scroll(function () {
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 70) {
    $(".header").addClass("header-fixed");
  } else {
    $(".header").removeClass("header-fixed");
  }
});

if (
  localStorage.theme === "dark" ||
  (!("theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  document.documentElement.classList.add("dark");
} else {
  document.documentElement.classList.remove("dark");
}

$(".js-toggle-light").on("click", function () {
  dataLight = $(this).data("light");
  if (dataLight === "on") {
    document.documentElement.classList.add("dark");
    localStorage.theme = "dark";
  } else {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
  }
});

// Modals
function openModal(attrModal) {
  $(".modal[data-modal=" + attrModal + "]").addClass("open");
  $(".modal-bg").removeClass("hidden").addClass("z-10");
  $("body").addClass("overflow-hidden");
}

function closeModal(attrModal) {
  $(".modal").removeClass("open");
  $(".modal-bg").addClass("hidden").removeClass("z-10");
  $("body").removeClass("overflow-hidden");
}

$(".modal-js").on("click", function (e) {
  var clickModalData = $(this).data("modal");
  var clickModalTitle = $(this).data("title");
  openModal(clickModalData);
});

$(".modal_content_close").on("click", function () {
  closeModal();
});

document.addEventListener("click", function (e) {
  if (e.target.classList.value === "modal open") {
    closeModal();
  }
});

// Форма - Консультація
function sendTelegram(username, userphone, sitepage) {
  jQuery
    .ajax({
      method: "post",
      url: ajaxurl,
      data: {
        user_name: username,
        user_phone: userphone,
        site_page: sitepage,
        action: "send_telegram_message_action",
      },
    })
    .success(function (msg) {
      console.log(msg);
      consultationSuccessMessage();
    });
}

const form_consultation = document.forms["form_consultation"];
if (form_consultation) {
  form_consultation.addEventListener("submit", (e) => {
    e.preventDefault();
    username = $(".input-username").val();
    userphone = $(".input-userphone").val();
    sitepage = window.location.href;
    sendTelegram(username, userphone, sitepage);
  });
}

function consultationSuccessMessage(data, this_form) {
  // this_form.reset();
  $(".form_consultation_success").addClass("block my-4").removeClass("hidden");
  // ga('send', {
  //   hitType: 'event',
  //   eventCategory: 'Форма',
  //   eventAction: 'Отправили вопрос',
  // })
}

// Форма - Callback
const form_callback = document.forms["form_callback"];
if (form_callback) {
  form_callback.addEventListener("submit", (e) => {
    e.preventDefault();
    let this_form = form_callback;
    let data = new FormData(form_callback);
    fetch(modalScriptURL, { method: "POST", mode: "cors", body: data })
      .then((response) => callbackSuccessMessage(data, this_form))
      .catch((error) => console.error("Error!", error.message));
  });
}

function callbackSuccessMessage(data, this_form) {
  this_form.reset();
  $(".form_callback_success").addClass("block my-4").removeClass("hidden");
  // ga('send', {
  //   hitType: 'event',
  //   eventCategory: 'Форма',
  //   eventAction: 'Отправили вопрос',
  // })
}

function readingTime() {
  const text = document.querySelector(".single-services .content").innerText;
  const wpm = 225;
  const words = text.trim().split(/\s+/).length;
  const time = Math.ceil(words / wpm);
  document.querySelector(".post-time-read span").innerText = time;
}
if (document.body.classList.contains("single-services")) {
  readingTime();
}

//BLOG SUBJECTS
let blogSubjects = document.querySelector(".single-services_subjects");
let blogH2 = document.querySelectorAll(".single-services .content h2");
let blogSubjectsBlock = document.querySelector(
  ".single-services_subjects_inner"
);
let blogH2Array = [];

if (blogH2.length > 0) {
  blogSubjects.style.display = "inline-block";
}

if (blogH2) {
  for (const [index, bH2] of blogH2.entries()) {
    bH2.id = "s" + index;
    let tempH2 = bH2.innerText;
    blogH2Array.push(tempH2);
  }
}

for (const [index, bH2Ar] of blogH2Array.entries()) {
  let tempH2Li = document.createElement("li");
  let tempH2A = document.createElement("a");
  tempH2Li.className = "mb-1";
  tempH2A.innerHTML = bH2Ar;
  tempH2A.href = "#s" + index;
  tempH2Li.append(tempH2A);
  blogSubjectsBlock.append(tempH2Li);
}

let anchors = document.querySelectorAll(
  '.single-services_subjects_inner a[href*="#"]'
);

for (anchor of anchors) {
  if (anchor) {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      anchorId = this.getAttribute("href");
      yOffset = -110;
      element = document.querySelector(anchorId);
      console.log(element);
      y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

      window.scrollTo({ top: y, behavior: "smooth" });
    });
  }
}

// (B) PREVENT CLIPBOARD COPYING
document.addEventListener(
  "copy",
  (evt) => {
    // (B2) PREVENT THE DEFAULT COPY ACTION
    evt.preventDefault();
  },
  false
);

// Search
let searchIcon = document.querySelector(".search-icon");
let searchModal = document.querySelector(".search-modal");
searchIcon.addEventListener("click", function () {
  searchModal.classList.remove("hidden");
  searchModal.classList.add("open");
  // JQuery
  $(".modal-bg").removeClass("hidden").addClass("z-10");
  $("body").addClass("overflow-hidden");
});

document.addEventListener("click", function (e) {
  targetClick = e.target.classList.value;
  checkOpen = targetClick.includes("open");
  checkModal = targetClick.includes("search-modal");
  if (checkModal && checkOpen) {
    searchModal.classList.add("hidden");
    searchModal.classList.remove("open");
    // JQuery
    $(".modal-bg").addClass("hidden").removeClass("z-10");
    $("body").removeClass("overflow-hidden");
  }
});

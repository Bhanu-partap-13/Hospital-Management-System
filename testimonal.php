<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MedEase</title>

  <!-- CSS Files -->
  <link rel="stylesheet" href="Css-Files/Rateus.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="googletranslate.css">
  <link rel="stylesheet" href="Css-Files/popupfeedbacksctioncss.css">
  <link rel="stylesheet" href="index.css">
  <link href="Css-Files/animate.min.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="remixicon/remixicon.css" rel="stylesheet">
  <link href="swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="patient-portal.css" rel="stylesheet">
  <link rel="stylesheet" href="chatbox.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0">
  <link rel="stylesheet" href="./Css-Files/aboutus.css">
  <link rel="stylesheet" href="./Css-Files/testimonial.css">
  <link rel="stylesheet" href="Css-Files/caduceus.css">

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/b08b6de27e.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
  <script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
  <script src="js/emailvalidation.js" defer></script>
  <script src="js/googletranslatejs.js" defer></script>
  <script src="js/testimonalslider.js" defer></script>
  <script src="js/phonejs.js" defer></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js" defer></script>
  <script src="glightbox/js/glightbox.min.js" defer></script>
  <script src="php-email-form/validate.js" defer></script>
  <script src="purecounter/purecounter.js" defer></script>
  <script src="swiper/swiper-bundle.min.js" defer></script>
  <script src="https://unpkg.com/typed.js@2.0.132/dist/typed.umd.js" defer></script>
  <script src="js/main.js" defer></script>
  <script src="patient-portal.js" defer></script>
  <script src="js/backtotopjs.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" defer></script>
  <script src="js/chatbotjs.js" defer></script>
  <script src="https://www.chatbase.co/embed.min.js" chatbotId="Jd7y_bPgxzqROoSNRvh2q" domain="www.chatbase.co" defer></script>
  <script src="js/revealelementsonscrolljsfor_index_html.js" defer></script>
  <script src="js/loaderjs.js" defer></script>
  <script src="js/progressbar_and_header.js" defer></script>
  <script src="js/patientportal_loginjs.js" defer></script>
  <script src="js/popupfeedback.js" defer></script>
  <style>

/* Styling the area of the slides */
#slideshow {
    width: 100%;
    overflow: hidden;
    height: 300px;
    width: 1300px;
    margin: 0 auto;
}

/* Style each of the sides 
  with a fixed width and height */
.slide {
    float: left;
    height: 300px;
    width: 1300px;
}

/* Add animation to the slides */
.slide-wrapper {

    /* Calculate the total width on the
    basis of number of slides */
    width: calc(1300px * 4);

    /* Specify the animation with the
    duration and speed */
    animation: slide 18s ease infinite;
}

/* Set the background color
  of each of the slides */
.slide:nth-child(1) {
    background: white;
}

.slide:nth-child(2) {
    background: white;
}

.slide:nth-child(3) {
    background: white;
}


/* Define the animation 
  for the slideshow */
@keyframes slide {

    /* Calculate the margin-left for 
    each of the slides */
    20% {
        margin-left: 0px;
    }

    40% {
        margin-left: calc(-1300px * 1);
    }

    60% {
        margin-left: calc(-1300px * 2);
    }

    80% {
        margin-left: calc(-1300px * 3);
    }
}
    </style>
</head>
<body>
  <!-- Your body content here -->

  <!-- Feedback Popup Start -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <h2>Thank You for Your Feedback! 💚</h2>
      <div class="popup-icon">
        <img src="/Feedback Tick.png" width="84" alt="✔️">
      </div>
      <p>Your feedback has been received.<br> We appreciate the input you provide.</p>
      <button class="popup-button" onclick="closePopup()"><a class="active" aria-current="page">Back to Home</a></button>
    </div>
  </div>
  <!-- Feedback Popup End -->

  <!-- Slideshow -->
  <div id="slideshow">
    <div class="slide-wrapper">
      <!-- Define each of the slides and write the content -->
      <div class="slide">
        <div class="testimonial-item text-center">
          <div class="position-relative mb-5">
            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
              <i class="fa fa-quote-left fa-2x text-primary"></i>
            </div>
          </div>
          <p class="fs-4 fw-normal">My experience at MEDEASE was exceptional. Dr. David Patel and his team displayed incredible skill and compassion during my brain surgery. They took the time to address my concerns and provided clear explanations at every step. The post-operative care was outstanding, and the nursing staff was attentive and supportive. I am grateful to MEDINOVA for their expertise in neurosurgery and the positive impact they made on my life.
          </p>
          <hr class="w-25 mx-auto">
          <h3 style="color: black !important;">Jennifer Lawrence</h3>
        </div>
      </div>
      <!-- Additional slides here -->
      <div class="slide">
        <div class="testimonial-item text-center">
          <div class="position-relative mb-5">
            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
              <i class="fa fa-quote-left fa-2x text-primary"></i>
            </div>
          </div>
          <p class="fs-4 fw-normal">
I had a fantastic experience at MEDEASE's cardiology department. Doctor provided exemplary care, explaining my condition thoroughly and recommending the most appropriate treatment. The staff was attentive and professional throughout my stay. Thanks to their expertise and personalized approach, I feel more confident about my heart health. I highly recommend this hospital for cardiology-related concerns
</p>
          <hr class="w-25 mx-auto">
          <h3 style="color: black !important;">John smith</h3>
        </div>
      </div>

      <div class="slide">
        <div class="testimonial-item text-center">
          <div class="position-relative mb-5">
            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
              <i class="fa fa-quote-left fa-2x text-primary"></i>
            </div>
          </div>
          <p class="fs-4 fw-normal">
I can't thank the staff at MEDEASE's Pediatric Department enough for the care they provided to my child. Dr. Emily Johnson was patient, kind, and thorough in her examination. She made my child feel comfortable and answered all our questions. The nurses and support staff were friendly and went above and beyond to create a child-friendly environment. I highly recommend this hospital for any parent seeking top-notch pediatric care
</p>
          <hr class="w-25 mx-auto">
          <h3 style="color: black !important;">
Sophia Thompson</h3>
        </div>
      </div>

      <div class="slide">
        <div class="testimonial-item text-center">
          <div class="position-relative mb-5">
            <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
            <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
              <i class="fa fa-quote-left fa-2x text-primary"></i>
            </div>
          </div>
          <p class="fs-4 fw-normal">I had an outstanding experience at MEDEASE's orthopedic department. The doctor provided exceptional care, carefully diagnosing my condition and recommending the best possible treatment options. Throughout my stay, the staff were incredibly supportive and professional, ensuring all my needs were met. Their attention to detail and commitment to personalized care significantly improved my mobility and comfort.
          </p>
          <hr class="w-25 mx-auto">
          <h3 style="color: black !important;">Vaibhav Smith</h3>
        </div>
      </div>


    </div>
  </div>
  
  </script>
</body>
</html>

<!-- About Section Start -->
<div class="about-section py-5">
    <div class="container">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0 position-relative" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img src="hot.jpg" style="width: 30rem !important;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5 about-heading hidden"  style="color: black !important;">About Us</h5>
                    <h1 class="display-4 about-title hidden" style="color: black;">Best Medical Care For Yourself and Your Family</h1>
                </div>
                <p class="about-description hidden" style="color: white;">At MEDEASE, we are committed to revolutionizing healthcare delivery by providing state-of-the-art medical services with a patient-centric approach. Our mission is to offer comprehensive, specialized healthcare that is easily accessible and tailored to meet the unique needs of every patient. Equipped with cutting-edge technology and a dedicated team of healthcare professionals, we aim to create an environment that fosters trust, comfort, and wellness. Whether you need preventive care, diagnostic services, or advanced treatment options, MEDEASE stands by you at every step of your health journey. Your well-being is our priority, and we are here to ensure you receive the highest standard of care. Welcome to a new era of healthcare in your city!</p>
               <div class="row g-3 pt-3">
    <div class="col-sm-3 col-6">
        <div class="card-item">
            <i class="fa fa-user-md"></i>
            <h6>Qualified<small>Doctors</small></h6>
        </div>
    </div>
    <div class="col-sm-3 col-6">
        <div class="card-item">
            <i class="fa fa-procedures"></i>
            <h6>Emergency<small>Services</small></h6>
        </div>
    </div>
    <div class="col-sm-3 col-6">
        <div class="card-item">
            <i class="fa-solid fa-calendar-days"></i>
            <h6>Appointment<small>Testing</small></h6>
        </div>
    </div>
    <div class="col-sm-3 col-6">
        <div class="card-item">
            <i class="fa fa-bed"></i>
            <h6>Beds<small>Beds</small></h6>
        </div>
    </div>
</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add this script at the end of your body tag or in a separate JS file -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const elements = document.querySelectorAll('.hidden');

        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('hidden');
                    // Add different animations based on the element
                    if (entry.target.classList.contains('about-heading')) {
                        entry.target.classList.add('animate-fade-in');
                    } else {
                        entry.target.classList.add('animate-slide-up');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, options);

        elements.forEach(element => {
            observer.observe(element);
        });
    });
</script>

<!-- About Section End -->

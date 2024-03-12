<?php
require('includes/header.php');
?>
<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">OVER ONS</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Ratione ad incidunt distinctio <br> recusandae et quisquam ex
        optio delectus assumenda sed?</p>
</div>

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Vitae ullam minima animi obcaecati nobis quisquam itaque?
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Vitae ullam minima animi obcaecati nobis quisquam itaque?
            </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
            <img src="afbeeldingen/over_ons/over_ons.jpg" class="w-100">
        </div>
    </div>
</div>

<!-- <div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/hotel.svg" width="70px">
                <h4 class="mt-3">100+ ROOMS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/customers.svg" width="70px">
                <h4 class="mt-3">200+ CUSTOMERS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/rating.svg" width="70px">
                <h4 class="mt-3">150+ REVIEWS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="images/about/staff.svg" width="70px">
                <h4 class="mt-3">100+ STAFFS</h4>
            </div>
        </div>
    </div>
</div> -->

<h3 class="my-5 fw-bold h-font text-center">
    ONS TEAM 
</h3>

<!-- swiper-pagination -->
<div class="container px-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper mb-5">
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="afbeeldingen/over_ons/team.jpg" class="w-100">
                <h5 class="mt-2">Naam</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="afbeeldingen/over_ons/team.jpg" class="w-100">
                <h5 class="mt-2">Naam</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="afbeeldingen/over_ons/team.jpg" class="w-100">
                <h5 class="mt-2">Naam</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="afbeeldingen/over_ons/team.jpg" class="w-100">
                <h5 class="mt-2">Naam</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="afbeeldingen/over_ons/team.jpg" class="w-100">
                <h5 class="mt-2">Naam</h5>
            </div>
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="afbeeldingen/over_ons/team.jpg" class="w-100">
                <h5 class="mt-2">Naam</h5>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<?php
require('includes/footer.php');
?>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 40,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
</script>
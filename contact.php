<?php
require('includes/header.php');
?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">CONTACT</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Ratione ad incidunt distinctio <br> recusandae et quisquam ex
        optio delectus assumenda sed?</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">

            <div class="bg-white rounded shadow p-4">
                <iframe class="w-100" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d311881.3800905193!2d4.622096612520544!3d52.36002422796678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617c1dcedf6af%3A0xb7e60f149191e0f!2sMBO%20College%20Almere%20-%20ROC%20van%20Flevoland!5e0!3m2!1snl!2snl!4v1710249433037!5m2!1snl!2snl" height="450" loading="lazy"></iframe></iframe>
                <h5>Adres</h5>
                <a href="https://maps.app.goo.gl/bXR967f3V5Tza3d16" target="_blank" class="d-inline-block text-decoration-none text-dark">
                    <i class="bi bi-geo-alt-fill"></i> Autopad 12, Almere, Flevoland
                </a>
                <h5 class="mt-4">Bel ons</h5>
                <a href="TEL +917778889991" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> (036) 123 45 67
                </a>
                <br>
                <h5 class="mt-4">Email</h5>
                <a href="mailto: ask.tjwebdev@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-envelope-fill"></i> rent-a-car@mail.com</a>

                <h5 class="mt-4">Volg ons</h5>
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-twitter me-1"></i>
                </a>
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-facebook me-1"></i>
                </a>
                <a href="#" class="d-inline-block text-dark fs-5">
                    <i class="bi bi-instagram me-1"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4">
                <form>
                    <h5>Stuur een bericht</h5>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500">Naam</label>
                        <input type="text" class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500">Email</label>
                        <input type="email" class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500">Onderwerp</label>
                        <input type="text" class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500">Bericht</label>
                        <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                    </div>
                    <button type="submit" class="btn text-white custom-bg mt-3">VERSTUUR</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require('includes/footer.php');
?>
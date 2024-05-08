   <?php
    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    ?>

   <!-- Header -->
   <nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top ">
       <div class="container-fluid">
           <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">RENT-A-CAR</a>
           <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                       <a class="nav-link me-2" href="index.php">Home</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link me-2" href="cars.php">Auto huren</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link me-2" href="busjes.php">Busje huren</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link me-2" href="contact.php">Contact</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="about.php">Over ons</a>
                   </li>

               </ul>
               <div class="d-flex">
                   <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                       Inloggen
                   </button>
                   <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                       Registreren
                   </button>
               </div>
           </div>
       </div>
   </nav>

   <!-- Inloggen Modal -->
   <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <form>
                   <div class="modal-header">
                       <h5 class="modal-title d-flex align-items-center">
                           <i class="bi bi-person-circle fs-3 me-2"></i> Inloggen klant
                       </h5>
                       <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="mb-3">
                           <label class="form-label">Email</label>
                           <input type="email" class="form-control shadow-none">
                       </div>
                       <div class="mb-4">
                           <label class="form-label">Wachtwoord</label>
                           <input type="password" class="form-control shadow-none">
                       </div>
                       <div class="d-flex align-items-center justify-content-between mb-2">
                           <button class="btn btn-dark shadwon-none">INLOGGEN</button>
                           <a href="javascript: void(0)" class="text-secondary text-decoration-none">Wachtwoord vergeten?</a>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>

   <!-- Registreren Modal -->
   <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <form id="register-form">
                   <div class="modal-header">
                       <h5 class="modal-title d-flex align-items-center">
                           <i class="bi bi-person-lines-fill fs-3 me-2"></i>
                           Klant Registratie
                       </h5>
                       <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Naam</label>
                                   <input name="name" value="Daan" type="text" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Email</label>
                                   <input name="email" value="daan@mail.com" type="email" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Telefoon nummer</label>
                                   <input name="phonenum" value="0681701480" type="number" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Afbeelding</label>
                                   <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Postcode</label>
                                   <input name="zip-code" value="1326 BA" type="text" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Straat + huisnummer</label>
                                   <input name="address" value="iepenstraat 4" type="text" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Plaats</label>
                                   <input name="residence" value="Almere" type="text" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Geboortedatum</label>
                                   <input name="dob" type="date" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Wachtwoord</label>
                                   <input name="pass" type="password" class="form-control shadow-none" required>
                               </div>
                               <div class="col-md-6 ps-0 mb-3">
                                   <label class="form-label">Bevestig Wachtwoord</label>
                                   <input name="cpass" type="password" class="form-control shadow-none" required>
                               </div>
                           </div>
                       </div>
                       <div class="text-center my-1">
                           <button type="submit" class="btn btn-dark shadow-none">REGISTREREN</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
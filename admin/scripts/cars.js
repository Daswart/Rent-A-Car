  let add_car_form = document.getElementById('add_car_form');

  add_car_form.addEventListener('submit', function (e) {
      e.preventDefault();
      add_cars();
  })

  function add_cars() {
      let data = new FormData();
      data.append('add_car', '');
      data.append('license_plate', add_car_form.elements['license_plate'].value);
      data.append('brand', add_car_form.elements['brand'].value);
      data.append('type', add_car_form.elements['type'].value);
      data.append('cost_per_day', add_car_form.elements['cost_per_day'].value);
      data.append('description', add_car_form.elements['description'].value);

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);

      xhr.onload = function () {
          console.log(this.responseText);
          var myModal = document.getElementById('add-car');
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();

          if (this.responseText == 1) {
              alert('success', 'Nieuwe auto toegevoegd!');
              add_car_form.reset();
              get_all_cars();
          } else {
              alert('error', 'Oeps, Er is iets misgegaan!');
          }

      }

      xhr.send(data);
  }

  function get_all_cars() {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function () {
          document.getElementById('car-data').innerHTML = this.responseText;
      }


      xhr.send('get_all_cars');
  }

  let edit_car_form = document.getElementById('edit_car_form');

  function edit_details(id) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


      xhr.onload = function () {
          console.log(JSON.parse(this.responseText));

          let data = JSON.parse(this.responseText);
          edit_car_form.elements['car_id'].value = data.roomdata.sr_no;
          edit_car_form.elements['license_plate'].value = data.roomdata.license_plate;
          edit_car_form.elements['brand'].value = data.roomdata.brand;
          edit_car_form.elements['type'].value = data.roomdata.type;
          edit_car_form.elements['cost_per_day'].value = data.roomdata.cost_per_day;
          edit_car_form.elements['description'].value = data.roomdata.description;
      }

      xhr.send('get_car=' + id);
  }

  edit_car_form.addEventListener('submit', function (e) {
      e.preventDefault();
      submit_edit_car();
  })

  function submit_edit_car() {
      let data = new FormData();
      data.append('edit_car', '');
      data.append('car_id', edit_car_form.elements['car_id'].value);
      data.append('license_plate', edit_car_form.elements['license_plate'].value);
      data.append('brand', edit_car_form.elements['brand'].value);
      data.append('type', edit_car_form.elements['type'].value);
      data.append('cost_per_day', edit_car_form.elements['cost_per_day'].value);
      data.append('description', edit_car_form.elements['description'].value);

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);

      xhr.onload = function () {
          console.log(this.responseText);
          var myModal = document.getElementById('edit_car');
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();

          if (this.responseText == 1) {
              alert('success', 'Auto is geüpdatet!');
              edit_car_form.reset();
              get_all_cars();
          } else {
              alert('error', 'Oops, er is iets misgegaan!');
          }

      }

      xhr.send(data);
  }

  function toggle_status(id, val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function () {
          if (this.responseText == 1) {
              alert('success', 'Status aangepast!');
              get_all_cars();
          } else {
              alert('error', 'Oops!Er is iets misgegaan!');
          }
      }


      xhr.send('toggle_status=' + id + "&value=" + val);
  }

  let add_image_form = document.getElementById('add_image_form');

  add_image_form.addEventListener('submit', function (e) {
      e.preventDefault();
      add_image();
  })

  function add_image() {
      let data = new FormData();
      data.append('image', add_image_form.elements['image'].files[0]);
      data.append('car_id', add_image_form.elements['car_id'].value);
      data.append('add_image', '');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);

      xhr.onload = function () {

          if (this.responseText == 'inv_img') {
              alert('error', 'Alleen afbeeldingen van het type JPG, WEBP of PNG zijn toegestaan!', 'image-alert');
          } else if (this.responseText == 'inv_size') {
              alert('error', 'De afbeelding moet kleiner zijn dan 2MB!', 'image-alert');
          } else if (this.responseText == 'upd_failed') {
              alert('error', 'Uploaden van de afbeelding is mislukt', 'image-alert');
          } else {
              alert('success', 'Nieuwe afbeelding toegevoegd!', 'image-alert');
              car_images(add_image_form.elements['car_id'].value, document.querySelector("#car_images .modal-title").innerText);
              add_image_form.reset();
          }
      }
      xhr.send(data);
  }

  function car_images(id, brand) {
      document.querySelector("#car_images .modal-title").innerText = brand;
      add_image_form.elements['car_id'].value = id;

      add_image_form['image'].value = '';

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function () {
          document.getElementById('car-image-data').innerHTML = this.responseText;
      }

      xhr.send('get_car_images=' + id);
  }

  function rem_image(img_id, car_id) {

      let data = new FormData();
      data.append('image_id', img_id);
      data.append('car_id', car_id);
      data.append('rem_image', '');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);

      xhr.onload = function () {

          if (this.responseText == 1) {
              alert('success', 'Afbeelding verwijderd!', 'image-alert');
              car_images(car_id, document.querySelector("#car_images .modal-title").innerText);
          } else {
              alert('error', 'Afbeedling verwijderen mislukt!', 'image-alert');
          }
      }
      xhr.send(data);
  }

  function thumb_image(img_id, car_id) {

      let data = new FormData();
      data.append('image_id', img_id);
      data.append('car_id', car_id);
      data.append('thumb_image', '');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/cars.php", true);

      xhr.onload = function () {

          if (this.responseText == 1) {
              alert('success', 'Afbeelding Thumbnail veranderd!', 'image-alert');
              car_images(car_id, document.querySelector("#car_images .modal-title").innerText);
          } else {
              alert('error', 'Veranderen Afbeelding Thumbnail muslukt!', 'image-alert');
          }
      }
      xhr.send(data);
  }

  function remove_car(car_id, brand, type, license_plate) {
      if (confirm("Weet je zeker dat je de " + brand + " " + type + " met kentekeken " + license_plate + " wilt verwijderen?")) {
          let data = new FormData();
          data.append('car_id', car_id);
          data.append('remove_car', '');

          let xhr = new XMLHttpRequest();
          xhr.open("POST", "ajax/cars.php", true);

          xhr.onload = function () {

              if (this.responseText == 1) {
                  alert('success', 'Auto Verwijderd!');
                  get_all_cars();
              } else {
                  alert('error', 'Verwijderen Auto mislukt!');
              }
          }
          xhr.send(data);
      }
  }

  window.onload = function () {
      get_all_cars();
  }
window.onload = function () {
  if (window.jQuery) {
    let calendar = document.getElementById('calendar');
    if (typeof (calendar) != 'undefined' && calendar != null) {
      var calendarinstance = new FullCalendar.Calendar(calendar, {
          events: public_events,
          // initialView: 'dayGridMonth',
        aspectRatio: 3,
        eventClick: function (info) {
          if (info.event._def.title == 'Unavailable') {
            return false;
          }
          const formData = new FormData();
          formData.append('appointment_date',info.event.start.toISOString().slice(0, 10) );
          formData.append('start_time',info.event.start.toLocaleTimeString('en-US', { hour12: false }));
          (async () => {
            const response = await fetch('modal_dynamic_create_appointment.php', { method: 'POST', body: formData });
            const result = await response.text();
            document.getElementById('dynamic_content').innerHTML = result;
            $('#exampleModal').modal('show');
          })();

  }
              
        });
        calendarinstance.render();
    }
    
    let province_dropdown = document.getElementById('province_id');
    if (typeof(province_dropdown) != 'undefined' && province_dropdown != null) {
      let city_dropdown = document.getElementById('city_id');
      let barangay_dropdown = document.getElementById('barangay_id');
      let zip_code = document.querySelector('input[name="zip_code"]');

      province_dropdown.addEventListener('change', function () {
        get_psgc(city_dropdown, "province_id", province_dropdown.value);
        get_psgc(barangay_dropdown, "city_id", city_dropdown.value);
        zip_code.value = city_dropdown.options[city_dropdown.selectedIndex].getAttribute('zip');
      });

      city_dropdown.addEventListener('change', function () {
        get_psgc(barangay_dropdown, "city_id", city_dropdown.value);
        zip_code.value = city_dropdown.options[city_dropdown.selectedIndex].getAttribute('zip');
      });



    }
      let image = document.getElementById("image");
    if (typeof(image) != 'undefined' && image != null) {
      let preview = document.getElementById("preview");
      image.onchange = evt => {
        const [file] = image.files
        if (file) {
          preview.src = URL.createObjectURL(file)
        }
      }
    }
    let btn_generate_password = document.getElementById("btn_generate_password");
    if (typeof(btn_generate_password) != 'undefined' && btn_generate_password != null) {
      btn_generate_password.addEventListener('click', function () {
        let input_password = document.getElementById("password");
        input_password.value = generate_password();
      });

    }

  }
  
}

    function get_psgc(element, target, value) {
      return fetch("../../get_psgc.php?" + target + "=" + value).then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
        .then(data => {
          element.innerHTML = data;
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
    }

    function generate_password() {
      let pass = '';
      let str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +
        'abcdefghijklmnopqrstuvwxyz0123456789@#$';
 
      for (let i = 1; i <= 8; i++) {
        let char = Math.floor(Math.random()
          * str.length + 1);
 
        pass += str.charAt(char)
      }
 
      return pass;
}

$(document).ready(function() {
        $(".select2").select2({
              dropdownParent: $("#exampleModal")
      });
        $(".selectn").select2({
      });
});
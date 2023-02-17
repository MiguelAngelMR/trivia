<?php include('header.php') ?>
<style>
  .text-fondo span:last-child{
    display: none;
  }
</style>
<div id="pagina">
  <div class="container" id="view-form" style="width: 90%; margin: 0 auto;">
    <div class="row">
      <div class="col-lg-12">
        <a href="/"><img src="./asset/elementos/trivia.png" alt="" class="logo my-3"></a>
      </div>
    <!--   <div class="col-lg-12 d-flex align-items-center justify-content-center my-2">
        <img src="./asset/elementos/trivia.png" class="img-fluid" alt="" style="max-width: 65%;">
      </div> -->
    </div>
    <div class="row py-4">
      <h1 class="mx-auto mb-2 text-fondo justify-content-center">Juega y Gana</h1>
      <p class="mx-auto mb-4 mt-0">
        Participa de esta nueva experiencia virtual
      </p>
      <div class="col-lg-7 col-md-12 align-content-center justify-content-center mx-auto py-3">
        <form action="" method="post" class="row flex-column g-3 needs-validation mx-auto" novalidate>
          <div class="row align-items-center mx-auto justify-content-center" id="campos"  style="max-width: 450px;">
            <div class="form-group">
              <input type="text" class="form-control green" maxlength="100"  id="nombres" name="nombres" value="" placeholder="Nombres completos">
              <div class="invalid-feedback">
               Por favor ingrese los nombres completos.
             </div>
           </div>
           <div class="form-group">
            <input type="email" class="form-control red"  maxlength="100" id="email" name="email" value="" placeholder="Correo electrónico">
            <div class="invalid-feedback">
             Por favor ingrese su correo electrónico.
           </div>
         </div>
         <div class="form-group">
          <input type="text" class="form-control orange"  maxlength="100" id="empresa" name="empresa" value="" placeholder="Empresa">
          <div class="invalid-feedback">
           Por favor ingrese su empresa.
         </div>
       </div>
       <div class="form-group">
        <input type="text" class="form-control blue" id="telefono" maxlength="9" name="telefono" value="" placeholder="Teléfono">
        <div class="invalid-feedback">
         Por favor ingrese su teléfono.
       </div>
     </div>
   </div>
   <div class="error text-center"></div>
   <button type="button" onclick="registrar()" class="btn btn-primary button mt-2 mb-2" style="max-width: 200px;">Jugar</button>

   <div class="form-check">
    <input class="form-check-input" type="checkbox" name="checkbox" value="" id="checkbox" style="margin-top: 0.8rem; border-color: #000;">
    <label class="form-check-label my-2 p-casilla" for="checkbox">
     Al marcar esta casilla, declaro conocer y aceptar que mis datos serán procesados y almacenados por los organizadores del evento en cumplimiento con la ley de datos personales y su reglamento aplicable a mi país, únicamente para registrarse al evento, conectarse con las llamadas y para enviar correspondencia con información de interés sobre dicho evento y temas relevantes del sector.
   </label>
 </div>
</form>
<!-- <p class="my-2 p-casilla">

</p> -->
</div>
</div>
</div>
</div>


<script type="text/javascript">
  function validateEmail(email) {
    const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
  var interval = null;

  function showError(mensaje) {
    clearInterval(interval);
    $(".error").html(mensaje);
    $('.error').show();

    interval = setInterval(() => {
      $(".error").html("");
      $('.error').hide();

    }, 3000);
  }
  $('.error').hide();
  function registrar() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      var nombres = $("#nombres").val();
      var email = $("#email").val();
      var empresa = $("#empresa").val();
      var telefono = $("#telefono").val();
      var checkbox = $("#checkbox").val();
      form.classList.add('was-validated');
      var respuesta = true;
      var checkboxvalor = 0;
      if (nombres != "") {
        if( !$('#checkbox').is(':checked') ) {
          showError("Debe marcar la casilla");
          return false;
        }
      }
      if (empresa != "") {
        if( !$('#checkbox').is(':checked') ) {
          showError("Debe marcar la casilla");
          return false;
        }
      }
      if( $('#checkbox').is(':checked') ) {
        checkboxvalor = 1;
      }
      if (email.trim() != "") {
        var em = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (!email.match(em)){
          showError("Ingresar un correo electrónico valido");
          return false;
        } 
        if( !$('#checkbox').is(':checked') ) {
          showError("Debe marcar la casilla");
          return false;
        }
      }
      if (telefono.trim() != "") {
       if (telefono.length < 9) {
         showError("El teléfono debe contener 9 caracteres");
         return false;
       }
       var valoresAceptados = /^[0-9]+$/;
       if (!telefono.match(valoresAceptados)){
        showError("El teléfono debe contener caracteres numéricos");
        return false;
      } 
      if( !$('#checkbox').is(':checked') ) {
        showError("Debe marcar la casilla");
        return false;
      }
    }

      // if (!validateEmail(email)) {
      //   showError("Ingresar un correo electrónico valido");
      //   respuesta = false;
      // }
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        var email = $("#email").val();
        $.ajax({
          data: {
            "nombres": nombres,
            "email": email,
            "empresa": empresa,
            "telefono": telefono,
            "checkboxvalor": checkboxvalor,
          },
          type: "POST",
          dataType: "json",
          url: './registro.php',
        }).done(function(response, textStatus, jqXHR) {
          console.log(response)
          if (response.status == "OK") {
            window.location.href = "./preguntas.php?id="+response.id_usuario;
          } else {
            showError("Error");
            return false;
          }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
          if (console && console.log) {
            console.log("La solicitud a fallado: " + textStatus);
          }
        });

      }

    });
  }

  $(function() {
    $(".text-fondo").lettering('words');
  });
</script>


<?php include('footer.php') ?>
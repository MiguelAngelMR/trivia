<?php include('header.php') ?>

<div id="pagina" class="fondo pagina1">
  <div class="container " id="view-questions">
    <div class="row ">
      <div class="col-lg-12 pt-4">
       <a href="/"> 
        <img src="./asset/elementos/trivia.png" alt="" class="logo my-0 mb-3">
      </a>
    </div>
  </div>
  <div class="contenedor" style="max-width: 90%; margin: 0 auto;">
    <div class="row py-0" >
      <div class="col-lg-12 d-flex align-items-center justify-content-center my-2 mb-2" style="position: relative;">
        <img src="" id="img-pregunta" class="img-fluid" style="max-height: 370px;" alt="">
        <div class="num-question">
          <img src="./asset/elementos/numero.svg" width="100%" alt="">
          <p class="mb-0" id="pregunta_numero">

          </p>
        </div>
      </div>
      
    </div>
    <div class="row mx-auto" style="max-width: 400px;">
      <h1 class="mx-auto mb-2 px-1 pt-3 text-center text-fondo justify-content-center" id="pregunta_titulo"></h1>
      <div class="box-questions mx-auto my-0 mt-2" id="preguntas_listado">
      </div>
      <center>
        <div class="error-preg"></div>
        <p class="text"></p>
        <button class="btn btn-primary button mt-2 px-5 mb-3" id="btn_siguiente">Siguiente</button>
      </center>
    </div>
  </div>
</div>
</div>

<?php $id_usuario = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); ?>
<script type="text/javascript">
  var interval = null;
  function showError(mensaje) {
    clearInterval(interval);
    $('.error-preg').show();
    $(".error-preg").html(mensaje);
    interval = setInterval(() => {
      $(".error-preg").html("");
      $('.error-preg').hide();
    }, 3000);
  }
  $('.text').hide();
  $('.error-preg').hide();

  fetch("./pregunta_c.php")
  .then(response => response.text())
  .then(data => {
    const json = JSON.parse(data);
    var pregunta_activa = Math.floor(Math.random()*json.data.length);
    // var puntaje = 0;
    const usuario = '<?php echo $id_usuario; ?>';
    var respondido = false;
    var preguntas = json;
    var pregunta = preguntas.data[pregunta_activa];

    function showPreguntas(){
      if(pregunta_activa==preguntas.length){
        showResultado();
        return;
      }
      respondido = false;
      var nm = pregunta_activa + 1; //NUMERO  DE PREGUNTA
      $("#pregunta_numero").html("# "+Number(nm));
      $("#pregunta_titulo").html(pregunta.pregunta);
      var imagenes = ["question1-min.jpg", "question3-min.jpg"];
      var img_ = Math.floor(Math.random()*imagenes.length);
      var img = imagenes[img_];
      var url = './asset/elementos/';
      $("#img-pregunta").attr('src', url+img);
      const ct = pregunta.correcta;
      var opcion1 = pregunta.respuesta1;
      var opcion2 = pregunta.respuesta2;
      var opcion3 = pregunta.respuesta3;
      var html_item = '<div  class="questions d-flex flex-row flex-nowrap align-items-center justify-content-center mb-3">';
      html_item += '<img src="./asset/elementos/question.png" alt="">';
      html_item += '<button class="trivia_a green question hover" id="option_1" data-fila="1" data-pregunta="'+pregunta.id+'" >';
      html_item += opcion1;
      html_item += '</button>';
      html_item += '</div>';
      html_item += '<div  class="questions d-flex flex-row flex-nowrap align-items-center justify-content-center mb-3">';
      html_item += '<img src="./asset/elementos/question.png" alt="">';
      html_item += '<button class="trivia_a red question hover"  id="option_2" data-fila="2" data-pregunta="'+pregunta.id+'" >';
      html_item += opcion2;
      html_item += '</button>';
      html_item += '</div>';
      html_item += '<div class="questions d-flex flex-row flex-nowrap align-items-center justify-content-center mb-3">';
      html_item += '<img src="./asset/elementos/question.png" alt="">';
      html_item += '<button class="trivia_a blue question hover" id="option_3" data-fila="3" data-pregunta="'+pregunta.id+'" >';
      html_item += opcion3;
      html_item += '</button>';
      html_item += '</div>';


      $("#preguntas_listado").html(html_item);

      $('.question').click(function(){

        var respuesta = $(this).data('fila');
        var pregunta = $(this).data('pregunta');

        $.ajax({
          url: './respuesta_usuario.php',
          type: 'POST',
          dataType: 'json',
          data: {respuesta: respuesta,pregunta: pregunta,usuario: usuario},
        })
        .done(function(response) {
          // console.log(response);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
        if (respuesta != ct) {
          $(this).addClass('desactive');
          showError('Respuesta incorrecta, intenta otra vez');
        }else{
          respondido = true;
          $('.error-preg').hide();
          $(this).addClass('correcta');
          $('.question').addClass('desactive');
          $('.text').show();
          $('.text').text('Respuesta correcta');
        } 
      })
    }
    $(document).ready(function(){
      $("#btn_siguiente").click(function(){
        if(!respondido){
          showError('Responda la pregunta')
          return;
        }else{
          document.location.href = './final.php';
        }
      });
      showPreguntas();
      $(function() {
        $(".text-fondo").lettering('words');
      });
    });

  });
</script>
<?php include('footer.php') ?>

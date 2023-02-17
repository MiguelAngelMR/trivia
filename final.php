<?php include('header.php') ?>
<div id="pagina">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-12">
        <a href="./" class="w-100 d-flex justify-content-end"><img src="./asset/elementos/trivia.png" alt="" class="logo my-3" ></a>
      </div>
      <div class="col-lg-12" style="position: relative;">
        <h1 class="thanks text-fondo my-5 justify-content-center mx-auto">Gracias por participar</h1>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    setTimeout(function(){
      document.location.href = './';
    }, 3000);
  })
</script>
<?php include('footer.php') ?>
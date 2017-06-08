<?php
include_once ('./includes/todo-header.php');
?>
  <!-- modal-->
  <div class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="closeModal">&times;</span>
        <h2 class="modal-h2"></h2>
      </div>
      <div class="modal-body">
        <p class="winOrLoose1">khclehbwl</p>
        <p class="winOrLoose2">ncwecbb</p>
      </div>
      <div class="modal-footer">
        <form action='snake.php'>
          <button class="btn-again" type="">Kör en gång till</button>
        </form>
        <form action='index.php'>
          <button class="btn-backhome" type="">Tillbaka till hemsidan</button>
        </form>
      </div>
    </div>
  </div>
  <!-- modal end -->
  <h1 class='text-center'>Snake game</h1>

  <canvas width="100" height="100" id="canvas"></canvas>

  <div class='container'>
    <div class='row'>
      <div class='col-xs-12 text-center'>
        <button id='up' class='btn-again direction'><span class='fa fa-arrow-up'></span></button>
        <button id='left' class='btn-again direction'><span class='fa fa-arrow-left'></span></button>
        <button id='right' class='btn-again direction'><span class='fa fa-arrow-right'></span></button>
        <button id='down' class='btn-again direction'><span class='fa fa-arrow-down'></span></button>
        <button id='pause' class='btn-again direction'><span class='fa fa-pause'></span></button>
      </div>
    </div>
  </div>



  <?php
include_once('./includes/snake_footer.php');
?>
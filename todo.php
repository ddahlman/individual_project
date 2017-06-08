<?php
include_once('./includes/todo-header.php');
?>

  <div class="container">
    <div class="well">
      <div class="overflow">
        <h1>Todo list</h1>
        <hr>
        <form class="form-horizontal">
          <div class="col-md-5">
            <div class="form-group">
              <label class="control-label" for="today">Datum </label>
              <input class="form-control" id="today" type="date" name="today" disabled>
            </div>
            <div class="form-group">
              <label class="control-label" for="best-before">Bäst före </label>
              <input class="form-control" id="bestBefore" type="date" name="best-before" placeholder="">
            </div>
            <div class="form-group">
              <label class="control-label" for="headline">Rubrik </label>
              <input class="form-control" id="headline" type="text" name="headline">
              <div id="head-error"></div>
            </div>
            <div class="form-group">
              <label class="control-label" for="todoItem">Att göra </label>
              <textarea class="form-control" id="todoItem" rows="4" name="todoItem"></textarea>
              <div id="todo-error"></div>
            </div>
            <div class="form-group">
              <input class="btn-again" type="button" id="submit" value="Spara" />
              <br>
              <br>
              <a id="clear" href="#">Rensa</a>
            </div>
          </div>
        </form>
        <div class="col-md-6 col-md-offset-1">
          <div id="addedItems">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
include_once('./includes/todo_footer.php');
?>
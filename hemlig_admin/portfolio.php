<div class="dark-bg">
  <h1 class="h1-white">Redigera portfolio</h1>
</div>
<div class='container'>
  <!--**************** lägg till url ***************-->
  <div class="row">
    <div class="white-bg">
      <form>
        <div class=' form-group row'>
          <div class='col-md-6'>
            <label for='add-url' class="control-label">Lägg till projekt url</label>
            <input id='add-url' type="text" class='form-control' placeholder="Lägg till en url">
          </div>
        </div>
        <!--************* lägg till text *************-->
        <div class='form-group row'>
          <div class='col-md-8'>
            <label for="add-proj-text" class="control-label">Lägg till text</label>
            <textarea id="add-proj-text" class='form-control' rows='10' placeholder="Lägg till text"></textarea>
          </div>
        </div>
        <div>
          <input type="button" id='add-project' class='btn btn-info' value="spara tillägg">
        </div>
      </form>
    </div>
  </div>
  <hr>
  <!--Uppdatera url ===================================-->
  <div id='projects'></div>
</div>
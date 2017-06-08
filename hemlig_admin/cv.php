<!--******************************************************************
CV text
**********************************************************************-->

<div class="dark-bg">
  <h1 class="h1-white">Redigera CV</h1>
</div>

<div class='container'>

  <div class="row">
    <div class="white-bg">
      <form action="">
        <div class='form-group row'>
          <div class='col-md-8'>
            <label class="control-label">redigera första CV-texten</label>
            <textarea class='form-control' name="first-text" id="first-text" rows="10">
            </textarea>
          </div>
        </div>
        <div>
          <input type="button" id='firstTxt-submit' class='btn btn-info' name="save-text" value="spara">
          <span id='cv-text' class='fa fa-check list-success'>ändrad!</span>
        </div>
      </form>
    </div>
  </div>
  <hr>
  <!--===================================== 1 ===========================================-->

  <div class="row">
    <div class="white-bg">
      <form class='header-form' action="">
        <div class='form-group row'>
          <div class='col-md-6'>
            <label class="control-label">Redigera första rubriken</label>
            <input type="text" class='form-control header'>
          </div>
        </div>
        <div class='form-group'>
          <input type="hidden" class='headerVal' value="1">
          <input type="button" class='btn btn-info grey-headers' value="spara rubrik">
          <span id='cv-header-1' class='fa fa-check list-success'>ändrad!</span>
        </div>
      </form>
      <hr>

      <!--insert to and update first list========================-->

      <label class="control-label">Redigera listan</label>
      <ul id='first-list'></ul>
      <hr>

      <form action="">
        <div class='form-group row'>
          <div class='col-md-6'>
            <label class="control-label">Lägg till i listan</label>
            <input type="text" class='form-control' placeholder="Lägg till i listan">
          </div>
        </div>
        <div class='form-group'>
          <input type="button" class='btn btn-info add' value="lägg till">
        </div>
      </form>

    </div>
  </div>

  <!--================================== 2 =================================================-->

  <div class="row">
    <div class="white-bg">
      <form class='header-form' action="">
        <div class='form-group row'>
          <div class='col-md-6'>
            <label class="control-label">Redigera andra rubriken</label>
            <input type="text" class='form-control header'>
          </div>
        </div>
        <div class='form-group'>
          <input type="hidden" class='headerVal' value="2">
          <input type="button" class='btn btn-info grey-headers' value="spara rubrik">
          <span id='cv-header-2' class='fa fa-check list-success'>ändrad!</span>
        </div>
      </form>
      <hr>

      <!--insert to and update second list========================-->

      <label class="control-label">Redigera listan</label>
      <ul id='second-list'></ul>
      <hr>
      <form action="">
        <div class='form-group row'>
          <div class='col-md-6'>
            <label class="control-label">Lägg till i listan</label>
            <input type="text" class='form-control' placeholder="Lägg till i listan">
          </div>
        </div>
        <div class='form-group'>
          <input type="submit" class='btn btn-info add' value="lägg till">
        </div>
      </form>
    </div>
  </div>
  <!--================================== 3 ==============================================-->

  <div class="row">
    <div class="white-bg">
      <form class='header-form' action="">
        <div class='form-group row'>
          <div class='col-md-6'>
            <label class="control-label">Redigera tredje rubriken</label>
            <input type="text" class='form-control header'>
          </div>
        </div>
        <div class='form-group'>
          <input type="hidden" class='headerVal' value="3">
          <input type="button" class='btn btn-info grey-headers' value="spara rubrik">
          <span id='cv-header-3' class='fa fa-check list-success'>ändrad!</span>
        </div>
      </form>
      <hr>
      <!--insert to and update third list========================-->

      <label class="control-label">Redigera listan</label>
      <ul id='third-list'></ul>
      <hr>
      <form action="">
        <div class='form-group row'>
          <div class='col-md-6'>
            <label class="control-label">Lägg till i listan</label>
            <input type="text" class='form-control' placeholder="Lägg till i listan">
          </div>
        </div>
        <div class='form-group'>
          <input type="submit" class='btn btn-info add' value="lägg till">
        </div>
      </form>
    </div>
  </div>
  <!--================================================================================================-->
  <!-- Employments-->
  <!--================================================================================================-->

  <div class='row'>
    <div class="white-bg">
      <label class="control-label">Redigera listan för anställningar</label>
      <ul id='employments'></ul>
      <hr>
      <!--================== add employments ================================-->
      <form class='form-horizontal'>
        <div class='form-group'>
          <div class='col-md-6'>
            <label class="control-label">Lägg till i listan</label>
            <input class='form-control' id='add-employ' type="text" placeholder="Lägg till anställning">
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-6'>
            <input class='form-control' id='add-emp-year' type="text" placeholder="Lägg till årtal">
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-2'>
            <input class='btn btn-info' id='add-emp' type="button" value="lägg till">
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--================================================================================================-->
  <!-- Education-->
  <!--================================================================================================-->

  <div class="row">
    <div class="white-bg">
      <label class="control-label">Redigera listan för utbildningar</label>
      <ul id='educations'></ul>
      <hr>
      <!--=================== add education ======================================-->
      <form class='form-horizontal'>
        <div class='form-group'>
          <div class='col-md-5'>
            <label class="control-label">Lägg till i listan</label>
            <input class='form-control' id='add-ed' type="text" placeholder="Lägg till utbildning">
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-5'>
            <input class='form-control' id='add-edu-year' type="text" placeholder="Lägg till årtal">
          </div>
        </div>
        <div class='form-group'>
          <div class='col-md-2'>
            <input class='btn btn-info' id='add-edu' type="button" value="lägg till">
          </div>
        </div>
      </form>
    </div>
  </div>
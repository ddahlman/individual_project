<!-- modal-->
<div class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="closeModal">&times;</span>
      <h2 class="modal-h2"></h2>
    </div>
    <div class="modal-body">
      <p>Ditt meddelande har skickats!</p>
    </div>
    <div class="modal-footer">
      <button class="btn-again" type="">OK</button>
    </div>
  </div>
</div>
<!-- modal end -->
<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="well">

        <!--contact form, Daniel-->
        <form class="form-horizontal" id="contact-form">
          <div class="form-group nameInput">
            <label class="control-label col-md-4 col-md-offset-1" for="name-contact">Fullständigt namn</label>
            <div class="col-md-6 nameInp">
              <input type="text" class="form-control" id="name-contact" placeholder="förnamn & efternamn" />
              <div id="nameError"></div>
            </div>
          </div>
          <div class="form-group numberInput">
            <label class="control-label col-md-4 col-md-offset-1" for="tfn-contact"> Telefonnummer</label>
            <div class="col-md-6 numbInp">
              <input type="text" class="form-control" id="tfn-contact" placeholder="070-0000000" />
              <div id="phoneError"></div>
            </div>
          </div>
          <div class="form-group emailInput">
            <label class="control-label col-md-4 col-md-offset-1" for="email-contact"> E-mail</label>
            <div class="col-md-6 emailInp">
              <input type="text" class="form-control" id="email-contact" placeholder="dittnamn@domän.com" />
              <div id="emailError"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-md-offset-1" for="note-contact"> Din fråga</label>
            <div class="col-md-6">
              <textarea class="form-control" id="text-contact" placeholder="Är det något du undrar över..."></textarea>
            </div>
          </div>
          <button type="button" id="submitbtn-contact" class="btn-again">SKICKA</button>
        </form>
      </div>
    </div>
  </div>
</div>
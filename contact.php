<?php
if(isset($_POST['submit'])) {
    
    $name = $_POST['name-contact'];
    $phone = $_POST['tfn-contact'];
    $email = $_POST['email-contact'];
    $note = $_POST['note-contact'];
    
    mysqli_query($connection, "INSERT INTO inc_message (name_contact, phone_contact, email_contact, note_contact)
    VALUES ('$name', '$phone', '$email', '$note')");
    
}
?>


  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="well well-contact">

          <!--contact form, Daniel-->
          <form class="form-horizontal" id="contact-form" method="post" action="">
            <div class="form-group nameInput">
              <label class="control-label col-md-4 col-md-offset-1" for="name-contact">Fullständigt namn</label>
              <div class="col-md-6 nameInp">
                <input type="text" class="form-control" name="name-contact" id="name-contact" placeholder="Ditt förnamn & efternamn" />
                <div id="nameError"></div>
              </div>
            </div>
            <div class="form-group numberInput">
              <label class="control-label col-md-4 col-md-offset-1" for="tfn-contact"> Telefonnummer</label>
              <div class="col-md-6 numbInp">
                <input type="text" class="form-control" name="tfn-contact" id="tfn-contact" placeholder="070-0000000" />
                <div id="phoneError"></div>
              </div>
            </div>
            <div class="form-group emailInput">
              <label class="control-label col-md-4 col-md-offset-1" for="email-contact"> E-mail</label>
              <div class="col-md-6 emailInp">
                <input type="text" class="form-control" name="email-contact" id="email-contact" placeholder="dittnamn@domän.com" />
                <div id="emailError"></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 col-md-offset-1" for="note-contact"> Din fråga</label>
              <div class="col-md-6">
                <textarea class="form-control" name="note-contact" id="text-contact" placeholder="Är det något du undrar över..."></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-3 col-md-4">
                <button type="submit" name="submit" id="submitbtn-contact" class="btn-again">SKICKA</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
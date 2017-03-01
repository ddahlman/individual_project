<?php

/*=================================================================================================*/
/* 1st query   */
/*=================================================================================================*/

/*when clicking on spara below text================*/
if(isset($_POST['save-text'])) {
    $first_text = mysqli_real_escape_string($connection, $_POST["first-text"]);
    
    mysqli_query($connection, "UPDATE cv_firsttext
    SET first_text='$first_text'
    WHERE id=1");
    
    $success = 'Första texten är uppdaterad!';
}

/*when clicking on first spara rubrik================*/
if(isset($_POST['save-1st-header'])) {
    $first_header = mysqli_real_escape_string($connection, $_POST["first-header"]);
    
    mysqli_query($connection, "UPDATE cv_grey_headers
    SET header='$first_header'
    WHERE headersID = 1");
    
    $success = 'Första rubriken är uppdaterad!';
}

/*when clicking on first spara tillägg================*/
if(isset($_POST['add-1st-list'])) {
    
    $add_to_list = mysqli_real_escape_string($connection, $_POST["add-to-list"]);
    
    $result1 = mysqli_query($connection, "INSERT INTO items (headersID, list_item)
    VALUES ('1', '$add_to_list')");
    if($result1) {
        $success = 'Första listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
}

/*when clicking on first ändra================*/
if(isset($_POST['list1-id'])) {
    $list_item1 = mysqli_real_escape_string($connection, $_POST["list-item1"]);
    $list1_id = mysqli_real_escape_string($connection, $_POST["list1-id"]);
    
    $update = mysqli_query($connection, "UPDATE items
    SET list_item='$list_item1'
    WHERE id = '$list1_id'");
    if($update) {
        $success = 'Första listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
    
}

/*=================================================================================================*/
/* 2nd query   */
/*=================================================================================================*/

/*when clicking on second spara rubrik================*/
if(isset($_POST['save-2nd-header'])) {
    $second_header = mysqli_real_escape_string($connection, $_POST["second-header"]);
    
    mysqli_query($connection, "UPDATE cv_grey_headers
    SET header='$second_header'
    WHERE headersID = 2");
    
    $success = 'Andra rubriken är uppdaterad!';
}

/*when clicking on second spara tillägg================*/
if(isset($_POST['add-2nd-list'])) {
    
    $add_to_list2 = mysqli_real_escape_string($connection, $_POST["add-to-list2"]);
    
    $result2 = mysqli_query($connection, "INSERT INTO items (headersID, list_item)
    VALUES ('2', '$add_to_list2')");
    if($result2) {
        $success = 'Andra listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
}

/*when clicking on second ändra================*/
if(isset($_POST['list2-id'])) {
    $list_item2 = mysqli_real_escape_string($connection, $_POST["list-item2"]);
    $list2_id = mysqli_real_escape_string($connection, $_POST["list2-id"]);
    
    $update = mysqli_query($connection, "UPDATE items
    SET list_item='$list_item2'
    WHERE id = '$list2_id'");
    if($update) {
        $success = 'Andra listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
    
}

/*=================================================================================================*/
/* 3rd query   */
/*=================================================================================================*/


/*when clicking on third spara rubrik================*/
if(isset($_POST['save-3rd-header'])) {
    $third_header = mysqli_real_escape_string($connection, $_POST["third-header"]);
    
    mysqli_query($connection, "UPDATE cv_grey_headers
    SET header='$third_header'
    WHERE headersID = 3");
    
    $success = 'Tredje rubriken är uppdaterad!';
}

/*when clicking on third spara tillägg================*/
if(isset($_POST['add-3rd-list'])) {
    
    $add_to_list3 = mysqli_real_escape_string($connection, $_POST["add-to-list3"]);
    
    $result3 = mysqli_query($connection, "INSERT INTO items (headersID, list_item)
    VALUES ('3', '$add_to_list3')");
    if($result3) {
        $success = 'Tredje listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
}

/*when clicking on third ändra================*/
if(isset($_POST['list3-id'])) {
    $list_item3 = mysqli_real_escape_string($connection, $_POST["list-item3"]);
    $list3_id = mysqli_real_escape_string($connection, $_POST["list3-id"]);
    
    $update = mysqli_query($connection, "UPDATE items
    SET list_item='$list_item3'
    WHERE id = '$list3_id'");
    if($update) {
        $success = 'Tredje listan är uppdaterad!';
    } else {
        $success = 'Error';
    }
    
}

/*===================================================================================================*/
/* Employments*/
/*===================================================================================================*/


/*when clicking on employments spara tillägg================*/
if(isset($_POST['add-employment'])) {
    
    $add_emp = mysqli_real_escape_string($connection, $_POST["add-to-emp"]);
    $add_empyears = mysqli_real_escape_string($connection, $_POST["add-to-empyears"]);
    
    $result4 = mysqli_query($connection, "INSERT INTO employments (employment, year)
    VALUES ('$add_emp', '$add_empyears')");
    if($result4) {
        $success = 'Listan för anställningar är uppdaterad!';
    } else {
        $success = 'Error';
    }
}

/*when clicking on employments ändra================*/
if(isset($_POST['emp-id'])) {
    $employments = mysqli_real_escape_string($connection, $_POST["employment"]);
    $emp_year = mysqli_real_escape_string($connection, $_POST["emp-years"]);
    $emp_id = mysqli_real_escape_string($connection, $_POST["emp-id"]);
    
    $update_emp = mysqli_query($connection, "UPDATE employments
    SET employment='$employments', year='$emp_year'
    WHERE id = '$emp_id'");
    if($update_emp) {
        $success = 'Listan för anställningar är uppdaterad!';
    } else {
        $success = 'Error';
    }
    
}


/*===================================================================================================*/
/* Education*/
/*===================================================================================================*/


/*when clicking on education spara tillägg================*/
if(isset($_POST['add-education'])) {
    
    $add_edu = mysqli_real_escape_string($connection, $_POST["add-to-edu"]);
    $add_eduyears = mysqli_real_escape_string($connection, $_POST["add-to-eduyears"]);
    
    $result5 = mysqli_query($connection, "INSERT INTO education (schools, years)
    VALUES ('$add_edu', '$add_eduyears')");
    if($result5) {
        $success = 'Listan för utbildningar är uppdaterad!';
    } else {
        $success = 'Error';
    }
}

/*when clicking on education ändra================*/
if(isset($_POST['edu-id'])) {
    $educations = mysqli_real_escape_string($connection, $_POST["education"]);
    $edu_year = mysqli_real_escape_string($connection, $_POST["edu-years"]);
    $edu_id = mysqli_real_escape_string($connection, $_POST["edu-id"]);
    
    $update_edu = mysqli_query($connection, "UPDATE education
    SET schools='$educations', years='$edu_year'
    WHERE id = '$edu_id'");
    if($update_edu) {
        $success = 'Listan för utbildningar är uppdaterad!';
    } else {
        $success = 'Error';
    }
    
}
?>


<!--******************************************************************
                    CV header                          
**********************************************************************-->

    <div class="dark-bg">
      <h1 class="h1-white">Redigera CV</h1>
    </div>

<!--******************* confirmation message ********************-->
    <?php
if(isset($success)) {
    echo "<div class='bg-success'>
            <div class='text-center'><strong>$success</strong></div>
          </div>";
} else {
    echo "";
}
?>
 <?php
/*--update first text===================================*/
$cv_ft_query = mysqli_query($connection,
"SELECT *
FROM cv_firsttext
WHERE id=1");

$cv_first_text = mysqli_fetch_assoc($cv_ft_query);
$first_text    = $cv_first_text['first_text'];
?>
<div class='container'>
    <div class="row">
        <div class="white-bg">
          <form method="post" action="">
            <div class='form-group row'>
                <div class='col-md-8'>
                    <label class="control-label">redigera första CV-texten</label>
                    <textarea class='form-control' name="first-text" id="first-text" rows="10">
                        <?php echo $first_text; ?>
                    </textarea>
                </div>
            </div>
            <div>
              <input type="submit" class='btn btn-info' name="save-text" value="spara">
            </div>
          </form>
        </div>
    </div>
    <hr>

    <!--===================================== 1 ===========================================-->
    <?php
/*update first header================*/
$cv_1gh_query = mysqli_query($connection,
"SELECT header
FROM cv_grey_headers
WHERE headersID=1");

$cv_first_header = mysqli_fetch_assoc($cv_1gh_query);
$first_header  = $cv_first_header['header'];
?>

    <div class="row">
        <div class="white-bg">
            <form method="post" action="">
                <div class='form-group row'>
                    <div class='col-md-6'>
                        <label class="control-label">Redigera första rubriken</label>
                        <input type="text" class='form-control' name="first-header" value="<?php echo $first_header; ?>">
                    </div>
                </div>
                 <div class='form-group'>
                    <input type="submit" class='btn btn-info' name="save-1st-header" value="spara rubrik">
                </div>
            </form>
        <hr>
<!--insert to and update first list========================-->
<?php
$cv_1list_query = mysqli_query($connection,
"SELECT id, list_item
FROM items
WHERE headersID=1");
?>

       
                <label class="control-label">Redigera listan</label>
                <ul>
                    <?php
                        while( $row = mysqli_fetch_assoc($cv_1list_query)) {
                            $list_item = $row['list_item'];
                            $id = $row['id'];
                    ?>
                    <li>
                        <form method="post" action="">
                            <div class='form-group row'>
                                <div class='col-md-6'>
                                    <input type="hidden" name="list1-id" value="<?php echo $id; ?>">
                                    <input type="text" class='form-control' name="list-item1" value="<?php echo $list_item; ?>">
                                </div>
                                <div class='col-md-2'>
                                    <input type="submit" class='btn btn-info' value="ändra">
                                </div>
                            </div>
                        </form>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            <hr>

        <form method="post" action="">
            <div class='form-group row'>
                <div class='col-md-6'>
                    <label class="control-label">Lägg till i listan</label>
                    <input type="text" class='form-control' name="add-to-list" placeholder="Lägg till i listan">
                </div>
            </div>
            <div class='form-group'>
                <input type="submit" class='btn btn-success' name="add-1st-list" value="spara tillägg">
            </div>
        </form>
        
    </div>
</div>

<!--================================== 2 =================================================-->

<?php
/*update second header================*/
$cv_2gh_query = mysqli_query($connection,
"SELECT header
FROM cv_grey_headers
WHERE headersID=2");

$cv_second_header = mysqli_fetch_assoc($cv_2gh_query);
$second_header  = $cv_second_header['header'];
?>
        <div class='row'>
          <div class="white-bg">
            <form method="post" action="">
                <div class='form-group row'>
                    <div class='col-md-6'>
                        <label class="control-label">Redigera andra rubriken</label>
                        <input type="text" class='form-control' name="second-header" value="<?php echo $second_header; ?>">
                    </div>
                </div>
                <div class='form-group'>
                    <input type="submit" class='btn btn-info' name="save-2nd-header" value="spara rubrik">
                </div>
            </form>
           <hr>

<!--insert to and update second list========================-->
 <?php
$cv_2list_query = mysqli_query($connection,
"SELECT id, list_item
FROM items
WHERE headersID=2");
?>

            
              <label class="control-label">Redigera listan</label>
              <ul>
                <?php
                    while( $row = mysqli_fetch_assoc($cv_2list_query)) {
                         $list_item2 = $row['list_item'];
                         $id = $row['id'];
                ?>
                  <li>
                    <form method="post" action="">
                        <div class='form-group row'>
                            <div class='col-md-6'>
                                <input type="hidden" name="list2-id" value="<?php echo $id; ?>">
                                <input type="text" class='form-control' name="list-item2" value="<?php echo $list_item2; ?>">
                            </div>
                            <div class='col-md-2'>
                                <input type="submit" class='btn btn-info' name="" value="ändra">
                            </div>
                        </div>
                    </form>
                  </li>
                <?php
                }
                ?>
              </ul>
            <hr>

              <form method="post" action="">
                <div class='form-group row'>
                    <div class='col-md-6'>
                        <label class="control-label">Lägg till i listan</label>
                        <input type="text" class='form-control' name="add-to-list2" placeholder="Lägg till i listan">
                    </div>
                </div>
                <div class='form-group'>
                    <input type="submit" class='btn btn-success' name="add-2nd-list" value="spara tillägg">
                </div>
              </form>
          </div>
        </div>
<!--================================== 3 ==============================================-->

<?php
/*update third header================*/
$cv_3gh_query = mysqli_query($connection,
"SELECT header
FROM cv_grey_headers
WHERE headersID=3");

$cv_third_header = mysqli_fetch_assoc($cv_3gh_query);
$third_header  = $cv_third_header['header'];
?>
        <div class='row'>
            <div class="white-bg">
              <form method="post" action="">
                <div class='form-group row'>
                    <div class='col-md-6'>
                        <label class="control-label">Redigera tredje rubriken</label>
                        <input type="text" class='form-control' name="third-header" value="<?php echo $third_header; ?>">
                    </div>
                </div>
                <div class='form-group'>
                    <input type="submit" class='btn btn-info' name="save-3rd-header" value="spara rubrik">
                </div>
              </form>
              <hr>
<!--insert to and update third list========================-->
<?php
$cv_3list_query = mysqli_query($connection,
"SELECT id, list_item
FROM items
WHERE headersID=3");
?>

           
                <label class="control-label">Redigera listan</label>
                    <ul>
                        <?php
                            while( $row = mysqli_fetch_assoc($cv_3list_query)) {
                                $list_item3 = $row['list_item'];
                                $id = $row['id'];
                        ?>
                        <li>
                            <form method="post" action="">
                                <div class='form-group row'>
                                    <div class='col-md-6'>
                                        <input type="hidden" name="list3-id" value="<?php echo $id; ?>">
                                        <input type="text" class='form-control' name="list-item3" value="<?php echo $list_item3; ?>">
                                    </div>
                                    <div class='col-md-2'>
                                        <input type="submit" class='btn btn-info' value="ändra">
                                    </div>
                                </div>
                            </form>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <hr>

                <form method="post" action="">
                    <div class='form-group row'>
                        <div class='col-md-6'>
                            <label class="control-label">Lägg till i listan</label>
                            <input type="text" class='form-control' name="add-to-list3" placeholder="Lägg till i listan">
                        </div>
                    </div>
                    <div class='form-group'>
                        <input type="submit" class='btn btn-success' name="add-3rd-list" value="spara tillägg">
                    </div>
                </form>
            </div>
        </div>
      <!--================================================================================================-->
      <!-- Employments-->
      <!--================================================================================================-->

      <?php
/*insert to and update employment list========================*/
$employment_query = mysqli_query($connection,
"SELECT *
FROM employments");
?>

    <div class='row'>
        <div class="white-bg">
        <label class="control-label">Redigera listan för anställningar</label>
        <ul>
            <?php
            while( $row = mysqli_fetch_assoc($employment_query)) {
                $employment = $row['employment'];
                $emp_years = $row['year'];
                $id = $row['id'];
            ?>
            <li>
                <form method="post" action="">
                    <div class='form-group row'>
                        <input type="hidden" name="emp-id" value="<?php echo $id; ?>">
                        <div class='col-md-5'>
                            <label class='control-label' for="employment">anställning</label>
                            <input class='form-control' type="text" name="employment" value="<?php echo $employment; ?>">
                        </div>
                        <div class='col-md-5'>
                            <label class='control-label' for="emp-years">årtal</label>
                            <input class='form-control' type="text" name="emp-years" value="<?php echo $emp_years; ?>">
                        </div>
                        <div class='col-md-1'>
                            <label class='control-label' for='submit'></label>
                            <input type="submit" class='btn btn-info form-control' name='submit' value="ändra">
                        </div>
                    </div>
                </form>
            </li>
            <?php
            }
            ?>
            </ul>
            <hr>

            <form class='form-horizontal' method="post" action="">
                <div class='form-group'>
                    <div class='col-md-6'>
                        <label class="control-label">Lägg till i listan</label>
                        <input class='form-control' type="text" name="add-to-emp" placeholder="Lägg till anställning">
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-6'>
                        <input class='form-control' type="text" name="add-to-empyears" placeholder="Lägg till årtal">
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-2'>
                        <input class='btn btn-success' type="submit" name="add-employment" value="spara tillägg">
                    </div>
                </div>
            </form>
        </div>
    </div>
        <!--================================================================================================-->
        <!-- Education-->
        <!--================================================================================================-->


<?php
/*insert to and update education list========================*/
$education_query = mysqli_query($connection,
"SELECT *
FROM education");
?>

          <div class="row">
            <div class="white-bg">
              <label class="control-label">Redigera listan för utbildningar</label>
              <ul>
                <?php
                    while( $row = mysqli_fetch_assoc($education_query)) {
                        $schools = $row['schools'];
                        $edu_years = $row['years'];
                        $id = $row['id'];
                    ?>
                    <li>
                        <form method="post" action="">
                            <div class='form-group row'>
                                <input type="hidden" name="edu-id" value="<?php echo $id; ?>">
                                <div class='col-md-5'>
                                    <label class='control-label' for="education">utbildning</label>
                                    <input class='form-control' type="text" name="education" value="<?php echo $schools; ?>">
                                </div>
                                <div class='col-md-5'>
                                    <label class='control-label' for="edu-years">årtal</label>
                                    <input class='form-control' type="text" name="edu-years" value="<?php echo $edu_years; ?>">
                                </div>
                                <div class='col-md-1'>
                                    <label class='control-label' for="submit"></label>
                                    <input class='btn btn-info' type="submit" name="submit" value="ändra">
                                </div>
                            </div>
                        </form>
                  </li>
                  <?php
                    }
                ?>
              </ul>
              <hr>

              <form class='form-horizontal' method="post" action="">
                <div class='form-group'>
                    <div class='col-md-5'>
                        <label class="control-label">Lägg till i listan</label>
                        <input class='form-control' type="text" name="add-to-edu" placeholder="Lägg till utbildning">
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-5'>
                        <input class='form-control' type="text" name="add-to-eduyears" placeholder="Lägg till årtal">
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-md-2'>
                        <input class='btn btn-success' type="submit" name="add-education" value="spara tillägg">
                    </div>
                </div>
              </form>
            </div>
        </div>
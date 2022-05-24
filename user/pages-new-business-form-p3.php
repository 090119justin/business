<?php $page='services'; $subpage='newBusiness'; include "includes/user-header.php"; ?>


  <main id="main" class="main">
    <div class="pagetitle" >
      <h1>Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">New Business Permit</a></li>
          <li class="breadcrumb-item">Application Form</li>
          
        </ol>
      </nav>
     

      <?php
      require_once "php/function-business-registration.php";

      ?>

    </div><!-- End Page Title -->

    <section class="section">
      <form class="row g-3" action="php/function-business-registration.php" method="POST">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <center>
                <h3 class = "card-title" style="font-size: 25px;">APPLICATION FORM FOR BUSINESS PERMIT</h3>
              </center>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">INSTRUCTIONS: </h5>
                <p>1. Provide accurate information and print legibly to avoid delays.</p>
                <p>2. Ensure that all documents submitted are complete and properly filled out</p>
              </div>
              <br>
              <h5 style="font-weight: bold;">Other Information</h5>
              <hr>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <h5 for="inputName5" class="form-label">Business Address<label style="color:red;">*</label></h5>
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">House/Bldg. Number<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['businessBldgNo']; ?>" name="businessBldgNo" type="text" class="form-control" id="inputName5" required="">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">House/Bldg. Name</label>
                  <input value="<?php echo $_SESSION['businessBldgName']; ?>" name="businessBldgName" type="text" class="form-control" id="inputName5" >
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Unit Number</label>
                  <input value="<?php echo $_SESSION['businessUnitNo']; ?>" name="businessUnitNo" type="text" class="form-control" id="inputName5" >
                </div>

                
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12 autocomplete">
                  <label for="inputName5" class="form-label">Street<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['businessStreet']; ?>" name="businessStreet" type="text" class="form-control" id="ownerStreet" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12 autocomplete">
                  <label for="inputName5" class="form-label">Brgy.<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['businessBrgy']; ?>" id="myInput" type="text" name="businessBrgy" placeholder="Barangay" class="form-control" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Subdivition</label>
                  <input value="<?php echo $_SESSION['businessSubdivition']; ?>" name="businessSubdivition" type="text" class="form-control" id="inputName5" >
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">City/Municipality<label style="color:red;">*</label></label>
                  <input value="Roxas City" name="businessMunicipality" type="text" class="form-control" id="inputName5" disabled>
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Province<label style="color:red;">*</label></label>
                  <input value="Capiz" name="businessProvince" type="text" class="form-control" id="inputName5" disabled>
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Telephone/Mobile Number<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['businessContactNo']; ?>" name="businessContactNo" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Email Address</label>
                  <input value="<?php echo $_SESSION['businessEmail']; ?>" name="businessEmail" type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Business Area (in Sq. m.)</label>
                  <input value="<?php echo $_SESSION['businessArea']; ?>" name="businessArea"  type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <br>

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <button type="submit" name="prev3" class="page-link" >Previous</button>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Page 3/5</a>
                  </li>

                  <li class="page-item">
                    <button type="submit" name="next3" class="page-link" >Next</button>
                  </li>
                </ul>
              </nav>




              

            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
        
      </form>
    </section>
  </main>

<?php include "includes/user-footer.php"; ?>



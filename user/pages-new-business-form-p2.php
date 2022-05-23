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
     



    </div><!-- End Page Title -->
    <?php 
    require_once "php/function-business-registration.php";
     ?>
    <section class="section">
      <form autocomplete="off" class="row g-3" action="php/function-business-registration.php" method="POST">
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
                  <h5 for="inputName5" class="form-label">Owner Address</h5>
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">House/Bldg. Number<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['ownerBldgNo']; ?>" name="ownerBldgNo" type="text" class="form-control" id="inputName5" required="">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">House/Bldg. Name</label>
                  <input value="<?php echo $_SESSION['ownerBldgName']; ?>" name="ownerBldgName" type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Unit Number</label>
                  <input value="<?php echo $_SESSION['ownerUnitNo']; ?>" name="ownerUnitNo" type="text" class="form-control" id="inputName5">
                </div>

                
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Street<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['ownerStreet']; ?>" name="ownerStreet" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12 autocomplete">
                  <label for="inputName5" class="form-label">Brgy.<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['ownerBrgy']; ?>" id="myInput" type="text" name="ownerBrgy" placeholder="Barangay" class="form-control">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Subdivision</label>
                  <input value="<?php echo $_SESSION['ownerSubdivition']; ?>" name="ownerSubdivition" type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">City/Municipality<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['ownerMunicipality']; ?>" name="ownerMunicipality" type="text" class="form-control" id="inputName5" required="">
                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Province<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['ownerProvince']; ?>" name="ownerProvince" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
              
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Telephone/Mobile Number<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['ownerContactNo']; ?>" name="ownerContactNo" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              

              <br>

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <button class="page-link" type="submit" name="prev2">Previous</button>                  
                    <!-- <button class="page-link" onclick="history.go(-1);">Previous</button> -->
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Page 2/5</a>
                  </li>

                  <li class="page-item">
                    <button class="page-link" type="submit" name="next2">Next</button>
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
  
<?php $page='services'; $subpage='newBusiness'; include "includes/user-header.php"; ?>


  <main id="main" class="main">
    <div class="pagetitle" >
      <h1>Application Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Services</a></li>
          <li class="breadcrumb-item">New Business Permit</li>
          
        </ol>
      </nav>
     


      <?php require_once "php/function-business-registration.php" ?>
    </div><!-- End Page Title -->

    <section class="section">
      <form class="row g-3" action="php/function-business-registration.php" method="POST" action="POST">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <center>
                <h3 class = "card-title" style="font-size: 25px;">APPLICATION FORM FOR BUSINESS PERMIT</h3>
              </center>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">INSTRUCTIONS: </h4>
                <p>1. Provide accurate information and print legibly to avoid delays.</p>
                <p>2. Ensure that all documents submitted are complete and properly filled out</p>
              </div>
              <br>
              <h5 style="font-weight: bold;">Basic Information</h5>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <label for="officeMunicipality" class="form-label">City/Municipality<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['officeMunicipality']; ?>" name="officeMunicipality" type="text" class="form-control" id="officeMunicipality" required="">
                </div>
              </div>
              
              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Mode Of Payment<label style="color:red;">*</label></label>
                  <select name="paymentMode" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                    <option >Select Mode...</option>
                    <option value="Annually" <?php if ($_SESSION['paymentMode'] == "Annually") { echo ' selected="selected"'; } ?> >Annually</option>
                    <option value="Semi-Annually" <?php if ($_SESSION['paymentMode'] == "Semi-Annually") { echo ' selected="selected"'; } ?> >Semi-annually</option>
                    <option value="Quarterly" <?php if ($_SESSION['paymentMode'] == "Quarterly") { echo ' selected="selected"'; } ?> >Quarterly</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">TIN No.<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['tinNumber']; ?>" name="tinNumber" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">DTI/SEC/CDA Reg. No.<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['DTIregNumber']; ?>" name="DTIregNumber" type="text" class="form-control" id="inputName5" required="">

                </div>

                <div class="col-md-6">
                  <label for="inputName5" class="form-label">DTI/SEC/CDA Reg. Date of Reg.<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['DTIregDate']; ?>" name="DTIregDate" type="date" name="birthDate" class="form-control" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Type of Business<label style="color:red;">*</label></label>
                  <select  name="businessType" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                    <option >Select Type...</option>
                    <option value="Single" <?php if ($_SESSION['businessType'] == "Single") { echo ' selected="selected"'; } ?> >Single</option>
                    <option value="Partnership" <?php if ($_SESSION['businessType'] == "Partnership") { echo ' selected="selected"'; } ?> >Partnership</option>
                    <option value="Corporation" <?php if ($_SESSION['businessType'] == "Corporation") { echo ' selected="selected"'; } ?> >Corporation</option>
                    <option value="Cooperative" <?php if ($_SESSION['businessType'] == "Cooperative") { echo ' selected="selected"'; } ?> >Cooperative</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Business Name<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['businessName']; ?>" name="businessName" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Trade Name/Franchise<label style="color:red;">*</label></label>
                  <input value="<?php echo $_SESSION['tradeName']; ?>" name="tradeName" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">

                <label for="inputName5" class="form-label">Name of President</label>
                <div class="col-md-4">
                  <input value="<?php echo $_SESSION['presidentFirstName']; ?>" name="presidentFirstName" type="text" class="form-control" id="inputName5" placeholder="First Name">
                </div>

                <div class="col-md-4">
                  <input value="<?php echo $_SESSION['presidentMiddleName']; ?>" name="presidentMiddleName" type="text" class="form-control" id="inputName5" placeholder="Middle Name">
                </div>

                <div class="col-md-4">
                  <input value="<?php echo $_SESSION['presidentlastName']; ?>" name="presidentlastName" type="text" class="form-control" id="inputName5" placeholder="Last Name">
                </div>
              </div>
              <br>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Page 1/5</a>
                  </li>
                  <li class="page-item">
                    <button class="page-link" type="submit" name="next1">Next</button> 
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

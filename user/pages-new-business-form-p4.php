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
                <h4 class="alert-heading">INSTRUCTIONS: </h4>
                <p>1. Provide accurate information and print legibly to avoid delays.</p>
                <p>2. Ensure that all documents submitted are complete and properly filled out</p>
              </div>
              <br>
              <h5 style="font-weight: bold;">Other Information</h5>
              <hr>

              <div class="row" style="margin-top: 15px;">
                <h5 for="inputName5" class="form-label">Total Number of Employees</h5>

                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Male</label>
                  <input value="<?php echo $_SESSION['maleEmployee']; ?>" name="maleEmployee" type="text" class="form-control" id="inputName5" required="">
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Female</label>
                  <input value="<?php echo $_SESSION['femaleEmployee']; ?>" name="femaleEmployee" type="text" class="form-control" id="inputName5" required="">
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Employees reciding in LGU</label>
                  <input value="<?php echo $_SESSION['lguEmployee']; ?>" name="lguEmployee" type="text" class="form-control" id="inputName5" required="">
                </div>
              </div>
              <br>

              <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <label class="alert-heading">INSTRUCTIONS: </label>
                <p>Fill-up only if Business place is rented</p>
                
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Lessor's Full Name</label>
                  <input value="<?php echo $_SESSION['lessorsName']; ?>" name="lessorsName"  type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Lessor's Full Address</label>
                  <input value="<?php echo $_SESSION['lessorsAddress']; ?>" name="lessorsAddress"  type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Lessor's Telephone/Mobile No.</label>
                  <input value="<?php echo $_SESSION['lessorsContactNo']; ?>" name="lessorsContactNo"  type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Lessor's Email</label>
                  <input value="<?php echo $_SESSION['lessorsEmail']; ?>" name="lessorsEmail"  type="text" class="form-control" id="inputName5">
                </div>
              </div>

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Monthly Rental</label>
                  <input value="<?php echo $_SESSION['lessorsMonthlyRental']; ?>" name="lessorsMonthlyRental"  type="text" class="form-control" id="inputName5">
                </div>
              </div>

              

              <br>

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <button class="page-link" name="prev4" type="submit">Previous</button>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Page 4/5</a>
                  </li>

                  <li class="page-item">
                    <button class="page-link" name="next4" type="submit">Next</button>
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

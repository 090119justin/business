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
              <h5 style="font-weight: bold;">Business Activity</h5>
              <hr>

            

              
              
              <table class="table table-bordered" id="mytab" >
                <thead>
                  <tr>
                    <th scope="col">Line of Bus.</th>
                    <th scope="col">No. of Units</th>
                    <th scope="col">Capitalization</th>
                  </tr>
                </thead>
                <tbody id ="myTable">
                  <tr>
                    <td>
                      <input type="text" class="form-control" id="inputName5" name="lineOfBus[]">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="inputName5" name="units[]">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="inputName5" name="capitalization[]">
                    </td>
                  </tr>
                </tbody>
                  
              </table>
              <div class="row">
                <div class="col-md-12">
                  
                  <input class="btn btn-secondary" type="button" value="Add a Row" onclick="addRow()">
                  
                </div>
                
              </div>
              <br>

              <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <p>I DECLARE UNDER PENALTY OF PERJURY that the foregoing information are true based on my personal
                 knowledge and authentic records. Further, I agree to comply with the regulatory requirement and
                other defeciencies within 30 days from release of business permit.</p>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" required="">
                  <label class="form-check-label" for="gridCheck1">
                    I Agree
                  </label>
                  <div class="invalid-feedback"><p>Please, confirm!</p></div>

                </div>
              </div>
              

              <br>

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                  <li class="page-item">
                    <a class="page-link"  href="pages-new-business-form-p4.php">Previous</a>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Page 5/5</a>
                  </li>

                  <li class="page-item">
                    <button class="page-link" type="submit" name="save">Submit </button>
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
 
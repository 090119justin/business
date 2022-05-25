<?php $page='requirements'; $subpage='requirementsNew'; include "../includes/staff-header.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Verify Requirements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">New Businesses</li>
          <li class="breadcrumb-item">Checklist</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section dashboard">
      <form action="../php/staff-function-verify.php" method="post">
        <?php
            $personId = $_GET['person_id']; 
            $reqId = $_GET['req'];
            $result = $conn->query("SELECT personId, concat(firstName,' ',lastName) as name,concat('#',lpad(personId,4,'0')) as newId 
              from personal_information  
              inner join requirements on personal_information.id = requirements.personId
              where personId = $personId and requirements.id=$reqId; ") or die($conn->error);
             $row = mysqli_fetch_assoc($result);
          ?>
        <div class="row">

          <div class="card">
            <div class="card-body">
              <input type="hidden" name="person_id" value=<?php echo $personId ?>>
              <input type="hidden" name="req_id" value=<?php echo $reqId ?>>
              <h5 class="card-title"><span><?php echo $row['newId'].' - '?></span> <?php echo $row['name']; ?> </h5>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Requirements</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>DTI Bus. Name Reg. (for single) /  SEC Reg. (for partnership/Corp.)</td>
                    <td>
                      <select name="DTIBusName" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Brgy. Clearance (for Business)</td>
                    <td>
                      <select name="BrgyClearance" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Zoning Clearance (CPDO)</td>
                    <td>
                      <select name="zoningClearance" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Cert. of Annual Inspection (CEO)</td>
                    <td>
                      <select name="ceo" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Fire Safty Inspection Cert. (BFP)</td>
                    <td>
                      <select name="bfp" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Sanitary Permit (CHO)</td>
                    <td>
                      <select name="cho" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">7</th>
                    <td>Contract of Lease (if space is rented)</td>
                    <td>
                      <select name="contractLease" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">8</th>
                    <td>Sedula (Community Tax Cert.)</td>
                    <td>
                      <select name="sedula" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">9</th>
                    <td>Invested Capital</td>
                    <td>
                      <select name="investedCapital" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">10</th>
                    <td>Picture of Bus. Establishment</td>
                    <td>
                      <select name="picture" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">11</th>
                    <td>Other Document/s necessary to support application depending on the nature of Business</td>
                    <td>
                      <select name="others" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                        <option value="verified">Verified</option>
                        <option value="not submitted">Not Submitted</option>
                        <option value="denied">Denied</option>
                      </select>
                    </td>
                  </tr>

                </tbody>
              </table>

                <div class="d-grid gap-2 mt-3">
                <button class="btn btn-success" type="submit" name="verify">SUBMIT</button>
                </div>
                

            </div>
          </div>
        </div>
      </form> 
    </section>

  </main><!-- End #main -->

<?php include "../includes/staff-footer.php"; ?>

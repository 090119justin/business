<?php $page='services'; $subpage='renewBusiness'; include "includes/user-header.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Application Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Services</a></li>
          <li class="breadcrumb-item">Renew Business Permit</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Basic Information</h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Applicant Name</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['firstName']).' '.ucwords($_SESSION['middleName']).' '.ucwords($_SESSION['lastName']); ?> </div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Applicant Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">First Name</label>
                                  <input type="text" name="firstName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['firstName']); ?>">
                                  <div class="invalid-feedback">Please, enter your first name!</div>
                                </div>

                                <div class="col-12">
                                  <label for="yourName" class="form-label">Middle Name</label>
                                  <input type="text" name="middleName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['middleName']); ?>">
                                  <div class="invalid-feedback">Please, enter your middle name!</div>
                                </div>

                                <div class="col-12">
                                  <label for="yourName" class="form-label">Last Name</label>
                                  <input type="text" name="lastName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['lastName']); ?>">
                                  <div class="invalid-feedback">Please, enter your last name!</div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Business Name</div>
                      <div class="col-lg-5 col-md-4" id="businessName"><?php echo ucwords($_SESSION['businessName']); ?> </div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#BusinessName"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="BusinessName" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Business Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">Business Name</label>
                                  <input type="text" name="businessName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessName']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" onclick="update_business_name()" name="update_business_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Trade Name/Franchise</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['tradeName']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#TradeName"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="TradeName" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Trade Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">Trade Name</label>
                                  <input type="text" name="tradeName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['tradeName']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_trade_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Tax Year</div>
                      <div class="col-lg-5 col-md-4"><?php echo date("Y"); ?></div>

                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">City/Municipality</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['officeMunicipality']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Municipality"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="Municipality" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit City/Municipality</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">City/Municipality</label>
                                  <input type="text" name="officeMunicipality" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['officeMunicipality']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_municipality" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Mode of Payment</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['paymentMode']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#PaymentMode"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="PaymentMode" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Mode of Payment</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">Mode of Payment</label>
                                  <select name="paymentMode" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                   
                                    <option value="Annually" <?php if ($_SESSION['paymentMode'] == "Annually") { echo ' selected="selected"'; } ?> >Annually</option>
                                    <option value="Semi-Annually" <?php if ($_SESSION['paymentMode'] == "Semi-Annually") { echo ' selected="selected"'; } ?> >Semi-annually</option>
                                    <option value="Quarterly" <?php if ($_SESSION['paymentMode'] == "Quarterly") { echo ' selected="selected"'; } ?> >Quarterly</option>
                                  </select>
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_payment_mode" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Date of Application</div>
                      <div class="col-lg-5 col-md-4"><?php echo date('M d, Y'); ?></div>

                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Tin No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['tinNumber']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Tin"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="Tin" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update Tin No.</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">Tin No.</label>
                                  <input type="text" name="tinNumber" class="form-control" id="yourName" required value="<?php echo ucwords($row['tinNumber']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_tin" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">DTI/SEC/CDA Reg. No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['DTIRegNumber']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#DTINo"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="DTINo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update DTI/SEC/CDA Reg. No.</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">DTI/SEC/CDA Reg. No.</label>
                                  <input type="text" name="DTIRegNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['DTIRegNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_dti_no" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">DTI/SEC/CDA Date of Reg.</div>
                      <div class="col-lg-5 col-md-4"><?php echo date('M d, Y',strtotime($_SESSION['DTIRegDate'])); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#DTIDate"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="DTIDate" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update DTI/SEC/CDA Date of Reg.</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">DTI/SEC/CDA Date of Reg.</label>
                                  <input type="date" name="DTIRegDate" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['DTIRegDate']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_dti_date" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Type of Business</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessType']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessMode"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessMode" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Mode of Payment</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
                                  <label for="yourName" class="form-label">Mode of Payment</label>
                                  <select name="business_type" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                   
                                    <option value="Single" <?php if ($_SESSION['business_type'] == "Single") { echo ' selected="selected"'; } ?> >Single</option>
                                    <option value="Partnership" <?php if ($_SESSION['businessType'] == "Partnership") { echo ' selected="selected"'; } ?> >Partnership</option>
                                    <option value="Corporation" <?php if ($_SESSION['businessType'] == "Corporation") { echo ' selected="selected"'; } ?> >Corporation</option>
                                    <option value="Cooperative" <?php if ($_SESSION['businessType'] == "Cooperative") { echo ' selected="selected"'; } ?> >Cooperative</option>
                                  </select>
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_type" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">President Name</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['presidentFirstName'])." ".ucwords($_SESSION['presidentMiddleName'])." ".ucwords($_SESSION['presidentlastName']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#president"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="president" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit President Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">First Name</label>
                                  <input type="text" name="presidentFname" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['presidentFirstName']); ?>">
                                  <div class="invalid-feedback">Please, enter your first name!</div>
                                </div>

                                <div class="col-12">
                                  <label for="yourName" class="form-label">Middle Name</label>
                                  <input type="text" name="presidentMname" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['presidentMiddleName']); ?>">
                                  <div class="invalid-feedback">Please, enter your middle name!</div>
                                </div>

                                <div class="col-12">
                                  <label for="yourName" class="form-label">Last Name</label>
                                  <input type="text" name="presidentLname" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['presidentlastName']); ?>">
                                  <div class="invalid-feedback">Please, enter your last name!</div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_president" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>

                    <br>

                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p2.php?">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p3.php?">3</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p4.php?">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p5.php?">5</a></li>
                        
                        <li class="page-item">
                          <a class="page-link" href="pages-renew-business-form-p2.php?view_data2=<?php echo $businessId ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>

                  </div>
                </div>

                    


                    
              </div>
            </div>
            
          </div>
        </div>
          
      </div> 
    </section>

  </main><!-- End #main -->

  
<?php include "includes/user-footer.php"; ?>

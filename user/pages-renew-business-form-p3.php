<?php $page='services'; $subpage='renewBusiness'; include "includes/user-header.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
    <h1>Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Renew Business Permit</a></li>
          <li class="breadcrumb-item">Renewal Form</li>
          
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
                <h5 class="card-title">Other Information<span> | Business Address</span></h5>

                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">House/Bldg. No</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessBldgNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessBldgNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessBldgNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Building Number</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Building Number</label>
                                  <input type="text" name="businessBldgNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessBldgNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_building_no" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Bldg. Name</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessBldgName']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessBldgName"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessBldgName" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Building Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Building Name</label>
                                  <input type="text" name="businessBldgName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessBldgName']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_building_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Unit No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessUnitNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessUnitNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessUnitNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Unit Number</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Unit Number</label>
                                  <input type="text" name="businessUnitNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessUnitNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_unit_no" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Street</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessStreet']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessStreet"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessStreet" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Street Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12 autocomplete">
                                  <label for="yourName" class="form-label">Street Name</label>
                                  <input value="<?php echo $_SESSION['businessStreet']; ?>" name="businessStreet" type="text" class="form-control" id="ownerStreet" required="">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_street_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Barangay</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessBrgy']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessBrgy"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessBrgy" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Barangay Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12 autocomplete">
                                  <label for="yourName" class="form-label">Barangay Name</label>
                                  <input value="<?php echo ucwords($_SESSION['businessBrgy']); ?>" id="myInput" type="text" name="businessBrgy" class="form-control" required>
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_barangay_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Subdivision</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessSubdivition']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessSubdivition"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessSubdivition" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Subdivision Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Subdivision Name</label>
                                  <input type="text" name="businessSubdivition" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessSubdivition']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_subdivision_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">City/Municipality</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessMunicipality']); ?></div>
                      <!-- <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessMunicipality"><i class="bx bxs-pencil text-primary"></i></a></div> -->
                       <div class="modal fade" id="businessMunicipality" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Municipality Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Municipality Name</label>
                                  <input type="text" name="businessMunicipality" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessMunicipality']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_municipality_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Province</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessProvince']); ?></div>
                      <!-- <div class="col-lg-4 col-md-4 label " ><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessProvince"><i class="bx bxs-pencil text-primary"></i></a></div> -->
                       <div class="modal fade" id="businessProvince" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Province Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Province Name</label>
                                  <input type="text" name="businessProvince" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessProvince']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_province_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Area</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessArea']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessArea"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessArea" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Area</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Area</label>
                                  <input type="text" name="businessArea" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessArea']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_area" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Telephone/Mobile No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessContactNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessContactNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessContactNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Contact No</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Contact No</label>
                                  <input type="text" name="businessContactNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessContactNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_contact" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Email Address</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['businessEmail']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#businessEmail"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="businessEmail" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Email</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Email</label>
                                  <input type="text" name="businessEmail" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['businessEmail']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_business_email" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <br>

                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item">
                          <a class="page-link" href="pages-renew-business-form-p2.php?view_data2=<?php echo $businessId ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p2.php">2</a></li>
                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p4.php">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p5.php">5</a></li>
                        <li class="page-item">
                          <a class="page-link" href="pages-renew-business-form-p4.php" aria-label="Next">
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


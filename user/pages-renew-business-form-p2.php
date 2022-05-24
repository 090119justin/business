<?php $page='services'; $subpage='renewBusiness'; include "includes/user-header.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle" >
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
                <h5 class="card-title">Other Information<span> | Owner Address</span></h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">House/Bldg. No</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['bldgNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#HouseNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="HouseNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit House/Bldg. No</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Building Number</label>
                                  <input type="text" name="bldgNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['bldgNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_building_no" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Bldg. Name</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['bldgName']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#HouseName"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="HouseName" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit House/Bldg. Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Building Name</label>
                                  <input type="text" name="bldgName" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['bldgName']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_building_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Unit No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['unitNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#UnitNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="UnitNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Unit</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Unit Number</label>
                                  <input type="text" name="unitNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['unitNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_unit_no" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Street</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['street']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#street"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="street" tabindex="-1">
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
                                  <input value="<?php echo $_SESSION['street']; ?>" name="street" type="text" class="form-control" id="ownerStreet" required="">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_street_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Barangay</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['brgy']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Barangay"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="Barangay" tabindex="-1">
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
                                  <input value="<?php echo ucwords($_SESSION['brgy']); ?>" id="myInput" type="text" name="brgy" class="form-control" required>
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_barangay_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Subdivision</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['subdivision']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Subdivision"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="Subdivision" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit House/Bldg. Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Subdivision Name</label>
                                  <input type="text" name="subdivision" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['subdivision']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_subdivision_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">City/Municipality</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['municipality']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Municipality"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="Municipality" tabindex="-1">
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
                                  <input type="text" name="municipality" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['municipality']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_municipality_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Province</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['province']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Province"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="Province" tabindex="-1">
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
                                  <input type="text" name="province" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['province']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_province_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                   


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Telephone/Mobile No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['contactNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#ContactNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="ContactNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Contact Number</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Contact Number</label>
                                  <input type="text" name="contactNo" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['contactNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_contact_no" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Email Address</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['email']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#Email"><i class="bx bxs-pencil text-primary"></i></a></div>
                      <div class="modal fade" id="Email" tabindex="-1">
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
                                  <input type="text" name="email" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['email']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_email" class="btn btn-primary" >Save changes</button>
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
                          <a class="page-link" href="pages-renew-business-form.php?view_data=<?php echo $businessId ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form.php">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p3.php">3</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p4.php">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p5.php">5</a></li>
                        <li class="page-item">
                          <a class="page-link" href="pages-renew-business-form-p3.php" aria-label="Next">
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

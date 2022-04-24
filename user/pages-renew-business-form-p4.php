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
                <h5 class="card-title">Other Information</h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Male Employee(s)</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['maleEmployee']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#maleEmployee"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="maleEmployee" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit No of Male Employees</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">No of Male Employees</label>
                                  <input type="text" name="maleEmployee" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['maleEmployee']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_male_employees" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">FeMale Employee(s)</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['femaleEmployee']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#femaleEmployee"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="femaleEmployee" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit No of female Employees</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">No of female Employees</label>
                                  <input type="text" name="femaleEmployee" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['femaleEmployee']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_female_employees" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Total Employee(s)</div>
                      <div class="col-lg-5 col-md-4"><?php echo $_SESSION['maleEmployee'] + $_SESSION['femaleEmployee']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No. of Employees Residing in LGU</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['lguEmployee']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#lguEmployee"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="lguEmployee" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit No of LGU Employees</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">No of LGU Employees</label>
                                  <input type="text" name="lguEmployee" class="form-control" id="yourName" required value="<?php echo ucwords($_SESSION['lguEmployee']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_lgu_employees" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Full Name</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['lessorsName']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#lessorsName"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="lessorsName" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Lessor's Name</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Lessor's Name</label>
                                  <input type="text" name="lessorsName" class="form-control" id="yourName"  value="<?php echo ucwords($_SESSION['lessorsName']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_lessors_name" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Full Address</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['lessorsAddress']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#lessorsAddress"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="lessorsAddress" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Lessor's Full Address</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Full Address</label>
                                  <input type="text" name="lessorsAddress" class="form-control" id="yourName"  value="<?php echo ucwords($_SESSION['lessorsAddress']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_lessors_address" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Telephone/Mobile No.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['lessorsContactNo']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#lessorsContactNo"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="lessorsContactNo" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Lessor's Telephone/Mobile No.</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Telephone/Mobile No.</label>
                                  <input type="text" name="lessorsContactNo" class="form-control" id="yourName"  value="<?php echo ucwords($_SESSION['lessorsContactNo']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_lessors_contact" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Email</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['lessorsEmail']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#lessorsEmail"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="lessorsEmail" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Lessor's Email</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Email</label>
                                  <input type="text" name="lessorsEmail" class="form-control" id="yourName"  value="<?php echo ucwords($_SESSION['lessorsEmail']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_lessors_email" class="btn btn-primary" >Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Monthly Rental.</div>
                      <div class="col-lg-5 col-md-4"><?php echo ucwords($_SESSION['lessorsMonthlyRental']); ?></div>
                      <div class="col-lg-4 col-md-4 label "><a href="" type="button" data-bs-toggle="modal" data-bs-target="#lessorsMonthlyRental"><i class="bx bxs-pencil text-primary"></i></a></div>
                       <div class="modal fade" id="lessorsMonthlyRental" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Monthly Rental</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="php/function-business-renewal.php">
                              <div class="modal-body">
                                <div class="col-12">
                                  <label for="yourName" class="form-label">Monthly Rental</label>
                                  <input type="text" name="lessorsMonthlyRental" class="form-control" id="yourName"  value="<?php echo ucwords($_SESSION['lessorsMonthlyRental']); ?>">
                                  <div class="invalid-feedback">Invalid Input</div>
                                </div>

                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_lessors_monthly" class="btn btn-primary" >Save changes</button>
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
                          <a class="page-link" href="pages-renew-business-form-p3.php?view_data3=<?php echo $businessId ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p2.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p3.php">3</a></li>
                        <li class="page-item active"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-renew-business-form-p5.php">5</a></li>
                        <li class="page-item">
                          <a class="page-link" href="pages-renew-business-form-p5.php" aria-label="Next">
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

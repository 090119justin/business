<?php $page='services'; $subpage='renewBusiness'; include "includes/user-header.php"; ?>

  <main id="main" class="main">
    <div class="pagetitle" >
      <h1>Application Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Services</a></li>
          <li class="breadcrumb-item">New Business Permit</li>
          
        </ol>
      </nav>
     



    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Start: Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">NOTICE</h5>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <h4 class="alert-heading">Please wait for verification of your requirements</h4>
                  <p>The<strong> Business Permit Lisencing Office</strong>  will be checking all of your submitted requirements. We will send you an update <strong>via Email</strong> within 24hours</p>
                </div>
                

              </div>
            </div>
            <div class="card" >
              <div class="card-body">

              
                
                 
                <h5 class="card-title" >Waiting for the BPLO's response. Please be patient..<span class="spinner-grow text-primary spinner-grow-sm"></span> <span class="spinner-grow text-primary spinner-grow-sm"></span></h5>
                  
             
                <?php
                  $personId = $_SESSION['personId'];
                  $businessId = $_SESSION['businessId'];
                  $sql = "SELECT requirements.* from renew_requirements 
                  inner join requirements on renew_requirements.requirementsId = requirements.id 
                  where businessId = $businessId order by id desc";
                  $result = mysqli_query($conn, $sql) or die($conn->error);

                  $row = mysqli_fetch_assoc($result);


                ?>
                <!-- List group Numbered -->
                <ol class="list-group list-group-numbered">
                  <li class="list-group-item">DTI Bus. Name Reg. (for single) /  SEC Reg. (for partnership/Corp.)
                    <?php if($row['DTIBusNameReg'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['DTIBusNameReg'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['DTIBusNameReg'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                    
                  </li>
                  <li class="list-group-item">Brgy. Clearance (for Business)
                    <?php if($row['BrgyClearance'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['BrgyClearance'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['BrgyClearance'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Zoning Clearance (CPDO)
                   <?php if($row['ZoningClearance'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['ZoningClearance'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['ZoningClearance'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Cert. of Annual Inspection (CEO)
                     <?php if($row['CEO'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['CEO'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['CEO'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Fire Safty Inspection Cert. (BFP)
                     <?php if($row['BFP'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['BFP'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['BFP'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Sanitary Permit (CHO)
                     <?php if($row['CHO'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['CHO'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['CHO'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Contract of Lease (if space is rented)
                     <?php if($row['ContractOflease'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['ContractOflease'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['ContractOflease'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Sedula (Community Tax Cert.)
                     <?php if($row['Cedula'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['Cedula'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['Cedula'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Invested Capital
                     <?php if($row['InvestedCapital'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['InvestedCapital'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['InvestedCapital'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Picture of Bus. Establishment
                     <?php if($row['Picture'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['Picture'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['Picture'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  <li class="list-group-item">Other Document/s necessary to support application depending on the nature of Business
                     <?php if($row['Others'] === 'pending' )
                      { ?>
                        <span class="spinner-border text-primary spinner-border-sm"></span>
                        <?php
                      }elseif($row['Others'] === "verified"){ ?>
                        <span class="badge bg-success text-light"><i class="bi bi-check-circle me-1"></i> Verified</span>
                      <?php
                      }elseif($row['Others'] === "not submitted"){ ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> No Submition</span>
                        <?php } 
                        else{ ?>
                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Denied</span>
                      <?php }?>
                  </li>
                  
                </ol><!-- End List group Numbered -->
                <form class="row g-3 needs-validation" style="padding-top: 20px;" method="POST" action="php/function-business-registration.php">              
                 <?php 
                    if($row['DTIBusNameReg'] === "verified" && $row['BrgyClearance'] === "verified" && $row['ZoningClearance'] === "verified" && $row['CEO'] === "verified" && $row['BFP'] === "verified" && $row['CHO'] === "verified" && $row['ContractOflease'] === "verified" && $row['Cedula'] === "verified" && $row['InvestedCapital'] === "verified" && $row['Picture'] === "verified" && $row['Others'] === "verified"){ ?>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="submit" name="renew_business">Proceed</button>
                      </div>
                    <?php }else { ?>
                      <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-secondary" disabled="">Submit necessary requirements before you proceed</button>
                      </div>
                      <?php }?>
                  
                </form>
                  

              </div>
            </div>
          </div>
        </div><!-- End: Left side columns -->
        
        
      </div>
    </section>
    <section style="padding-top:50px;">
      <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.562416181315!2d122.75250892363154!3d11.583194922978826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a5f2f02d18ae23%3A0x98e82c94732b4577!2sRoxas%20City%20Hall!5e0!3m2!1sen!2sph!4v1635031207740!5m2!1sen!2sph" width="1366" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </section>
  </main>

  
<?php include "includes/user-footer.php"; ?>

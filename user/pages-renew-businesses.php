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

    <section class="section dashboard">
      <div class="row">


        <?php
            $ownerId = $_SESSION['personId'];
            $result = $conn->query("select businessId, concat('#',lpad(business.id,4,'0')) as newId ,concat(firstName,' ',lastName) as name, businessName, status
              from business.business_mode
              inner join business.business on business_mode.businessId = business.id
              inner join business.owner on business.ownerId = owner.id
              inner join business.personal_information on owner.infoId = personal_information.id
              where mode != 'retired'
              and status = 'paid'
              and infoId = $ownerId;") or die($conn->error);


          ?>
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Notice</h4>
            <p>Business permit must be renewed from January 1-20 every year.</p>
          </div>
          <form method="POST" action="php/admin-function-businesses.php">
            <div class="card recent-sales">
              
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Recent Registries <span>| Today</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Owner</th>
                      <th scope="col">Business Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $row['newId'];?></a></th>
                        <td><?php echo $row['name'];?></td>
                        <td class="text-primary" ><?php echo $row['businessName'];?></td>
                        <td><a class="badge bg-primary text-light" href="pages-renew-business-requirements.php?business=<?php echo $row['businessId']; ?>"> Renew</a></td>
                        
                      </tr>
                  <?php endwhile; ?>

                  </tbody>
                </table>

              </div>

            </div>
          </form>
          
        </div><!-- End Recent Applicants -->

      </div> 
    </section>

  </main><!-- End #main -->

  

<?php include "includes/user-footer.php"; ?>

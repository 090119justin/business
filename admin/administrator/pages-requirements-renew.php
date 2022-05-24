<?php $page='requirements'; $subpage='requirementsRenew'; include "../includes/admin-header.php"; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Verify Requirements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Renewal of Businesses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">


        <?php       

            $result = $conn->query("SELECT requirements.id as reqId, personId, concat(firstName,' ',lastName) as name,concat('#',lpad(personId,4,'0')) as newId 
              from personal_information  
              inner join requirements on personal_information.id = requirements.personId
              where status = 'new' and type = 'renew'") or die($conn->error);
          ?> 
        <!-- Recent Applicants -->
        <div class="col-12">
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
              <h5 class="card-title">Recent Registries (to edit) <span>| Today</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Applicant</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $result->fetch_assoc()): 
                    $personId = $row['personId'];
                    $reqId = $row['reqId'];?>
                    <tr>
                      <th scope="row"><a href="#"><?php echo $row['newId'];?></a></th>
                      <td><?php echo $row['name'];?></td>
                      <td>
                        <a class="badge bg-info text-dark" href="pages-requirements-renew-checklist.php?person_id=<?php echo $personId; ?>&req=<?php echo $reqId; ?>"><i class="bi bi-eye-fill" ></i> View </a>
                      </td>
                    </tr>
                <?php endwhile; ?>

                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Applicants -->

      </div> 
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php"; ?>

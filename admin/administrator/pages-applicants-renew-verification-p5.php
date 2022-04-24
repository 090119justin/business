
<?php $page='applicants'; $subpage='applicantsRenew'; include "../includes/admin-header.php"; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Applicants</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pages-applicants-new.php">New</a></li>
          <li class="breadcrumb-item active">Review</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <?php       
            $businessId = $_GET['view_data5'];  
            $result = $conn->query("select activity.*, business.id as bisd
                      from activity
                      inner join business on activity.businessId = business.id
                      where businessId = $businessId;") or die($conn->error);

            $results = $conn->query("select activity.*, business.id as bisd
                      from activity
                      inner join business on activity.businessId = business.id
                      where businessId = $businessId;") or die($conn->error);
            $rows = mysqli_fetch_assoc($results);
          ?>
        
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Business Activity</h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-10">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">Line of Business</th>
                          <th scope="col">Number of Units</th>
                          <th scope="col">Capitalization</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <th scope="row"><?php echo $row['lineOfBusiness'];?></th>
                            <th scope="row"><?php echo $row['noOfUnits'];?></td>
                            <th scope="row"><?php echo $row['capitalization'];?></td>
                            
                          </tr>
                      <?php endwhile; ?>
                        
                        
                        
                      </tbody>
                    </table>

                    

                    
                    <br>

                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item">
                          <a class="page-link" href="pages-applicants-review-p4.php?view_data4=<?php echo $rows['bisd'] ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pages-applicants-review.php?view_data=<?php echo $rows['bisd'] ?>">1</a></li>
                        <li class="page-item"><a class="page-link" href="pages-applicants-review-p2.php?view_data2=<?php echo $rows['bisd'] ?>">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-applicants-review-p3.php?view_data3=<?php echo $rows['bisd'] ?>">3</a></li>
                        <li class="page-item"><a class="page-link" href="pages-applicants-review-p4.php?view_data4=<?php echo $rows['bisd'] ?>">4</a></li>
                        <li class="page-item active"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="pages-applicants-review-p6.php?view_data6=<?php echo $rows['bisd'] ?>">6</a></li>
                        <li class="page-item">
                          <a class="page-link" href="pages-applicants-review-p6.php?view_data6=<?php echo $rows['bisd'] ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>                       
                    
                        
                      </ul>
                    </nav>

                  </div>
                  <div class="col-lg-1"></div>
                </div>

                    


                    
              </div>
            </div>
            
          </div>
        </div>
          
      </div> 
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php"; ?>

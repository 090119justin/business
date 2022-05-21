<?php $page='services'; $subpage='myBusinesses'; include "includes/user-header.php"; ?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Services</h1>
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
        $businessId = $_GET['view_data'];
        $result = $conn->query("select *
                   from business.regulatory_fees
                   where businessId = $businessId;") or die($conn->error);
        $row = mysqli_fetch_assoc($result);

        $total = $row['MayorsPermit'] + $row['GarbageCharges'] + $row['DeliveryTrucks'] + $row['SanitaryInspection'] + $row['BldgInspection'] + $row['ElectricalInspection'] + $row['MechanicalInspection'] + $row['PlumbingInspection'] + $row['SubstanceStorage'] + $row['Others'];
      ?>
    

    <!-- Recent Applicants -->
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Payment<span> | Details
                    </span></h5>

                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-11">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Regulatory Fees</th>
                                        <th scope="col">Amount Due</th>
                            
                                    </tr>
                                </thead>
                                <tbody>
                        
                                    <tr>
                                        <td>Mayor's Permit</td>
                                        <td><?php echo number_format($row['MayorsPermit']);?></td>                   
                                    </tr>
                                    <tr>
                                        <td>Garbage Charges</td>
                                        <td><?php echo number_format($row['GarbageCharges']);?></td>                   
                                    </tr>
                                    <tr>
                                        <td>Delivery Trucks/Vans Permit Fee</td>
                                        <td><?php echo number_format($row['DeliveryTrucks']);?></td>                   
                                    </tr>
                                    <tr>
                                        <td>Sanitary Inspection Fee</td>
                                        <td><?php echo number_format($row['SanitaryInspection']);?></td>                                                              
                                    </tr>
                                    <tr>
                                        <td>Building Inspection Fee</td>
                                        <td><?php echo number_format($row['BldgInspection']);?></td>                                                               
                                    </tr>
                                    <tr>
                                        <td>Electrical Inspection Fee</td>
                                        <td><?php echo number_format($row['ElectricalInspection']);?></td>            
                                    </tr>
                                    <tr>
                                        <td>Mechanical Inspection Fee</td>
                                        <td><?php echo number_format($row['MechanicalInspection']);?></td>                                                          
                                    </tr>
                                    <tr>
                                        <td>Plumbing Inspection Fee</td>
                                        <td><?php echo number_format($row['PlumbingInspection']);?></td>                                                             
                                    </tr>
                                    <tr>
                                        <td>Storage and Sale of Combustible/Flamable or Explosive Substance</td>
                                        <td><?php echo number_format($row['SubstanceStorage']);?></td>                                                               
                                    </tr>
                                    <tr>
                                        <td>Others</td>
                                        <td><?php echo number_format($row['Others']);?></td>                   
                                    </tr>
                                    <tr>
                                        <th>Total Fees For LGU</th>
                                        <th><?php echo number_format($total);?></th>                   
                                    </tr> 
                                    <tr>
                                        <th>Fire Safety Inspection Fee (10%)</th>
                                        <th><?php echo number_format($row['FireSafetyFee']);?></th>                   
                                    </tr>
                                    <tr>
                                        <th>TOTAL</th>
                                        <th><?php echo number_format($row['FireSafetyFee'] + $total);?></th>                   
                                    </tr>                      
                                </tbody>
                            </table>

                    
                            <br>
                            <a href="pages-my-businesses.php" class="btn btn-primary">Back</a>

                    

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>

  

</main><!-- End #main -->


<?php include "includes/user-footer.php"; ?>
  
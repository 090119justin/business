<?php $page='staff'; $subpage=''; include "../includes/admin-header.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Administrator</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <?php
        	$userId = $_GET['view_data'];
            $result = $conn->query("select users.*, users.id as uId, personal_information.*
              from business.personal_information
              inner join business.users on personal_information.userId = users.id
              where users.role = 'staff' and personal_information.id = $userId;") or die($conn->error);
             $row = mysqli_fetch_assoc($result);
          ?>
         <div class="card">
         	<div class="card-body">
              	<h5 class="card-title">Staff <span>| Edit</span></h5>
		        <form class="row g-3 needs-validation" novalidate method="post" action="../php/admin-function-verify.php">
          			<input type="hidden" name="userId" value="<?php echo $userId ?>">
          			<input type="hidden" name="uId" value="<?php echo $row['uId']; ?>">

		            <div class="modal-body">
		              
		                <div class="col-12">
		                  <label for="yourName" class="form-label">First Name</label>
		                  <input type="text" name="firstName" class="form-control" id="yourName" required value="<?php echo $row['firstName'] ?>">
		                  <div class="invalid-feedback">Please, enter your first name!</div>
		                </div>

		                <div class="col-12">
		                  <label for="yourName" class="form-label">Middle Name</label>
		                  <input type="text" name="middleName" class="form-control" id="yourName" required value="<?php echo $row['middleName'] ?>">
		                  <div class="invalid-feedback">Please, enter your middle name!</div>
		                </div>

		                <div class="col-12">
		                  <label for="yourName" class="form-label">Last Name</label>
		                  <input type="text" name="lastName" class="form-control" id="yourName" required value="<?php echo $row['lastName'] ?>">
		                  <div class="invalid-feedback">Please, enter your last name!</div>
		                </div>

		                <div class="col-12">
		                  <label for="inputDate" class="col-sm-2 col-form-label">Birthdate</label>
		                  <input type="date" name="birthDate" class="form-control" required="" value="<?php echo $row['birthdate'] ?>">
		                  <div class="invalid-feedback">Please, enter your birthdate!</div>

		                </div>

		                <div class="col-12">
		                  <div class="row">
		                    <div class="col-6">
		                      <label for="yourName" class="form-label">Age</label>
		                      <input type="text" name="age" class="form-control" id="yourName" required value="<?php echo $row['age'] ?>">
		                      <div class="invalid-feedback">Please, enter your age!</div>
		                    </div>
		                    <div class="col-6">
		                      <label for="yourName" class="form-label">Gender</label>
		                      <select class="form-select" name="gender" aria-label="Default select example" required >
		                        <option value="">Select gender..</option>
		                        <option value="Male" <?php if ($row['gender'] == "Male") { echo ' selected="selected"'; } ?>>Male</option>
		                        <option value="Female" <?php if ($row['gender'] == "Female") { echo ' selected="selected"'; } ?>>Female</option>
		                        <option value="Others" <?php if ($row['gender'] == "Others") { echo ' selected="selected"'; } ?>>Others</option>
		                      </select>
		                      <div class="invalid-feedback">Please, select your gender!</div>

		                    </div>
		                    
		                    
		                  </div>
		                </div>

		                <div class="col-12">
		                  <label for="yourEmail" class="form-label">Your Email</label>
		                  <input type="email" name="email" class="form-control" id="yourEmail" required value="<?php echo $row['email'] ?>">
		                  <div class="invalid-feedback">Please enter a valid Email adddress!</div>
		                </div>

		                <div class="col-12">
		                  <label for="yourUsername" class="form-label">Username</label>
		                  <div class="input-group has-validation">
		                    <span class="input-group-text" id="inputGroupPrepend">@</span>
		                    <input type="text" name="username" class="form-control" id="yourUsername" required value="<?php echo $row['username'] ?>">
		                    <div class="invalid-feedback">Please choose a username.</div>
		                  </div>
		                </div>

		                <div class="col-12">
		                  <label for="yourPassword" class="form-label">New Password</label>
		                  <input type="password" name="password" class="form-control" id="yourPassword" required>
		                  <div class="invalid-feedback">Please enter your password!</div>
		                </div>      
		            </div>
		            <div class="modal-footer">
		              <button type="submit" class="btn btn-primary" name="update_staff">Save</button>
		            </div>
		        </form>
	    	</div>
	    </div>

      </div> 
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php";?>

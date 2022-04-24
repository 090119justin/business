<?php $page='staff'; $subpage=''; include "../includes/admin-header.php"; ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Administrator</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <?php       
            $result = $conn->query("select personal_information.id as pId, userId, concat('#',lpad(users.id,4,'0')) as newId ,concat(firstName,' ',lastName) as name, gender, age, email
              from business.personal_information
              inner join business.users on personal_information.userId = users.id
              where users.role = 'staff';") or die($conn->error);
          ?>
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card recent-sales">

            <div class="filter" style="margin-right:20px">
              <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="ri-user-add-fill" style="font-size: 20px;"></i></a>
            </div>
            <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Staff</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3 needs-validation" novalidate method="post" action="../php/admin-registration.php">
	                    <div class="modal-body">
	                      
		                    <div class="col-12">
		                      <label for="yourName" class="form-label">First Name</label>
		                      <input type="text" name="firstName" class="form-control" id="yourName" required>
		                      <div class="invalid-feedback">Please, enter your first name!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourName" class="form-label">Middle Name</label>
		                      <input type="text" name="middleName" class="form-control" id="yourName" required>
		                      <div class="invalid-feedback">Please, enter your middle name!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourName" class="form-label">Last Name</label>
		                      <input type="text" name="lastName" class="form-control" id="yourName" required>
		                      <div class="invalid-feedback">Please, enter your last name!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="inputDate" class="col-sm-2 col-form-label">Birthdate</label>
		                      <input type="date" name="birthDate" class="form-control" required="">
		                      <div class="invalid-feedback">Please, enter your birthdate!</div>

		                    </div>

		                    <div class="col-12">
		                      <div class="row">
		                        <div class="col-6">
		                          <label for="yourName" class="form-label">Age</label>
		                          <input type="text" name="age" class="form-control" id="yourName" required>
		                          <div class="invalid-feedback">Please, enter your age!</div>
		                        </div>
		                        <div class="col-6">
		                          <label for="yourName" class="form-label">Gender</label>
		                          <select class="form-select" name="gender" aria-label="Default select example" required>
		                            <option value="">Select gender..</option>
		                            <option value="Male">Male</option>
		                            <option value="Female">Female</option>
		                            <option value="Others">Others</option>
		                          </select>
		                          <div class="invalid-feedback">Please, select your gender!</div>

		                        </div>
		                        
		                        
		                      </div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourEmail" class="form-label">Your Email</label>
		                      <input type="email" name="email" class="form-control" id="yourEmail" required>
		                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourUsername" class="form-label">Username</label>
		                      <div class="input-group has-validation">
		                        <span class="input-group-text" id="inputGroupPrepend">@</span>
		                        <input type="text" name="username" class="form-control" id="yourUsername" required>
		                        <div class="invalid-feedback">Please choose a username.</div>
		                      </div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourPassword" class="form-label">Password</label>
		                      <input type="password" name="password" class="form-control" id="yourPassword" required>
		                      <div class="invalid-feedback">Please enter your password!</div>
		                    </div>      
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	                      <button type="submit" class="btn btn-primary">Save</button>
	                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

              

            <div class="card-body">
              <h5 class="card-title">Staff <span>| List</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $result->fetch_assoc()): ?>
                    <tr>
                      <th scope="row"><a href="#"><?php echo $row['newId'];?></a></th>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['age'];?></td>
                      <td><?php echo $row['gender'];?></td>
                      <td style="padding:1px;">   	
                      		<a type="button" href="pages-edit-staff.php?view_data=<?php echo $row['pId'] ?>"><i class="ri-edit-box-line text-info" style="font-size:25px;"></i></a>
                      		<a type="button" href="../php/delete_staff.php?id=<?php echo $row['userId'] ?>"><i class="ri-delete-bin-5-line text-danger" style="font-size:25px;"></i></a>
                      		
                      		

                      </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
              </table>
              <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Staff</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3 needs-validation" novalidate method="post" action="../php/admin-registration.php">
	                    <div class="modal-body">
	                      
		                    <div class="col-12">
		                      <label for="yourName" class="form-label">First Name</label>
		                      <input type="text" name="firstName" class="form-control" id="yourName" required>
		                      <div class="invalid-feedback">Please, enter your first name!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourName" class="form-label">Middle Name</label>
		                      <input type="text" name="middleName" class="form-control" id="yourName" required>
		                      <div class="invalid-feedback">Please, enter your middle name!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourName" class="form-label">Last Name</label>
		                      <input type="text" name="lastName" class="form-control" id="yourName" required>
		                      <div class="invalid-feedback">Please, enter your last name!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="inputDate" class="col-sm-2 col-form-label">Birthdate</label>
		                      <input type="date" name="birthDate" class="form-control" required="">
		                      <div class="invalid-feedback">Please, enter your birthdate!</div>

		                    </div>

		                    <div class="col-12">
		                      <div class="row">
		                        <div class="col-6">
		                          <label for="yourName" class="form-label">Age</label>
		                          <input type="text" name="age" class="form-control" id="yourName" required>
		                          <div class="invalid-feedback">Please, enter your age!</div>
		                        </div>
		                        <div class="col-6">
		                          <label for="yourName" class="form-label">Gender</label>
		                          <select class="form-select" name="gender" aria-label="Default select example" required>
		                            <option value="">Select gender..</option>
		                            <option value="Male">Male</option>
		                            <option value="Female">Female</option>
		                            <option value="Others">Others</option>
		                          </select>
		                          <div class="invalid-feedback">Please, select your gender!</div>

		                        </div>
		                        
		                        
		                      </div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourEmail" class="form-label">Your Email</label>
		                      <input type="email" name="email" class="form-control" id="yourEmail" required>
		                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourUsername" class="form-label">Username</label>
		                      <div class="input-group has-validation">
		                        <span class="input-group-text" id="inputGroupPrepend">@</span>
		                        <input type="text" name="username" class="form-control" id="yourUsername" required>
		                        <div class="invalid-feedback">Please choose a username.</div>
		                      </div>
		                    </div>

		                    <div class="col-12">
		                      <label for="yourPassword" class="form-label">Password</label>
		                      <input type="password" name="password" class="form-control" id="yourPassword" required>
		                      <div class="invalid-feedback">Please enter your password!</div>
		                    </div>      
	                    </div>
	                    <div class="modal-footer">
	                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	                      <button type="submit" class="btn btn-primary">Save</button>
	                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Edit Modal-->

            </div>

          </div>
        </div><!-- End Recent Applicants -->

      </div> 
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php";?>

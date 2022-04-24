

<!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="background-color: #012970;  margin-bottom: 0px;">
      
    <div class="copyright" style="color: white;">
      &copy; Copyright <strong><span>OBPPS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">FCU Students</a>
    </div>
  </footer>

  <main class="main" id="main" style="background-color: #446091; margin-top: 0px;">
    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-geo-alt" style="color: white;"></i>
                <h3 style="color: white;">Address</h3>
                <p>Roxas City Hall,<br>Roxas City, Capiz</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-telephone" style="color: white;"></i>
                <h3 style="color: white;">Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-envelope" style="color: white;"></i>
                <h3 style="color: white;">Email Us</h3>
                <p>obpps@gmail.com</p>
              </div>
            </div>
            <div class="col-lg-6" >
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-clock" style="color: white;"></i>
                <h3 style="color: white;">Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4" style="margin-top: 10px;">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>
  </main>

   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
    function addRow() {
      var root = document.getElementById('mytab').getElementsByTagName('tbody')[0];
      var rows = root.getElementsByTagName('tr');
      var clone = cloneEl(rows[rows.length - 1]);
      cleanUpInputs(clone);
      root.appendChild(clone);
    }
    function addColumn() {
      var rows = document.getElementById('mytab').getElementsByTagName('tr'), i = 0, r, c, clone;
        while (r = rows[i++]) {
          c = r.getElementsByTagName('td');
          clone = cloneEl(c[c.length - 1]);
          cleanUpInputs(clone);
          c[0].parentNode.appendChild(clone);
        }
    }
    function cloneEl(el) {
      var clo = el.cloneNode(true);
      return clo;
    }

    function cleanUpInputs(obj) {
      for (var i = 0; n = obj.childNodes[i]; ++i) {
        if (n.childNodes && n.tagName != 'INPUT') {
          cleanUpInputs(n);
        } else if (n.tagName == 'INPUT' && n.type == 'text') {
          n.value = '';
        }
      }  
    }
  </script>

</body>

</html>
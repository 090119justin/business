  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>OBPPS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">FCU Students</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/jquery.min.js"></script>

  <script type="text/javascript">
     function calculate(){
        var one = 0;
        var two = 0;
        var three = 0;
        var four = 0;
        var five = 0;
        var six = 0;
        var seven = 0;
        var eight = 0;
        var nine = 0;
        var ten = 0;
        if(document.querySelector('#mayor').value == ""){
            one = 0;
        }
        else{
            one = document.querySelector('#mayor').value;
        }

        if(document.querySelector('#garbage').value == ""){
            two = 0;
        }
        else{
            two = document.querySelector('#garbage').value;
        }

        if(document.querySelector('#trucks').value == ""){
            three = 0;
        }
        else{
            three = document.querySelector('#trucks').value;
        }

        if(document.querySelector('#sanitary').value == ""){
            four = 0;
        }
        else{
            four = document.querySelector('#sanitary').value;
        }

        if(document.querySelector('#building').value == ""){
            five = 0;
        }
        else{
            five = document.querySelector('#building').value;
        }

        if(document.querySelector('#electrical').value == ""){
            six = 0;
        }
        else{
            six = document.querySelector('#electrical').value;
        }


        if(document.querySelector('#mechanical').value == ""){
            seven = 0;
        }
        else{
            seven = document.querySelector('#mechanical').value;
        }

        if(document.querySelector('#plumbing').value == ""){
            eight = 0;
        }
        else{
            eight = document.querySelector('#plumbing').value;
        }

        if(document.querySelector('#storage').value == ""){
            nine = 0;
        }
        else{
            nine = document.querySelector('#storage').value;
        }

        if(document.querySelector('#others').value == ""){
            ten = 0;
        }
        else{
            ten = document.querySelector('#others').value;
        }
        var result = document.querySelector('#total_lgu');
        var total_lgu = (parseFloat(one)+parseFloat(two)+parseFloat(three)+parseFloat(four)+parseFloat(five)+parseFloat(six)+parseFloat(seven)+parseFloat(eight)+parseFloat(nine)+parseFloat(ten));
        result.textContent = "₱ " + total_lgu;

        var fireSafety = document.querySelector('#firesafety');
        fireSafety.textContent = "₱ "+ (total_lgu * 0.1).toFixed(2);

        var fire = (total_lgu * 0.1).toFixed(2);
        document.querySelector('#total').textContent = "₱ "+(parseFloat(fire) + parseFloat(total_lgu)).toFixed(2);
        var fsafety = document.querySelector('#firesafety1');
        fsafety.value = fire;
        

    }
  </script>

</body>

</html>
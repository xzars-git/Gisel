      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url() ?>/assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
      <script src="<?php echo base_url() ?>/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url() ?>/assets/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>
      <script>
          $(document).ready(function() {
              $('#datatables').DataTable({
                  "pagingType": "full_numbers",
                  "lengthMenu": [
                      [10, 25, 50, -1],
                      [10, 25, 50, "All"]
                  ],
                  responsive: true,
                  language: {
                      search: "_INPUT_",
                      searchPlaceholder: "Search records",
                  }
              });
          });
      </script>
      <script>
/*
// Set the date we're counting down to
var countDownDate = new Date("Oct 9, 2021 21:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {
// Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
 // Time calculations for days, hours, minutes and seconds
 var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
 document.getElementById("countdown").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "DOOR";
  }
}, 1000);
*/
</script>
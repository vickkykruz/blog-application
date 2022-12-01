         <!-- partial:partials/_footer.html -->
         <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © S.G Enterprices 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed By <a href="#http://" target="_blank" rel="noopener noreferrer" style="color: #daa520;">Bootstrapdash</a> & Implemented By <a href="#http://" target="_blank" rel="noopener noreferrer" style="color: #daa520;">Vickky Kruz</a></span>
            </div>
          </footer>
          <!-- partial -->
          <!-- Client's Modal -->
          
          <!-- End Of Client's Modal -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../template/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../template/assets/js/off-canvas.js"></script>
    <script src="../template/assets/js/hoverable-collapse.js"></script>
    <script src="../template/assets/js/misc.js"></script>
    <script src="../template/assets/js/settings.js"></script>
    <script src="../template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script type="text/javascript">
    $(document).ready(function () {
        load_data();

        function load_data(page){

            $.ajax({
                url:"./functions/./list_of_admin.php",
                method:"POST",
                data:{page:page},
                success:function(data){
                    $('#pagination_data').html(data);
                }
            })
        }

        $(document).on("click", ".page-item", function(){
            var page = $(this).attr("id");
            load_data(page);
        })

    });
    </script>
  </body>
</html>
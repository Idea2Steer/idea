<?=$this->extend("template_main")?>
<?=$this->section("content")?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">Admin Dashboard</h4>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="row">
            <div class="col-md-6 col-xl-3">
               <div class="card custom_card">
                  <div class="card-body">
                     <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$total_employee?></span></h4>
                        <p class="text-muted mb-0">Total Employee</p>
                     </div>
                     <!-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>0</span> since last week
                     </p> -->
                  </div>
               </div>
            </div>
            <!-- end col-->
            <div class="col-md-6 col-xl-3">
               <div class="card custom_card">
                  <div class="card-body">
                     
                     <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$total_contractor?></span></h4>
                        <p class="text-muted mb-0">Total Contractor </p>
                     </div>
                     <!-- <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0</span> since last week
                     </p> -->
                  </div>
               </div>
            </div>
            <!-- end col-->
            <div class="col-md-6 col-xl-3">
               <div class="card custom_card">
                  <div class="card-body">
                     
                     <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$total_client?></span></h4>
                        <p class="text-muted mb-0">Total Client </p>
                     </div>
                     <!-- <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i>0</span> since last week
                     </p> -->
                  </div>
               </div>
            </div>
            <!-- end col-->
            <div class="col-md-6 col-xl-3">
               <div class="card custom_card">
                  <div class="card-body">
                     <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?=$total_project?></span></h4>
                        <p class="text-muted mb-0">Total Project</p>
                     </div>
                     <!-- <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i>0</span> since last week
                     </p> -->
                  </div>
               </div>
            </div>
            <!-- end col-->
         </div>
         <!-- end row-->
         <!-- end row -->
         <!-- end row -->
         <!-- My Chart -->
          
         <div class="row mt-3">
            <div class="col-lg-4 col-md-12 col-sm-12" id="barchart_material_yearly" style=" height: 500px;">
               
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12" id="barchart_material_monthly" style=" height: 500px;">
               
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12" id="barchart_material_weekly" style=" height: 500px;">
               
            </div>
         </div>

      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
 
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart_yearly);
      
      function drawChart_yearly() {
        var data = google.visualization.arrayToDataTable(<?=json_encode($barchart_material_yearly)?>);

        var options = {
          chart: {
            title: 'Company Yearly Performance',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_yearly'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


      // Monthly
      google.charts.setOnLoadCallback(drawChart_monthly);
      function drawChart_monthly() {
        var data = google.visualization.arrayToDataTable(<?=json_encode($barchart_material_monthly)?>);

        var options = {
          chart: {
            title: 'Company Monthly Performance',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_monthly'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


      // Weekly
      google.charts.setOnLoadCallback(drawChart_weekly);
      function drawChart_weekly() {
        var data = google.visualization.arrayToDataTable(<?=json_encode($barchart_material_weekly)?>);

        var options = {
          chart: {
            title: 'Company Weekly Performance',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_weekly'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<?=$this->endSection()?>    
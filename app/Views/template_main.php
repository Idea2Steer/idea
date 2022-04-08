<!doctype html>
<html lang="en">
   <?=$this->include("includes/head"); ?>
     <body>
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
        <!-- Begin page -->
        <div id="layout-wrapper">
             <?=$this->include("includes/header"); ?>
            <!-- ========== Left Sidebar Start ========== -->
             <?=$this->include("includes/main-menu"); ?>
            <!-- Left Sidebar End -->
  
            <?=$this->renderSection("content"); ?>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
 

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
          <?=$this->include("includes/footer"); ?>
        <!-- JAVASCRIPT -->
         <?=$this->include("includes/script"); ?>
    </body>



</html>
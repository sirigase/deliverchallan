<?php include 'include/logincheck.php'; ?>
<?php include 'include/functions.php'; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include 'include/headerscripts.php'; ?>
    <![endif]-->
    <script>
      <?php  $tag = $_GET['s'];
if ($tag == "1") {
      ?>
         setTimeout(function(){
          
window.location.href = 'IssueDC.php';
         
         }, 3000);
         <?php } ?>
      </script>
</head>

<body>
        <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'include/preloader.php'; ?>
    <!-- ============================================================== -->
     <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include 'include/topheader.php'; ?>
         <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'include/leftsidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Documentation</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Help</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Buyer</h5>
                                <p>
                                    1. To Add Buyer, click Add at top bar and click Add Buyer <br>
                                    Enter Name, Address, State (Destination from), Contact No and GSTIN, select Supplier / Customer and click 
                                    Submit.<br>
                                    3. To View Buyer/Supplier, click Buyer in left bar, In search bar enter buyer name or address, state, contact
                                    or email id.<br>
                                    4. To Edit Buyer, follow step 3, Click Edit, make changes to fields and click Submit.
                                       On Editing buyer his/her name will also reflect in past dated dc's in pdf format.<br>
                                    5. To Delete Buyer, follow step 3, click Delete. On deleting a buyer his/her information wont appear in any past dc's pdf format.<br>
                                   note : When DC's are generated and edited it is saved in Delivery_Challan folder with file name as date and Dc No. It can be retrieved for future
                                    references.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Products</h5>
                                <p>
                                1. To Add Product, click Add at top bar and click Add Product <br>
2. Select Company, enter Pattern no/Catalogue no, Item description, Qty, Nos, hsn, gst and Amount. For Nos, NOS is selected, 
serial no, pattern no, qty require & amount wont
appear in Issue DC, Edit DC & In PDF format. <br>
3. To View Product of Sashwat, in left bar, click Products and select Sashwat.<br>
4. To View Product of Hindtex, in left bar, click Products and select Hindtex.<br>
5. To Edit Products, follow step 3 or 4, In search bar, enter the product description, in search result, select the respective product 
and click edit.
Enter the relevant fields of product details and click submit.<br>
6. To Delete Products, follow step 3 or 4, In search bar, enter the product description, in search result, select the respective product 
and click Delete, confirm Yes for the popup.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Issue DC</h5>
                                <p>
 1. In left side bar, click Issue DC.<br>
 2.Select the company, Buyer, add Products and click Submit, Change fields of pattern no, item description, qty, NOS,Qty require.<br>
3. To remove an item, enable the checkbox in the item and click submit. Items get removed.<br>
4. Modify DC no, date, assessment yr, purpose, transport, vehicle.<br>
5. To submit the DC form, enable the checkbox Submit Form and click submit, DC is generated and pdf view is shown in browser.<br>
note : When DC's are generated  it is saved in Delivery_Challan folder with file name as date and Dc No. It can be retrieved for future
                                    references.                         
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit DC</h5>
                                <p>
    1. In left side bar, click View DC, click Sashwat/Hindtex, in search field enter the Buyer name and relevant DC's is shown in the 
    search result. Click Edit <br>  
    2. Change fields of pattern no, item description, qty, NOS,Qty require.<br>  
    3. To remove an item, enable the checkbox in the item and click submit. Items get removed.<br>
4. Modify date, assessment yr, purpose, transport, vehicle.<br>
5. To submit the edited DC form, enable the checkbox Submit Form and click submit, DC is edited and pdf view is shown in browser.<br>
note : When DC's are edited  it is saved in Delivery_Challan folder with file name as date and Dc No. It can be retrieved for future
                                    references.  <br>
      * DC no and company cannot be modified while editing DC.                                                           
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Company Settings</h5>
                                <p>
 1. In top bar at right, click bulb icon. Click company<br>
 2. Click Edit on the relevant company<br>
3. Modify the required fields and submit.<br>
4. Newly modified information will be shown in Issue DC, Edit DC and pdf's.<br>
                   
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Settings</h5>
                                <p>
                                1. In top bar at right, click bulb icon. Click Settings<br>
    2.  Assessment Year will be shown in Issue DC, Records to show in each pages. <br>
    3. Modify the required fields and submit.<br>
    4.Click backup database, it saves all information from database to dbbackup folder.<br>
                                                          
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                 </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
             <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'include/footer.php'; ?>
            
            <!-- ============================================================== -->
            <!-- End footer -->
             </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
     <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
      <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include 'include/js.php'; ?>
    
    </body>

</html>
    
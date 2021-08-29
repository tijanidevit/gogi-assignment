<?php 
session_start();
if (!isset($_SESSION['gogi_admin'])) {
    header('location: ./');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "includes/header-resources.php"; ?>

</head>

<body class="horizontal-navigation">

    <?php include "includes/preloader.php"; ?>



    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <?php include "includes/header.php"; ?>
        <!-- ../ Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::navigation -->
            <?php include "includes/navigation.php"; ?>
            <!-- end::navigation -->

            <!-- Content body -->
            <div class="content-body">
                <!-- Content -->
                <div class="content ">
                    <div class="page-header d-md-flex justify-content-between">
                        <div>
                            <h3>New Lecturer's Account</h3>
                        </div>

                    </div>

                    <div class="">

                        <div class="card" id="review-section">
                            <div class="card-body">
                                <form id="lecturerForm" enctype="multipart/form-data" method="post">

                                    <div class="row">
                                        <div id="result"></div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Fullname</label>
                                                <input type="text" name="fullname" class="form-control" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Staff ID</label>
                                                <input type="text" name="staff_id" class="form-control" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="c_password" class="form-control" required="required" />
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit">
                                            <span class="spinner" id="spinner" style="display: none;">
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            </span>
                                            <span class="btnText">
                                                Submit
                                            </span>
                                        </button>

                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- ../ Content -->

                <!-- Footer -->

                <?php include "includes/footer.php"; ?>

                <!-- ../ Footer -->
            </div>
            <!-- ../ Content body -->
        </div>
        <!-- ../ Content wrapper -->
    </div>
    <!-- ../ Layout wrapper -->

    <!-- Main scripts -->
    <script src="../vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="../assets/js/app.min.js"></script>
</body>

</html>

<script>
    $('#lecturerForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/add_lecturer.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('#spinner').show();
                $('#result').hide();
            },
            success: function(data){
                if (data.includes('successf')) {
                    $(#lecturerForm)[0].clear();
                }
                $('#result').html(data);
                $('#result').fadeIn();
                $('#spinner').hide();
            }
        })
    })
</script>
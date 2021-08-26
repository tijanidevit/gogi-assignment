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
                            <h3>Register New Course</h3>
                        </div>

                    </div>

                    <div class="">

                        <div class="card" id="review-section">
                            <div class="card-body">
                                <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
                                        <label for="">Course Title</label>
                                        <input type="text" name="title" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Course Code</label>
                                        <input type="text" name="title" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lecturer in charge</label>
                                        <select name="lecturer" id="" class="form-control" required="required">
                                            <option value="" selected disabled>Select</option>
                                            <option value="">Mr. Adewale</option>
                                            <option value="">Mr. Adewale</option>
                                            <option value="">Mr. Adewale</option>
                                            <option value="">Mr. Adewale</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary">Submit</button>
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
<?php 
    session_start();
    if (!isset($_SESSION['gogi_lecturer'])) {
        header('location: ./');
        exit();
    }
    $lecturer = $_SESSION['gogi_lecturer'];

    include_once '../core/lecturers.class.php';
    include_once '../core/core.function.php';
    $lecturer_obj = new Lecturers();
    $lecturer_id = $lecturer['id'];

    $assignment_solutions = $lecturer_obj->fetch_limited_lecturer_assignment_submissions($lecturer_id,4);
    $assignments = $lecturer_obj->fetch_limited_lecturer_assignments($lecturer_id,10);
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
                            <h3>Computer Animation and Graphics</h3>
                        </div>

                    </div>

                    <div class="">

                        <div class="card" id="review-section">
                            <div class="card-body">
                                <form action="" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Score</label>
                                        <input type="text" name="score" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Attachment</label>
                                        <input type="file" name="file" class="form-control" required="required" />
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
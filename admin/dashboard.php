<?php 
    session_start();
    if (!isset($_SESSION['gogi_admin'])) {
        header('location: ./');
        exit();
    }

    include_once '../core/students.class.php';
    include_once '../core/lecturers.class.php';

    $lecturer_obj = new Lecturers();
    $student_obj = new Students();

    $students_num = $student_obj->students_num();
    $lecturers_num = $lecturer_obj->lecturers_num();
    $assignments_num = $assignment_obj->assignments_num();
    $assignment_submissions_num = $assignment_submission_obj->assignment_submissions_num();
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "includes/header-resources.php"; ?>

    <!-- DataTable -->
    <link rel="stylesheet" href="../vendors/dataTable/datatables.min.css" type="text/css">


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
                            <h3>Welcome back, Administrator</h3>
                            <p class="text-muted">Today is another good day.</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div id="dashboard-date" class="btn btn-outline-light">
                                <span class="btn btn-primary"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title mb-2">Report</h6>
                                    </div>
                                    <div>
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Students</h5>
                                                    <div>Total students synchronized</div>
                                                </div>
                                                <h3 class="text-success mb-0">30000</h3>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Lecturers</h5>
                                                    <div>No of times you submitted you assignemnts</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-info mb-0">65</h3>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Courses</h5>
                                                    <div>Total products ordered</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-primary mb-0">90</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title mb-2">Report</h6>
                                    </div>
                                    <div>
                                        <div class="list-group list-group-flush">
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Assignments</h5>
                                                    <div>Last month targets</div>
                                                </div>
                                                <h3 class="text-success mb-0">30000</h3>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Total Submissions</h5>
                                                    <div>No of times you submitted you assignemnts</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-info mb-0">65</h3>
                                                </div>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Missed Assignments</h5>
                                                    <div>Total products ordered</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-danger mb-0">90</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <!-- DataTable -->
    <script src="../vendors/dataTable/datatables.min.js"></script>
    <!-- App scripts -->
    <script src="../assets/js/app.min.js"></script>
    <script>
        $(function() {
            $('#dashboard-date span').html(moment().format('MMMM D, YYYY'));
        })
    </script>
</body>

</html>
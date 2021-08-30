<?php 
    session_start();
    if (!isset($_SESSION['gogi_lecturer'])) {
        header('location: ./');
        exit();
    }
    $lecturer = $_SESSION['gogi_lecturer'];
    $course_id = $_GET['id'];

    include_once '../core/courses.class.php';
    include_once '../core/core.function.php';
    $course_obj = new courses();
    $lecturer_id = $lecturer['id'];

    $assignments = $course_obj->fetch_course_assignments($course_id);
    $course = $course_obj->fetch_course($course_id);
?>
<!doctype html>
<html lang="en">

<head>
    <?php include "includes/header-resources.php"; ?>

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="../vendors/datepicker/daterangepicker.css" type="text/css">

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
                            <h3><?php echo $course['course_title'] ?></h3>
                            <p class="text-muted">COM 202</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div class="btn btn-outline-light">
                                <a href="new-assignment?id=<?php echo $course_id ?>" class="btn btn-primary"> New Assignment </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="timeline card-scroll" style="height: 800px">

                                        <?php foreach ($assignments as $assignment): ?>
                                            <div class="timeline-item">
                                                <div>
                                                    <figure class="avatar avatar-sm mr-3 bring-forward">
                                                        <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="d-flex justify-content-between mb-4">
                                                        <span>
                                                            <span class="link-1"><?php echo $assignment['title'] ?></span>
                                                        </span>
                                                        <span class="text-muted font-weight-normal"><?php echo format_date($assignment['created_at']) ?></span>
                                                    </h6>
                                                    <a href="#">
                                                        <div class="mb-3 border p-3 border-radius-1">
                                                            <?php echo $assignment['question'] ?>

                                                            <div class="mt-2">
                                                                <a href="assignment-details?id=<?php echo $assignment['id'] ?>" class="badge badge-sm badge-secondary">View Details</a>
                                                                <a href="assignment-submissions?id=<?php echo $assignment['id'] ?>" class="badge badge-sm badge-primary">View Submissions</a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach ?>

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


    <!-- App scripts -->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>
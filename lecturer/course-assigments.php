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
                            <h3>Computer Graphics &amp; Animations</h3>
                            <p class="text-muted">COM 202</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div class="btn btn-outline-light">
                                <a href="new-assignment" class="btn btn-primary"> New Assignment </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="timeline card-scroll" style="height: 800px">

                                        <div class="timeline-item">
                                            <div>
                                                <figure class="avatar avatar-sm mr-3 bring-forward">
                                                    <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                </figure>
                                            </div>
                                            <div>
                                                <h6 class="d-flex justify-content-between mb-4">
                                                    <span>
                                                        <span class="link-1">In not less thant 500 words, expain the meaning of Animation Frame</span>
                                                    </span>
                                                    <span class="text-muted font-weight-normal">Tue 8:17pm</span>
                                                </h6>
                                                <a href="#">
                                                    <div class="mb-3 border p-3 border-radius-1">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid
                                                        aperiam commodi culpa debitis deserunt enim itaque laborum minima neque
                                                        nostrum pariatur perspiciatis, placeat quidem, ratione recusandae
                                                        reiciendis sapiente, ut veritatis vitae. Beatae dolore hic odio! Esse
                                                        officiis quidem voluptate.

                                                        <div class="mt-2">
                                                            <a href="assignment-details" class="badge badge-sm badge-secondary">View Details</a>
                                                            <a href="assignment-submissions" class="badge badge-sm badge-primary">View Submissions</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div>
                                                <figure class="avatar avatar-sm mr-3 bring-forward">
                                                    <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                </figure>
                                            </div>
                                            <div>
                                                <h6 class="d-flex justify-content-between mb-4">
                                                    <span>
                                                        <span class="link-1">In not less thant 500 words, expain the meaning of Animation Frame</span>
                                                    </span>
                                                    <span class="text-muted font-weight-normal">Tue 8:17pm</span>
                                                </h6>
                                                <a href="#">
                                                    <div class="mb-3 border p-3 border-radius-1">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid
                                                        aperiam commodi culpa debitis deserunt enim itaque laborum minima neque
                                                        nostrum pariatur perspiciatis, placeat quidem, ratione recusandae
                                                        reiciendis sapiente, ut veritatis vitae. Beatae dolore hic odio! Esse
                                                        officiis quidem voluptate.

                                                        <div class="mt-2">
                                                            <a href="assignment-details" class="badge badge-sm badge-secondary">View Details</a>
                                                            <a href="assignment-submissions" class="badge badge-sm badge-primary">View Submissions</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div>
                                                <figure class="avatar avatar-sm mr-3 bring-forward">
                                                    <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                </figure>
                                            </div>
                                            <div>
                                                <h6 class="d-flex justify-content-between mb-4">
                                                    <span>
                                                        <span class="link-1">In not less thant 500 words, expain the meaning of Animation Frame</span>
                                                    </span>
                                                    <span class="text-muted font-weight-normal">Tue 8:17pm</span>
                                                </h6>
                                                <a href="#">
                                                    <div class="mb-3 border p-3 border-radius-1">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid
                                                        aperiam commodi culpa debitis deserunt enim itaque laborum minima neque
                                                        nostrum pariatur perspiciatis, placeat quidem, ratione recusandae
                                                        reiciendis sapiente, ut veritatis vitae. Beatae dolore hic odio! Esse
                                                        officiis quidem voluptate.

                                                        <div class="mt-2">
                                                            <a href="assignment-details" class="badge badge-sm badge-secondary">View Details</a>
                                                            <a href="assignment-submissions" class="badge badge-sm badge-primary">View Submissions</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div>
                                                <figure class="avatar avatar-sm mr-3 bring-forward">
                                                    <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                </figure>
                                            </div>
                                            <div>
                                                <h6 class="d-flex justify-content-between mb-4">
                                                    <span>
                                                        <span class="link-1">In not less thant 500 words, expain the meaning of Animation Frame</span>
                                                    </span>
                                                    <span class="text-muted font-weight-normal">Tue 8:17pm</span>
                                                </h6>
                                                <a href="#">
                                                    <div class="mb-3 border p-3 border-radius-1">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid
                                                        aperiam commodi culpa debitis deserunt enim itaque laborum minima neque
                                                        nostrum pariatur perspiciatis, placeat quidem, ratione recusandae
                                                        reiciendis sapiente, ut veritatis vitae. Beatae dolore hic odio! Esse
                                                        officiis quidem voluptate.

                                                        <div class="mt-2">
                                                            <a href="assignment-details" class="badge badge-sm badge-secondary">View Details</a>
                                                            <a href="assignment-submissions" class="badge badge-sm badge-primary">View Submissions</a>
                                                        </div>
                                                    </div>
                                                </a>
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


    <!-- App scripts -->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>
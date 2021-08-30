<?php 
    session_start();
    if (!isset($_SESSION['gogi_lecturer'])) {
        header('location: ./');
        exit();
    }
    $lecturer = $_SESSION['gogi_lecturer'];

    include_once '../core/assignments.class.php';
    include_once '../core/core.function.php';
    $assignment_obj = new assignments();
    $assignment_id = $_GET['id'];

    $assignment = $assignment_obj->fetch_assignment($assignment_id);
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
                            <h3><?php echo $assignment['title'] ?> - <?php echo $assignment['course_title'] ?></h3>
                            <p class="text-muted">Sent since 2 days ago</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div id="dashboard-date" class="bg-outline-light">
                                <span class="p-3 bg-danger">Deadline: <?php echo $assignment['title'] ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card" style="width: 100%">
                            <div class="card-header">
                                <div class="d-flex py-3 align-items-start">
                                    <div class="pr-3">
                                        <span class="avatar avatar-state-success">
                                            <img src="../uploads/lecturers/images/<?php echo $assignment['image'] ?>" class="rounded-circle" alt="image">
                                        </span>
                                    </div>
                                    <div class="flex-grow- 1">
                                        <h6 class="mb-1"><?php echo $assignment['fullname'] ?></h6>
                                        <span class="text-muted">
                                            Lecturers
                                        </span>
                                    </div>
                                    <div class="text-right ml-auto d-flex">

                                        <a href="assignment-submissions?id=<?php echo $assignment['id'] ?>" class="btn btn-primary mr-4">View Submissions</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $assignment['question'] ?>.</h3>
                                <p><?php echo $assignment['instructions'] ?></p>

                                <p><strong>Score</strong>: <?php echo $assignment['max_grade'] ?></p>
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
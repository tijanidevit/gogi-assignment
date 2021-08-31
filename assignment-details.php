<?php 
    session_start();
    if (!isset($_SESSION['gogi_student'])) {
        header('location: ./');
        exit();
    }

    include_once 'core/students.class.php';
    include_once 'core/assignments.class.php';
    include_once 'core/assignment_submissions.class.php';
    include_once 'core/core.function.php';
    $student_obj = new Students();
    $assignment_obj = new Assignments();
    $assignment_submission_obj = new Assignment_submissions();

    $student = $_SESSION['gogi_student'];
    $student_id = $student['id'];
    $assignment_id = $_GET['id'];

    $assignment = $assignment_obj->fetch_assignment($assignment_id);

    $has_student_submitted = false;
    if($assignment_submission_obj->check_student_assignment_submission($assignment_id,$student_id)){
        $has_student_submitted = true;
        $submission = $assignment_submission_obj->fetch_student_assignment_submission($assignment_id,$student_id);
        $submission_id = $submission['id'];
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
        <!-- ./ Header -->

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
                            <h3><?php echo $assignment['title'] ?></h3>
                            <p class="text-muted">Sent on <?php echo format_date($assignment['created_at']) ?></p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div id="dashboard-date" class="btn btn-outline-light">
                                <span class="btn btn-danger">Deadline: <?php echo format_date($assignment['deadline']) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card" style="width: 100%">
                            <div class="card-header">
                                <div class="d-flex py-3 align-items-start">
                                    <div class="pr-3">
                                        <span class="avatar avatar-state-success">
                                            <img src="./uploads/lecturers/images/<?php echo $assignment['image'] ?>" class="rounded-circle" alt="image">
                                        </span>
                                    </div>
                                    <div class="flex-grow- 1">
                                        <h6 class="mb-1"><?php echo $assignment['fullname'] ?></h6>
                                        <span class="text-muted">
                                            <?php echo $assignment['course_title'] ?>
                                        </span>
                                    </div>
                                    <div class="text-right ml-auto d-flex flex-column">
                                        <span cla ss="small text-muted"><?php echo format_date($assignment['created_at']) ?></span>
                                    </div>

                                    <div class="text-right ml-auto d-flex">

                                        <?php if (!$has_student_submitted): ?>
                                            <a href="submit-assignment?id=<?php echo $assignment_id ?>" class="btn btn-primary mr-4">Submit Your Assignment</a>
                                        <?php else: ?>
                                            <a href="assignment-review-details?id=<?php echo $submission_id ?>" class="btn btn-primary mr-4">View Assignment Review</a>
                                        <?php endif ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3><?php echo $assignment['question'] ?>.</h3>
                                <p><?php echo $assignment['instructions'] ?></p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- ./ Content -->

                <!-- Footer -->

                <?php include "includes/footer.php"; ?>

                <!-- ./ Footer -->
            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->

    <!-- Main scripts -->
    <script src="./vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="./assets/js/app.min.js"></script>
</body>

</html>
<?php 
    session_start();
    if (!isset($_SESSION['gogi_student'])) {
        header('location: ./');
        exit();
    }

    include_once 'core/students.class.php';
    include_once 'core/assignment_submissions.class.php';
    include_once 'core/core.function.php';
    $student_obj = new Students();
    $assignment_submission_obj = new Assignment_submissions();

    $student = $_SESSION['gogi_student'];
    $student_id = $student['id'];
    $submission_id = $_GET['id'];

    $submission = $assignment_submission_obj->fetch_assignment_submission($submission_id);
    $submission_was_reviewed = false;
    if ($submission['feedback'] != '') {
        $submission_was_reviewed = true;
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
                            <h3><?php echo $submission['title'] ?></h3>
                            <p class="text-muted"><?php echo format_date($submission['created_at']) ?></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="card" style="width: 100%">
                            <div class="card-header">
                                <div class="pr-3">
                                    <span class="avatar avatar-state-success">
                                        <img src="./uploads/lecturers/images/<?php echo $submission['lec_image'] ?>" class="rounded-circle" alt="image">
                                    </span>
                                </div>
                                <div class="flex-grow- 1">
                                    <h6 class="mb-1"><?php echo $submission['lec_name'] ?></h6>
                                    <span class="text-muted">
                                        <?php echo $submission['course_title'] ?>
                                    </span>
                                </div>

                                <div class="text-right ml-auto d-flex">

                                    <a href="assignment-details?id=<?php echo $submission['assignment_id'] ?>" class="btn btn-primary mr-4">View Assignment Details</a>
                                    
                                    <?php if ($submission_was_reviewed): ?>
                                        <a href="chat?id=<?php echo $submission['id'] ?>" class="btn btn-info">Initiate Chat</a>
                                    <?php endif ?>
                                    
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4" style="border-right: 1px solid #ccc;">
                                        <h3>Your Answer</h3>
                                        <p>
                                            <?php echo $submission['solution'] ?>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <h3>Feedback from lecturer</h3>
                                        <?php if ($submission_was_reviewed): ?>
                                            <p><strong>Score:</strong> <?php echo $submission['grade'] ?></p>
                                            <p><?php echo $submission['feedback'] ?></p>
                                        <?php else: ?>
                                            <p>Your submission has not been reviewed yet!</p>
                                        <?php endif ?>
                                    </div>
                                </div>
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
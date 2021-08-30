<?php 
    session_start();
    if (!isset($_SESSION['gogi_lecturer'])) {
        header('location: ./');
        exit();
    }
    $lecturer = $_SESSION['gogi_lecturer'];

    include_once '../core/assignment_submissions.class.php';
    include_once '../core/core.function.php';
    $assignment_submission_obj = new assignment_submissions();
    $assignment_submission_id = $_GET['id'];

    $solution = $assignment_submission_obj->fetch_assignment_submission($assignment_submission_id);
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
                            <h3><?php echo $solution['title'] ?></h3>
                            <p class="text-muted">Submitted on <?php echo format_date($solution['created_at']) ?></p>
                        </div>

                    </div>

                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex py-3 align-items-start">
                                    <div class="pr-3">
                                        <span class="avatar avatar-state-success">
                                            <img src="../assets/media/image/user/women_avatar3.jpg" class="rounded-circle" alt="image">
                                        </span>
                                    </div>
                                    <div class="flex-grow- 1">
                                        <h6 class="mb-1"><?php echo $solution['fullname'] ?></h6>
                                        <span class="text-muted">
                                            <?php echo $solution['matric_no'] ?>
                                        </span>
                                    </div>
                                    <div class="text-right ml-auto d-flex">
                                        <a href="#review-section" class="btn btn-primary mr-4"><?php if ($solution['feedback'] == ''): ?>Grade Assignment <?php else: ?> View Grading<?php endif ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <p><?php echo $solution['solution'] ?></p>
                            </div>
                        </div>
                        <div class="card" id="review-section">
                            <div class="card-body">
                                <?php if ($solution['feedback'] == ''): ?>
                                    <form action="">
                                        <div class="form-group">
                                            <label for="">Your Review</label>
                                            <textarea name="feedback" class="form-control" required="required"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Grade Score</label>
                                            <input type="text" name="grade" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary">
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
                                <?php else: ?>
                                    <h5>Your Review</h5>
                                    <p><?php echo $solution['feedback'] ?></p>

                                    <h5>Grade</h5>
                                    <p><?php echo $solution['grade'].'/'.$solution['max_grade'] ?></p>
                                <?php endif ?>
                                
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
    $('#reviewForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/review_assignment.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('#spinner').show();
                $('#result').hide();
                $('#btnText').hide();
            },
            success: function(data){
                if (data == 1) {
                    location.reload();
                }
                else{
                    $('#result').html(data);
                    $('#result').fadeIn();
                    $('#spinner').hide();
                    $('#btnText').show();
                }
            }
        })
    })
</script>

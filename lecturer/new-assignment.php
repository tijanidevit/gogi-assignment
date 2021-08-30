<?php 
    session_start();
    if (!isset($_SESSION['gogi_lecturer'])) {
        header('location: ./');
        exit();
    }
    $lecturer = $_SESSION['gogi_lecturer'];
    $course_id = $_GET['id'];

    include_once '../core/lecturers.class.php';
    include_once '../core/courses.class.php';
    include_once '../core/core.function.php';
    $course_obj = new courses();


    $course = $course_obj->fetch_course($course_id);

    $lecturer_id = $lecturer['id'];
?>
<!DOCTYPE html>
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
                            <h3><?php echo $course['course_title'] ?></h3>
                        </div>

                    </div>

                    <div class="">

                        <div class="card" id="review-section">
                            <div class="card-body">
                                <form id="assignmentForm" method="post">
                                    <div id="result"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Question</label>
                                                <input type="text" name="question" class="form-control" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Score</label>
                                                <input type="text" name="max_grade" class="form-control" required="required" />
                                            </div>
                                        </div>

                                        <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
                                        <input type="hidden" name="lecturer_id" value="<?php echo $lecturer_id ?>">

                                        <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="">Submission Deadline</label>
                                            <input type="date" name="deadline" class="form-control" required="required" />
                                        </div>
                                    </div> 

                                </div>

                                <div class="form-group">
                                    <label for="">Instruction</label>
                                    <textarea name="instructions" class="form-control" required="required"></textarea>
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
    $('#assignmentForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/add_assignment.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('#spinner').show();
                $('#result').hide();
                $('#btnText').hide();
            },
            success: function(data){
                if (data != NaN) {
                    location.href = 'assignment-details?id='+data;
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
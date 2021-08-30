<?php 
    session_start();
    if (!isset($_SESSION['gogi_student'])) {
        header('location: ./');
        exit();
    }

    include_once 'core/students.class.php';
    include_once 'core/assignments.class.php';
    include_once 'core/core.function.php';
    $student_obj = new Students();
    $assignment_obj = new Assignments();

    $student = $_SESSION['gogi_student'];
    $student_id = $student['id'];

    $assignments_num = $assignment_obj->assignments_num();
    $student_submissions_num = $student_obj->student_assignments_num($student_id);

    $recent_assignments = $assignment_obj->fetch_limited_assignments(6);

    $graded_assignments = $student_obj->fetch_limited_graded_assignment_submissions($student_id,6);
    $ungraded_assignments = $student_obj->fetch_limited_ungraded_assignment_submissions($student_id,6);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/header-resources.php"; ?>

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="./vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="./vendors/dataTable/datatables.min.css" type="text/css">


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
                            <h3>Welcome back, <?php echo $student['fullname'] ?></h3>
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
                                                    <h5>Assignments</h5>
                                                    <div>Total Assignments Given Out</div>
                                                </div>
                                                <h3 class="text-success mb-0"><?php echo $assignments_num ?></h3>
                                            </div>
                                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Total Submissions</h5>
                                                    <div>No of times you submitted you assignemnts</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-info mb-0"><?php echo $student_submissions_num ?></h3>
                                                </div>
                                            </div>
                                            <!-- <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                                <div>
                                                    <h5>Missed Assignments</h5>
                                                    <div>Total products ordered</div>
                                                </div>
                                                <div>
                                                    <h3 class="text-danger mb-0">90</h3>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="timeline card-scroll" style="height: 800px">

                                        <?php foreach ($graded_assignments as $assignment): ?>
                                            <div class="timeline-item">
                                                <div>
                                                    <figure class="avatar avatar-sm mr-3 bring-forward">
                                                        <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="d-flex justify-content-between mb-4">
                                                        <span>
                                                            <a href="#" class="link-1"><?php echo $assignment['fullname'] ?></a> reviewed your assignment
                                                        </span>
                                                        <span class="text-muted font-weight-normal"><?php echo format_date($assignment['created_at']) ?></span>
                                                    </h6>
                                                    <a href="#">
                                                        <div class="mb-3 border p-3 border-radius-1">
                                                            <?php echo $assignment['feedback'] ?>. <a href="assignment-review-details?id=<?php echo $assignment['id'] ?>" class="badge badge-sm badge-primary">Details</a>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-scroll" style="height: 630px;">

                                <div class="row">

                                    <?php foreach ($recent_assignments as $assignment): ?>
                                        <div class="col-md-6">
                                            <div class="card">
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
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p><?php echo $assignment['title'] ?></p>
                                                </div>
                                                <div class="card-footer py-4">
                                                    <div class="d-flex justify-content-between">
                                                        <a href="assignment-details?id=<?php echo $assignment['id'] ?>" class="btn btn-primary btn-sm">View Details</a>
                                                        <a href="submit-assignment?id=<?php echo $assignment['id'] ?>" class="btn btn-outline-primary btn-sm">Submit your work</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>                                    

                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Recent Submissions</h6>
                                    <div class="table-responsive card-scroll" style="height: 450px;">
                                        <table id="recent-orders" class="table">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Course Code</th>
                                                    <th>Assignment</th>
                                                    <td>Grade</td>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sn = 0; foreach ($ungraded_assignments as $assignment): $sn++ ?>
                                                    <tr>
                                                        <td><?php echo $sn ?></td>
                                                        <td><?php echo $assignment['course_code'] ?></td>
                                                        <td><?php echo $assignment['title'] ?></td>
                                                        <td>
                                                            Not Graded Yet!
                                                        </td>
                                                        <td><?php echo format_date($assignment['created_at']) ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
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


    <!-- Daterangepicker -->
    <script src="./vendors/datepicker/daterangepicker.js"></script>

    <!-- DataTable -->
    <script src="./vendors/dataTable/datatables.min.js"></script>

    <!-- Dashboard scripts -->
    <script src="./assets/js/examples/pages/dashboard.js"></script>

    <!-- App scripts -->
    <script src="./assets/js/app.min.js"></script>
    <script>
        $(function() {
            $('#dashboard-date span').html(moment().format('MMMM D, YYYY'));
        })
    </script>
</body>

</html>
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
    $lecturer_id = $lecturer['id'];
    $assignment_id = $_GET['id'];

    $assignment = $assignment_obj->fetch_assignment($assignment_id);
    $ungraded_submissions = $assignment_obj->fetch_ungraded_assignment_submissions($assignment_id);
    $graded_submissions = $assignment_obj->fetch_graded_assignment_submissions($assignment_id);
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
                            <h3><?php echo $assignment['title'] ?></h3>
                            <p class="text-muted"><?php echo $assignment['question'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Ungraded Submissions </h6>
                                    <div class="timeline card-scroll" style="height: 800px">

                                        <?php foreach ($ungraded_submissions as $submission): ?>
                                            <div class="timeline-item">
                                                <div>
                                                    <figure class="avatar avatar-sm mr-3 bring-forward">
                                                        <span class="avatar-title bg-success-bright text-success rounded-circle">A</span>
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="d-flex justify-content-between mb-4">
                                                        <span>
                                                            <?php echo $submission['fullname'] ?> submitted a new solution
                                                        </span>
                                                        <span class="text-muted font-weight-normal">Tue 8:17pm</span>
                                                    </h6>
                                                    <a href="#">
                                                        <div class="mb-3 border p-3 border-radius-1">
                                                            <?php echo $submission['solution'] ?> <a href="solution-details?id=<?php echo $submission['id'] ?>" class="badge badge-sm badge-primary">Details</a>
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
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Report</h6>
                                    <div class="table-responsive card-scroll" style="height: 800px;">
                                        <table id="reports" class="table">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Student Name</th>
                                                    <th>Matric Number</th>
                                                    <td>Grade</td>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1 </td>
                                                    <td>COM 101</td>
                                                    <td>What is your name?</td>
                                                    <td>
                                                        <span class="badge bg-secondary-bright text-secondary">60/100</span>
                                                    </td>
                                                    <td>2020/02/28</td>
                                                    <td>
                                                        <a href="solution-details" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
            $('#reports').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        })
    </script>
</body>

</html>
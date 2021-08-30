<?php 
    session_start();
    if (!isset($_SESSION['gogi_lecturer'])) {
        header('location: ./');
        exit();
    }
    $lecturer = $_SESSION['gogi_lecturer'];

    include_once '../core/courses.class.php';
    include_once '../core/core.function.php';
    $course_obj = new courses();

    $courses = $course_obj->fetch_courses();
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
                            <h3>My Courses</h3>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="clearfix"></div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive card-scroll" style="height: 450px;">
                                        <table id="my-courses" class="table">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Course Code</th>
                                                    <th>Course Name</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sn = 0; foreach ($courses as $course): $sn++ ?>
                                                    <tr>
                                                        <td><?php echo $sn ?> </td>
                                                        <td><?php echo $course['course_code'] ?></td>
                                                        <td><?php echo $course['course_title'] ?></td>
                                                        <td>
                                                            <a href="course-assigments?id=<?php echo $course['id'] ?>" class="btn btn-primary btn-sm">
                                                                Previous Assigments
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="new-assignment?id=<?php echo $course['id'] ?>" class="btn btn-primary btn-sm">
                                                                New Assignment
                                                            </a>
                                                        </td>
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
            $('#my-courses').DataTable();
        })
    </script>
</body>

</html>
<?php 
    session_start();
    if (!isset($_SESSION['gogi_admin'])) {
        header('location: ./');
        exit();
    }
    include_once '../core/lecturers.class.php';

    $lecturer_obj = new Lecturers();

    $lecturers = $lecturer_obj->fetch_lecturers();
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
                            <h3>Lecturers</h3>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div id="dashboard-date" class="btn btn-outline-light">
                                <a class="btn btn-primary" href="new-lecturer">Register new lecturer's account</a>
                            </div>
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
                                                    <th>Picture</th>
                                                    <th>Matric No</th>
                                                    <th>Fullname</th>
                                                    <th>Email Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sn = 0; foreach ($lecturers as $lecturer): $sn++ ?>
                                                    <tr>
                                                        <td><?php echo $sn ?></td>
                                                        <td>
                                                            <span class="avatar avatar-state-success">
                                                                <img src="../assets/media/image/user/women_avatar3.jpg" class="rounded-circle" alt="image">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php echo $lecturer['matric_no'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $lecturer['fullname'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $lecturer['email'] ?>
                                                        </td>
                                                        <!-- <td>
                                                            <a href="edit-lecturer" class="btn btn-primary btn-sm">
                                                                Edit
                                                            </a>
                                                        </td> -->
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
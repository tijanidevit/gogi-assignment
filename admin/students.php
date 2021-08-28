<?php 
    session_start();
    if (!isset($_SESSION['gogi_admin'])) {
        header('location: ./');
        exit();
    }

    include_once '../core/students.class.php';
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
                            <h3>Students</h3>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div id="dashboard-date" class="btn btn-outline-light">
                                <button class="btn btn-primary" id="sync-button" data-toggle="modal" data-target="#sync-modal">Sync New Students</button>
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
                                                    <th>Fullname</th>
                                                    <th>Course(s)</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($students as $student): ?>
                                                    <tr>
                                                        <td>1 </td>
                                                        <td>
                                                            <span class="avatar avatar-state-success">
                                                                <img src="../assets/media/image/user/women_avatar3.jpg" class="rounded-circle" alt="image">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            Mr. Adewale
                                                        </td>
                                                        <td>COM 101</td>
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

                <div class="modal fade" id="sync-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Syncronizing <span class="badge badge-danger">Do not close</span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close" id="close-button"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Getting data from api.federalpolyilaro.com/students/records <i class="spin">|</i></p>
                                <h5 class="text-center" id="counter">0%</h5>
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

    <!-- Sweet alert -->
    <script src="../assets/js/examples/sweet-alert.js"></script>
    <script>
        $(function() {
            $('#my-courses').DataTable();

            $('#sync-button').click(function() {

                $.ajax({
                    url:'ajax/sync_students.php',
                    type: 'POST',
                    data : {},
                    cache: false,
                    beforeSend: function() {
                    },
                    success: function(data){
                        console.log(data);
                    }
                })

                timeOutLoader(() => {
                    $('#close-button').click();
                    setTimeout(() => {
                        showAlert();
                    }, 1000);

                    setTimeout(() => {
                        $('.swal-button--confirm').click(function() {
                            location.reload();
                        })
                    }, 1600);
                });


            });




            function showAlert() {
                swal("Good job!", "App has been syncronized with records on school portal. Press Ok to reload page", "success");
            }

            function timeOutLoader(fn) {
                let counter = 0;
                const interval = setInterval(() => {
                    if (counter <= 100) {
                        $('#counter').text(`${counter}%`);
                        counter++;
                    } else {
                        fn();
                        clearInterval(interval);
                    }
                }, 100);
            }
        })
    </script>
</body>

</html>
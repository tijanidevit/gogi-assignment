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

    $solution = $assignment_obj->fetch_assignment_submission($assignment_submission_id);
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
                            <h3>Computer Animation and Graphics</h3>
                            <p class="text-muted">Sent since 2 days ago</p>
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
                                        <h6 class="mb-1">Cass Queyeiro</h6>
                                        <span class="text-muted">
                                            Computer Chat
                                        </span>
                                    </div>
                                    <div class="text-right ml-auto d-flex">

                                        <a href="#review-section" class="btn btn-primary mr-4">Grade Assignment</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, vel perferendis. Asperiores in laborum sapiente velit exercitationem fugiat nam aspernatur.</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, vel perferendis. Asperiores in laborum sapiente velit exercitationem fugiat nam aspernatur. Accusamus voluptas enim reprehenderit et. Similique quam mollitia pariatur vel. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure officiis enim fugit ipsam nihil sint cumque, voluptas iste rem perspiciatis! Sint necessitatibus porro doloremque cum nisi facere saepe aliquid earum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam optio quam ipsum, repellat facilis ullam itaque temporibus dolore neque distinctio, quas quasi culpa consectetur quod impedit perspiciatis dolores repudiandae sapiente?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, vel perferendis. Asperiores in laborum sapiente velit exercitationem fugiat nam aspernatur. Accusamus voluptas enim reprehenderit et. Similique quam mollitia pariatur vel. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure officiis enim fugit ipsam nihil sint cumque, voluptas iste rem perspiciatis! Sint necessitatibus porro doloremque cum nisi facere saepe aliquid earum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam optio quam ipsum, repellat facilis ullam itaque temporibus dolore neque distinctio, quas quasi culpa consectetur quod impedit perspiciatis dolores repudiandae sapiente?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, vel perferendis. Asperiores in laborum sapiente velit exercitationem fugiat nam aspernatur. Accusamus voluptas enim reprehenderit et. Similique quam mollitia pariatur vel. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure officiis enim fugit ipsam nihil sint cumque, voluptas iste rem perspiciatis! Sint necessitatibus porro doloremque cum nisi facere saepe aliquid earum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam optio quam ipsum, repellat facilis ullam itaque temporibus dolore neque distinctio, quas quasi culpa consectetur quod impedit perspiciatis dolores repudiandae sapiente?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, vel perferendis. Asperiores in laborum sapiente velit exercitationem fugiat nam aspernatur. Accusamus voluptas enim reprehenderit et. Similique quam mollitia pariatur vel. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure officiis enim fugit ipsam nihil sint cumque, voluptas iste rem perspiciatis! Sint necessitatibus porro doloremque cum nisi facere saepe aliquid earum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam optio quam ipsum, repellat facilis ullam itaque temporibus dolore neque distinctio, quas quasi culpa consectetur quod impedit perspiciatis dolores repudiandae sapiente?</p>
                            </div>
                        </div>
                        <div class="card" id="review-section">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Your Review</label>
                                        <textarea name="review" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Grade Score</label>
                                        <input type="text" name="grade" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary">Submit</button>
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
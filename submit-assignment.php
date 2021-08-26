<!doctype html>
<html lang="en">

<head>
    <?php include "includes/header-resources.php"; ?>
    <!-- Dropzone -->
    <link rel="stylesheet" href="./vendors/dropzone/dropzone.css" type="text/css">
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
                            <h3>Computer Animation and Graphics</h3>
                            <p class="text-muted">Today is another good day.</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <div id="dashboard-date" class="btn btn-outline-light">
                                <span class="btn btn-danger">Deadline: 20/19/2020 4:00PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Instructions</h4>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius illum quibusdam magni totam impedit nostrum architecto dolores ipsum vel deserunt saepe, possimus, in natus dolorem! Nam rem at suscipit eos?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Submit Your Answer</h3>
                                </div>
                                <div class="card-body">
                                    <style>
                                        #myDropzone {
                                            min-height: 200px;
                                            width: 100%;
                                            border: 2px dashed #5066E1
                                        }
                                    </style>

                                    <form action="">
                                        <div class="form-group">
                                            <div id="editor">
                                                <p>Type in your explanation here.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Attach File (<span class="badge badge-info">Use this only when the lecturer demand for a file.</span>)</label>
                                            <div id="myDropzone">
                                                <div class="dz-default dz-message text-center mt-5">Drops files here or click to upload</div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-5">
                                            <button type="submit" id="submit-button" class="btn btn-primary"> Submit assignment </button>
                                        </div>
                                    </form>
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

    <!-- Dropzone -->
    <script src="./vendors/dropzone/dropzone.js"></script>
    <!-- CKEditor -->
    <script src="./vendors/ckeditor5/ckeditor.js"></script>
    <script>
        $(function() {

            Dropzone.autoDiscover = false;


            var editor1 = ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    }
                })


            $('#myDropzone').dropzone({
                url: '/upload.php',
                action: '/upload.php',
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 5,
                maxFiles: 5,
                maxFilesize: 1,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                init: function() {
                    dzClosure = this;

                    document.getElementById("submit-button").addEventListener("click", function(e) {
                        // Make sure that the form isn't actually being sent.
                        e.preventDefault();
                        e.stopPropagation();
                        dzClosure.processQueue();
                    });

                    //send all the form data along with the files:
                    this.on("sendingmultiple", function(data, xhr, formData) {
                        var explanation = CKEDITOR.instances.editor1.getData();
                        formData.append("solution", explanation);
                    });
                }
            });

        });
    </script>
</body>

</html>
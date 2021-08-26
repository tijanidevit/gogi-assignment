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
                <div class="content p-0">
                    <div class="row no-gutters chat-block">

                        <!-- begin::chat sidebar -->
                        <div class="col-lg-4 chat-sidebar">

                            <!-- begin::chat sidebar search -->
                            <div class="chat-sidebar-header">
                                <h3 class="mb-4">Chats</h3>
                                <form class="mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search chat">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" type="button">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- begin::chat sidebar search -->

                            <!-- end::chat list -->
                            <div class="chat-sidebar-content">
                                <div class="tab-content pt-3" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="chat-lists">
                                            <div class="list-group list-group-flush">

                                                <a href="#" class="list-group-item d-flex align-items-center user-list-item" data-receipient="3">
                                                    <div class="pr-3">
                                                        <div class="avatar avatar-state-success">
                                                            <img id="user-list-item-image" src="./assets/media/image/user/women_avatar1.jpg" class="rounded-circle" alt="image">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1" id="user-list-item-name">Natale Janu</h6>
                                                        <span class="text-muted">Hi!</span>
                                                    </div>
                                                    <div class="text-right ml-auto d-flex flex-column">
                                                        <span class="badge badge-success badge-pill ml-auto mb-2">3</span>
                                                        <span class="small text-muted">08:27 PM</span>
                                                    </div>
                                                </a>
                                                <a href="#" class="list-group-item d-flex align-items-center user-list-item active" data-receipient="3">
                                                    <div class="pr-3">
                                                        <div class="avatar avatar-state-success">
                                                            <img id="user-list-item-image" src="./assets/media/image/user/women_avatar1.jpg" class="rounded-circle" alt="image">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1" id="user-list-item-name">Natale Janu</h6>
                                                        <span class="text-muted">Hi!</span>
                                                    </div>
                                                    <div class="text-right ml-auto d-flex flex-column">
                                                        <span class="badge badge-success badge-pill ml-auto mb-2">3</span>
                                                        <span class="small text-muted">08:27 PM</span>
                                                    </div>
                                                </a>
                                                <a href="#" class="list-group-item d-flex align-items-center user-list-item" data-receipient="3">
                                                    <div class="pr-3">
                                                        <div class="avatar avatar-state-success">
                                                            <img id="user-list-item-image" src="./assets/media/image/user/women_avatar1.jpg" class="rounded-circle" alt="image">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1" id="user-list-item-name">Natale Janu</h6>
                                                        <span class="text-muted">Hi!</span>
                                                    </div>
                                                    <div class="text-right ml-auto d-flex flex-column">
                                                        <span class="badge badge-success badge-pill ml-auto mb-2">3</span>
                                                        <span class="small text-muted">08:27 PM</span>
                                                    </div>
                                                </a>

                                                <a href="#" class="list-group-item d-flex align-items-center user-list-item" data-receipient="3">
                                                    <div class="pr-3">
                                                        <div class="avatar avatar-state-success">
                                                            <img id="user-list-item-image" src="./assets/media/image/user/women_avatar1.jpg" class="rounded-circle" alt="image">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1" id="user-list-item-name">Natale Janu</h6>
                                                        <span class="text-muted">Hi!</span>
                                                    </div>
                                                    <div class="text-right ml-auto d-flex flex-column">
                                                        <span class="badge badge-success badge-pill ml-auto mb-2">3</span>
                                                        <span class="small text-muted">08:27 PM</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::chat list -->

                        </div>
                        <!-- end::chat sidebar -->

                        <!-- begin::chat content -->
                        <div class="col-lg-8 bg-white d-flex justify-content-center align-items-center" id="welcome-note">
                            <h5 class="text-info">Start a conversation now.</h5>
                        </div>

                        <div class="col-lg-8 chat-content" style="display:none">

                            <!-- begin::chat header -->
                            <div class="chat-header border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="pr-3">
                                        <div class="avatar avatar-state-warning">
                                            <img src="./assets/media/image/user/women_avatar2.jpg" id="receipient-image" class="rounded-circle" alt="image">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0" id="receipient-name" data-receipient="3">Orelie Rockhall</p>
                                        <div class="m-0 small text-success">typing...</div>
                                    </div>

                                </div>
                            </div>
                            <!-- end::chat header -->

                            <!-- begin::messages -->
                            <div class="messages">

                            </div>

                            <!-- end::messages -->

                            <!-- begin::chat footer -->
                            <div class="chat-footer border-top">
                                <form id="message-form">
                                    <div class="form-group">
                                        <input type="text" id="new-message-content" class="form-control" placeholder="Write message...">
                                        <div class="chat-footer-buttons">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="ti-location-arrow"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end::chat footer -->

                        </div>
                        <!-- begin::chat content -->

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
    <script>
        $(function() {
            let receipientId = null,
                fetchCycleInterval;

            if (receipientId) {
                $('#welcome-note').hide('slow', () => {
                    $('.chat-content').show();
                });
                fetchCycleInterval = startFetchAutomationCycle(receipientId);
            }


            $('.user-list-item').click(function(e) {
                e.preventDefault();
                receipientId = $(this).data('receipient');
                $('.user-list-item.active').removeClass('active');
                $(this).addClass('active');


                if (fetchCycleInterval)
                    clearInterval(fetchCycleInterval);




                $('#welcome-note').hide('slow', () => {
                    $('.chat-content').show();
                });

                setTimeout(() => {
                    fetchCycleInterval = startFetchAutomationCycle(receipientId);
                }, 200);

                const userInfo = {
                    receipientId,
                    fullname: $(this).find('#user-list-item-name'),
                    image: $(this).find('#user-list-item-image')
                }
                changeChatHeaderInfo(userInfo);
            });


            $('#message-form').submit(function(e) {
                e.preventDefault();

                const message = $('#new-message-content').val(),
                    messageObj = {
                        message,
                        created_at: Date.now()
                    }
                addNewMessageToChatArea(messageObj); //add temporary message to chat area

                $.ajax({
                    url: 'YOUR ENDPOINT HERE',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        message,
                        receipientId
                    },
                    success: (response) => {
                        if (response.status == 'ok') {
                            populateMessages(response.messages);
                            $('#new-message-content').val('');
                        } else {
                            handleServerError(response);
                        }
                    },
                    error: (error) => {
                        handleServerError(error);
                    }
                })

            })

            function startFetchAutomationCycle(receipientId) {
                return setInterval(() => {
                    fetchAllUserConversations(receipientId);
                }, 2500);
            }

            function fetchAllUserConversations(receipientId) {
                $.ajax({
                    url: 'YOUR URL HERE',
                    data: {
                        receipient_id: receipientId
                    },
                    dataType: 'JSON',
                    type: 'GET',
                    success: (response) => {
                        if (response.status == 'ok') {
                            populateMessages(response.messages);
                        } else {
                            handleServerError(response);
                        }
                    },
                    error: (error) => {
                        handleServerError(error);
                    }
                })
            }


            function populateMessages(messages) {
                $('.messages').html('');
                messages.forEach(message => {
                    addNewMessageToChatArea(message);
                });

            }

            function addNewMessageToChatArea(messageObj) {
                $('.messages').append(messageTemplate(messageObj));

                setTimeout(function() {
                    if ($('.messages').length) {
                        $('.messages').niceScroll({
                            overflowx: false
                        });
                        $('.messages').getNiceScroll(0).doScrollTop($('.messages').get(0).scrollHeight, -1);
                    }
                }, 200)

            }

            function changeChatHeaderInfo(userInfo) {
                $('#receipient-image').src = userInfo.image;
                $('#receipient-name').text(userInfo.fullname)
            }

            function messageTemplate(messageObj) {
                const messageTemplate = `<div class="message-item ${!messageObj.sent_by || messageObj.sent_by != receipientId ? "me" : '' }">
                                                <div class="message-item-content">${messageObj.message}</div>
                                                <span class="time small text-muted font-italic">${timeSince(messageObj.created_at)}</span>
                                            </div>`;

                return messageTemplate;
            }

            function handleServerError(error) {
                alert("Opps! The server has encountered a temporary issue. Please refresh the page.");
                console.log(error);
            }

            function timeSince(date) {
                var time = new Date(date);
                switch (typeof time) {
                    case "number":
                        break;
                    case "string":
                        time = +new Date(time);
                        break;
                    case "object":
                        if (time.constructor === Date) time = time.getTime();
                        break;
                    default:
                        time = +new Date();
                }
                var time_formats = [
                    [60, "seconds", 1], // 60
                    [120, "1 minute ago", "1 minute from now"], // 60*2
                    [3600, "minutes", 60], // 60*60, 60
                    [7200, "1 hour ago", "1 hour from now"], // 60*60*2
                    [86400, "hours", 3600], // 60*60*24, 60*60
                    [172800, "Yesterday", "Tomorrow"], // 60*60*24*2
                    [604800, "days", 86400], // 60*60*24*7, 60*60*24
                    [1209600, "Last week", "Next week"], // 60*60*24*7*4*2
                    [2419200, "weeks", 604800], // 60*60*24*7*4, 60*60*24*7
                    [4838400, "Last month", "Next month"], // 60*60*24*7*4*2
                    [29030400, "months", 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
                    [58060800, "Last year", "Next year"], // 60*60*24*7*4*12*2
                    [2903040000, "years", 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
                    [5806080000, "Last century", "Next century"], // 60*60*24*7*4*12*100*2
                    [58060800000, "centuries", 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
                ];
                var seconds = (+new Date() - time) / 1000,
                    token = "ago",
                    list_choice = 1;

                if (seconds === 0) {
                    return "Just now";
                }
                if (seconds < 0) {
                    seconds = Math.abs(seconds);
                    token = "from now";
                    list_choice = 2;
                }
                var i = 0,
                    format;
                while (time_formats[i + 1]) {
                    format = time_formats[i++];
                    if (seconds < format[0]) {
                        if (typeof format[2] == "string") return format[list_choice];
                        else
                            return Math.floor(seconds / format[2]) + " " + format[1] + " " + token;
                    }
                }
                return time;
            };
        })
    </script>
</body>

</html>
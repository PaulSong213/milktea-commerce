<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Custom CSS for the floating notification bar */
        .floating-notification-bar {
            position: fixed;
            bottom: 0;
            right: 0;
            color: #fff;
            z-index: 1000;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .floating-notification-bar:hover {
            transform: translateY(-10px);
        }
    </style>
</head>

<body>
    <!-- Floating Order Notification Bar -->
    <div id="order-notification-btn" class="floating-notification-bar bg-primary rounded m-4 d-flex ">
        <div class="d-flex px-3 h-full" style="background-color: rgba(255,255,255,0.1); ">
            <img class="d-block my-auto" style="width: 2rem;" src="/milktea-commerce/img/icons/notifications.svg" alt="Notification">
        </div>
        <div class="d-flex">
            <div class="my-auto p-3">
                <p class="mt-2" style="height: max-content;"><strong>Orders in Progress:</strong> <span>PREPARING</span></p>
            </div>
        </div>
    </div>

</body>

</html>
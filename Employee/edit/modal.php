<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Style for the modal body */
        .modal-body {
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Style for the label */
        .modal-body label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Style for the input */
        .modal-body input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container mt-3">


        <button type="button" class="btn btn-primary" name = "modal" data-bs-toggle="modal" data-bs-target="#myModal">
            Edit
        </button>
    </div>

    <!-- The Modal -->
    <form action="modal.php">
        <div class="modal" id="myModal" name = "modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Admin Access Required</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <label>Admin Password : </label>
                        <input type="Password" name="adminPass" placeholder="Enter Admin Password">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Enter Admin Password</button>
                    </div>

                </div>
            </div>
        </div>
    </form>



</body>

</html>
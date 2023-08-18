<!DOCTYPE html>
<html lang="en">
<<?php
    session_start();
    ?> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .card-header {
            font-weight: bold;
        }

        .chart-container {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    </head>

    <body>
        <div class="d-flex flex-direction-row">
            <div class="d-block">
                <?php include('../sidebar.php') ?>
            </div>
            <div class="container mt-5">
                <h1 class="text-center mb-4 ">Inventory Summary Dashboard</h1>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Daily Product Stock Summary
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">
                                    <?php
                                    require_once '../php/connect.php';
                                    $conn = connect();
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    // Get daily stock summary
                                    $currentDate = date('Y-m-d');
                                    $dailySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE DATE(createDate) = '$currentDate'";
                                    $dailySummaryResult = $conn->query($dailySummaryQuery);
                                    $dailySummary = $dailySummaryResult->fetch_assoc();

                                    echo $dailySummary['total_unit'];

                                    // Close the database connection
                                    $conn->close();
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                Weekly Product Stock Summary
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">
                                    <?php
                                    require_once '../php/connect.php';
                                    $conn = connect();

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Get weekly stock summary
                                    $currentWeek = date('W');
                                    $weeklySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE WEEK(createDate) = '$currentWeek'";
                                    $weeklySummaryResult = $conn->query($weeklySummaryQuery);
                                    $weeklySummary = $weeklySummaryResult->fetch_assoc();

                                    echo $weeklySummary['total_unit'];

                                    // Close the database connection
                                    $conn->close();
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                Monthly Product Stock Summary
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">
                                    <?php
                                    require_once '../php/connect.php';
                                    $conn = connect();

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Get monthly stock summary
                                    $currentMonth = date('m');
                                    $monthlySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE MONTH(createDate) = '$currentMonth'";
                                    $monthlySummaryResult = $conn->query($monthlySummaryQuery);
                                    $monthlySummary = $monthlySummaryResult->fetch_assoc();

                                    echo $monthlySummary['total_unit'];

                                    // Close the database connection
                                    $conn->close();
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                Yearly Product Stock Summary
                            </div>
                            <div class="card-body">
                                <h2 class="text-center">
                                    <?php
                                    require_once '../php/connect.php';
                                    $conn = connect();
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    // Get yearly stock summary
                                    $currentYear = date('Y');
                                    $yearlySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE YEAR(createDate) = '$currentYear'";
                                    $yearlySummaryResult = $conn->query($yearlySummaryQuery);
                                    $yearlySummary = $yearlySummaryResult->fetch_assoc();
                                    echo $yearlySummary['total_unit'];
                                    // Close the database connection
                                    $conn->close();
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chart-container">

                    <?php
                    // Database configuration
                    require_once '../php/connect.php';
                    $conn = connect();

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get daily inventory summary
                    $dailySummaryQuery = "SELECT DATE(createDate) as date, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY DATE(createDate)";
                    $dailySummaryResult = $conn->query($dailySummaryQuery);

                    // Get weekly inventory summary
                    $weeklySummaryQuery = "SELECT YEARWEEK(createDate) as week, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY YEARWEEK(createDate)";
                    $weeklySummaryResult = $conn->query($weeklySummaryQuery);

                    // Get monthly inventory summary
                    $monthlySummaryQuery = "SELECT YEAR(createDate) as year, MONTH(createDate) as month, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY YEAR(createDate), MONTH(createDate)";
                    $monthlySummaryResult = $conn->query($monthlySummaryQuery);
                    // Close the database connection

                    // Get daily inventory summary
                    $dailySalesSummaryQuery = "SELECT DATE(createDate) as date, SUM(NetAmt) as total_quantity FROM sales_tb GROUP BY DATE(createDate)";
                    $dailySalesSummaryResult = $conn->query($dailySalesSummaryQuery);


                    $conn->close();
                    ?>
                    <canvas id="combinedChart" style="max-height: 800px;"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var invdailyData = <?php echo json_encode($dailySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
                    var invweeklyData = <?php echo json_encode($weeklySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
                    var invmonthlyData = <?php echo json_encode($monthlySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;

                    var salesDailyData = <?php echo json_encode($dailySalesSummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;


                    var combinedChart = new Chart(document.getElementById("combinedChart"), {
                        type: 'bar',
                        data: {
                            labels: invdailyData.map(item => item.date),
                            datasets: [{
                                    label: 'Daily Summary',
                                    data: invdailyData.map(item => item.total_quantity),
                                    borderColor: '#007bff',
                                    backgroundColor: 'rgba(0, 123, 255, 0.5)', 
                                    fill: false
                                },
                                {
                                    label: 'Weekly Summary',
                                    data: invweeklyData.map(item => item.total_quantity),
                                    borderColor: '#17a2b8',
                                    backgroundColor:  'rgba(0, 123, 255, 0.5)', 
                                    fill: false
                                },
                                {
                                    label: 'Monthly Summary',
                                    data: invmonthlyData.map(item => item.total_quantity),
                                    borderColor: '#28a745',
                                    backgroundColor:  'rgba(0, 123, 255, 0.5)', 
                                    fill: false
                                },

                                {
                                    label: 'Daily Sales Summary',
                                    data: salesDailyData.map(item => item.total_quantity),
                                    borderColor: '#28a745',
                                    backgroundColor:  'rgba(0, 123, 255, 0.5)', 
                                    fill: false
                                },
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    }
                    );
                </script>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

                                // Database configuration
                                $host = 'localhost';
                                $dbName = 'zaratehospital';
                                $username = 'root';
                                $password = '';
                                // Establish a database connection
                                
                                $db = new mysqli($host, $username, $password, $dbName);
                                // Connect to the database
                                

                                // Check connection
                                if ($db->connect_error) {
                                    die("Connection failed: " . $db->connect_error);
                                }

                                // Get daily stock summary
                                $currentDate = date('Y-m-d');
                                $dailySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE DATE(createDate) = '$currentDate'";
                                $dailySummaryResult = $db->query($dailySummaryQuery);
                                $dailySummary = $dailySummaryResult->fetch_assoc();

                                echo $dailySummary['total_unit'];

                                // Close the database connection
                                $db->close();
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
                                // Database configuration
                                $host = 'localhost';
                                $dbName = 'zaratehospital';
                                $username = 'root';
                                $password = '';
                                // Establish a database connection
                                $db = new mysqli($host, $username, $password, $dbName);
                                // Check connection
                                if ($db->connect_error) {
                                    die("Connection failed: " . $db->connect_error);
                                }

                                // Get weekly stock summary
                                $currentWeek = date('W');
                                $weeklySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE WEEK(createDate) = '$currentWeek'";
                                $weeklySummaryResult = $db->query($weeklySummaryQuery);
                                $weeklySummary = $weeklySummaryResult->fetch_assoc();

                                echo $weeklySummary['total_unit'];

                                // Close the database connection
                                $db->close();
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

                                // Database configuration
                                $host = 'localhost';
                                $dbName = 'zaratehospital';
                                $username = 'root';
                                $password = '';
                                // Establish a database connection
                                
                                $db = new mysqli($host, $username, $password, $dbName);
                                // Connect to the database
                                

                                // Check connection
                                if ($db->connect_error) {
                                    die("Connection failed: " . $db->connect_error);
                                }

                                // Get monthly stock summary
                                $currentMonth = date('m');
                                $monthlySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE MONTH(createDate) = '$currentMonth'";
                                $monthlySummaryResult = $db->query($monthlySummaryQuery);
                                $monthlySummary = $monthlySummaryResult->fetch_assoc();

                                echo $monthlySummary['total_unit'];

                                // Close the database connection
                                $db->close();
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
                                // Database configuration
                                $host = 'localhost';
                                $dbName = 'zaratehospital';
                                $username = 'root';
                                $password = '';
                                // Establish a database connection
                                
                                $db = new mysqli($host, $username, $password, $dbName);
                                // Connect to the database
                                
                                // Check connection
                                if ($db->connect_error) {
                                    die("Connection failed: " . $db->connect_error);
                                }

                                // Get yearly stock summary
                                $currentYear = date('Y');
                                $yearlySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE YEAR(createDate) = '$currentYear'";
                                $yearlySummaryResult = $db->query($yearlySummaryQuery);
                                $yearlySummary = $yearlySummaryResult->fetch_assoc();

                                echo $yearlySummary['total_unit'];

                                // Close the database connection
                                $db->close();
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chart-container">

                <?php
                // Database configuration
                $host = 'localhost';
                $dbName = 'zaratehospital';
                $username = 'root';
                $password = '';
                // Establish a database connection
                
                $db = new mysqli($host, $username, $password, $dbName);
                // Connect
                // Check connection
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

                // Get daily summary
                $dailySummaryQuery = "SELECT DATE(createDate) as date, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY DATE(createDate)";
                $dailySummaryResult = $db->query($dailySummaryQuery);

                // Get weekly summary
                $weeklySummaryQuery = "SELECT YEARWEEK(createDate) as week, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY YEARWEEK(createDate)";
                $weeklySummaryResult = $db->query($weeklySummaryQuery);

                // Get monthly summary
                $monthlySummaryQuery = "SELECT YEAR(createDate) as year, MONTH(createDate) as month, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY YEAR(createDate), MONTH(createDate)";
                $monthlySummaryResult = $db->query($monthlySummaryQuery);

                // Get yearly summary
                $yearlySummaryQuery = "SELECT YEAR(createDate) as year, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY YEAR(createDate)";
                $yearlySummaryResult = $db->query($yearlySummaryQuery);


                // Close the database connection
                $db->close();
                ?>
                <canvas id="combinedChart" style="max-height: 800px;"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var dailyData = <?php echo json_encode($dailySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
                var weeklyData = <?php echo json_encode($weeklySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
                var monthlyData = <?php echo json_encode($monthlySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
                var yearlyData = <?php echo json_encode($yearlySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;

                var combinedChart = new Chart(document.getElementById("combinedChart"), {
                    type: 'line',
                    data: {
                        labels: dailyData.map(item => item.date),
                        datasets: [
                            {
                                label: 'Daily Summary',
                                data: dailyData.map(item => item.total_quantity),
                                borderColor: '#007bff',
                                backgroundColor: '#007bff',
                                fill: false
                            },
                            {
                                label: 'Weekly Summary',
                                data: weeklyData.map(item => item.total_quantity),
                                borderColor: '#17a2b8',
                                backgroundColor: '#17a2b8',
                                fill: false
                            },
                            {
                                label: 'Monthly Summary',
                                data: monthlyData.map(item => item.total_quantity),
                                borderColor: '#28a745',
                                backgroundColor: '#28a745',
                                fill: false
                            },
                            {
                                label: 'Yearly Summary',
                                data: yearlyData.map(item => item.total_quantity),
                                borderColor: '#ffc107',
                                backgroundColor: '#ffc107',
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            </script>
        </div>
    </div>
</body>

</html>
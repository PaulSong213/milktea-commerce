<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Dashboard</title>
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

// Get monthly stock summary
$currentMonth = date('m');
$monthlySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE MONTH(createDate) = '$currentMonth'";
$monthlySummaryResult = $conn->query($monthlySummaryQuery);
$monthlySummary = $monthlySummaryResult->fetch_assoc();

// Get daily stock summary
$currentDate = date('Y-m-d');
$dailySummaryQuery = "SELECT SUM(Unit) as total_unit FROM inventory_tb WHERE DATE(createDate) = '$currentDate'";
$dailySummaryResult = $conn->query($dailySummaryQuery);
$dailySummary = $dailySummaryResult->fetch_assoc();

// Get daily inventory summary
$dailySummaryQuery = "SELECT DATE(createDate) as date, SUM(Unit) as total_quantity FROM inventory_tb GROUP BY DATE(createDate)";
$dailySummaryResult = $conn->query($dailySummaryQuery);

// Get weekly inventory summary
$weeklySummaryQuery = "SELECT YEARWEEK(createDate) as week, SUM(Unit) as total_quantity FROM inventory_tb WHERE DATE(createDate) = CURDATE() GROUP BY YEARWEEK(createDate)";
$weeklySummaryResult = $conn->query($weeklySummaryQuery);

// Get monthly inventory summary
$monthlySummaryQuery = "SELECT YEAR(createDate) as year, MONTH(createDate) as month, SUM(Unit) as total_quantity FROM inventory_tb WHERE DATE(createDate) = CURDATE() GROUP BY YEAR(createDate), MONTH(createDate)";
$monthlySummaryResult = $conn->query($monthlySummaryQuery);

// Get daily inventory summary
$dailySalesSummaryQuery = "SELECT DATE(createDate) as date, SUM(NetAmt) as total_quantity FROM sales_tb WHERE DATE(createDate) = CURDATE() GROUP BY DATE(createDate)";
$dailySalesSummaryResult = $conn->query($dailySalesSummaryQuery);

// Close the database connection
$conn->close();
?>
<body class="bg-dark ">
<div class="fluid mt-2">
    <div class="fluid p-4">
        <h1 class="text-center text-white">SUMMARY DASHBOARD</h1>
        <div class="row">
            <?php
            $summarySections = [
                ['title' => 'Daily Stocks', 'color' => 'bg-primary', 'data' => $dailySummary],
                ['title' => 'Weekly Stocks', 'color' => 'bg-info', 'data' => $weeklySummary],
                ['title' => 'Monthly Stocks', 'color' => 'bg-success', 'data' => $monthlySummary],
                ['title' => 'Today Sales', 'color' => 'bg-success', 'data' => $monthlySummary],

            ];

            foreach ($summarySections as $section) {
                $totalUnit = ($section['data']['total_unit'] === null) ? '0' : $section['data']['total_unit'];
                ?>
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header <?php echo $section['color']; ?> text-white">
                            <?php echo $section['title']; ?>  Summary
                        </div>
                        <div class="card-body">
                            <h2 class="text-center"><?php echo $totalUnit; ?></h2>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <canvas id="InventoryChart" style="max-height: 600px;" class="container-fluid bg-white rounded"></canvas>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var invdailyData = <?php echo json_encode($dailySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
        var invweeklyData = <?php echo json_encode($weeklySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;
        var invmonthlyData = <?php echo json_encode($monthlySummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;


        var salesDailyData = <?php echo json_encode($dailySalesSummaryResult->fetch_all(MYSQLI_ASSOC)); ?>;


        var InventoryChart = new Chart(document.getElementById("InventoryChart"), {
            type: 'bar',
            data: {
                labels: invdailyData.map(item => item.date),
                datasets: [{
                        label: 'Current Weekly Summary',
                        data: invweeklyData.map(item => item.total_quantity),
                        borderColor: '#17a2b8',
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        fill: false
                    },
                    {
                        label: 'Current Monthly Summary',
                        data: invmonthlyData.map(item => item.total_quantity),
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        fill: false
                    },

                    {
                        label: 'Current Daily Sales Summary',
                        data: salesDailyData.map(item => item.total_quantity),
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        fill: false
                    },
                    {
                        label: 'Over All Stocks',
                        data: invdailyData.map(item => item.total_quantity),
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0, 123, 255, 0.5)',
                        fill: false
                    },
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
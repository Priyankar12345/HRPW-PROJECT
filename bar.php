<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HRPW Bar Chart by Year</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="hrpwChart" width="800" height="400"></canvas>
    <script>
        <?php
        // Include the database connection file
        include('db_connection.php');

        // Query to count the unique number of HRPW by block and year
        $sql = "SELECT wr.block, YEAR(pd.date) AS year, COUNT(pd.unique_id) AS total_hrpw_block
                FROM register_woman wr
                LEFT JOIN pregnant_data pd ON wr.unique_id = pd.unique_id
                GROUP BY wr.block, YEAR(pd.date)";
        $result = mysqli_query($conn, $sql);

        // Create an associative array with year as key, blocks as nested keys, and total as value
        $dataByYear = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $year = $row['year'];
            $block = $row['block'];
            $total = $row['total_hrpw_block'];

            // Create the nested array if it doesn't exist
            if (!isset($dataByYear[$year])) {
                $dataByYear[$year] = array();
            }

            // Assign the total for the block within the year
            $dataByYear[$year][$block] = $total;
        }

        // Prepare data for Chart.js
        $labels = array(); // Years
        $datasets = array(); // Blocks with their data
        foreach ($dataByYear as $year => $blockData) {
            $labels[] = $year; // Add year to labels

            // Initialize data array for this year
            $data = array();
            foreach ($blockData as $block => $total) {
                $data[] = $total; // Add block total to data
            }

            // Create dataset for this year
            $datasets[] = array(
                'label' => $year,
                'data' => $data,
                'backgroundColor' => 'rgba('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).', 0.5)', // Random color with transparency
                'borderColor' => 'rgba('.rand(0, 255).','.rand(0, 255).','.rand(0, 255).', 1)', // Random color
                'borderWidth' => 1
            );
        }

        // Convert PHP arrays to JavaScript objects
        $labelsJS = json_encode($labels);
        $datasetsJS = json_encode($datasets);
        ?>

        // JavaScript code to create the chart
        var ctx = document.getElementById('hrpwChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $labelsJS; ?>,
                datasets: <?php echo $datasetsJS; ?>
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
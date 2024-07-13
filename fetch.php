<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    // Check connection
    // if($conn){
    //     echo'hi hello';
    // }
    if (!$conn) {
        echo 'failed';
        die("Connection failed: " . mysqli_connect_error());
    }

    // Array of SQL queries
    $sql_queries = array(
        "co_1"=>"SELECT ((SELECT SUM(co_1) FROM total_co_table)/45) / (SELECT SUM(co_1) FROM assigned_cos) * 50 AS co_1",
        "co_2"=>"SELECT ((SELECT SUM(co_2) FROM total_co_table)/45) / (SELECT SUM(co_2) FROM assigned_cos) * 50  AS co_2",
        "co_3"=>"SELECT ((SELECT SUM(co_3) FROM total_co_table)/45) / (SELECT SUM(co_3) FROM assigned_cos) * 50 AS co_3",
        "co_4"=>"SELECT ((SELECT SUM(co_4) FROM total_co_table)/45) / (SELECT SUM(co_4) FROM assigned_cos) * 50 AS co_4",
        "co_5"=>"SELECT ((SELECT SUM(co_5) FROM total_co_table)/45) / (SELECT SUM(co_5) FROM assigned_cos) * 50 AS co_5",
        "co_6"=>"SELECT ((SELECT SUM(co_6) FROM total_co_table)/45) / (SELECT SUM(co_6) FROM assigned_cos) * 50 AS co_6"
    );
    // Initialize an array to store results
    $grade_counts = array();
    // Execute SQL queries and store results
    foreach ($sql_queries as $key => $sql_query) {
        $result = mysqli_query($conn, $sql_query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $grade_counts[$key] = $row[$key];
        } else {
            // Error in executing SQL query
            $grade_counts[$key] = "Error: " . mysqli_error($conn);
        }
    }
    
    // foreach ($grade_counts as $grade => $count) {
    //     echo "Grade $grade count: $count <br>";
    // }

    // Close database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bar Chart Example</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="myChart" width="50" height="200"></canvas>

  <script>
    // Your JavaScript code for creating the chart will go here
        // Get the canvas element
var ctx = document.getElementById('myChart').getContext('2d');

var grade_counts = <?php echo json_encode($grade_counts); ?>;


// Define the data for the chart
var data = {
    labels: Object.keys(grade_counts),
    datasets: [{
        label: 'Student CO report',
        data: Object.values(grade_counts),
        backgroundColor: [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
],
borderColor: [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
],

        borderWidth: 1
    }]
};

// Configure the options for the chart
var options = {
    maintainAspectRatio: false,
    scales: {
        y: {
            beginAtZero: true
        }
    }
};

// Create the chart
var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});
    const canvas = document.getElementById("myChart")
    canvas.style.maxWidth = '850px';
    canvas.style.height = '500px';
    canvas.style.margin = '0px auto';
    canvas.style.display = 'flex';
    canvas.style.justifyContent = 'center';
    canvas.style.alignItems = 'center';

  </script>
</body>
</html>

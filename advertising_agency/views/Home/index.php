<?php
// Convert fetched data to format required by CanvasJS
$paymentStatusDataPoints = array_map(function($data) {
    return ["label" => $data["PaymentStatus"], "y" => (float)$data["Amount"]];
}, $paymentStatusData);

$quarterlyInvoiceDataPoints = array_map(function($data) {
    return ["label" => "Q" . $data["Quarter"], "y" => (float)$data["TotalAmount"]];
}, $quarterlyInvoiceData);

$adDurationDataPoints = array_map(function($data) {
    return ["label" => $data["DurationCategory"], "y" => (float)$data["TotalCost"]];
}, $adDurationData);
?>
<!DOCTYPE HTML>
<html>
<head>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function() {
    var paymentChart = new CanvasJS.Chart("paymentChartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: { text: "Payment Status" },
        data: [{
            type: "column",
            dataPoints: <?php echo json_encode($paymentStatusDataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    paymentChart.render();

    var invoiceChart = new CanvasJS.Chart("invoiceChartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: { text: "Quarterly Invoice Stats" },
        data: [{
            type: "column",
            dataPoints: <?php echo json_encode($quarterlyInvoiceDataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    invoiceChart.render();

    var adDurationChart = new CanvasJS.Chart("adDurationChartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: { text: "Advertisement Duration Stats" },
        data: [{
            type: "pie",
            yValueFormatString: "#,##0.00\"%\"",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($adDurationDataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    adDurationChart.render();
}
</script>
</head>
<body>
<h2>Business Analytics Dashboard</h2>
<div id="paymentChartContainer" style="height: 300px; width: 100%;"></div>
<br>
<div id="invoiceChartContainer" style="height: 300px; width: 100%;"></div>
<br>
<div id="adDurationChartContainer" style="height: 300px; width: 100%;"></div>
<br>
</body>
</html>

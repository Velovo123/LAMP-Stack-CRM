<!DOCTYPE html>
<html>
    <head>
        <title>Products</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Products</h1>
        <?php foreach ($invoices as $invoice): ?>
            <h2><?= htmlspecialchars($invoice["InvoiceDate"])?></h2>
            <p><?= htmlspecialchars($invoice["PaymentStatus"])?>]</p>
        <?php endforeach; ?>
    </body>
</html>
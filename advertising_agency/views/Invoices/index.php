
        <h1>Products</h1>
        <?php foreach ($invoices as $invoice): ?>
            <h2>
                <a href="/invoices/<?= $invoice["InvoiceID"]?>/show"><?= htmlspecialchars($invoice["InvoiceDate"])?></a>
            </h2>
        <?php endforeach; ?>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
</head>
<body>
    <h1>Edit Client</h1>
    <form action="/clients/update/<?= $client['ClientID'] ?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= $client['Name'] ?>" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $client['Email'] ?>" required>
        
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?= $client['Phone'] ?>" required>
        
        <label for="billing_address">Billing Address</label>
        <textarea name="billing_address" required><?= $client['BillingAddress'] ?></textarea>
        
        <label for="account_manager">Account Manager</label>
        <input type="text" name="account_manager" value="<?= $client['AccountManager'] ?>" required>
        
        <button type="submit">Update Client</button>
    </form>
</body>
</html>

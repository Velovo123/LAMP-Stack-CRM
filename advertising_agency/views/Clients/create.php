<!DOCTYPE html>
<html>
<head>
    <title>Add Client</title>
</head>
<body>
    <h1>Add Client</h1>
    <form action="/clients/store" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" required>
        
        <label for="phone">Phone</label>
        <input type="text" name="phone" required>
        
        <label for="billing_address">Billing Address</label>
        <textarea name="billing_address" required></textarea>
        
        <label for="account_manager">Account Manager</label>
        <input type="text" name="account_manager" required>
        
        <button type="submit">Add Client</button>
    </form>
</body>
</html>

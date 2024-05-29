<h1>Clients</h1>
    <a href="/clients/create" class="btn">Add New Client</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Billing Address</th>
                <th>Account Manager</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $client['ClientID'] ?></td>
                    <td><?= $client['Name'] ?></td>
                    <td><?= $client['Email'] ?></td>
                    <td><?= $client['Phone'] ?></td>
                    <td><?= $client['BillingAddress'] ?></td>
                    <td><?= $client['AccountManager'] ?></td>
                    <td class="actions">
                        <a href="/clients/edit/<?= $client['ClientID'] ?>">Edit</a>
                        <form action="/clients/delete/<?= $client['ClientID'] ?>" method="POST">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

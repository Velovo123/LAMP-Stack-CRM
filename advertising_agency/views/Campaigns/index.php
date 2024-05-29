<h1>Campaigns</h1>
<a href="/campaigns/create" class="btn">Create Campaign</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Budget</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Creative Director</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($campaigns as $campaign): ?>
            <tr>
                <td><?= $campaign['CampaignID'] ?></td>
                <td><?= $campaign['Name'] ?></td>
                <td><?= $campaign['Budget'] ?></td>
                <td><?= $campaign['StartDate'] ?></td>
                <td><?= $campaign['EndDate'] ?></td>
                <td><?= $campaign['CreativeDirector'] ?></td>
                <td class="actions">
                    <a href="/campaigns/edit/<?= $campaign['CampaignID'] ?>">Edit</a>
                    <form action="/campaigns/delete/<?= $campaign['CampaignID'] ?>" method="POST" style="display:inline;">
                        <button type="submit">Delete</button>
                    </form>
                    <a href="/campaigns/overview/<?= $campaign['CampaignID'] ?>" class="btn">Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

</body>
</html>

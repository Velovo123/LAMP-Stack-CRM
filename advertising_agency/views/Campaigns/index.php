<?php
// Custom comparison function to sort campaigns by ID
function sortByID($a, $b) {
    return $a['CampaignID'] - $b['CampaignID'];
}

// Custom comparison function to sort campaigns by Budget
function sortByBudget($a, $b) {
    return $a['Budget'] - $b['Budget'];
}

// Determine sorting criteria
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';

if ($sort === 'budget') {
    usort($campaigns, 'sortByBudget');
} else {
    usort($campaigns, 'sortByID');
}
?>

<h1>Campaigns</h1>
<a href="/campaigns/create" class="btn">Create Campaign</a>
<a href="?sort=id" class="btn">Sort by ID</a>
<a href="?sort=budget" class="btn">Sort by Budget</a>
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
                <td><?= htmlspecialchars($campaign['CampaignID']) ?></td>
                <td><?= htmlspecialchars($campaign['Name']) ?></td>
                <td><?= htmlspecialchars($campaign['Budget']) ?></td>
                <td><?= htmlspecialchars($campaign['StartDate']) ?></td>
                <td><?= htmlspecialchars($campaign['EndDate']) ?></td>
                <td><?= htmlspecialchars($campaign['CreativeDirector']) ?></td>
                <td class="actions">
                    <a href="/campaigns/edit/<?= htmlspecialchars($campaign['CampaignID']) ?>">Edit</a>
                    <form action="/campaigns/delete/<?= htmlspecialchars($campaign['CampaignID']) ?>" method="POST" style="display:inline;">
                        <button type="submit">Delete</button>
                    </form>
                    <a href="/campaigns/overview/<?= htmlspecialchars($campaign['CampaignID']) ?>" class="btn">Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

</body>
</html>

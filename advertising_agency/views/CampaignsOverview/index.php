<!DOCTYPE html>
<html>
<head>
    <title>Campaign Overview</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            width: 200px; /* Ensure headers have sufficient width */
        }
    </style>
</head>
<body>
    <h1>Campaign Overview</h1>
    <?php if (!empty($campaigns) && is_array($campaigns) && isset($campaigns[0])): 
        $campaign = $campaigns[0]; ?>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Campaign Overview</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Campaign Name</th>
                    <td><?= htmlspecialchars($campaign['CampaignName'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Budget</th>
                    <td><?= htmlspecialchars($campaign['Budget'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td><?= htmlspecialchars($campaign['StartDate'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td><?= htmlspecialchars($campaign['EndDate'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Creative Director</th>
                    <td><?= htmlspecialchars($campaign['CreativeDirector'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Client Name</th>
                    <td><?= htmlspecialchars($campaign['ClientName'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Client Email</th>
                    <td><?= htmlspecialchars($campaign['ClientEmail'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Client Phone</th>
                    <td><?= htmlspecialchars($campaign['ClientPhone'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Advertisement Type</th>
                    <td><?= htmlspecialchars($campaign['AdvertisementType'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Advertisement Content</th>
                    <td><?= htmlspecialchars($campaign['AdvertisementContent'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Placement Details</th>
                    <td><?= htmlspecialchars($campaign['PlacementDetails'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Placement Cost</th>
                    <td><?= htmlspecialchars($campaign['PlacementCost'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Impressions</th>
                    <td><?= htmlspecialchars($campaign['Impressions'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Clicks</th>
                    <td><?= htmlspecialchars($campaign['Clicks'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Conversions</th>
                    <td><?= htmlspecialchars($campaign['Conversions'] ?? '') ?></td>
                </tr>
                <tr>
                    <th>Performance Date</th>
                    <td><?= htmlspecialchars($campaign['PerformanceDate'] ?? '') ?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>No campaign found.</p>
    <?php endif; ?>
</body>
</html>

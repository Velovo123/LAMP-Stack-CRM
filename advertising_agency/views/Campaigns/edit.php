<!DOCTYPE html>
<html>
<head>
    <title>Edit Campaign</title>
</head>
<body>
    <h1>Edit Campaign</h1>
    <form action="/campaigns/update/<?= $campaign['CampaignID'] ?>" method="POST">
        <div>
            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name" value="<?= $campaign['Name'] ?>" required>
        </div>
        <div>
            <label for="Budget">Budget:</label>
            <input type="text" name="Budget" id="Budget" value="<?= $campaign['Budget'] ?>" required>
        </div>
        <div>
            <label for="StartDate">Start Date:</label>
            <input type="date" name="StartDate" id="StartDate" value="<?= $campaign['StartDate'] ?>" required>
        </div>
        <div>
            <label for="EndDate">End Date:</label>
            <input type="date" name="EndDate" id="EndDate" value="<?= $campaign['EndDate'] ?>" required>
        </div>
        <div>
            <label for="CreativeDirector">Creative Director:</label>
            <input type="text" name="CreativeDirector" id="CreativeDirector" value="<?= $campaign['CreativeDirector'] ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>

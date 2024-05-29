<!DOCTYPE html>
<html>
<head>
    <title>Create Advertisement</title>
</head>
<body>
    <h1>Create Advertisement</h1>
    <form action="/advertisements/store" method="POST">
        <div>
            <label for="CampaignID">Campaign ID:</label>
            <input type="text" name="CampaignID" id="CampaignID" required>
        </div>
        <div>
            <label for="Type">Type:</label>
            <input type="text" name="Type" id="Type" required>
        </div>
        <div>
            <label for="Content">Content:</label>
            <textarea name="Content" id="Content" required></textarea>
        </div>
        <div>
            <label for="CreativeTeam">Creative Team:</label>
            <input type="text" name="CreativeTeam" id="CreativeTeam" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

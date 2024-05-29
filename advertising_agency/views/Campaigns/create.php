<!DOCTYPE html>
<html>
<head>
    <title>Create Campaign</title>
</head>
<body>
    <h1>Create Campaign</h1>
    <form action="/campaigns/store" method="POST">
        <div>
            <label for="Name">Name:</label>
            <input type="text" name="Name" id="Name" required>
        </div>
        <div>
            <label for="Budget">Budget:</label>
            <input type="text" name="Budget" id="Budget" required>
        </div>
        <div>
            <label for="StartDate">Start Date:</label>
            <input type="date" name="StartDate" id="StartDate" required>
        </div>
        <div>
            <label for="EndDate">End Date:</label>
            <input type="date" name="EndDate" id="EndDate" required>
        </div>
        <div>
            <label for="CreativeDirector">Creative Director:</label>
            <input type="text" name="CreativeDirector" id="CreativeDirector" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

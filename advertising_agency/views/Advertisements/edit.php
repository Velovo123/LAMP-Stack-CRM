<!DOCTYPE html>
<html>
<head>
    <title>Edit Advertisement</title>
</head>
<body>
    <h1>Edit Advertisement</h1>
    <form action="/advertisements/update/<?= $advertisement['AdvertisementID'] ?>" method="POST">
        <div>
            <label for="CampaignID">Campaign ID:</label>
            <input type="text" name="CampaignID" id="CampaignID" value="<?= $advertisement['CampaignID'] ?>" required>
        </div>
        <div>
            <label for="Type">Type:</label>
            <input type="text" name="Type" id="Type" value="<?= $advertisement['Type'] ?>" required>
        </div>
        <div>
            <label for="Content">Content:</label>
            <textarea name="Content" id="Content" required><?= $advertisement['Content'] ?></textarea>
        </div>
        <div>
            <label for="CreativeTeam">Creative Team:</label>
            <input type="text" name="CreativeTeam" id="CreativeTeam" value="<?= $advertisement['CreativeTeam'] ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>

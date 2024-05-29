    <h1>Advertisements</h1>
    <a href="/advertisements/create" class="btn">Create Advertisement</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Campaign ID</th>
                <th>Type</th>
                <th>Content</th>
                <th>Creative Team</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advertisements as $advertisement): ?>
                <tr>
                    <td><?= $advertisement['AdvertisementID'] ?></td>
                    <td><?= $advertisement['CampaignID'] ?></td>
                    <td><?= $advertisement['Type'] ?></td>
                    <td><?= $advertisement['Content'] ?></td>
                    <td><?= $advertisement['CreativeTeam'] ?></td>
                    <td class="actions">
                        <a href="/advertisements/edit/<?= $advertisement['AdvertisementID'] ?>">Edit</a>
                        <form action="/advertisements/delete/<?= $advertisement['AdvertisementID'] ?>" method="POST" style="display:inline;">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>

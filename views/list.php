<html>
    <head>
        <title>My notes</title>
    </head>
    <body>
        <ul>
        <?php foreach ($notes as $note): ?>
            <li><?= htmlspecialchars($note) ?></li>
        <?php endforeach; ?>
        </ul>
    </body>
</html>
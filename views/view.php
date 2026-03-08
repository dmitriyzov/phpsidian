<html>
    <head>
        <title>My note</title>
    </head>
    <body>
        <h1><?= htmlspecialchars($note->title) ?></h1>
        <p><?= htmlspecialchars($note->content) ?></p>
    </body>
</html>

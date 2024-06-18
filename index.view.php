<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <h1>
        List of books
    </h1>

    <h1><?php foreach ($filteredBooks as $book) : ?>
            <?= $book["name"]; ?>,
        <?php endforeach; ?>

    </h1>

    <ul>
        <?php foreach ($books as $book) : ?>
            <?php if ($book["author"] == "Jens") : ?>
                <li><?= "<a href={$book["pageUrl"]}> Tittel: {$book["name"]}, forfatter: {$book["author"]}</a>" ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php $var = function ($name) {
            echo "Hello $name";
        } ?>
        <p>Test: <?php $var("Tommy"); ?></p>
    </ul>
</body>

</html>
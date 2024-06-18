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
  <!-- <?php
        $books = [
          'book 1', 'book 2', 'book 3'
        ];
        ?>
  <ul>
    <?php
    foreach ($books as $book) {
      echo "<li>$book</li>";
    }
    ?>

    <?php foreach ($books as $book) : ?>
      <li><?= $book ?></li>
    <?php endforeach; ?> -->

  <?php
  $books = [
    [
      "bok" => "Wester",
      "forfatter" => "Tommy",
      "pageUrl" => "www.westerbooks.com",
      "year" => 1999
    ],
    [
      "bok" => "Spaghetti",
      "forfatter" => "Jens",
      "pageUrl" => "www.spaghettibooks.com",
      "year" => 2000
    ]
  ];

  // function filter($items, $fn)
  // {
  //   $filteredItems = [];
  //   foreach ($items as $item) {
  //     if ($fn($item)) {
  //       $filteredItems[] = $item;
  //     };
  //   };
  //   return $filteredItems;
  // }

  $filteredBooks = array_filter($books, function ($book) {
    return strtoupper($book["forfatter"]) === "JENS";
  });
  // lambda-funksjon
  // $filteredBooks = function ($books, $author) {
  //   $filtered = [];
  //   foreach ($books as $book) {
  //     if ($book["forfatter"] === $author) {
  //       $filtered[] = $book;
  //     };
  //   };
  //   return $filtered;
  // }

  ?>
  <h1><?php foreach ($filteredBooks as $book) : ?>
      <?= $book["bok"]; ?>,
    <?php endforeach; ?>

  </h1>

  <ul>
    <?php foreach ($books as $book) : ?>
      <?php if ($book["forfatter"] == "Jens") : ?>
        <li><?= "<a href={$book["pageUrl"]}>{$book["bok"]}, Tittel: {$book["bok"]}, forfaffer: {$book["forfatter"]}</a>" ?></li>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php $var = function ($name) {
      echo "Hello $name";
    } ?>
    <p>Test: <?php $var("Tommy"); ?></p>
  </ul>
</body>

</html>
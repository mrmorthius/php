<?php

$books = [
  [
    "name" => "Wester",
    "author" => "Tommy",
    "pageUrl" => "www.westerbooks.com",
    "releaseYear" => 1999
  ],
  [
    "name" => "Spaghetti",
    "author" => "Jens",
    "pageUrl" => "www.spaghettibooks.com",
    "releaseYear" => 2000
  ]
];

$filteredBooks = array_filter($books, function ($book) {
  return strtoupper($book["author"]) === "JENS";
});

require("index.view.php");

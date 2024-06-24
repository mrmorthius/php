<?php

$heading = "Create Note";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Note created";
}

require("views/note-create.view.php");

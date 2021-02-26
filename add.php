<?php
session_start();
include "function.php";

$badWords = checkCensor($_POST["msg"]);

if (empty($badWords)) {
    if (!isset($_SESSION["ban_time"])) {
        saveMessage($_POST["msg"], $_POST["name"]);
    }
} else {
    $_SESSION["ban_time"] = time();
    saveBadWordsToLog($badWords);
}
header("Location: main.php");

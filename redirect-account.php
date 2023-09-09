<?php
require_once(__DIR__ . "/accessLevels.php");
if ($LevelNav[0]["link"] != "/dashboard/index.php") {
    header("Location: /Zarate" . $LevelNav[0]["link"]);
} else {
    header("Location: /Zarate" . $LevelNav[1]["link"]);
}

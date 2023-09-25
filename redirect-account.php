<?php
require_once(__DIR__ . "/accessLevels.php");
if ($LevelNav[0]["link"] != "/dashboard/index.php") {
    header("Location: /milktea-commerce" . $LevelNav[0]["link"]);
} else {
    header("Location: /milktea-commerce" . $LevelNav[1]["link"]);
}

<?php

foreach (glob("timelapse/"."*") as $file) {
    if (filemtime($file) < time() - 43200) { // 1 day older 86400
      unlink($file);
    }
}

<?php

$page = filter_input(INPUT_GET, 'p');
$cushion = 3;
if (empty($page)) {
    $page = 1;
}
if ($this->pages > 1) {
    if ($page != 1) {
        echo "<a href=\"" . URL . "?p=" . ($page - 1) . "\">Previous</a>\n ";
    }

    for ($i = 1; $i <= $this->pages; $i++) {
        if ($i < ($page - $cushion) || $i > ($page + $cushion)) {
            if ($i == 1 || $i == $this->pages) {
                echo "<a href=\"" . URL . "?p=" . $i . "\">$i</a> ";
            } elseif ($i == 2 || $i == ($this->pages - 1)) {
                echo "...";
            }
        } else {
            if ($i == $page) {
                echo $i . " ";
            } else {
                echo "<a href=\"" . URL . "?p=" . $i . "\">$i</a> ";
            }
        }
    }

    if ($page != $this->pages) {
        echo "<a href=\"" . URL . "?p=" . ($page + 1) . "\">Next</a> ";
    }
}

<?php

foreach ($this->announcements as $a) {
    echo "<div class=\"article\">"
    . "<div class=\"news_title\">"
    . $a['post_subject']
    . "</div>"
    . "<div class=\"news_info\">"
    . "Posted by <span class=\"news_author\">" . $a['poster_id'] . "</span> on " . date("m-d-y g:i:s A",$a['post_time'])
    . "</div>"
    . "<div class=\"newsPost\">"
    . nl2br($a['post_text'])
    . "<div class=\"post-link\"><a href=\"" . URL . "forum/viewtopic.php?p=" . $a['post_id'] . "#" . $a['post_id'] . "\">Read the entire article here</a></div>"
    . "</div>"
    . "</div>";
}
<?php

class Index_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    public function paginate_amount() {
        $forum_id = FORUM_ID;
        $sql = "SELECT topic_id, MIN(post_time) As post_time FROM phpbb_posts
                WHERE forum_id='$forum_id' AND post_visibility=1 GROUP BY topic_id";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $pages = ceil($sth->rowCount() / ANNOUNCE_AMOUNT);
        return $pages;
    }
    public function get_announcements($start = 0) {
        $this->data = [];
        $amount = ANNOUNCE_AMOUNT;
        $forum_id = FORUM_ID;
        $sql = "SELECT post_id, topic_id, forum_id, MIN(post_time) As post_time, post_subject, poster_id, post_text FROM phpbb_posts
                WHERE forum_id='$forum_id' AND post_visibility=1 GROUP BY topic_id ORDER BY post_id DESC LIMIT $start, $amount";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $announcements = $sth->fetchAll();
        foreach($announcements as $a) {
            $a['post_text'] = $this->_filter_text_length($a['post_text']);
            $a['post_text'] = $this->_filter_bbCode($a['post_text']);
            $a['poster_id'] = $this->_get_article_author($a['poster_id']);
            array_push($this->data,$a);
        }
        return $this->data;
    }
    private function _filter_bbCode($string) {
        //writes up the bbCodes to find and what to replace them with
        $bbcodes = [
            ["pattern" => "/<r>(.*)<\/r>/Us" , "replace" => "$1"],
            ["pattern" => "/<s>(.*)<\/s>/Us" , "replace" => "$1"],
            ["pattern" => "/<e>(.*)<\/e>/Us" , "replace" => "$1"],
            ["pattern" => "/\<QUOTE>\[quote\](.*)\[\/quote.*\]<\/QUOTE>/Us" , "replace" => "$1"],
            ["pattern" => "/\[b](.*)\[\/b]/Us" , "replace" => "<b>$1</b>"],
            ["pattern" => "/\[u](.*)\[\/u]/Us" , "replace" => "<u>$1</u>"],
            ["pattern" => "/\[i](.*)\[\/i]/Us" , "replace" => "<i>$1</i>"],
            ["pattern" => "/\[center.*](.*)\[\/center.*]/Us" , "replace" => "<center>$1</center>"],
            ["pattern" => "/\[spoiler.*](.*)\[\/spoiler.*]/Us" , "replace" => "$1"],
            ["pattern" => "/<IMG src=.*>\[img\]<URL url=.*>(.*)<\/URL>\[\/img\]<\/IMG>/Us" , "replace" => "<img src=\"$1\" />"],
            ["pattern" => "/<URL url=.*>\[url=(.*)\](.*)\[\/url\]<\/URL>/Us" , "replace" => "<a href=\"$1\">$2</a>"],
            ["pattern" => "/\[size.*](.*)\[\/size.*]/Us" , "replace" => "$1"],
            ["pattern" => "/\[code.*](.*)\[\/code.*]/Us" , "replace" => "$1"],
            ["pattern" => "/\[list.*](.*)\[\/list.*]/Us" , "replace" => "<ul>$1</ul>"],
            ["pattern" => "/^\[\*.*](.*)$/Us" , "replace" => "<li>$1</li>"],
            ["pattern" => "/\[video.*](.*)\[\/video.*]/Us" , "replace" => ""]

        ];
        foreach($bbcodes as $bbcode) {
            $string = $this->_filter_text($string,$bbcode);
        }
        return $string;
    }
    //filters the string with the bbcode patterns and replaces them
    private function _filter_text($string,$array) {
        $pattern = $array['pattern'];
        $num = preg_match_all($pattern,$string);
        while($num > 0) {
            $string = preg_replace($pattern,$array['replace'],$string);
            $num = preg_match_all($pattern,$string);
        }
        return $string;
    }
    private function _filter_text_length($string) {
        $length = 800;
        if(strlen($string) > $length) {
            $find_nl = strpos($string, "\n", $length);
            if($find_nl == FALSE) {
                return $string;
            } else {
                $sub_str = substr($string,0,$find_nl);
                $str_rep = str_replace('\n','',$sub_str);
                $string = $str_rep . "..";
                return $string;
            }
        } else {
            return $string;
        }
        return $string;
    }
    private function _get_article_author($author_id) {
        $sql = "SELECT username FROM phpbb_users WHERE user_id='$author_id'";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        $row = $sth->fetch();
        $author = $row['username'];
        return $author;
    }
}

<?php

//STYLESHEET VERSION
$cssversion = 5;

define('CSS_VERSION',$cssversion);

//DATABASE CONFIG
$dbms = 'mysql';
$dbhost = '127.0.0.1';
$dbname = 'phpbb';
$dbuser = 'root';
$dbpass = '';

define('DB_MS',$dbms);
define('DB_HOST',$dbhost);
define('DB_NAME',$dbname);
define('DB_USER',$dbuser);
define('DB_PASS',$dbpass);

//PATH CONFIG

$name = 'SBE';
$facebook = 'https://www.facebook.com/ShadowbaneEmulators/';
$twitter = 'https://twitter.com/sbemu';
$youtube = 'https://www.youtube.com/channel/UCa5IN3-aojQxCA76_LqgaOA';

define('NAME',$name);
define('URL','http://' . $_SERVER['HTTP_HOST'] . '/' . NAME . '/');
define('CURRENT_PAGE','http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
define('FACEBOOK',$facebook);
define('TWITTER',$twitter);
define('YOUTUBE',$youtube);

//ANNOUNCEMENTS CONFIG

$amount = 3;     // Amount of announcements per page
$forum_id = 2;     // The forum ID it takes the Announcements out of
        
define('ANNOUNCE_AMOUNT',$amount);
define('FORUM_ID',$forum_id);
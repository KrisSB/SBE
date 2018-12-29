<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            $url = explode("/",rtrim(filter_input(INPUT_GET,'url'),"/"));
            $count = count($url);
            $link = strtoupper($url[$count - 1]);
            if(empty($link)) {
                $link = "INDEX";
            }
            require "meta.php";
            if(empty($meta[$link]['title'])) {
                $title = NAME;
                $metaDesc = NAME;
                $metaKeyWords = NAME;
            } else {
                $title = $meta[$link]['title'];
                $metaDesc = $meta[$link]['description'];
                $metaKeyWords = $meta[$link]['keywords'];
            }
        ?>
        <title><?php echo $title ?></title>
        <meta name="description" content="<?php echo $metaDesc ?>" />
        <meta name="keywords" content="<?php echo $metaKeyWords ?>" />
        <link rel="shortcut icon" href="<?php echo URL ?>public/images/favicon.png" />
        <?php
        
            //Adds all styles that correspond with the webpage
            $dir = 'public/styles/';
            if((file_exists($dir)) && !empty($dir)) {
                $styles = glob($dir . '*.css');
                foreach($styles as $style) {
                    echo "<link rel=\"stylesheet\" href=\"" . URL . $style . "?v=" . CSS_VERSION . "\" />\n";
                }
            }
            //Adds all styles that correspond with the webpage
            $dir = 'views/' . $this->name . '/styles/';
            if((file_exists($dir)) && !empty($dir)) {
                $styles = glob($dir . '*.css');
                foreach($styles as $style) {
                    echo "<link rel=\"stylesheet\" href=\"" . URL . $style . "?v=" . CSS_VERSION . "\" />\n";
                }
            }
        
            //Adds all javascripts that correspond with the website
            $dir = 'public/js/';
            if((file_exists($dir)) && !empty($dir)) {
                $js = glob($dir . '*.js');
                foreach($js as $j) {
                    echo "<script src=\"" . URL . $j . "\"></script>\n";
                }
            }
            //Adds all javascripts that specific webpage
            $dir = 'views/' . $this->name . '/js/';
            if((file_exists($dir)) && !empty($dir)) {
                $js = glob($dir . '*.js');
                foreach($js as $j) {
                    echo "<script src=\"" . URL . $j . "\"></script>\n";
                }
            }
        ?>
    </head>
    <body>
    <div id="navbar">
        <ul>
            <li><a href="<?php echo URL ?>">home</a></li>
            <li><a href="forum">forum</a></li>
            <li><a href="http://shadowbaneemulator.com/forum/app.php/kill-board">kill board</a></li>
            <li><a href="http://morloch.shadowbaneemulator.com/index.php?title=Main_Page">wiki</a></li>
        </ul>
    </div>
    <!---OLD HEADER
        <div id="header">
            <img src="<?php echo URL ?>/public/images/title3.png" />
        </div>
        <div id="navbar">
            <ul>
                <li><a href="<?php echo URL ?>"><div id="link-home"></div></a></li>
                <li><a href="http://morloch.shadowbaneemulator.com"><div id="link-wiki"></div></a></li>
                <li><a href= "<?php echo URL . 'About/' ?>"><div id="link-about"></div></a></li>
                <li><a href="http://www.shadowbaneemulator.com/forum"><div id="link-forum"></div></a></li>
                <li><a href="http://shadowbaneemulator.com/forum/viewtopic.php?f=7&t=16853"><div id="link-download"></div></a></li>
            </ul>
        </div>
        -->

        <div id="container">
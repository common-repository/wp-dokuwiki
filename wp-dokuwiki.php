<?php
/*
Plugin Name: WP-Dokuwiki
Plugin URI: http://floatingsun.net/code/wp-dokuwiki/
Description: Enables the use of Dokuwiki markup in your posts/pages
Version: 0.61
Author: Diwaker Gupta
Author URI: http://floatingsun.net/
Min WP Version: 2.4
Max WP Version: 2.5.1
*/

if(!defined('DOKU_BASE')) define('DOKU_BASE',get_bloginfo('wpurl') . '/wp-content/plugins/wp-dokuwiki/');

require_once('inc/init.php');
require_once('inc/parserutils.php');

global $OpenTag;
global $CloseTag;

$OpenTag = "<wiki>";
$CloseTag = "</wiki>";

function dg_parse_entry($content) {
    extract($GLOBALS);

    if ( strstr($content, $OpenTag) === FALSE) {
        return $content;
    }
    else{
        $ret = "";
        $OTagSize = strlen($OpenTag);
        $CTagSize = strlen($CloseTag);
        $index = 0;
        while($index <= strlen($content)) {
            $start = strpos($content, $OpenTag, $index);
            $end = strpos($content, $CloseTag, $start + $OTagSize);
            if($start === FALSE or $end === FALSE)
                break;
            if($start > $index) {
                $nonwiki = substr($content, $index, $start - $index);
                $ret .= trim($nonwiki);
            }
            $wikicode = substr($content, ($start + $OTagSize), ($end - $start - $CTagSize));
            $textlines = split("\n",$wikicode);
            $text = "";
            for ($l=0; $l<count($textlines); $l++){
                /* Remove '\r' */
                $line = rtrim($textlines[$l]);
                $text = $text . $line."\n";
            }
            $ret .= "<!-- begin Dokuwiki generated code-->\n";
            $ret .= '<div class="dokuwiki">';
            $ret .= p_render('xhtml', p_get_instructions($text), $info);
            $ret .= '</div>';
            $ret .= "\n<!-- end Dokuwiki generated code-->";
            $index = $end + $CTagSize;
        }
        $ret .= substr($content, $index);
        return $ret;
    }
}

function dg_add_css(){
    echo '<link rel="stylesheet" media="screen" type="text/css" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/wp-dokuwiki/lib/exe/css.php"/>' . "\n";
}

function dg_add_js(){
    echo '<script type="text/javascript" charset="utf-8" src="' . get_bloginfo('wpurl') . '/wp-content/plugins/wp-dokuwiki/lib/exe/js.php?edit=0&amp;write=1"></script>' . "\n";
}

/* Add our filter */
add_filter('the_content', 'dg_parse_entry', 1);

/* Add action */
add_action('wp_head', 'dg_add_css', 1);
add_action('wp_head', 'dg_add_js', 1);
?>

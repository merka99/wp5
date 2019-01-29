<?php 
/** 
 * Plugin name: Very first plugin
 * plugin url: http:/merlepakko.ikt.khk.ee/
 * description: this is the very first plugin i ever created
 * version 1.0
 * author: merle päkko
 * */
 
 
 function dh_modify_read_more_link() {
 return '<a class="more-link" href="' . get_permalink() . '">Click to Read!</a>';
}
add_filter( 'the_content_more_link', 'dh_modify_read_more_link' );
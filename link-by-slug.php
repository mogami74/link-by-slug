<?php

/**
 * Plugin Name: link-by-slug
 * Plugin URI:  https://code.74th.net/
 * Text Domain: link-by-slug
 * Domain Path: /languages
 * Description: create shortcode which returns link html from given slug
 * Version:     0.0.1
 * Author:      mogami74
 * Author URI:  https://code.74th.net/
 * License: GPL2
 */
/*  Copyright 2020 mogami74 (email : mogami74@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/* usage [linkbyslug postid='' slug='' class='' anchor=''] */
class LinkBySlug
{
    function __construct(){
    }
    function returnLink ($atts){
//        $atts = shortcode_atts(
//            array(
//                'postid' => '',
//                'slug' => '',
//                'class' => '',
//                'anchor' => '',
//            ), $atts, 'linkbyslug' );

        //get post object
        if($atts['postid']){
            $targetPost = get_post($atts['postid']);
        } elseif ($this->get_post_id_by_name($atts['slug'])){
            $targetPost = get_post($this->get_post_id_by_name($atts['slug']));
        } else {
                return '';
        }
        //create link
        return '<a href="'.get_permalink($targetPost->ID).'#'.$atts['anchor'].'" class="'.$atts['class'].'">'
            .$targetPost->post_title
        .'</a>';
    }
    function get_post_id_by_name( $post_name, $post_type = 'post' )
    {
        $post_ids = get_posts(array
        (
            'name'   => $post_name,
            'post_type'   => $post_type,
            'numberposts' => 1,
            'post_status'    => 'publish',
            'fields' => 'ids'
        ));

        return array_shift( $post_ids );
    }
}

add_shortcode( 'linkbyslug' , array( new LinkBySlug(), 'returnLink'));

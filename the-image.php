<?php
/* 
 * Copyright (C) 2011 Giacomo Gallico (giacomorama@gmail.com)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/*
Plugin Name: The Image
Plugin URI: http://www.fuckedengineers.info/template_tags/the_image
Description: This plugin extract every image from post content with power of XPath. This tag must be within <a href="http://codex.wordpress.org/The_Loop">The_Loop</a>.
Version: 0.7.4
Tags: images, content, image, the_content, the_image, loop, the_loop, the_post
Author: Giacomo Gallico aka ordigno
Author URI: http://www.fuckedengineers.info/about
License: GPL2
Tested up to: 3.1
Stable tag: 0.7.4
*/

/**
 * Retrieve the images from post content.
 * 
 * @package Wordpress
 * @since 3.1
 * @author Giacomo Gallico aka ordigno (<a href="mailto:giacomorama@gmail.com">giacomorama@gmail.com</a>)
 *
 * @param integer $image_number Optional. Number of the image to be shown.
 * @return string
 */
function get_the_image($image_number = 0) {
  
  $item = image_extractor($image_number, get_the_content());

  if (array_key_exists('img', $item)) {
    $img = (array) $item['img'];
    $string = tag_gen('a', $item['@attributes'], false, tag_gen('img', $img['@attributes'], true));
  } else {
    $string = tag_gen('img', $item['@attributes'], true);
  }
  
  return $string;
}

function the_image($image_number = 0) {

  echo get_the_image($image_number);

}

function has_the_image($image_number = 0) {
  
  return (bool) get_the_image($image_number);

}

/**
 * My Little HTML tag generator.
 * 
 * @author Giacomo Gallico aka ordigno (<a href="mailto:giacomorama@gmail.com">giacomorama@gmail.com</a>)
 *
 * @param string $tag Required. The tag that will be printed.
 * @param string $attributes Optional. Array of HTML attributes.
 * @param bool   $selfClosing Optional. If the tag end with "/>".
 * @param string $nestedTag Optional. This param admit a string like tag_gen's return.
 * @return string
 */
function tag_gen($tag, $attributes = array(), $selfClosing = false, $nestedTag = '') {
  
  $space = chr(32);
  $string = '<' . $tag . $space;
  
  if (!empty($attributes)) {
    foreach ($attributes as $key => $value) {
      $string .= $key . '="' . $value . '"' . $space;
    }
  }
  
  $string = trim( $string );
  
  if (empty($selfClosing)) {
    $string .= '>';
    if ($nestedTag) {
      $string .= $nestedTag;
    }
    $string .= '</' . $tag . '>';
  } else {
    $string .= $space . '/>';
  }
  
  return $string;
}

/**
 * My Little image extractor.
 * 
 * @author Giacomo Gallico aka ordigno (<a href="mailto:giacomorama@gmail.com">giacomorama@gmail.com</a>)
 * @param string $content Required. The content within images.
 * @param integer $image_number Optional. The image position inside content. Default to 0 (first).
 * @return array
 */
function image_extractor($content, $image_number = 0) {
  
  $doc = new DOMDocument('1.0', 'UTF-8'); /* Initialize DOM with xml version 1.0 and charset utf-8 */
  
  $doc->loadHTML($content); /* Load HTML content */
  
  $html = simplexml_import_dom($doc); /* Convert DOM in SimpleXML object */
  
  $items = $html->xpath('//a[child::img] | //img[not(parent::a)]'); /* Select all images */
  
  if (empty($items[$image_number])) {
    return null;
  }
  
  return (array) $items[$image_number]; /* Casting to array for better parsing */
}
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
Plugin Name: The_Image tag
Plugin URI: http://www.fuckedengineers.info/the-image
Description: This tag must be within <a href="http://codex.wordpress.org/The_Loop">The_Loop</a>. This plugin extract every image from post content with power of XPath. 
Version: 0.7
Author: Giacomo Gallico aka ordigno
Author URI: http://www.fuckedengineers.info/about
License: GPL2
*/


/**
 * Retrieve the images from post content.
 * 
 * @package WordPress
 * @since 3.1
 * @author Giacomo Gallico aka ordigno (<a href="mailto:giacomorama@gmail.com">giacomorama@gmail.com</a>)
 *
 * @param integer $image_number Optional. Number of the image to be shown.
 * @return string
 */
function get_the_image($image_number = 0) {
    
  $doc = new DOMDocument('1.0', 'UTF-8'); /* Initialize DOM with xml version 1.0 and charset utf-8 */
  
  $doc->loadHTML(get_the_content()); /* Load HTML content */
  
  $html = simplexml_import_dom($doc); /* Convert DOM in SimpleXML object */
  
  $items = $html->xpath('//a[child::img] | //img[not(parent::a)]');
  
  $item = (array) $items[$image_number];
  
  if (empty($items[$image_number])) {
    /*$image_number = 0;*/
    return null;
  }
  
  /* HTML reconstruction of extracted image */
  $attributes = array();
  $space = chr(32);
  
  /**
  * @todo Code refactoring
  */
  if (array_key_exists('img', $items[$image_number])) {
    /* Attribute for <a> tag */
    $attributes['a']  = 'rel="'.$items[$image_number]['rel'].'"';
    $attributes['a'] .= $space;
    $attributes['a'] .= 'href="'.$items[$image_number]['href'].'"';
    $attributes['a'] .= $space;
    $attributes['a'] .= 'target="'.$items[$image_number]['target'].'"';
    $attributes['a'] .= $space;
    $attributes['a'] .= 'title="'.$items[$image_number]['title'].'"';
    $attributes['a'] .= $space;
    $attributes['a'] .= 'class="'.$items[$image_number]['class'].'"';
    $attributes['a'] .= $space;
    $attributes['a'] .= 'style="'.$items[$image_number]['style'].'"';
  
  
    /* Attribute for <img> tag */
    $attributes['img']  = 'src="'.$items[$image_number]->img['src'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'width="'.$items[$image_number]->img['width'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'height="'.$items[$image_number]->img['height'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'alt="'.$items[$image_number]->img['alt'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'class="'.$items[$image_number]->img['class'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'title="'.$items[$image_number]->img['title'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'style="'.$items[$image_number]->img['style'].'"';
    
    
    $string  = '<a '.$attributes['a'].'>';
    $string .= '<img '.$attributes['img'].' />';
    $string .= '</a>';
  } else {
  
    /* Attribute for <img> tag */
    $attributes['img']  = 'src="'.$items[$image_number]['src'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'width="'.$items[$image_number]['width'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'height="'.$items[$image_number]['height'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'alt="'.$items[$image_number]['alt'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'class="'.$items[$image_number]['class'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'title="'.$items[$image_number]['title'].'"';
    $attributes['img'] .= $space;
    $attributes['img'] .= 'style="'.$items[$image_number]['style'].'"';
    
    $string = '<img '.$attributes['img'].' />';
  
  }
  
  return $string;
}

function the_image($image_number = 0) {

  echo get_the_image($image_number);

}

/**
 * @todo Consider the utility of this function...
 */
function has_the_image($image_number = 0) {
  
  return (bool) get_the_image($image_number);

}
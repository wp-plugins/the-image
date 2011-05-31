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
 Version: 0.9.1
 Tags: images, content, image, the_content, the_image, loop, the_loop, the_post
 Author: Giacomo Gallico aka ordigno
 Author URI: http://www.fuckedengineers.info/about
 License: GPL2
 Tested up to: 3.1
 Stable tag: 0.9.1
 */

/* Query for extracting images */
define('QXPATH', '//a[child::img] | //img[not(parent::a)]');

/**
 * Retrieve the images from post content.
 *
 * @package Wordpress
 * @since 3.1
 * @author Giacomo Gallico aka ordigno (<a href="mailto:giacomorama@gmail.com">giacomorama@gmail.com</a>)
 *
 * @param integer $position Optional. Number of the image to be shown.
 * @return string
 */
function get_the_image($position = 0) {

  $item = extractor(QXPATH, $position);

  if (empty($item)) {
    return null;
  }

  return str_replace('/>', ' />', $item->saveXML());
}

function the_image($position = 0) {

  echo get_the_image($position);

}

function has_the_image($position = 0) {

  return (bool) extractor(QXPATH, $position);

}

/**
 * My Little extractor.
 *
 * @author Giacomo Gallico aka ordigno (<a href="mailto:giacomorama@gmail.com">giacomorama@gmail.com</a>)
 * @param string $query Required. The XPath query.
 * @param integer $position Optional. The object position inside content. Default to 0 (first).
 * @return array
 */
function extractor($query, $position = 0) {

  $content = get_the_content();

  /* Initialize DOM with xml version 1.0 and charset utf-8 */
  $doc = new DOMDocument('1.0', 'UTF-8');

  @$doc->loadHTML($content);

  /* Convert DOM in SimpleXML object */
  $html = simplexml_import_dom($doc);

  $items = $html->xpath($query);

  return $items[$position];
}
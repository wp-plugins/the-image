=== The image ===
Contributors: dumbi.della.pira
Donate link: http://www.fuckedengineers.info/
Tags: images, image, content, gallery, thumb, thumbnails, the_content, the_image, loop, the_loop, the_post
Requires at least: 3.1
Tested up to: 3.1

This plugin display or return every images inside post content with power of XPath. This tag must be within The_Loop.

== Description ==
The_image plugin allow you to extract every image inside post content.
Simply call <code>the_image()</code> function in your loop.

== Installation ==
1. Upload `the-image.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php the_image(); ?>` tag in your templates inside the loop

== Frequently Asked Questions ==
= Parameters =
<strong>$image_number</strong> <em>(integer)</em> Image to be shown. default to 0 (first image).

= Example 1, Display images in your template's loop =
`<?php if ( have_posts() ): while ( have_posts() ): the_post() ?>
<div id="main">
  <ul>
    <li><?php the_image(); ?></li>
    <li><?php the_image(1); ?></li>
    <li><?php the_image(2); ?></li>
  </ul>
</div>
<?php endwhile; endif; ?>`

= Example 2, Little content hook =
`
// functions.php
function del_imgs_from_content($content) {
  $i = 0;
  $images = array();
  while (has_the_image($i) === true) {
    $images[] = get_the_image($i);
    $i++;
  }
  
  return str_replace($images, null, $content);
}
add_filter('the_content', 'del_imgs_from_content');`
This hook, delete image from post content, to prevent duplicates.

= Example 3, List all image in post content =
`<?php if (have_posts()): while (have_posts()): the_post(); ?>

<h2 class="title"><?php the_title(); ?></h2>
        
<?php  
$i = 0;
while (has_the_image($i) === true) {
    the_image($i);
    $i++;
}
?>
        
<div class="body"><?php the_content(); ?></div>
        
<?php endwhile; endif; ?>`

== Screenshots ==

1. The post content
2. The result usign the_image()

== Changelog ==
= 0.8.1 =
* Resolved horrible coding error in <code>image_extractor</code> function
= 0.8.0 =
* Added <code>image_extractor</code> function that return the extracted array of image. Usefull for hook into plugin.
= 0.7.4 =
* Bugfix for tag_gen() function.
* Readme update with content hook.
= 0.7.3 =
* Better code for better coders.
= 0.7 =
* Recognize image inside <code>&lt;a&gt;</code> tags and "alone" images with one XPath expression.
* Bugfix: images "alone" not show.
= 0.6 =
* Work with utf-8
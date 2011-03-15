=== The_image ===
Contributors: dumbi.della.pira
Donate link: http://www.fuckedengineers.info/
Tags: images, content, image, the_content, the_image
Requires at least: 3.1
Tested up to: 3.1

This plugin display or return every images inside post content with power of XPath.

== Description ==
The_image plugin allow you to extract every image inside post content.
Simply call <code>the_image()</code> function in your loop.

== Installation ==
1. Upload `the-image.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php the_image(); ?>` tag in your templates inside the loop

== Frequently Asked Questions ==
= <h3>Parameters</h3> =
<dl><dt><strong>$image_number</strong></dt> <dd><em>(integer)</em> Image to be shown. default to 0 (first image)</dd></dl>
= <h3>Example</h3> =
<pre>&lt;?php if ( have_posts() ): while ( have_posts() ): the_post() ?&gt;
&lt;div id="main"&gt;
    &lt;ul&gt;
        &lt;li&gt;&lt;?php the_image(); ?&gt;&lt;/li&gt;
        &lt;li&gt;&lt;?php the_image(1); ?&gt;&lt;/li&gt;
        &lt;li&gt;&lt;?php the_image(2); ?&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
&lt;?php  endwhile; endif; ?&gt;
</pre>

== Other Notes ==


== Changelog ==
= 0.7 =
* Recognize image inside <code>&lt;a&gt;</code> tags and "alone" images with one XPath expression.
* Bugfix: images "alone" not show.
= 0.6 =
* Work with utf-8
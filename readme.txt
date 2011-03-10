=== the_image ===
Contributors: dumbi.della.pira
Donate link: http://www.fuckedengineers.info/
Tags: image, content
Requires at least: 3.1
Tested up to: 3.1
Stable tag: 4.3

This plugin display or return ALL image inside post content; don't the first :)

== Description ==
Display or return image from post content of the current post. This tag must be within <a title="The Loop" href="http://codex.wordpress.org/The_Loop">The Loop</a>.
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

== Installation ==
1. Upload `the-image.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php the_image(); ?>` tag in your templates inside the loop

== Frequently Asked Questions ==

The funcions<br />
*<code>get_the_image()</code>
*<code>has_the_image()</code>
<br />
came with the plugin.

== Screenshots ==


== Other Notes ==



== Changelog ==

= 0.6 =
* Stable release
* Work with utf-8

== Upgrade Notice ==


== Arbitrary section ==

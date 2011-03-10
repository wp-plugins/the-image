=== the_image ===
Contributors: dumbi.della.pira
Donate link: http://www.fuckedengineers.info/
Tags: image, content
Requires at least: 3.1
Tested up to: 3.1
Stable tag: 4.3

Display or return image from post content of the current post. This tag must be within The Loop.

== Description ==

<h3>Description</h3>
Display or return image from post content of the current post. This tag must be within <a title="The Loop" href="http://codex.wordpress.org/The_Loop">The Loop</a>.
<h3>Notes</h3>
See also: <code>get_the_image()</code>, <code>has_the_image()</code>

== Installation ==

1. Upload `the-image.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php the_image(); ?>` tag in your templates inside the loop

== Frequently Asked Questions ==

= <h3>Usage</h3> =

<pre>&lt;php the_image( $image_number ); ?&gt;</pre>
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

== Screenshots ==


== Changelog ==

= 1.0 =
* Stable release
* Work with utf-8

== Upgrade Notice ==

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`

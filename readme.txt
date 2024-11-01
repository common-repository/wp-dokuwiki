=== WP-Dokuwiki ===
Contributors: diwaker
Donate link: http://floatingsun.net/
Tags: formatting, wiki, post, dokuwiki, markup
Requires at least: 2.2
Tested up to: 2.5
Stable tag: 0.61

This plugin allows you to use Dokuwiki syntax for typing up your posts and
pages.

== Description ==

WP-Dokuwiki is yet another markup plugin for Wordpress. It lets you use
Dokuwiki syntax in your markup. It currently works for both pages and posts. I
will soon add support for comments as well.

The plugin is hosted at the  Wordpress plugin
repository. You can browse the source code at
http://dev.wp-plugins.org/browser/wp-dokuwiki. Please use the bug tracker over
there to file bug reports.

**Features**

* Supports the complete Dokuwiki syntax.
* Automatic addition of the appropriate CSS rules.
* Generates table of contents.
* Support for the following plugins: Google Maps, Boxes.
* Supports multiple wiki tags, so you can mix Wiki text with non-wiki text.

== Installation ==

Download the plugin below and extract it in your wp-content/plugins directory.
This next step is very IMPORTANT: you **must** ensure that the following
directories exist and are writable by your webserver under
`blog_root/wp-content/plugins/wp-dokuwiki/data`:

* 'attic'
* 'cache'
* 'index'
* 'locks'
* 'media'
* 'meta'
* 'pages'

The plugin should automatically create them, but if for some reason it fails
or the permissions are not set correctly, it will raise an error. In that case
please fix things manually before proceeding.

Then go to your administration panel and activate the plugin. Thats it!

To use the plugin in your post, simply enclose the Dokuwiki markup in wiki
opening and closing tags, as such: 

`<wiki> Your **text** here </wiki>`

If you are having problems with the generated code, try disabling the default
Wordpress formatting (wpautop and wptexturize).

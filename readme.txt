=== Show Post Categories ===
Contributors: Willemso
Tags: plugin, shortcode, post, page, parent, category, categories, hyperlink, show, list, filter, specific, title, template, id, separator, option, settings, admin, author, options, url, email, nicename, nickname, firstname, lastname, ID, tag, taxonomy, custom
Donate link: http://willemso.com/
Requires at least: 4.X
Tested up to: 5.4
Stable tag: 2.2.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show all categories linked to a blog post/page, or list data such as: title, id, author details, tag.. & add hyperlinks or filter on specific data!

== Description ==
So, you are tired of retyping data within your post. You want a quicker way to import data based on your post or page settings into, for example, a review table?
You just need one specific category to show up within your blog post? And maybe you´d want a hyperlink added too?

Search no further! We created this beatifull plugin to make this happen.

By using a very simple Shortcode you will be able to show all Categories related to a Blog Post or Page.
Even better; you will be able to filter within specific Parent Categories. And ofcourse there are times you want to show or hide the Parent Category ,and that is no problem too! 
Oh, and before we forget you can choose wether to show this as Hyperlink or not. Just so that your visitor has a simplified UX.

But it does not end there; we are constantly working on new features. This plugin isn´t limited to just showing categories; 
You can print the author details, the page/post title, it´s unique ID, etc..

I hope you will enjoy this plugin, if you do come over and say thanks at [willemso.com](https://willemso.com/category/show-post-categories/), suggestions for improvement and features are welcome!

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the provided shortcode (see [FAQ](https://nl.wordpress.org/plugins/show-post-categories/faq/) )

== Frequently Asked Questions ==
= How to use "show Post Categories"? =

1. Install the plugin files
2. Activate plugin
3. In your blog post type: **[show_post_categories]**
4. Add needed attributes (see below)

= How to show categories? =

`[show_post_categories show="category"]`

Default settings:

* *show all categories linked to blog post*
* *no hyperlinks*
* *include all parent categories*
* *do not filter on any specific parent category*

Optional settings, that can overrule above default values:

* `hyperlink="yes"`
* `hyperlinktarget="_blank"`
* `parent="no"` 
* `parentcategory="EXACT NAME or ID of PARENT CATEGORY"`
* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`
* `taxonomy="YOUR CUSTOM CATEGORY TAXONOMY NAME"`

You can leave taxonomy empty if custom taxonomy is been used; Show Post Categories will detect it automatically. Manual input only there in case of strange behaviour

= How to show title? =

`[show_post_categories show="title"]`

Default settings:

* *show blog post title / page title*
* *no hyperlink*

Optional settings, that can overrule above default values:

* `hyperlink="yes"`
* `hyperlinktarget="_blank"`
* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`

= How to show post ID? =

`[show_post_categories show="id"]`

Default settings:

* *show blog post ID / page ID*
* *no hyperlink*

Optional settings, that can overrule above default values:

* `hyperlink="yes"`
* `hyperlinktarget="_blank"`
* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`

= How to show author details? =

`[show_post_categories show="author"]`

Default settings:

* *show author display name of current blog post / page*
* *no hyperlink*

Optional settings, that can overrule above default values:

* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`
* `hyperlink="yes"`
* `hyperlinktarget="_blank"`
* `attribute="see below.."`

attribute could be: 
* url
* email
* nicename
* nickname
* firstname
* lastname
* ID
* authorpage
* url
* biography   (warning: does not accept URL parameter)

= How to show tags? =

`[show_post_categories show="tag"]`

Default settings:

* *show tags linked to current blog post / page*
* *no hyperlink*

Optional settings, that can overrule above default values:

* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`
* `hyperlink="yes"`
* `hyperlinktarget="_blank"`
* `taxonomy="YOUR CUSTOM CATEGORY TAXONOMY NAME"`

You can leave taxonomy empty if custom taxonomy is been used; Show Post Categories will detect it automatically. Manual input only there in case of strange behaviour

= How to see Taxonomy name used in Post? =

`[show_post_categories show="taxonomy"]`

Default settings:

* *show Custom Taxonomies linked to current blog post / page*

Optional settings, that can overrule above default values:

* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`
* `attribute="see below.."`

attribute could be: 

* tag
* category

= How to show category description? =

`[show_post_categories show="catdesc" id="CATEGORY ID"]`

= How to show excerpt? =

`[show_post_categories show="excerpt"]`

Optional settings, that can overrule above default values:

* `id="POST OR PAGE NUMBER // POST OR PAGE TITLE"`
* `attribute="EXCERPT LENGTH - default: 55"`

= Can I change the separator for 1 time? =

Yes, ie;

`[show_post_categories show="category" separator="| "]`

= Can I change default behaviour of the separator? =

Yes;

* Select **settings** at the admin dashboard, go to **Show Post Categories**
* Modify the default value of the textbox next to "separator"

You will still be able to modify this separator on an ad hoc basis.

= Can I modify the default hyperlink target? =

Yes;

* Select **settings** at the admin dashboard, go to **Show Post Categories** 
* Modify the default value of the dropdown next to "Hyperlink target"

= Can I change the language settings? =

We are working on I18n. We did however implement a quick workaround;

* Select **settings** at the admin dashboard, go to **Show Post Categories**
* Modify the default value of the textboxes

= Can I reset to default values? =

Sure, we implemented a reset button for this purpose..

* Select **settings** at the admin dashboard, go to **Show Post Categories**
* Hit the button..

= What happens if I desinstall ? =
We like good practices, so during the deinstall process we´ll remove all files and settings. Your database will have no trace of Show Post Categories.
However this means that custom settings will be removed too.

Once deinstalled you will need to remove all shortcode tags you´ve ever entered or it will show the used code without output..

= I am experiencing issues, help? =
Please note that the use of plugins is at your own risk.
I cannot be held responsible for any issue, conflict or problem that occurs during or after the use of this plugin. 

In case of problems log a support request on the [plugin support page](https://wordpress.org/support/plugin/show-post-categories) or visit [willemso.com](https://willemso.com/category/show-post-categories/)

= Can you add more options? =
Sure! We like new stuff.
Contact us for feature requests; visit [willemso.com](https://willemso.com/category/show-post-categories/) and leave a message!

= How do I go back to an older version? =
Download the version you need from [here](https://wordpress.org/plugins/show-post-categories/developers/) & look below "Other Versions"

== Screenshots ==

1. Show category with, or without, hyperlink
2. Show category with, or without, parent category
3. Show Blog Post or Page title, or show Blog Post or Page ID
4. Options page

== Changelog ==
= 2.2.6 =
* Feature - added Author Biography ( https://wordpress.org/support/topic/author-bio-3/ )

= 2.2.5 =
* Development - WP 5.4
* Development - preparing translation

= 2.2.4 =
* Feature - added new attributes, for: Author ( read FAQ: Author )
* Feature - added Category Description ( https://wordpress.org/support/topic/category-description-26/ )
* Feature - added Post Excerpt ( https://wordpress.org/support/topic/category-description-26/ )
* Tweak - removed bug ( https://wordpress.org/support/topic/undefined-variable-53/ )
* Development - improved coding

= 2.2.33 =
* Tweak - Changed behaviour, for: Category ( https://wordpress.org/support/topic/parent-category-displaying-despite-no/ )
* Development - improved coding

= 2.2.32 =
* Feature - added Taxonomy attribute, for: Category ( https://wordpress.org/support/topic/portfolio-categories-7/ )
* Feature - added Taxonomy attribute, for Tag

= 2.2.31 =
* Tweak - removed bug ( https://wordpress.org/support/topic/not-showing-multiple-tags/ )

= 2.2.3 =
* Feature - show title, w or w/o hyperlink, from another post/page
* Feature - show ID from other post or page based on given ID (=Title ie. "About")
* Feature - show author information based on post or page title/ID
* Feature - added attributes for Author (url, email, nicename, nickname, firstname, lastname, ID)
* Feature - added option to show Author data from other Post or Page / ID
* Feature - show tags, from other Post or Page / ID
* Tweak - removed bugs (ie. we did not correctly filter parent category, ID URL title & target were not aligned)
* Development - cleaned some coding
* Development - prepared for new features

= 2.2.21 =
* Feature - added options page at WP Settings menu
* Feature - added link from plugin page directly towards the options page
* Tweak - added uninstall.php for proper cleanup
* Tweak - removed hardcoded setting for separator; you can modify default behavior & still modify it case by case
* Development - rewrote complete plugin structure
* Development - preparing for I18n; for now added option to allow custom hyperlink text

= 2.2.2 =
* Added hyperlink option for title & ID
* Added author nice name & option to show author nice name from other post/page

= 2.2.1 =
* Tweak - Readme.txt update

= 2.2 =
* Feature - show Title
* Feature - show Post ID
* Feature - set custom separator
* Development - Future proofed scripting to allow more options to be set

= 2.1.3 =
* Tweak - Readme.txt update

= 2.1.2 =
* Tweak - Corrected some bugs

= 2.1 =
* Feature - list Post Title 
* Tweak - some improvements to the plugin core

= 2.0 =
* Feature - Included option to filter on specific Parent Category

= 1.0 =
* Hello World! This is our first official release.

== Upgrade Notice ==
= 2.2.6 =
New feature for Author

= 2.2.5 =
optional update

= 2.2.4 =
New features for Author
New features: Category Description & Excerpt
Bug Fix
Improved coding
(see: Changelog or http://willemso.com/)

= 2.2.33 =
Changed behavior of Category (see: Changelog or http://willemso.com/)
Improved coding

= 2.2.32 =
New features

= 2.2.31 =
Bug Fix (see: Changelog or http://willemso.com/)

= 2.2.3 =
Improved coding
New features (see: Changelog or http://willemso.com/)

= 2.2.21 =
Improved coding
New features (see: Changelog or http://willemso.com/)

= 2.2.2 =
New features (see: Changelog or http://willemso.com/)

= 2.2.1 =
Readme.txt update

= 2.2 =
After this upgrade shortcodes will need to be corrected, sorry!
If version 2.1.3 works fine for you & you do not need new options there is no need to update.

= 2.1.3 =
Improved coding
Readme.txt update

= 2.1.2 =
Improved coding

= 2.1 =
New features (see: Changelog or http://willemso.com/)
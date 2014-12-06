=== Flat Bootstrap by XtremelySocial ===

Contributors: timnicholson
Tags: one-column, right-sidebar, left-sidebar, fluid-layout, responsive-layout, custom-header, custom-menu, featured-images, featured-image-header, full-width-template, flexible-header, theme-options, sticky-post, threaded-comments, light, translation-ready, rtl-language-support, custom-background
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JGJUJVK99KHRE
Requires at least: 3.8
Tested up to: 4.0.1
Stable tag: 1.5
License: GPLv3
License URI: http://www.opensource.org/licenses/GPL-3.0

Flat Bootstrap by XtremelySocial is a modern, fully responsive, "flat" style theme

== DESCRIPTION ==

Flat Bootstrap by XtremelySocial is a modern, fully responsive, "flat" style theme with a nice color palette, big full-width images, and full-width colored sections. It automatically adapts for desktops, tablets, and phones.

It is based on the standard WordPress starter theme (_S) and the Twitter Bootstrap CSS framework. The theme was inspired by the HTML/CSS themes from Blacktie.co and color schemes from Designmodo.com’s flat UI.

Features include a mobile navigation bar, multiple columns (grid), buttons, icons, labels, badges, tabbed content areas, collapsible content areas, progress bars, alert boxes, carousels (sliders) and much, much more. This is a theme for both users and theme developers with lots of features but without the bloat. 

This theme includes a child theme to be able to easily customize the theme. The Flat Bootstrap Child theme is for users and developers and comes with a style.css and functions.php file. Just copy the flat-bootstrap-child directory into your /themes directory and make your changes there.

For more information on the Flat Bootstrap theme go to [http://xtremelysocial.com/wordpress/flat/].


== LICENSE ==

Flat Bootstrap WordPress theme, Copyright (C) 2014 XtremelySocial
Flat Bootstrap WordPress theme is licensed under the GPL.

Userscores WordPress Starter Theme - ​http://underscores.me/
License: Distributed under the terms of the GPL License v2
Copyright: Automattic, Inc., http://automattic.com

Twitter Bootstrap - http://getbootstrap.com/
License: Distributed under the terms of the Apache License v2.0
Copyright: Twitter, http://twitter.com

html5shiv - http://code.google.com/p/html5shiv/
License: Distributed under the terms of the MIT/GPL2 License
Copyright: Alexander Farkas, https://github.com/aFarkas/

Respond - https://github.com/scottjehl/Respond
License: Distributed under the terms of the MIT License
Copyright: Scott Jehl, http://scottjehl.com

Google Fonts - http://www.google.com/fonts/
License: Distributed under the terms of the OFL|SIL Open Font License
Copyright: Google, http://google.com

jQuery Mobile - http://jquerymobile.com
License: Distributed under the terms of the MIT License
Copyright: jQuery Foundation, http://jquery.org

Font Awesome - http://fontawesome.io
License: Distributed under the terms of the SIL OFL License 1.1 (fonts), MIT License (code), and CC BY 3.0 License (documentation)
Copyright: Font Awesome, http://fontawesome.io

Images - http://unsplash.com
Images included in the download, such as the one depicted in the screenshot are from unsplash.com
License: Distributed under the terms of the Creative Commons Zero / GPL License
Copyright: unsplash, http://unsplash.com


== TRANSLATIONS ==

The theme is translation ready and has already been translated to Spanish and French. If you translate the theme to another language, please consider contacting me to have it added to the theme for everyone to use.


== INSTALLATION ==

1. Download the theme
2. Unzip the folder into the `/wp-content/themes/` directory
3. Activate the theme through the 'Appearance' menu in WordPress
4. Read the "How to use the theme" and "Frequently Asked Questions" sections below and check out our website for information and examples on how best to use the theme.
5. If you want to customize the theme, check out the readme.txt file in the flat-bootstrap-child folder.


== SCREENSHOTS ==

For now, WordPress doesn't allow themes to have more than one screenshot, but you can go to [http://xtremelysocial.com/wordpress/flat/] to see a bunch of them.


== HOW TO USE THE THEME ==

= Set up your home page =

We think this theme looks best with a full-width page with a large image at the top. To do that, go into WordPress Appearance -> Customize and set the option for Static Home Page to one of your pages. You'll also need another page that doesn't need any content it, but you will assign it as your blog page.

To add a full-width image to your home page (or any page for that matter), just use an image that is at least 1170px wide and for the home page at least 640px high. For any page except the home page, the image can be as short as 400px high. Set the Title, Caption, and optionally the Description and they will display centered in a white font. Full-width images can be set on any page. They will be full-width even on pages with a sidebar.

To set your home page (or any page) to full-width, You can choose either "Full Width" or "No Sidebar" for the page Template. Its under the Page Attributes section in the WordPress Editor. The full-width one will let any colored sections you add to your page fill the entire width of the screen. However, you will need to be sure to contain your actual page content.

The easiest way to do that is to set the WordPress editor to "Text" mode. You'll see a button that says "Full Width". Click on that and type in your content. Click on it again when you're done. It will insert the following:

`<div class="section offwhite"><div class="container">
Put your content here.
</div><!-- container --></div><!-- section -->`

The section adds padding and you can set the color to any one of the ones in our included color-palette. See the next section for details. Also read on for more information about all the included page template and more about the buttons we added to the WordPress editor.

If you use the "No Sidebar" template, you won't have to mess with the container div, but your images and colored sections will have margin on the sides.

While you're in the editor, you may or may not notice that we've added a new section called Additional Post / Page Options. There you will find a Subtitle field that we encourage you to fill out at least for pages. It will display under the title of the page or post. Most premium themes have this and it looks great, so we included it.

= Set theme options =

One of the first things you'll want to set is your header menu and optionally a footer menu. Use the standard WordPress menu editor to build those and set theme there or in Appearance -> Customize. 

If you have a drop down list for your primary site navigation, the parent item should only be a grouping title with a "#" value for the URL parameter. The Bootstrap navbar requires a click to open the drop down list so any link that is set in the parent item will not work.

The footer navbar only allows for a depth of one drop down level. Its not designed to be a primary nav.

As for the header, you can get rid of it altogether if you want and your site title will display in the left part of the navbar.  In Appearance -> Customize,  uncheck "Display Header Text". In this case, your site name will appear in the left part of the navbar.

However, if you would like to upload a custom background image that sits behind your site title and tagline, you can do that there as well. The image should optimally be 1600px x 200px, but the theme will let you upload different sizes. You just might need to add some CSS to get it to look right.

You can also upload a background image from here as well. However, this theme was designed to be "full width" so you won't really see it very often. For really wide screens, like an iMac, we did cap the width of the theme at 1600px so the background will show in that case. But if your screen is narrower than that, you won't see it.

Also note that if you change background color, that only shows beyond 1600px wide as well.

= Set colored backgrounds in the content on your page or post =

To add a colored section to your content, just add a section like you did above and change the color to one of the ones below. These colors are all perfectly color-matched to go together and are common colors for "flat" style websites. They are largely taken from Gizmodo's flat-ui, but we've given them easy to remember names.

* bg-white
* bg-offwhite
* bg-lightgray
* bg-gray
* bg-darkgray
* bg-lightgreen
* bg-darkgreen
* bg-brightgreen (new)
* bg-darkbrightgreen (new)
* bg-blue
* bg-darkblue
* bg-purple (new)
* bg-darkpurple (new)
* bg-midnightblue
* bg-darkmidnightblue (new)
* bg-yellow
* bg-lightorange (new)
* bg-orange (new)
* bg-darkorange (new)
* bg-red
* bg-brightred (new)
* bg-darkbrightred (new)
* bg-almostblack
* bg-notquiteblack
* bg-black

When you use a colored background, it fills the width of the screen. The fonts and link color on the lighter colors (up through dark gray) and the shades of black are left untouched. The fonts are set to white and the link is white with an underline in the middle colors (light green through red). The reason we put the underline on the links is because one of the main complaints about flat websites is that the user can't tell what's clickable. This way they can easily tell and it looks fine anyway.

= Add full-width images as "sections" in your content =

In addition to colored sections, you can easily add a full-width image as the background to a section. It works similarly to when you add a featured image to a page, except you can add them anywhere in your content.

Just choose the standard WordPress "Add Media" button and select or upload an image. These images should be 1600px wide and at least 400px high. Fill whatever you want in the "Caption" field and it will be displayed, centered, on top of the image. You can use `<h1>` and `<h2>` tags for big fonts. Anything else will display in the normal text size (which is 18px by the way).

= Format a page differently using this theme's included page templates =

Since this theme is designed to be full-width, we've included a number of page templates for that. We've also included an additional template to move the sidebar to the left (default is right for non-full-width pages). The page templates are described well in the actual post editor, but here is more information on them.

* _Default Template_: Left sidebar

* _Full Width_: No container, so you can insert full-width colored sections and images. Be sure to wrap your content in `<div class="container">content here...</div>` so it has sufficient padding around it. 

* _Full Width No Content Header_: Same as above, except doesn't display the page title at all. This way you can insert your own image or colored section or whatever you want to be the "header" of your page.

* _Full Width with Recent Posts_: This is full-width like above, but is great for your home page in that it displays 3 recent posts at the bottom of the page.

* _Full Width Recent Posts No Header_: This is full-width with recent posts like above, but doesn't display a content header or featured image.

* _Full Width with Sub Pages_: Ah yes. This template is great for listing products, your portfolio or whatever without needing a plugin or custom post types. Just add this template to a page and all of its sub-pages will display in a grid style layout with image thumbnail and title.

* _Left Sidebar_: Just like the default template, but with the sidebar on the left. Maybe you like that better than on the right?

* _No Sidebar_: If you don't want to mess with the true full-width templates and having to remember to wrap stuff in a "container", just use this. Its works like a normal page but with no sidebar. You'll have a bit of margin on the right and left, but no big deal.

* _No Sidebar or Content Header_: Just like above, but doesn't display the page title. Put whatever you want at the top of the page instead.

* _Site Index_: What theme isn't complete without a site index template, right? Especially in the days of "mobile first" where menus are kept simple, this is a great way to let readers explore your whole site. And for no extra charge, the "Page not Found (404)" page also includes this same site index.

= Use the included buttons to quickly add common elements to your page or post =

This theme includes two "quick tags" in the WordPress HTML editor to add a normal full-width sections or a special "header" section that has a thick bottom border. You just need to make sure you are in Text mode instead of Visual mode in the editor. The quicktags are as follows:

* _fullwidth_ - For use in a full-width page template or fullwidth article. Inserts a section and container for your content. Default color is offwhite, but you can change it to any of our included colored backgrounds.

* _featured_ - If you want a full-width colored section that perhaps contains a smaller image (eg. screenshot), you can use this. Default is also offwhite, but looks great with a color.

What these quicktags are doing is simply inserting some HTML to utilize the included Bootstrap capabilities. Read on for more information about Bootstrap. We can add more if people want, but read on to see other ways you can do this.

= Use Bootstrap to add cool stuff to your pages or posts =

This theme is based on Bootstrap. It is an open-source CSS framework from Twitter that is mobile-first, fully responsive, and cross-browser tested. It lets you add columns, tabs, navbars, carousels (sliders), icons, lists, panels, tooltips, and much, much more to your content. 

One thing you don't want from Bootstap, though, is their default settings. Your website will scream "Bootstrap". So we've tweaked all the settings for you already to give you a nice color palette, great looking fonts, and a "flat" look.

You can check out our "Shortcodes" page on our website to see many of the Bootstrap features in action. Just go to [http://xtremelysocial.com/wordpress/shortcodes/]

For the full documentation, please see the Bootstrap website at  [http://getbootstrap.com/components/ and http://getbootstrap.com/css/]. Be sure to check out the components section and javascript sections there as well. All of that works perfectly in this theme.

= Add icons to your pages and posts =

Bootstrap comes with a bunch of icons you can use. Check them out here: [http://getbootstrap.com/components/#glyphicons]. You'll want to put these in a `<span>` tag or the WordPress visual editor will strip them out. This is how you do it:
`<span class="glyphicon glyphicon-heart icon-lg">&nbsp;</span>`

We put the `&nbsp;` code in there just to add a space as WordPress likes to strip out HTML tags that it thinks are empty.

But wait... there's more! We've also included Font Awesome which takes the whole icon thing to  another level. Particularly useful are the social networking icons, but there are tons more to choose from. Just like Bootstrap's icons, these icons are stored as a font file meaning they are pixel-perfect at any font size even on retina (high pixel density) displays like the iPad, Macbook Pro Retina, high-end Android tablets, etc.

To use Font Awesome icons, just put the following in your content: 
`<span class="fa fa-facebook"><span>`

Please see the documentation for the full list of icons: [http://fontawesome.io/icons/].

One more cool thing about icons... you can use them in menus as well if you'd like. fa-home, fa-user, etc. are all very useful for this.

= Add buttons to your pages, posts, and/or widgets =

In addition to the all the standard Bootstrap buttons, we've also added a couple of additional buttons that work great on colored sections. One is hollow, meaning it just has the border and the center let's the background color show through. The other is a "transparent" button that adds opacity to the background color to make it look darker. Use them like this:

`<a href="whatever.com" class="btn btn-hollow">Hollow Button</a>`
`<a href="whatever.com" class="btn btn-transparent">Transparent Button</a>`

= Set a POST to full width =

Yep, you can do that! Very few themes have this feature because its not a standard part of WordPress, but we've added it because this theme is so focused on full-width. When editing a post, within our Additional Post / Page Options section there is a checkbox to display the them full-width. It works exactly like the "Full Width" page template described above.

If you are concerned that the text is too wide to be read easily on large screens, use the Bootstrap grid system (columns) to narrow the text only on large screens. This works perfectly for that:

`<div class="container"><div class="row">
<div class="col-lg-8 col-lg-offset-2">
Content goes here.
</div>
</div></div>`

What this does is contain the text to about two-thirds of the screen width (Bootstrap's grid is 12 columns), but ONLY on large screens. For smaller screens, it displays full width. Now you are starting to see the power of Bootstrap's grid system ;-) You can also use col-lg-10 and col-lg-offset-1 if you'd like it a littler wider.

= Add widgets to the sidebar and optionally the footer, page top, and page bottom =

We've included lots of widget areas. Of course there is a sidebar that you can put on the left or right. However, if you are using mostly full-width pages and full-width posts, its only going to display on the archives and search pages.

So you may want to add sections to the page bottom which display after your content and before the footer. Full-width colored sections look great there for calls to action or whatever else you want. We recommend installing the Widget Classes plugin, so you can just add "bg-gray" or whatever color you want to it. We think these actually look better than loading up the sidebar, but that of course is entirely up to you.

= Remove the default Page Bottom and Footer Widgets =

Most of our themes have sample widgets that display when you first install the theme. These are just examples of some of the types of things you can do with the widget areas.

If you added any widgets to the Page Bottom and Footer areas, the default widgets will no longer show. However, if you don't want to add any widgets to those areas and also don't want to show the default ones, you can simply add an empty text widget to each area.

= Install additional plugins that work well with this theme =

When you first installed the theme, you may have noticed a banner at the top of the screen that talked about installing required and optional plugins. To be sure, none of these plugins are required. However, they are very useful additions to this theme. As of initial release, the following plugins are in the recommended list.

* _Jetpack_ - This plugin from the makers of WordPress themselves adds a ton of features. The most relevant for this theme are: Tiled Galleries and Widget Visibility. The latter can be used to display certain "Sidebar" or "Page Bottom" widgets only on certain pages.

* _Widget Classes_ - Great way to easily add a background color to an entire widget, especially the ones in the "Page Bottom".

* _Bootstrap 3 Shortcodes_ - This plugin supports most of the Bootstrap components and makes it easy to insert the HTML and then you can easily edit it. Its a lot like the quicktags we included, but much more comprehensive. 

There are other Bootstrap Shortcode plugins out there as well and they all will work well with this theme. Some of them require you to uncheck a box to indicate that you are already using a theme that includes Bootstrap so the plugin doesn't try to add another copy of it. That's primarily the reason we chose to recommend the one above is simply because it doesn't try to add Bootstrap it all. It requires a theme like this one that has it.

* _Agnosia Bootstrap Carousel_ - This provides a shortcode for creating carousels, which most WordPress themes refer to as "sliders". Note that Jetpack above has this as well, so may just want to use that. But since this is a Bootstrap theme, we wanted to recommend a plugin that supports Bootstrap's particular look and feel, especially since we've styled that look in this theme.

= Set Post “Thumbnail” Image Sizes =

In your blog, this theme displays “thumbnails” that are 640px x 360px. If you don’t want to have an extra image size stored on your server, go into Appearance -> Media and set the Medium thumbnail size to that.

While you’re in there, you can update the Large image size as well. Of course you don’t have to, but the maximum content area that this theme displays is 1170px wide. So you probably don’t want to go any wider than that. The theme will resize it on the fly in the viewer’s browser, but its a good practice to set this so it doesn’t have to do that.

Note that these settings only change the sizes of *new* images that you upload. So you can use the Regenerate Thumbnails plugin to resize all of your existing images.

= How to Customize this Theme =

We have provided a "child theme" for you to be able to easily customize the theme, but still be able to upgrade the Flat Bootstrap theme as new versions are released. Within this theme there is a directory called flat-bootstrap-child. COPY this directory up one level to your main /themes directory and it will appear as a theme in admin Appearance -> Themes. You can then activate this child theme and make any changes to it that you would like.

For more information, see the readme.md file in the flat-bootstrap-child directory and the Child Theme page on WordPress.org [http://codex.wordpress.org/Child_Themes].


== FREQUENTLY ASKED QUESTIONS ==

= Why did you write this theme and why should I use it? =

Great question! There are thousands of WordPress themes and dozens of Bootstrap themes, but almost all of them are designed with a maximum width. Most of the Bootstrap themes are also only for developers, not users, with just the basic ugly Bootstrap sticking out like a sore thumb. Most of the Bootstraps themes aren't based on a core WordPress theme either, so they can be difficult to figure out how to adjust the styling.

We developed this theme to be unique in these key ways:

1. It is based on the WordPress core "starter theme", so you already know how to style it and override templates and such in a child theme without learning anything new!

2. It is based on Bootstrap for cross-browser capability in a fully responsive theme with tons of components that you can use in your content, such as buttons, navbars, sliders, etc.

3. It is designed to be a modern, "flat" (or technically "almost flat") theme with full-width colored sections and full-width images. This really brings your content alive and allows the reader to focus on that content instead of the theme itself.

4. Its open source AND completely free. Most themes like this are considered "premium" themes and cost money. Our hope is that user's will love it and theme developers will start using it as a core "framework" as well.

= How come you haven’t included a bunch of "shortcodes" like most of the WordPress themes OUTSIDE WordPress.org? =

Well, don’t get the WordPress community started on this topic ;-) Themes are supposed to be just the theme. Plugins are supposed to allow users to easily format content or automatically add content. In fact, WordPress won’t approve any themes with actual shortcodes in them. Plus, if a theme includes shortcodes, you are locked into that theme because those shortcodes will break on any other theme.

This theme includes a few "quick tags" in the WordPress HTML editor to add sample icons, full-width sections, etc. See the section How to Use This Theme above for a list.

Of course you can always copy any of the samples from the Bootstrap website as well. 

However, if you really want true "shortcodes", we’ve recommended a coupe of plugins for that and you’ll see those recommendations when you install our theme. This way, you can still have the convenience of using shortcodes, but switch to any Bootstrap theme and not lose your content.

= Why is there a full-width checkbox on my posts? = 

WordPress as of version 3.8 doesn't let you have post templates like the page templates above. So until then, we've included a checkbox that will display your post full-width just like the fullwidth page template. This template is great for full-length articles, especially when you have one or more fullwidth images in them.

See the section above How to Use this Theme for more information on the various page templates and full-width post template.

= How do I change the link colors? =

Changing the link colors in the main post / page content area is pretty easy with CSS:

`a { color: #16a085; }
a:hover, a:focus { color: #19B798; }`

Note that links in the footer, copyright section, or any colored sections you've added to a page will still use their original link colors. This is so the links look good and don't have conflicting color combinations.

= How do I replace the site title with a custom logo? =

After WordPress.com releases their official plugin for custom logos, we plan to support that. In the meantime, you can do it with something like this in CSS:

`.site-title a {
	background: url('http://yourdomain.com/images/logo.png') left top no-repeat;
	display: block;
	text-indent: -9999px;
	width: 100px;
	height: 100px;
}`


== VERSIONING ==

This theme is maintained under the Semantic Versioning guidelines. Releases will be numbered with the following format:

`<major>.<minor>.<patch>`

And constructed with the following guidelines:

* Breaking backward compatibility bumps the major (and resets the minor and patch)
* New additions without breaking backward compatibility bumps the minor (and resets the patch)
* Bug fixes and misc changes bumps the patch

For more information on SemVer, please visit [http://semver.org/].


== CHANGELOG ==

= 1.5 = 
* More changes to the header text. For child themes, if a custom header is uploaded, the front page will display the site title and description.
* Change "smooth scroll" arrow on home page with featured image to scroll to the next section, whether that is a Page Top widget or the page content itself.
* Site index page template (and 404 page) now supports Jetpack Portfolios and Testimonials. Displays links in the Site Content (pages) section. Also lists portfolio types and tag cloud if there are any.

= 1.4.4 = 
* If no title and caption on a featured image, get the title (and optional subtitle) from the page itself.

= 1.4.3 =
* Change title and subtitle on a static home page to come from the featured image itself instead of the site title and tagline. This provides more flexibility to display the text that you want.
* Changed the Full Width with Subpages page template to put the title of the page before the featured image.

= 1.4.2 =
* Fixed a bug where static home pages were displaying the page title and it looked ugly. The idea is that you'll have whatever content on your home page that you want.
* Fixed a bug where category and tag archives were displaying the page title without formatting

= 1.4.1 =
* Updated screenshots to use a GPL image from unsplash.com
* Updated licensing information to reflect screenshot image is GPL
* Bumped version number

= 1.4 =
* Significantly expanded the color palette to include more blues, yellows, oranges, reds, and even added purples. These are all color-matched to look great together when used for colored sections in your content.
* Changed the automatic cropping of the custom header image to crop from the center. This way if your image has the center as focus, that center is what will be displayed on smaller screens. If you need to change it back to crop top left, then add custom CSS of .custom-header-image { background-position: top left; }
* Added new $xsbf_theme_option for whether the custom header displays above or below the navbar. Rewrote header.php (if header above nav) and content-header.php (if header below nav). This consolidates our code, so child themes do not need to include these files anymore.
* Simplified the code in custom-header.php related to above as well, so less code overrides are needed in functions.php in the child themes.
* Enhanced the Page - With Subpages template to display links to next and previous sibling pages. This lets users easily page through all of the subpages without going back to the parent page.
* Remove Jetpack (sharedaddy) sharing links from post excerpts which were hideously ugly and not useful.
* Added basic support for the new Jetpack "Testimonails" post type. The title and description will display properly on the pages.
* Cleaned up Jetpack infinite scroll feature so Page Bottom and Footer widgets don't show until user reaches the last post.
* Fixed logic to only load jquery mobile touch support on individual pages and posts where a carousel might be placed. Touch support can now also be turned off in child theme's functions.php by setting $xsbf_theme_options['touch_support'] = false.
* Added French language translation thanks to Benoit Hamel <benoit.2.hamel@gmail.com>

= 1.3.1 =
* Fix for recommended plugin installation which was throwing errors
* Fix Page template for full-width with recent posts and no header (page-fullpostsnoheader.php) to put content embedded by plugins into a container
* Style Jetpack contact form so email body text is the same width as the other fields
* Use bold font for active navigation tab so its easier to distinguish from the other tabs

= 1.3 =
* Added responsive video! This works automatically as long as the Jetpack plugin is active.
* Added basic support for the new Jetpack "Portfolio" post type. The title and description will display properly on the pages.
* Changed Google fonts to load more efficiently from functions.php instead of using @import in the stylesheet. This also makes it easier to override the fonts in child themes.
* Removed background color from the page as this was overriding the user's chosen background color in the Theme Customizer
* Update page-fullwithposts.php and page-fullwithsubpages.php to put the page meta and comment section after the recent posts. This looks much nicer.
* Several fixes for multiple language support (fixed mismatched text domains, added some strings that were previously hard-coded, cleaned up some existing text strings, generated .pot translation file in the /languages directory)
* Added Spanish language support thanks to Carlos Folch <8tintin@gmail.com>
* Added search field and login/logout link to the site-index page template
* Moved Page Top widget area below the full-width page header
* Since the footer menu doesn't allow submenus, display only the top-level menu items
* Display a default footer when previewing the theme and upon initial installation of the theme
* Display a default Page Bottom widget when previewing the theme and upon initial installation of the theme
* Updated readme.txt to include instructions about removing these default widgets
* Added icon-xlg CSS class to easily make even larger icons for Font Awesome and Glyphicons
* Moved flat-bootstrap-child from being a submodule to included and managed directly by github in this parent theme

= 1.2 =
* Lined up fields on comment entry form. Set comment text box to not expand and shrink when it gains and loses focus.
* Added padding to carousel captions
* Set gray background on cover and section images so can see white text until image loads
* Enhanced stripping of comments and empty <p> tags from content
* Fix to page-fullwidthsubpages to display them all instead of just the first 6
* Added page-postsnoheader page template
* Moved page-top widget area to below the feature image as this looks nicer
* Set a default footer nav menu to a smoothscroll to the Top and a link to Home. Can override by specifying your own footer nav menu.
* Used WordPress v3.9 enhancement to specify crop on images and use alternate thumbnail sizes if our custom size not generated for a particular post/page
* Changed readme.md to readme.txt for better compatibility with possible future WordPress theme directory features
* Deprecated $theme_options and replaced it with $xsbf_theme_options. Please update your child themes as soon as possible.
* Deprecated xsbf_theme_preview function as recommended by the WordPress theme review team
* Bumped version on css and js that was changed
* Updated child theme
* Updated screenshot

= 1.1 =
* Added a child theme for easy customization (see the flat-bootstrap-child directory)
* Renamed readme.txt to readme.md to reflect the use of markdown in this file. Updated this file to explain the child theme provided.
* Fixed nasty bug preventing full-width stories (posts) from displaying properly
* Simplified the header and footer by moving sidebar logic to sidebar-footer.php, sidebar-pagetop.php, and sidebar-pagebottom.php
* Changed default nav bar to show the first 4 pages on the site so it looks better until the user adds an actual menu
* Added Regenerate Thumbnails to the recommended plugins to optimize images for the theme
* Changed text domain to "flat-bootstrap" to match the theme name
* Removed a reference to the TwentyThirteen theme in the CSS for the customer header feature
* Updated TGM-Plugin-Activation to the latest version

= 1.0.1 =
* Changes required for approval to the WordPress Theme Directory. Yay!

= 1.0.0 =
* Initial submission to the WordPress Theme Directory. Enjoy!

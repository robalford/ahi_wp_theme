[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

_s
===

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in `inc/custom-header.php` that can be activated by uncommenting one line in `functions.php` and adding the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/extras.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.

AHI THEME DOCUMENTATION:

Built with underscores starter theme. Followed lynda.com underscores tutorial, Professional WordPress development book, underscores docs, WP docs and codex. See underscores_original in wp_dev folder in XAMPP/htdocs to compare original underscores code to your own modified version.

Site structure:

Site consists only of static pages, falling into the categories 'about', 'portfolio' and 'recognition'. About pages include a single large photo and text. Portfolio pages include a single large photo, text and a photo gallery (used Photo Gallery plugin for these). Recognition pages include photos of each publication that link to online articles, pdfs or Amazon pages.

Global customizations:

styles.css: Made customizations throughout the style sheet, documented by comments in the section headers. Most customizations were in the menu section. Added custom header and footer styles at the end of the file.

Functions.php: Made some customizations to functions.php. Followed lynda.com tut for these, including custom fonts and icons. Enqueued custom layouts for each of your custom templates. Added post thumbnail support and sizes for different pages. These can now be set via the admin interface. Commented out unused boilerplate code (still need to do this.)

Menu: Followed lynda tut and some of your own research to create custom mobile friendly menu. Main categories are placeholders, empty pages on the admin, that define the structure but dont function as actual pages. 

Images: Set image sizes in functions.php for 'post thumbnails'. In custom page templates, added specific image sizes to each page

Custom pages (see lynda tut 'creating custom page templates' under Working with Static Pages):

Create custom page templates for each page of the site in page-template folder, with custom styles in layouts folder. Copied code from page.php and made your own modifications and customizations described below. Creating custom page templates (indicated in comment at the top of each file), allows user to select template via the admin panel for a 'page'. Because custom pages are highest in the WordPress template hierarchy, these templates will be automatically loaded when the user enters the url for the page. Each page is given it's own styles in the corresponding css file in the layouts folder, and connected via the enqueue styles and scripts function in functions.php. 

Landing page:

Template: landing-page.php
Layout: landing-page.css

The template includes only a single photo, no loop, no content. 
The layout sets the main content width to auto for a full width photo on all screen sizes.

About pages:

Template: about-page.php
Layout: about-page.css

Template includes post thumbnail and post content, loaded via the content-page file in the template-parts folder. (Underscores provides this modularity. The template part file includes the entry header, 'post' and footer.)

Layout makes page specific modifications to the responsive css defined in style.css. 

Portfolio pages:

Template: porfolio-page.php
Layout: portfolio-page.css

Template includes post thumbnail, post content and short-code for Photo Gallery plug-in. Create a photo gallery and generate short-code via the Photo Gallery plugin admin interface. Add custom 'Gallery Shortcode' field via the page's admin interface. Use WP function get_post_meta() in the page's custom template php file to access custom field. Then use do_shortcode() to insert the shortcode into the page template.

Photo Gallery Plugin: https://wordpress.org/plugins/photo-gallery/developers/ 

Layout makes page specific modifications to the responsive css defined in style.css. 

Recognition pages:

Templates: magazine-page.php, book-page.php
Layout: recoginition.css

Template uses the WP_Query object to create a custom database query, returning all of the 'magazine' pages with their photos. It then loops through each page, displaying only the photo (no content in this template). It then displays them all, with links their urls. To add a new page, create a sub-page in the admin that is a child of 'magazine' or 'book'. Add the photo as the thumbnail, along with custom fields for press type and press url, and update the order field under page attributes. These custom fields set the post metadata that is used by WP_QUERY to create the custom loop. 

Both templates share a single layout, recognition.css. Layout makes page specific modifications to the responsive css defined in style.css.  Page specific styling is accomplished by adding page-specific css classes, e.g. 'book-thumbnail'. 


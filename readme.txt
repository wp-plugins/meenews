=== Mee News ===
Contributors: www.wp-newsletter.com
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6678255
Tags: newsletter, mail, mailing, lists
Requires at least: 2.7.0
Tested up to: 2.8
Stable tag: trunk

Plugin to send newsletters, manage lists of subscribers, shipping selective, choosing the post and send personalized messages.

== Description ==

System recommandations:
WordPress 2.7 or higher.
PHP version 5.2 or higher.
MySQL version 5.0 or higher.

Description
With this plugin you will be able to send newsletter's with diferent themes and customizable colors, images, headers, text size's and colors , etc

create your lists, manage your users, postings to a mailing list specifically targeted. 

Enter the post you want with or without a photo, select it yourself. 

Set alerts arrival. 

Manage your newsletters saved. 

== Installation ==

To install the plugin:

1. Upload `wp_TVnewsletter` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress ( activate MeeNews Plugin ).
3. Gives write permissions to the directory to be able to upload custom headers and custom buttons also
4. Place `<?php if (class_exists('TvNewsletter')): ?><!-- place your HTML code here --><?php TvNewsletter::activateNewsletterPlugin(); ?><!-- place your HTML code here --><?php endif; ?>`

5. if you want users to be register with a defined list simply choose the id of the list and place it between the parenthesis in this way

	`<?php if (class_exists('TvNewsletter')): ?><!-- place your HTML code here --><?php TvNewsletter::activateNewsletterPlugin(2); ?><!-- place your HTML code here --><?php endif; ?>`

    In this case the users will be entered in list number 2

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. Modify newsletter header, and title and background color 1.png
2. Modify Front End form subscribers 2.png
3. Modify colors and sizes, and select or not images 3.png
4. Manage List 4.png
5. Example newsletter 5.png
6. Other example 6.png
== Changelog ==

Leer **[Readme > Changelog](http://www.wp-newsletter.com/)**.





=== Flickrsets 2 WP ===
Contributors: Pierrick FLAJOULOT
Tags: flickr,photostream,sets,list,photo,sharing,admin,flickrsets2wp,flickrsets 2 WP
Requires at least: 3.4
Tested up to: 3.4
License: GPLv2

Flickrsets 2 WP is a plugin that allows you to get the list of Flickr sets for a given user.

== Description ==

Flickrsets 2 WP is the so far missing plugin for Wordpress/FlickR. You can now get the list of the public sets of any FlickR user.

*Flickrsets 2 WP is maintained by <a href='http://www.vezoul.fr'>Pierrick FLAJOULOT</a>.

== Credits ==

Copyright:<br>
Pierrick FLAJOULOT 2012

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

== Installation ==

1. 	Download, install, and activate the Flickrsets 2 WP plugin.

2.	From your Wordpress Dashboard, go to Settings > Flickrsets 2 WP Options > Enter your FlickR API Key and the default FlickR user ID to follow

3. 	In your template, call the global variable $f2WP and call the function $f2WP->flickrsets2wp_display_sets() to get the list of sets.
Pass to this function any FlickR user id to override the default one sets in settings.

That's it ... Have fun
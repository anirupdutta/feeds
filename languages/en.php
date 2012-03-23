
<?php


	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	*/

	$english = array(

		/*
		** Feeds Key Setting
		*/
		'feeds:submit' => 'Submit',
		'feeds:modify' => 'Enter your Google Reader API Key, insert just the key string.<br /><small><a target="_blank" href="http://code.google.com/apis/ajaxfeeds/signup.html">You can obtain an API Key here</a>.</small>',
		'feeds:modify:success' => 'Successfully updated the Google Reader API settings.',
		'feeds:modify:failed' => 'Failed to update the Google Reader API settings.',
		'feeds:failed:keyrequired' => 'You must provide an API key.',

		/**
		 * Feeds widget details
		 */

                'feeds' => "RSS feeds",
                'feeds:addfeed' => "Add feed",
                'feeds:savefeed' => "Save feed",
                'feeds:title' => "Title",
                'feeds:read' => "Your feeds",
                'feeds:friends' => "Colleagues feeds",
                'feeds:everyone' => "Site feeds",
		'feeds:url' => 'Feed URL',
		'feeds:list' => 'Feed list',
		'feeds:yourfeeds' => 'Your feeds',
                'feeds:friendsfeeds' => 'Colleagues\' feeds',
		'feeds:sitefeeds' => 'Site feeds',
		'feeds:deleted' => 'Feed deleted',
		'feeds:notdeleted' => 'Your feed was not deleted',
		'feeds:nofeeds' => "There are no feeds to display",
		'feeds:allfeeds' => "All site feeds",
		'feeds:suredelete' => "Are you sure you want to delete this feed?",

		/**
                * Feeds widget river
                **/

	        //generic terms to use
	        'feeds:river:created' => "%s added the feeds widget.",
	        'feeds:river:updated' => "%s updated their feeds widget.",
	        'feeds:river:delete' => "%s removed their feeds widget.",

                /**
                * Feed actions
                **/

	        'feeds:added' => "Your feed has been added.",

                /**
                * Feed errors
                **/

	        'feeds:error' => "There was a problem saving your feed.",
	        'feeds:blank' => "There was no feed to save.",

                /**
                * Welcome messages
                **/

	        'feeds:welcome' => "Welcome to your simple feed reader, here you can subscribe to RSS feeds from around the web and then view the latest activity here. To get started, click on the add button over on the left hand side",
                'feeds:friendswelcome' => "This page lets you view all of the feeds your colleagues have made available to their network. If any are available, you will see a list over on the righthand side. Click on a link to read the contents",
	        'feeds:sitewelcome' => "Here you can see all the feeds that have been subscribed to by people on the site. To read the latest feeds, click on the links over on the right hand side",

	);

	add_translation("en",$english);

?>
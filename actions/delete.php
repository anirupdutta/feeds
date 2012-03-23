<?php

	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	*/

	// Make sure we're logged in (send us to the front page if not)
        gatekeeper();

        // Get input data
	$feed_id = get_input('feed_guid');

        // Make sure the url isn't blank
	if (empty($feed_id)) {

            register_error(elgg_echo("feeds:blank"));

        // Otherwise, delete the feed
	} else {

            $feed = get_entity($feed_id);

            //display a success or failure to delete feed
            if (!$feed->delete()) {
                register_error(elgg_echo("feeds:error"));
            }else{
                // Success message
	        system_message(elgg_echo("feeds:deleted"));
            }

	}

        forward("/feeds/" . $_SESSION['user']->username);

?>
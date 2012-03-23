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
	$feed_url = get_input('feed_url');
	$title = get_input('feed_title');
	$access = get_input('feed_access');
	if(!$access){
            $access = 2; //private
	}
		
        // Make sure the url isn't blank
	if (empty($feed_url)) {
            register_error(elgg_echo("feeds:blank"));
                        
            // Otherwise, save the feed
	} 
        else {
			
            // Initialise a new ElggObject
            $feed = new ElggObject();
	
            // Tell the system it's a feed
            $feed->subtype = "feed";
	
            // Set its owner to the current user
            $feed->owner_guid = $_SESSION['user']->getGUID();
	
            // For now, set its access to public (we'll add an access dropdown shortly)
            $feed->access_id = $access;
	
            // Set its description appropriately
            $feed->title = $title;
            $feed->description = $feed_url;
	
            //display a success or failure to save message
            if (!$feed->save()) {
                register_error(elgg_echo("feeds:error"));
            }
            else{
                // Success message
	        system_message(elgg_echo("feeds:added"));
            }
			
	}
					
        //forward back to the users feeds page
        forward("/feeds/" . $_SESSION['user']->username);
			
?>
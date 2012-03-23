<?php 

	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	*/
	 
        // Load Elgg engine
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
        // Get the current page's owner
	$page_owner = page_owner_entity();
	if ($page_owner === false || is_null($page_owner)) {
            $page_owner = $_SESSION['user'];
            set_page_owner($page_owner->getGUID());
	}
		
	// set the title
	$area2 = elgg_view_title(elgg_echo('feeds:friendsfeeds'));
	    
        // Get site feeds
        $feeds = get_user_friends_objects($page_owner->getGUID(), "feed", 30, 0);
		
        // Get latest feeds
	$area2 .= elgg_view("feeds/display", array('context' => "friends"));
		
	// Get the users list of friends feeds
	$area1 = elgg_view("feeds/display_list", array('entity' => $feeds));
	
        $params = array(
            'content' => $area1,
            'sidebar' => $area2,
        );	
        
	// Display them in the page
        $body = elgg_view_layout("one_sidebar", $params);	
		
	// Display page
	echo elgg_view_page("Feeds",$body);
		
?>
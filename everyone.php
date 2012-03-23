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
		
	// set the title
	$area2 = elgg_view_title(elgg_echo('feeds:allfeeds'));

	$params = array (
		  'types' => 'object' ,
		  'subtypes' => 'feed',
		  'limit' => 999 ,
		  'offset' => 0 ,
	);
		  
	    
	// Get site feeds
        $feeds = elgg_get_entities($params);
        
	// Get latest feeds
	$area2 .= elgg_view("feeds/display", array('context' => "site"));
		
	// Get the users list of feeds
	$area3 = elgg_view("feeds/display_list", array('entity' => $feeds));


	$params = array(
	    'content' => $area2 ,
	    'sidebar' => $area3 ,
	);	
	// Display them in the page
        $body = elgg_view_layout("one_sidebar", $params);
	// Display page
	echo elgg_view_page(elgg_echo('feeds'),$body);
		
?>
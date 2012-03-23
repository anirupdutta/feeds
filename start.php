<?php

	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	 */
	 
	function feeds_init() {
    		
    	    // Load system configuration
	    global $CONFIG;
				
	    // Load the language file
	    register_translations($CONFIG->pluginspath . "feeds/languages/");
				
    	    // Set up menu for logged in users
	    if (isloggedin()) {
	          $item = new ElggMenuItem('feeds', elgg_echo('feeds:read'), 'feeds/' . $_SESSION['user']->username);
                  elgg_register_menu_item('site', $item);
            }
            			  
	    // Extend system CSS with our own styles, which are defined in the feeds/css view
	    elgg_extend_view('css','feeds/css');
			    
	    // Register a page handler, so we can have nice URLs
	    elgg_register_page_handler('feeds','feeds_page_handler');
				
	    // Register a URL handler for feeds
	    elgg_register_entity_url_handler('object','feeds','feeds_url');
			
	}
		
	function feeds_pagesetup() {
			
		global $CONFIG;
		//add submenu options
		if (elgg_get_context() == "feeds") {
			if (elgg_get_page_owner_guid() == $_SESSION['guid']) {
                                $item = new ElggMenuItem('feeds', elgg_echo('feeds:read'), 'feeds/' . $_SESSION['user']->username);
                                elgg_register_menu_item('site', $item);
                        }
                                $item = new ElggMenuItem('blog', elgg_echo('feeds:read'), 'feeds/' . $_SESSION['user']->username);
                                elgg_register_menu_item('site', $item);
                        add_submenu_item(elgg_echo('feeds:allfeeds'),$CONFIG->wwwroot."mod/feeds/everyone.php");
			}
			
	}
		
	/**
	* feeds page handler; allows the use of fancy URLs
	*
	* @param array $page From the page_handler function
	* @return true|false Depending on success
	*/
	function feeds_page_handler($page) {

            // The first component of a feed URL is the username
            if (isset($page[0])) {
                set_input('username',$page[0]);
            }
			
            // The second part dictates what we're doing
            if (isset($page[1])) {
                switch($page[1]) {
                    case "read":		
                        set_input('feeds',$page[2]);
			@include(dirname(__FILE__) . "/read.php");
			break;
                    case "friends":
                        @include(dirname(__FILE__) . "/friends.php");
			break;
		}
		// If the URL is just 'feeds/username', or just 'feeds/', load the standard feeds index
		} else {
                    @include(dirname(__FILE__) . "/index.php");
                    return true;
		}
			
		return false;
			
	}

	/**
	* Populates the ->getUrl() method for feeds objects
	*
	* @param ElggEntity $feedpost feeds post entity
	* @return string feeds post URL
	*/
	function feeds_url($feedpost) {
			
		global $CONFIG;
		$title = $feedpost->title;
		$title = friendly_title($title);
		return $CONFIG->url . "blog/" . $feedpost->getOwnerEntity()->username . "/read/" . $feedpost->getGUID() . "/" . $title;
			
	}
		
	//create an instance of the FeedObject
	function create_feed(){
    		
    		$Parser 	= new FeedParser();
		$Parser->parse('http://www.sitepoint.com/rss.php');
		$channels  	= $Parser->getChannels();     
		$items     	= $Parser->getItems(); 
            
	}   
		
	elgg_register_event_handler('init','system','feeds_init');
	elgg_register_event_handler('pagesetup','system','feeds_pagesetup');
		
		// Register actions
	global $CONFIG;
	elgg_register_action("feeds/delete",false,$CONFIG->pluginspath . "feeds/actions/delete.php");
	elgg_register_action("feeds/add",false,$CONFIG->pluginspath . "feeds/actions/add.php");

?>
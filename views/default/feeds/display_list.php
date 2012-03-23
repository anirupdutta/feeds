<?php

	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	*/

	echo "<div id=\"feeds_list\">";

        //if it is the users feed, display the add a feed options. this variable is passed to the page
        
        if($vars['context'] == "users_own") {

?>
            <!-- display add a feed link if logged in -->
<?php
            if(isloggedin()){
?>
                <div id="open_feed_form">
                    <a href="javascript:void(0);" class='add_feed'><?php echo elgg_echo("feeds:addfeed"); ?></a>
                </div>
<?php
            }
?>

            <div id="add_new_feed">

            <!-- add a new feed -->
            <form action="<?php echo $vars['url']; ?>action/feeds/add" method="post">
            <?php echo elgg_view('input/securitytoken'); ?>
            <p><label><?php echo elgg_echo("feeds:url"); ?><br />
            <input type="text" id="add_feed_url" name="feed_url" value="" /></label></p>

            <!-- add a feed title -->
            <p>
            <label><?php echo elgg_echo("feeds:title"); ?><br />
            <input type="text" id="add_feed_title" name="feed_title" value="" /></label>
            </p>
                
            <input type="submit" name="add_feed" id="add_feed" value="<?php echo elgg_echo("feeds:savefeed"); ?>" />
            </form>
            </div>

            <div id="feeds_delete"></div>
<?php

        } // end of the context if statement

?>

        <!-- the feed links -->

        <div id="feeds_list_title">
        <b><?php echo elgg_echo("feeds:list"); ?></b>
        </div>
        <div id="feeds">
<?php

        //if there are feed links, display them
        if($vars['entity']){

            echo "<ul>";
            foreach($vars['entity'] as $f){

                echo "<li class=\"feed_item\">";
                echo "<a href=\"javascript:void(0);\" class=\"feed_button\" name=\"feed_url\" value=\"" . $f->title . "\" alt=\"" . $f->title . "\" title=\"" . $f->description . "\"/>{$f->title}</a>";
                if($f->canEdit())
                    echo " <a href=\"javascript:void(0);\" class=\"delete_feed\" name=\"delete_feed\" title=\"{$f->guid}\">delete</a>";

                echo "</li>";

            }

            echo "</ul>";
        } else {

            echo elgg_echo('feeds:nofeeds') . ".";

        }

?>
        </div>
        <!-- end feeds list div -->


<?php

	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	*/


	//set the welcome message depending on whether it is your feeds, friends or site.
	$page_viewed = $vars['context'];
	if($page_viewed == "users_own"){
            $message = elgg_echo('feeds:welcome');
        }
        elseif($page_viewed == "friends"){
            $message = elgg_echo('feeds:friendswelcome');
        }else {
            $message = elgg_echo('feeds:sitewelcome');
        }

        // Obtain configuration settings for this plugin
        $settings = find_plugin_settings("feeds");
?>

<!-- Obtain the Google Reader code -->
<script type="text/javascript" src="http://www.google.com/jsapi?key=<?php echo $settings->api_key; ?>"></script>

<!-- load it on to the page -->
<script type="text/javascript">
    google.load("feeds", "1");
</script>

<!-- a little style -->
<style type="text/css">
  /**
   * Set a very small font size for the control and constrain
   * it's width to 225px
   *
   * Note: the page has a single FeedControl that
   * is drawn in the <div> element whose id is "feedControl".
   */
  #feedControl {
    width : 470px;
  }

  /**
   * Suppress everything except for title
   */

  #feedControl .gf-author,
  #feedControl .gf-spacer {
    /* display : none; */
  }

  /**
   * 1em Padding at the bottom of each collection of entries
   */
  #feedControl .gfc-results {
    padding-bottom : 1em;
  }

  /**
   * no padding between entries
   */
  #feedControl .gfc-result {
    margin-bottom : 10px;
  }

  /**
   * Use a larger font size for section titles
   */
  #feedControl .gfc-resultsHeader {
    font-size : 110%;
  }

  .feed_button {
      border:none;
      border-bottom:0px solid #ccc;
      background:none;
      cursor:pointer;
      width:150px;
      text-align:left;
  }

  .feed_button:hover {
      background:#efefef;
  }

  .delete_feed a {
      cursor:pointer;
  }

  #add_new_feed {
      display:none;
  }

  li.feed_item {
      border-bottom:1px solid #efefef;
      margin:4px 0 4px 0;
  }

</style>

<script>
    
//jquery to grab and display the feeds

$(document).ready(function(){

    //function to clear the current status
    $(".feed_button").click(function() {

        var title = $(this).attr('alt'); //get the rss feed name
        var url = $(this).attr('title'); // a hack to grab the rss feed, it is stored in the input title field

        //create a new instance
        var newFeed = new google.feeds.FeedControl();

        // add a feed
        newFeed.addFeed(url, title);

        //set the number to display
        newFeed.setNumEntries(30);

        //cause the feed link to open in a new window
        newFeed.setLinkTarget(google.feeds.LINK_TARGET_BLANK);

        //draw to page
        newFeed.draw(document.getElementById("displayFeeds"),
          {
            drawMode : google.feeds.FeedControl // this give the feed a tab, it can be removed
          });

    });

    //delete a feed, code changes by Sam Rowley & Ray Reid.
    $(".delete_feed").click(function(){

       var answer = confirm('<?php echo elgg_echo('feeds:suredelete'); ?>'); //show confirmation

       if(answer==true){ //if ok is pressed

            var feed_id = $(this).attr('title');

            //pass the feed guid to the delete file.

            $.post('<?php echo elgg_add_action_tokens_to_url("{$vars['url']}action/feeds/delete"); ?>', {feed_guid:feed_id}); //end
            //$.post("<?php echo $vars['url']; ?>action/feeds/delete", {feed_guid:feed_id}); //command that used to delete an rss in 1.6

            $(this.parentNode).remove();

        }


        return false;

    });

    // click function to toggle add field panel
    $('a.add_feed').click(function () {
        $('div#add_new_feed').slideToggle("medium");
            return false;
    });

});

</script>

<!-- display the feeds -->

<div id="displayFeeds">
    <?php echo $message; ?>
</div>

<div class="clearfloat"></div>
<?php

	/**
	 * This simple plugin allows users to view rss and atom feeds in Elgg.
	 * 
	 * @package ElggFeeds
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author anirupdutta <anirupdutta@live.com>
	 * @copyright anirupdutta 2012
	*/

?>


/**
   * Set a very small font size for the control and constrain
   * it's width to 225px
   *
   * Note: the page has a single FeedControl that
   * is drawn in the <div> element whose id is "feedControl".
   */

.reset,.reset div,.reset dl,.reset dt,.reset dd,.reset ul,.reset ol,.reset li,.reset h1,.reset h2,.reset h3,.reset h4,.reset h5,.reset h6,.reset pre,.reset form,.reset fieldset,.reset input,.reset textarea,.reset p,.reset blockquote,.reset th,.reset td
{margin:0;padding:0;}

.reset table
{border-collapse:collapse;border-spacing:0;}

.reset fieldset,.reset img
{border:0;}

.reset address,.reset caption,.reset cite,.reset code,.reset dfn,.reset em,.reset strong,.reset th,.reset var
{font-style:normal;font-weight:normal;}

.reset ol,.reset ul
{list-style:none;}

.reset caption,.reset th
{text-align:left;}

.reset h1,.reset h2,.reset h3,.reset h4,.reset h5,.reset h6
{font-size:100%;font-weight:normal;}

.reset q:before,.reset q:after
{content:'';}

.reset abbr,.reset acronym
{border:0;}


/* individual feeds title */
#displayFeeds .gfc-resultsHeader {
	border-bottom:1px solid #cccccc;
	padding-bottom:4px;
   margin-bottom:10px;
	width:100%;
}
#displayFeeds {

   padding: 10px;
}

#content_area_user_titles h2 {
   font-size:1.35em;
   line-height:1.2em;
   margin:0 0 0 8px;
   padding:5px 0px 0px 0px;
}

/* post title */
.gf-result .gf-title {
   -moz-border-radius-topleft:8px;
   -moz-border-radius-topright:8px;
   background:white none repeat scroll 0 0;
   padding:5px 0 0 3px;
   font-size : 1.0em;
	font-weight: bold;
}

.gf-author {
   color: #000000 !important;
   display : block !important;
   background:white none repeat scroll 0 0;
   padding:3px 5px 5px 5px;
   font-size : 1.0em;
   font-weight: normal;
}

.gf-spacer {
   color: #000000 !important;
   display : none !important;
   background:white none repeat scroll 0 0;
   padding:3px 5px 5px 5px;
   font-size : 1.0em;
   font-weight: normal;
}

.gf-relativePublishedDate {
  background:white;
  color: #000000 !important;
  display : block !important;
  padding:3px 0px 0px 5px;
  font-size : 70%;
  }

.gf-result .gf-snippet {
   -moz-border-radius-bottomleft:8px;
   -moz-border-radius-bottomright:8px;
   background:white none repeat scroll 0 0;
   padding:3px 5px 5px 5px;
   font-size : 1.0em;
   font-weight: normal;
}

.gfc-title {
   color: #000000 !important;
   font-size : 1.0em;
   font-weight: bold;
}

.gf-author {
   background:white none repeat scroll 0 0;
   padding:3px 5px 5px 5px;
   font-size : 1.0em;
   font-weight: normal;
}

/* sidebar list */

.add_feed {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#000000;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	padding: 2px 6px 2px 6px;
	margin:20px 0 10px 0;
	cursor: pointer;
}

.add_feed:hover {
	background: #8b000b;
	color: #ffffff;
	text-decoration: none;
}

a.add_feed {
    margin: 10px 0 0 7px;
}

#open_feed_form {
    margin:10px 0 0 0;
}

#feeds_delete {
	height:10px;
}

#feeds ul {
   margin: 7px;
	padding: 0;
	border-top:1px solid #cccccc;
}

#feeds li.feed_item {
  border-bottom:1px solid #cccccc;
  padding:2px;
  margin:0;
  list-style:none;
}

#feeds .feed_button {
  cursor:pointer;
  text-align:left;
  padding:0 6px 0 0;
}

#feeds .feed_button:hover {
  /* background:#efefef;*/
}

#feeds .delete_feed {
  cursor:pointer;
  color:#999999;
  font-size: 90%;
}

#add_new_feed {
  display:none;
  margin:20px 0 0 0;
}
.feed_item:hover {
	background:#efefef;
	text-decoration:none;
}

#add_new_feed input {
    padding:3px 0;
    width:188px;
}

#feeds_list {

}

#feeds_list_title {
    padding:0px 0px 0px 7px;
}

#feeds {
    padding:1px;
}

#add_new_feed form {
    padding:10px;
}

#label {
   color:#000000;
   font-size:100%;
   font-weight:bold;
}
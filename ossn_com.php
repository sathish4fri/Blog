<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
define('BLOG', ossn_route()->com . 'Blog/');

require_once(BLOG . 'classes/Blog.php');

function blog_init() {
		if(ossn_isLoggedin()) {
				ossn_register_action('blog/add', BLOG . 'actions/add.php');
				ossn_register_action('blog/edit', BLOG . 'actions/edit.php');
				ossn_register_action('blog/delete', BLOG . 'actions/delete.php');
		}
		ossn_register_callback('page', 'load:search', 'ossn_blpg_search_link');
		ossn_register_callback('user', 'delete', 'ossn_user_blog_delete');
}
function ossn_blpg_search_link() {
		return;
}
function ossn_user_blog_delete() {
		return;
}
ossn_register_callback('ossn', 'init', 'blog_init');

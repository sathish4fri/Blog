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
class Blog extends OssnObject {
		/**
		 * InitializeAttributes;
		 *
		 * return void;
		 */
		private function initializeAttributes() {
				$this->annontation = new OssnAnnotaions;
		}
		/**
		 * Add blog;
		 *
		 * @param string $title A title for blog
		 * @param string $descriptionn A body/contents for blog
		 *
		 * return boolean;
		 */
		public function addBlog($title = '', $description = '') {
				$user = ossn_loggedin_user();
				if(!empty($title) && !empty($description) && $user) {
						$this->title       = $title;
						$this->description = $description;
						$this->type        = 'user';
						$this->subtype     = 'blog';
						$this->owner_guid  = $user->guid;
						if($this->addObject()) {
								return true;
						}
				}
				return false;
		}
		/**
		 * Get a blog by blog id;
		 *
		 * @param integer $guid A valid blog id
		 *
		 * return object|false;
		 */
		public function getBlog($guid = '') {
				if(!empty($guid)) {
						$this->object_guid = $guid;
						$blog              = $this->getObjectById();
						if($blog) {
								return $blog;
						}
				}
				return false;
		}
		/**
		 * Get all site blogs
		 *
		 * return object|false;
		 */
		public function getBlogs() {
				$this->type    = 'user';
				$this->subtype = 'blog';
				$blogs         = $this->getObjectsByTypes();
				if($blogs) {
						return $blogs;
				}
				return false;
		}
		/**
		 * Get user blogs
		 *
		 * @param object $user A valid users
		 *
		 * return object|false;
		 */
		public function getUserBlogs($user) {
				if($user instanceof OssnUser) {
						$this->type       = 'user';
						$this->subtype    = 'blog';
						$this->owner_guid = $user->guid;
						$blogs            = $this->getObjectByOwner();
						if($blogs) {
								return $blogs;
						}
				}
				return false;
		}
} //class
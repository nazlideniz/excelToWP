
<?php
/*
* @package excelToWP
*/
/*
Plugin name: excelToWP
Plugin URI: https://github.com/nazlideniz/excelToWP.git
Description: Create wp pages easily from excel file
Version: 1.0.0
Author: Nazli Deniz Uzuner
License: GPLv2 or later
Text Domain: excelToWP
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined('ABSPATH') or die('Access to file : DENİED');

class ExcelToWP
{

  function register(){
     add_action('admin_enqueue_scripts', array ( $this, 'enqueue' ) );

     add_action( 'admin_menu', array( $this, 'add_admin_pages') );
   }

   public function add_admib_pages() {
     add_menu_page( 'excelToWP Plugin', MENU, 'manage_options',
                        'excelToWP_plugin', array( $this, admin_index), '', null);

   }

   public function admin_index() {
     //requires html
     require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
     
   }

   function activate(){
     require_once plugin_dir_path(__FILE__) . 'inc/excelToWPActivate.php';
     excelToWPActivate::activate();
   }

   function deactivate(){
     require_once plugin_dir_path(__FILE__) . 'inc/excelToWPDeactivate.php';
     excelToWPDectivate::deactivate();
   }
   protected function create_post_type(){
     add_action( 'init', array( $this, 'custom_post_type'));
   }

   function custom_post_type(){
     register_post_type('book', ['public' => 'true', 'ExcelToWP'] );
   }

   function enqueue(){
     //enqueue all our scripts
     wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__) );
     wp_enqueue_script('mypluginscript', plugins_url('/assets/mystyle.css', __FILE__) );

   }
}

if( class_exists('ExcelToWP') ){
  $excelToWP = new ExcelToWP();
  $excelToWP->register();

}

//activation
require_once plugin_dir_path(__FILE__) . 'inc/excelToWPActivate.php';
register_activation_hook(__FILE__, array('excelToWPActivate' , 'activate'));

//deactivation
require_once plugin_dir_path(__FILE__) . 'inc/excelToWPDeactivate.php';
register_deactivation_hook(__FILE__, array('excelToWPDeactivate' , 'deactivate'));

//uninstall

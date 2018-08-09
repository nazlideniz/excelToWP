<?php
/*
* @package excelToWPA
*/


class excelToWPActivate
{
  /**
   * Dectivates the plugin on wp
   */
  public static function deactivate(){
    flush_rewrite_rules();
  }
}

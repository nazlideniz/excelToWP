<?php
/*
* @package excelToWPA
*/


class excelToWPActivate
{
  /**
   * Activates the plugin on wp
   */
  public static function activate(){
    flush_rewrite_rules();
  }
}

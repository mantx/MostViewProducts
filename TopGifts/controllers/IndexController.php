<?php

/**
 * Magento Custom Module
 * To display the top 100 most viewed gifts on a single, responsive page
 *
 * @category    TF
 * @package     TF_TopGifts
 * @copyright   
 * @license     Free Distribution
 */
 
 /**
 * Index controller
 *
 * @version    1.0
 * @author     Shawn Wang (shawn.wang.uk@gmail.com)
 */
class TF_TopGifts_IndexController extends Mage_Core_Controller_Front_Action {        
   /**
   * index action 
   */
   public function indexAction() {
      $this->loadLayout()->renderLayout();
   }

   /**
   * list action 
   */
   public function listAction() {
      $this->loadLayout()->renderLayout();
   }

   /**
   * grid action 
   */
   public function gridAction() {
      $this->loadLayout()->renderLayout();
   }

   /**
   * default action and using catalog default render
   */
   public function defaultrenderAction() {
      $this->loadLayout()->renderLayout();
   }
   
}

?>

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
 * TopGists Block List
 *
 * @version    1.0
 * @author     Shawn Wang (shawn.wang.uk@gmail.com)
 */
class TF_TopGifts_Block_List extends Mage_Core_Block_Template {
  /**
   * construct 
   *
   * @param void
   * @return void
   */
  public function __construct(){
    parent::__construct();
    $storeId    = Mage::app()->getStore()->getId();
    
    //get product collection
    //refer to the class of Mage_Adminhtml_Block_Dashboard_Tab_Products_Viewed
    $products = Mage::getResourceModel('reports/product_collection')
        ->addOrderedQty()
        ->addAttributeToSelect(array('name', 'price', 'views', 'thumbnail','small_image'))
        ->setStoreId($storeId)
        ->addStoreFilter($storeId)
        ->addViewsCount();
    
    Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
    Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);

    $products->setPageSize(100)->setCurPage(1);
    $this->setProductCollection($products);
   }
   
   private function __test() {
     $product = new Mage_Reports_Model_Resource_Product_Collection();
     //$product->add
   }
} 
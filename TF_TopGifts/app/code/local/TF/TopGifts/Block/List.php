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
class TF_TopGifts_Block_List extends Mage_Catalog_Block_Product_List {
  /**
   * override  _getProductCollection
   *
   * @param void
   * @return Mage_Reports_Model_Resource_Product_Collection
   */
  protected function _getProductCollection() {
    if (is_null($this->_productCollection)) {
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

      //set limit of record to 100
      $products->setPageSize(100);
      $this->_productCollection = $products;
    }
    return $this->_productCollection;
  }

   /**
   * render a child view template
   *
   * @param void
   * @return the rendering html code
   */
  public function renderChildView($template)
  {
    if ($template == '') $template = $this->getTemplate();
    
    $this->setScriptPath(Mage::getBaseDir('design'));
    $params = array('_relative'=>true);
    $area = $this->getArea();
    if ($area) {
      $params['_area'] = $area;
    }
    
    $templateName = Mage::getDesign()->getTemplateFilename($template, $params);
    $html = $this->fetchView($templateName);
    return $html;
  }
} 
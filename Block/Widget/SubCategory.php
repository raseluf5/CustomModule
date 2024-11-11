<?php 
namespace Rasel\CustomModule\Block\Widget;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\UrlInterface;




class SubCategory extends Template implements BlockInterface
{
    protected $_template="widget/sub-category.phtml";

    protected $_categoryHelper;
    protected $_storeManager;
    protected $categoryRepository;
    protected $_categoryFactory;
    protected $urlBuilder;

    
    
    public function __construct(
        Context $context, 
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        UrlInterface $urlBuilder
       
    ) {
        parent::__construct($context);
        
        $this->_categoryHelper = $categoryHelper;
        $this->_storeManager = $storeManager;
        $this->categoryRepository = $categoryRepository;
        $this->_categoryFactory = $categoryFactory;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Return categories helper
     */   
    public function getCategoryHelper()
    {
        return $this->_categoryHelper;
    }

    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getCode();
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function getSubCategory($parentCategory){
        $categoryObj = $this->categoryRepository->get($parentCategory);
        $subcategories = $categoryObj->getChildrenCategories();

        return $subcategories;
    }


    public function getCategoryImage($categoryId)
    {
        $categoryIdElements = explode('-', $categoryId);
        $category           = $this->categoryRepository->get(end($categoryIdElements));
        $categoryImage       = $category->getImageUrl();

        
        return $categoryImage;
    }


}
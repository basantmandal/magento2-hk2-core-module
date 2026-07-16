<?php

declare(strict_types=1);

namespace HK2\Core\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ModuleHeader extends Field
{
    /**
     * @var string
     */
    protected $_template = 'HK2_Core::system/config/module_header.phtml';

    /**
     * Returns Logo Url
     *
     * @return string
     */
    public function getLogoUrl(): string
    {
        return 'https://www.basantmandal.in/assets/logo/1x/magento_modules_logo.png';
    }

    /**
     * Returns Website Url
     *
     * @return string
     */
    public function getWebsiteUrl(): string
    {
        return 'https://www.basantmandal.in';
    }

    /**
     * Returns LinkedIn Url
     *
     * @return string
     */
    public function getLinkedInUrl(): string
    {
        return 'https://www.linkedin.com/in/basant-mandal/';
    }

    /**
     * Returns Support Url
     *
     * @return string
     */
    public function getSupportUrl(): string
    {
        return 'https://www.basantmandal.in/support';
    }

    /**
     * Returns Donate Url
     *
     * @return string
     */
    public function getDonateUrl(): string
    {
        return 'https://www.basantmandal.in/donate';
    }

    /**
     * Loads HTML
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        return $this->_toHtml();
    }
}

<?php
namespace Concrete\Package\Webshop;

defined('C5_EXECUTE') or die('Access Denied.');
use Package;
use SinglePage;
use Route;

class Controller extends Package
{
    protected $pkgHandle = 'webshop';
    protected $appVersionRequired = '8.1.0';
    protected $pkgVersion = '1.0';

    public function on_start()
    {
        Route::register('/webshop/dialog', '\Concrete\Package\Webshop\Controller\Dialog\Dialog::view');
    }

    public function getPackageDescription()
    {
        return t('Description');
    }

    public function getPackageName()
    {
        return t('Document name');
    }

    public function install()
    {
        $pkg = parent::install();
        $this->install_single_pages($pkg);
    }

    function install_single_pages($pkg)
    {
        $directoryDefault = SinglePage::add('/dashboard/webshop/products', $pkg);
        $directoryDefault->update(array('cName' => t('WebShop'), 'cDescription' => t('WebShop')));
    }

    public function uninstall()
    {
        $pkg = parent::uninstall();
    }


}
<?php
namespace Concrete\Package\WebShop;

defined('C5_EXECUTE') or die('Access Denied.');

//use \Concrete\Core\Package\Package;
use Package;


class Controller extends Package
{
    protected $pkgHandle = 'web_shop';
    protected $appVersionRequired = '8.1.0';
    protected $pkgVersion = '1.0';

    public function getPackageDescription()
    {
        return t('Adds single page for products');
    }

    public function getPackageName()
    {
        return t('Prodcuts page');
    }

    public function install()
    {
        $pkg = parent::install();
        $this->install_single_pages($pkg);
    }

    function install_single_pages($pkg)
    {
        $directoryDefault = SinglePage::add('/dashboard/web_shop/', $pkg);
        $directoryDefault->update(array('cName' => t('Sample Package'), 'cDescription' => t('Sample Package')));
    }

    public function uninstall()
    {
        $pkg = parent::uninstall();
    }
}
<?php

namespace Concrete\Package\Webshop\Controller\SinglePage\Dashboard\Webshop;

use Concrete\Core\Page\Controller\DashboardPageController;
use Loader;
use Exception;
use Route;
use Core;
use File;
use Zend\Mail\Transport\Null;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Products extends DashboardPageController
{
    public function view()
    {
        $db = \Database::connection();

        $products = $db->getAll('SELECT * FROM products');
        $this->set('products', isset($products) ? $products : '');
    }

    public function edit($id = null)
    {

        $db = \Database::connection();

        $products = $db->getAll('SELECT * FROM products');
        $editProduct = $db->fetchAssoc('SELECT * FROM products WHERE id = ?', [$id]);


        if ($editProduct['fID'] && ($file = \File::getByID($editProduct['fID']))) {
            $path = $file->getRelativePath();
        }

        $this->set('editImgPath', isset($path) ? $path : '');

        $this->set('editProduct', $editProduct);
        $this->set('products', $products);

    }

    public function saveFormData($id = null)
    {
        $db = \Database::connection();

        $products = $db->getAll('SELECT * FROM products');
        $this->set('products', $products);

      /* if (isset($_FILES['image'])) {

           $file = $_FILES['image']['tmp_name'];
           $filename = $_FILES['image']['name'];
           $importer = new \Concrete\Core\File\Importer();

           $result = $importer->import($file, $filename);
       }*/

        $name = (string) $this->app->make('helper/security')->sanitizeString($this->request('name'));
        $description = (string) $this->app->make('helper/security')->sanitizeString($this->request('description'));
        $price = (string) $this->app->make('helper/security')->sanitizeString($this->request('price'));


        if ($name == '') {
            $this->error->add(t('Name must be introduced.'));
        }
        if ($description == '') {
            $this->error->add(t('Description must be introduced.'));
        }
        if ($price == '') {
            $this->error->add(t('Price must be introduced.'));
        }

        if (!$this->error->has()) {

            if ($id) {
                $data = array(
                    'name' => $this->post('name'),
                    'description' => $this->post('description'),
                    'price' => $this->post('price'),
                    'fID' =>  $this->post('fID')
                );
                $db->update('products', $data, array('id' => $id));
            } else {
                $db->Execute(
                    'INSERT INTO products(name, description, price, fID) VALUES(?, ?, ?, ?)',
                    array(
                        $this->post('name'),
                        $this->post('description'),
                        $this->post('price'),
                        $this->post('fID')
                    )
                );
            }

            $this->redirect('dashboard/webshop/products');
        }

    }

    public function delete($id)
    {
        $db = \Database::connection();

        $db->query('delete from products where id = ?', [$id]);

        $this->redirect('dashboard/webshop/products');
    }


}

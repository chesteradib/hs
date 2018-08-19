<?php
if(!defined('_PS_VERSION_'))
{
    exit;
}


class Hs_Customfields extends Module
{

    public function __construct()
    {
        $this->name = 'hs_customfields';
        $this->version = '1.0.0';
        $this->author = 'hifi-store.com';
        $this->tab = 'administration';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->description = $this->trans('Add custom fields to product page in back office', array(), 'Modules.Hs_Customfields.Admin');
        $this->displayName = $this->trans('HS Custom Fields', array(), 'Modules.Hs_Customfields.Admin');
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', array(), 'Modules.Hs_Customfields.Admin');
    }


    public function install()
    {
        if(!parent::install()
            || !$this->registerHook('displayAdminProductsMainStepLeftColumnBottom')
            || !$this->registerHook('actionProductUpdate')
            || !$this->registerHook('actionAdminControllerSetMedia')
            || !$this->updateDatabaseSchema('create')
        )
        {
            return false;
        }


        return true;

    }

    public function uninstall()
    {
        return(parent::uninstall() &&  $this->updateDatabaseSchema('delete'));

    }

    private function updateDatabaseSchema($action)
    {
        switch($action)
        {
            case 'create':
                $sql = "ALTER TABLE "._DB_PREFIX_."product ADD COLUMN year_of_construction INTEGER";
                break;

            case 'delete':
                $sql = "ALTER TABLE "._DB_PREFIX_."product DROP COLUMN year_of_construction";
                break;
        }

        return Db::getInstance()->execute($sql);
    }

    public function hookDisplayAdminProductsMainStepLeftColumnBottom($params)
    {

        $product = new Product($params['id_product']);

        if (Validate::isLoadedObject($product)) {
            $this->context->smarty->assign(array(
                    'year_of_construction' => (int)$this->getCustomField($params['id_product'])
                )
            );

            return $this->display(__FILE__, 'views/templates/admin/year_of_construction.tpl');
        }

    }

    public function hookActionAdminControllerSetMedia($params)
    {
        if ($this->context->controller->controller_name == 'AdminProducts') {
            $this->context->controller->addJS($this->_path.'views/js/datepicker.js','all');

        }
    }

    public function hookActionProductUpdate($params)
    {
dump($params);
    }
    public function getCustomField($id_product)
    {

        $sql = "SELECT year_of_construction FROM "._DB_PREFIX_."product WHERE id_product = " . (int)$id_product;
        $result = Db::getInstance()->ExecuteS($sql);
        if(!$result)
            return array();

        foreach ($result as $field) {
            $fields[$field['id_lang']] = $field['custom_field'];
        }

        return $result[0]['year_of_construction'];
    }
}
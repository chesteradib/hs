<?php
if(!defined('_PS_VERSION_'))
{
    exit;
}


class Hs_Customproductpage extends Module
{

    public function __construct()
    {
        $this->name = 'hs_customproductpage';
        $this->version = '1.0.0';
        $this->author = 'hifi-store.com';
        $this->tab = 'administration';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->description = $this->trans('Customize the porduct page by hiding unnecessary elements', array(), 'Modules.Hs_Customproductpage.Admin');
        $this->displayName = $this->trans('HS Custom Product Page', array(), 'Modules.Hs_Customproductpage.Admin');
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', array(), 'Modules.Hs_Customproductpage.Admin');
    }


    public function install()
    {
        if(!parent::install() || !$this->registerHook('actionAdminControllerSetMedia'))
        {
            return false;
        }
        return true;

    }

    public function hookActionAdminControllerSetMedia($params)
    {
        $this->context->controller->addCSS($this->_path.'views/css/module.css', 'all');
        $this->context->controller->addJS($this->_path.'views/js/module.js', 'all');

    }

    public function uninstall()
    {
        return(parent::uninstall());

    }
}
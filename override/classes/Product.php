<?php
/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    Hennes Hervé <contact@h-hennes.fr>
 *  @copyright 2013-2016 Hennes Hervé
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  http://www.h-hennes.fr/blog/
 */
class Product extends ProductCore {
    
    /*
    * module: hs_customfields
    * date: 2018-08-19 18:59:57
    * version: 1.0.0
    */
    public $year_of_construction;
    
    /*
    * module: hs_customfields
    * date: 2018-08-19 18:59:57
    * version: 1.0.0
    */
    public function __construct($id_product = null, $full = false, $id_lang = null, $id_shop = null, \Context $context = null) {
        self::$definition['fields']['year_of_construction'] = [
            'type' => self::TYPE_INT,
            'required' => false, 'size' => 255
        ];
        parent::__construct($id_product, $full, $id_lang, $id_shop, $context);
    }
}

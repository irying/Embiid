<?php
/**
 *
 * @link http://www.drunkrain.com/
 * @copyright Copyright &copy; 2008-2016 IBOS Inc
 * @package App\Services\Container)
 * @version $Id: Superman.php 2016/10/15 7:56 $
 * @author php_lxy
 * @date: 2016/10/15 7:56
 */


namespace App\Services\Container;


class Superman
{
    protected $module;
    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }

    public function show(){
        $this->module->activate();
    }
}
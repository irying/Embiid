<?php
/**
 *
 * @link http://www.drunkrain.com/
 * @copyright Copyright &copy; 2008-2016 IBOS Inc
 * @package App\Services\Container)
 * @version $Id: SuperModuleInterface.php 2016/10/15 7:58 $
 * @author php_lxy
 * @date: 2016/10/15 7:58
 */

interface SuperModuleInterface
{
    /**
     * 超能力激活方法
     *
     * 任何一个超能力都得有该方法，并拥有一个参数
     *@param array $target 针对目标，可以是一个或多个，自己或他人
     */
    public function activate(array $target);
}
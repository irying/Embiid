<?php
/**
 *
 * @link http://www.drunkrain.com/
 * @copyright Copyright &copy; 2008-2016 IBOS Inc
 * @package App\Services\Container)
 * @version $Id: XPower.php 2016/10/15 8:02 $
 * @author php_lxy
 * @date: 2016/10/15 8:02
 */


namespace App\Services\Container;


class XPower implements SuperModuleInterface
{
    public function activate()
    {
        echo "do you like x-power?<br>";
    }
}
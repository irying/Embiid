<?php
/**
 *
 * @link http://www.drunkrain.com/
 * @copyright Copyright &copy; 2008-2016 IBOS Inc
 * @package App\Services\Container)
 * @version $Id: Fly.php 2016/10/15 8:03 $
 * @author php_lxy
 * @date: 2016/10/15 8:03
 */


namespace App\Services\Container;


class Fly implements SuperModuleInterface
{
    public function activate()
    {
        echo "i can fly<br>";
    }
}
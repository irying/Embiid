<?php
/**
 *
 * @link http://www.drunkrain.com/
 * @copyright Copyright &copy; 2008-2016 IBOS Inc
 * @package App\Http\Controllers)
 * @version $Id: FightController.php 2016/10/15 8:06 $
 * @author php_lxy
 * @date: 2016/10/15 8:06
 */


namespace App\Http\Controllers;


use App\Services\Container\Container;
use App\Services\Container\Fly;
use App\Services\Container\Superman;
use App\Services\Container\XPower;

class FightController extends Controller
{
    public function index(){
        $container = new Container();
        // 向该 超级工厂添加超人的生产脚本
        $container->bind('superman', function($container, $moduleName) {
            return new Superman($container->make($moduleName));
        });
        // 向该 超级工厂添加超能力模组的生产脚本
        $container->bind('xpower', function($container) {
            return new XPower;
        });
        // 同上
        $container->bind('fly', function($container) {
            return new Fly;
        });
        $superman_1 = $container->make('superman', ['xpower']);
        $superman_2 = $container->make('superman', ['fly']);
        $superman_1->show();
//       echo $superman_1;

    }

}
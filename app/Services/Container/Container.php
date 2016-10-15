<?php
/**
 *
 * @link http://www.drunkrain.com/
 * @copyright Copyright &copy; 2008-2016 IBOS Inc
 * @package app\Services\Container)
 * @version $Id: Container.php 2016/10/15 7:50 $
 * @author php_lxy
 * @date: 2016/10/15 7:50
 */


namespace App\Services\Container;



class Container
{
    protected $bind;
    protected $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);

        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 17-12-14
 * Time: 下午8:43
 */

namespace App\Providers\Mitu;


class Serve
{

    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    public function __construct()
    {

    }

    public function hello()
    {
        return __DIR__ ;
    }

}
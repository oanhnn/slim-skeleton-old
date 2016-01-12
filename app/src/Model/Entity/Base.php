<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Model\Entity;

use Doctrine\Common\Util\Inflector;

/**
 * Base model entity
 */
class Base
{

    /**
     * Magic set
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $property = Inflector::camelize($name);
        $method = 'set' . ucfirst($property);

        if (method_exists($this, $method)) {
            $this->{$method}($value);
        } elseif (property_exists($this, $property)) {
            $this->{$property} = $value;
        }
    }

    /**
     * Magic get
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $property = Inflector::camelize($name);
        $method = 'get' . ucfirst($property);

        if (method_exists($this, $method)) {
            return $this->{$method}();
        } elseif (property_exists($this, $property)) {
            return $this->{$property};
        }
    }

}
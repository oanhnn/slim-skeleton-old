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

class Order extends Base
{

    /**
     * @var string
     */
    public $orderId;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $message;

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @param string $time
     */
    public function setCreatedAt($time = null)
    {
        if ($time) {
            $this->createdAt = new \DateTime($time);
        }
    }
}

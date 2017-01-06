<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampTrait;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table("users")
 */
class User extends BaseUser
{
    use TimestampTrait;

    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
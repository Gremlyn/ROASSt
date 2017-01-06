<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampTrait;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table("oauth2_clients")
 */
class Client extends BaseClient
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
     * Client constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
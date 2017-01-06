<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampTrait;
use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * Access Token
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table("oauth2_access_tokens")
 */
class AccessToken extends BaseAccessToken
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
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $user;
}
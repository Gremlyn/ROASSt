<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampTrait;
use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * Refresh Token
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table("oauth2_refresh_tokens")
 */
class RefreshToken extends BaseRefreshToken
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
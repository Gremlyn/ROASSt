<?php

namespace AppBundle\Fixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAdmin implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $clientManager = $this->container->get('fos_oauth_server.client_manager.default');
        $userManager = $this->container->get('fos_user.user_manager');

        $api_client = $clientManager->createClient();
        $api_client->setName('API Client');
        $api_client->setRedirectUris(['localhost']);
        $api_client->setAllowedGrantTypes(
            [
                #'authorization_code',
                'client_credentials',
                #'password',
                #'refresh_token',
                #'token'
            ]
        );

        $clientManager->updateClient($api_client);

        $app_client = $clientManager->createClient();
        $app_client->setName('App Client');
        $app_client->setRedirectUris(['localhost']);
        $app_client->setAllowedGrantTypes(
            [
                'authorization_code',
                #'client_credentials',
                #'password',
                #'refresh_token',
                #'token'
            ]
        );

        $clientManager->updateClient($app_client);

        $admin = $userManager->createUser();
        $admin->setEmail('admin@example.com')
              ->setPlainPassword('test1234')
              ->setEnabled(TRUE)
              ->setRoles(['ROLE_ADMIN']);

        $userManager->updateUser($admin);
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = NULL)
    {
        $this->container = $container;
    }
}
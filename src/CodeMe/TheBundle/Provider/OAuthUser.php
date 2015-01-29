<?php
namespace CodeMe\TheBundle\Provider;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser as HWIOAuthUser;
use Symfony\Component\HttpFoundation\ParameterBag;
use CodeMe\TheBundle\Entity\User;

/***
 * Class OAuthUser
 * @package CodeMe\TheBundle\Provider
 *
 * This is app.user
 */
class OAuthUser extends HWIOAuthUser{

    /***
     * @var bool
     */
    public $isAdmin;

    /***
     * @var User
     */
    public $user;

    /***
     * @param string $username
     * @param bool $isAdmin
     */
    public function __construct($username, User $user, $isAdmin)
    {
        $this->user = $user;
        $this->isAdmin = $isAdmin;
        parent::__construct($username);
    }

    public function getUser() {
        return $this->user;
    }

    /***
     * @return array|\Symfony\Component\Security\Core\Role\Role[]
     */
    public function getRoles()
    {
        $roles = array('ROLE_USER', 'ROLE_OAUTH_USER');

        if ($this->isAdmin) {
            array_push($roles, 'ROLE_SUPER_ADMIN');
        }

        return $roles;
    }
}
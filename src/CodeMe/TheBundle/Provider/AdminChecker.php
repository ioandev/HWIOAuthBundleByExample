<?php
namespace CodeMe\TheBundle\Provider;

use CodeMe\TheBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

/**
 * Class AdminChecker
 * @package CodeMe\TheBundle\Provider
 */
class AdminChecker{

    /**
     * @var Doctrine
     */
    protected $doctrine;

    /**
     * @var array
     */
    protected $admins;

    public function __construct(Doctrine $doctrine, array $admins)
    {
        $this->doctrine = $doctrine;
        $this->admins = $admins;
    }

    /***
     * @param User $user
     * @return bool
     */
    public function check(User $user)
    {
        $isIt = false;

        $isIt = $isIt || (isset($this->admins['facebook']) && in_array($user->getFid(), $this->admins['facebook']));
        $isIt = $isIt || (isset($this->admins['google']) && in_array($user->getGid(), $this->admins['google']));
        $isIt = $isIt || (isset($this->admins['live']) && in_array($user->getLid(), $this->admins['live']));
        $isIt = $isIt || (isset($this->admins['twitter']) && in_array($user->getLid(), $this->admins['twitter']));

        return $isIt;
    }
}
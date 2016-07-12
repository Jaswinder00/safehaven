<?php

namespace DCGov\HavenBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var boolean
     */
    private $isactive = '1';

    /**
     * @var \DateTime
     */
    private $createdTimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DCGov\HavenBundle\Entity\Role
     */
    private $role;


    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     *
     * @return User
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     *
     * @return User
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set role
     *
     * @param \DCGov\HavenBundle\Entity\Role $role
     *
     * @return User
     */
    public function setRole(\DCGov\HavenBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \DCGov\HavenBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }
    
	///////////////////////////////////////////////////////////////////////
	//
    //Implement Interface methods
    //
    ///////////////////////////////////////////////////////////////////////
    
    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
    	return $this->email;
    }
    
    public function getRoles()
    {
    	return array('ROLE_USER');
    }
    
    public function eraseCredentials()
    {
    }
    
    
    public function getSalt()
    {
    	// you *may* need a real salt depending on your encoder
    	// see section on salt below
    	return null;
    }
    
    public function isAccountNonExpired()
    {
    	return true;
    }
    
    public function isAccountNonLocked()
    {
    	return true;
    }
    
    public function isCredentialsNonExpired()
    {
    	return true;
    }
    
    public function isEnabled()
    {
    	return $this->isactive;
    }
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
    	return serialize(array(
    			$this->id,
    			$this->email,
    			$this->password,
    			// see section on salt below
    			// $this->salt,
    	));
    }
    
    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
    	list (
    			$this->id,
    			$this->email,
    			$this->password,
    			// see section on salt below
    			// $this->salt
    			) = unserialize($serialized);
    }
}


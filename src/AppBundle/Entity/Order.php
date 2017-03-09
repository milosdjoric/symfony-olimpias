<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="`order`")
 *
 */
class Order
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $order_id;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     */
    private $yarnWeight;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank()
     */
    private $numberOfPieces;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank()
     */
    private $spooling = false;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank()
     */
    private $tickets = false;

    /**
     * Many Orders are in One Model.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Model")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    private $model;

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumberOfPieces()
    {
        return $this->numberOfPieces;
    }

    /**
     * @param mixed $numberOfPieces
     */
    public function setNumberOfPieces($numberOfPieces)
    {
        $this->numberOfPieces = $numberOfPieces;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getSpooling()
    {
        return $this->spooling;
    }

    /**
     * @param mixed $spooling
     */
    public function setSpooling($spooling)
    {
        $this->spooling = $spooling;
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @return mixed
     */
    public function getYarnWeight()
    {
        return $this->yarnWeight;
    }

    /**
     * @param mixed $yarnWeight
     */
    public function setYarnWeight($yarnWeight)
    {
        $this->yarnWeight = $yarnWeight;
    }


}
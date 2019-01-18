<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PackageRepository")
 */
class Package
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;
    
    /**
     * @ORM\ManyToOne(targetEntity="VehicleCategories")
     * @ORM\JoinColumn(name="vehicle_categories_id", referencedColumnName="id")
     */
    private $vehicleCategories;
    
    /**
     * @ORM\ManyToOne(targetEntity="WashingType")
     * @ORM\JoinColumn(name="washing_type_id", referencedColumnName="id")
     */
    private $washingType;
    
    /**
     * @ORM\ManyToOne(targetEntity="Booking", inversedBy="packages")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="id")
     */
    private $booking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVehicleCategories(): ?VehicleCategories
    {
        return $this->vehicleCategories;
    }

    public function setVehicleCategories(?VehicleCategories $vehicleCategories): self
    {
        $this->vehicleCategories = $vehicleCategories;

        return $this;
    }

    public function getWashingType(): ?WashingType
    {
        return $this->washingType;
    }

    public function setWashingType(?WashingType $washingType): self
    {
        $this->washingType = $washingType;

        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(?Booking $booking): self
    {
        $this->booking = $booking;

        return $this;
    }
}

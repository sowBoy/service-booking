<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $appointmentTime;

    /**
     * @ORM\Column(type="float")
     */
    private $totalAmount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $distance;
    
    /**
     * @ORM\OneToOne(targetEntity="Payment", mappedBy="booking")
     */
    private $payment;
    
    /**
     * @ORM\ManyToOne(targetEntity="BookingStatus")
     * @ORM\JoinColumn(name="booking_status_id", referencedColumnName="id")
     */
    private $bookingStatus;
    
    /**
     * @ORM\ManyToOne(targetEntity="KurumaCleanerAccount", inversedBy="bookings")
     * @ORM\JoinColumn(name="kuruma_cleaner_account_id", referencedColumnName="id")
     */
    private $kurumaCleanerAccount;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserInfo", inversedBy="bookings")
     * @ORM\JoinColumn(name="user_info_id", referencedColumnName="id")
     */
    private $userInfo;
    
    /**
     * @ORM\OneToMany(targetEntity="Package", mappedBy="booking")
     */
    private $packages;
    
    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
    
    public function __construct() {
        $this->packages = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppointmentTime(): ?\DateTimeInterface
    {
        return $this->appointmentTime;
    }

    public function setAppointmentTime(?\DateTimeInterface $appointmentTime): self
    {
        $this->appointmentTime = $appointmentTime;

        return $this;
    }

    public function getTotalAmount(): ?float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(?float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

        // set (or unset) the owning side of the relation if necessary
        $newBooking = $payment === null ? null : $this;
        if ($newBooking !== $payment->getBooking()) {
            $payment->setBooking($newBooking);
        }

        return $this;
    }

    public function getBookingStatus(): ?BookingStatus
    {
        return $this->bookingStatus;
    }

    public function setBookingStatus(?BookingStatus $bookingStatus): self
    {
        $this->bookingStatus = $bookingStatus;

        return $this;
    }

    public function getKurumaCleanerAccount(): ?KurumaCleanerAccount
    {
        return $this->kurumaCleanerAccount;
    }

    public function setKurumaCleanerAccount(?KurumaCleanerAccount $kurumaCleanerAccount): self
    {
        $this->kurumaCleanerAccount = $kurumaCleanerAccount;

        return $this;
    }

    public function getUserInfo(): ?UserInfo
    {
        return $this->userInfo;
    }

    public function setUserInfo(?UserInfo $userInfo): self
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    /**
     * @return Collection|Package[]
     */
    public function getPackages(): Collection
    {
        return $this->packages;
    }

    public function addPackage(Package $package): self
    {
        if (!$this->packages->contains($package)) {
            $this->packages[] = $package;
            $package->setBooking($this);
        }

        return $this;
    }

    public function removePackage(Package $package): self
    {
        if ($this->packages->contains($package)) {
            $this->packages->removeElement($package);
            // set the owning side to null (unless already changed)
            if ($package->getBooking() === $this) {
                $package->setBooking(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}

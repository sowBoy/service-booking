<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\KurumaCleanerAccountRepository")
 */
class KurumaCleanerAccount
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $siren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identityDocNum;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accepted;
    
    /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="kurumaCleanerAccount")
     */
    private $payments;
    
    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="kurumaCleanerAccount")
     */
    private $bookings;
    
    public function __construct() {
        $this->payments = new ArrayCollection();
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getIdentityDocNum(): ?string
    {
        return $this->identityDocNum;
    }

    public function setIdentityDocNum(string $identityDocNum): self
    {
        $this->identityDocNum = $identityDocNum;

        return $this;
    }

    public function getAccepted(): ?bool
    {
        return $this->accepted;
    }

    public function setAccepted(bool $accepted): self
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments[] = $payment;
            $payment->setKurumaCleanerAccount($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->contains($payment)) {
            $this->payments->removeElement($payment);
            // set the owning side to null (unless already changed)
            if ($payment->getKurumaCleanerAccount() === $this) {
                $payment->setKurumaCleanerAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setKurumaCleanerAccount($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getKurumaCleanerAccount() === $this) {
                $booking->setKurumaCleanerAccount(null);
            }
        }

        return $this;
    }
}

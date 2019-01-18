<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 */
class Payment
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
     * @ORM\Column(type="string", length=255)
     */
    private $transactionId;
    
    /**
     * @ORM\ManyToOne(targetEntity="KurumaCleanerAccount", inversedBy="payments")
     * @ORM\JoinColumn(name="kuruma_cleaner_account_id", referencedColumnName="id")
     */
    private $kurumaCleanerAccount;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserInfo", inversedBy="payments")
     * @ORM\JoinColumn(name="user_info_id", referencedColumnName="id")
     */
    private $userInfo;
    
    /**
     * @ORM\OneToOne(targetEntity="Booking", inversedBy="payment")
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

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;

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

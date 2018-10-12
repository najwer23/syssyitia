<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkoutPushUpRepository")
 */
class WorkoutPushUp
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $minTest;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxTest;

    /**
     * @ORM\Column(type="integer")
     */
    private $levelPushUp;

    /**
     * @ORM\Column(type="integer")
     */
    private $dayPushUp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence5;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence6;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence7;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence8;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sequence9;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinTest(): ?int
    {
        return $this->minTest;
    }

    public function setMinTest(int $minTest): self
    {
        $this->minTest = $minTest;

        return $this;
    }

    public function getMaxTest(): ?int
    {
        return $this->maxTest;
    }

    public function setMaxTest(int $maxTest): self
    {
        $this->maxTest = $maxTest;

        return $this;
    }

    public function getLevelPushUp(): ?int
    {
        return $this->levelPushUp;
    }

    public function setLevelPushUp(int $levelPushUp): self
    {
        $this->levelPushUp = $levelPushUp;

        return $this;
    }

    public function getDayPushUp(): ?int
    {
        return $this->dayPushUp;
    }

    public function setDayPushUp(int $dayPushUp): self
    {
        $this->dayPushUp = $dayPushUp;

        return $this;
    }

    public function getSequence1(): ?int
    {
        return $this->sequence1;
    }

    public function setSequence1(int $sequence1): self
    {
        $this->sequence1 = $sequence1;

        return $this;
    }

    public function getSequence2(): ?int
    {
        return $this->sequence2;
    }

    public function setSequence2(int $sequence2): self
    {
        $this->sequence2 = $sequence2;

        return $this;
    }

    public function getSequence3(): ?int
    {
        return $this->sequence3;
    }

    public function setSequence3(int $sequence3): self
    {
        $this->sequence3 = $sequence3;

        return $this;
    }

    public function getSequence4(): ?int
    {
        return $this->sequence4;
    }

    public function setSequence4(int $sequence4): self
    {
        $this->sequence4 = $sequence4;

        return $this;
    }

    public function getSequence5(): ?int
    {
        return $this->sequence5;
    }

    public function setSequence5(int $sequence5): self
    {
        $this->sequence5 = $sequence5;

        return $this;
    }

    public function getSequence6(): ?int
    {
        return $this->sequence6;
    }

    public function setSequence6(int $sequence6): self
    {
        $this->sequence6 = $sequence6;

        return $this;
    }

    public function getSequence7(): ?int
    {
        return $this->sequence7;
    }

    public function setSequence7(int $sequence7): self
    {
        $this->sequence7 = $sequence7;

        return $this;
    }

    public function getSequence8(): ?int
    {
        return $this->sequence8;
    }

    public function setSequence8(int $sequence8): self
    {
        $this->sequence8 = $sequence8;

        return $this;
    }

    public function getSequence9(): ?int
    {
        return $this->sequence9;
    }

    public function setSequence9(int $sequence9): self
    {
        $this->sequence9 = $sequence9;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkoutPushUpHistoryRepository")
 */
class WorkoutPushUpHistory
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
    private $idUser;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $repeatedExercise;

    /**
     * @ORM\Column(type="integer")
     */
    private $requiredExercise;

    /**
     * @ORM\Column(type="integer")
     */
    private $idWorkoutPushUp;

    /**
     * @ORM\Column(type="integer")
     */
    private $dayWorkoutPushUp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRepeatedExercise(): ?int
    {
        return $this->repeatedExercise;
    }

    public function setRepeatedExercise(int $repeatedExercise): self
    {
        $this->repeatedExercise = $repeatedExercise;

        return $this;
    }

    public function getRequiredExercise(): ?int
    {
        return $this->requiredExercise;
    }

    public function setRequiredExercise(int $requiredExercise): self
    {
        $this->requiredExercise = $requiredExercise;

        return $this;
    }

    public function getIdWorkoutPushUp(): ?int
    {
        return $this->idWorkoutPushUp;
    }

    public function setIdWorkoutPushUp(int $idWorkoutPushUp): self
    {
        $this->idWorkoutPushUp = $idWorkoutPushUp;

        return $this;
    }

    public function getDayWorkoutPushUp(): ?int
    {
        return $this->dayWorkoutPushUp;
    }

    public function setDayWorkoutPushUp(int $dayWorkoutPushUp): self
    {
        $this->dayWorkoutPushUp = $dayWorkoutPushUp;

        return $this;
    }
}

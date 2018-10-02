<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WorkoutPushUpController extends AbstractController
{
    /**
     * @Route("/user/push-up", name="pushUp")
     */
    public function showMenuPushUp()
    {
        return $this->render('workout/workoutPushUp/workoutPushUp.html.twig', array(
            'namePage' => 'Syssitia App - Push Up',
            'nameWorkout' => 'my / push up',
        ));
    }


    /**
     * @Route("/user/push-up/test", name="pushUpTest")
     */
    public function showPushUpTest()
    {
        return $this->render('workout/workoutPushUp/workoutPushUpTest.html.twig', array(
            'namePage' => 'Syssitia App - Push Up - Test',
            'nameWorkout' => 'push up - test',
            'footer' => '1',
        ));
    }

    
    /**
     * @Route("/user/push-up/continue", name="pushUpContinue")
     */
    public function continue()
    {
        return $this->render('workout/workoutPushUp/workoutPushUpContinue.html.twig', array(
            'namePage' => 'Syssitia App - Push Up - Continue',
            'nameWorkout' => 'push up - next',
            'footer' => '1',
        ));
    }

    /**
     * @Route("/user/push-up/history", name="pushUpHistory")
     */
    public function history()
    {
        return $this->render('workout/workoutPushUp/workoutPushUpHistory.html.twig', array(
            'namePage' => 'Syssitia App - Push Up - History',
            'nameWorkout' => 'push up - history',
            'footer' => '1',
        ));
    }


}

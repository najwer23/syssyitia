<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\WorkoutPushUp;
use App\Entity\WorkoutPushUpHistory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Doctrine\Common\Persistence\ObjectManager;



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
    public function showPushUpTest(ObjectManager $manager)
    {

        $errorCode=0;
        $error="ok";

         if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['inputTest'])) {
                
                $inputTest=$_POST['inputTest'];

                if ($inputTest >= 100)
                {
                    $error="Uuuu super!";
                    $errorCode=1;
                }
                else{

                    //sprawdz zalogowanego user
                    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
                    $user = $this->getUser();
                    $idUser=$user->getId();

                    //znajdz nastepny trening
                    $query=$this->getDoctrine()
                    ->getRepository(WorkoutPushUp::class)->createQueryBuilder('wpu')
                    ->select('wpu.id', 'wpu.maxTest')
                    ->where('wpu.minTest <= (:inputTest) and wpu.maxTest >= (:inputTest)')
                    ->setParameter('inputTest', $inputTest)
                    ->getQuery();
                    $workoutFromDictionary = $query->getResult();

                  
                    // sprawdz czy istnieje zakres testu
                    if (!$workoutFromDictionary) {
                        $errorCode=1;
                        $error="Brak przygotowanego planu :(";
                    }
                    else{
                        $idWorkout=$workoutFromDictionary[0]['id'];
                        $maxTestWorkout=$workoutFromDictionary[0]['maxTest'];

                        //zapisz do bazy
                        $workoutPushUp=new WorkoutPushUpHistory();
                        $workoutPushUp->setIdUser($idUser);
                        $workoutPushUp->setDate(new \DateTime(date("H:i d-m-Y")));
                        $workoutPushUp->setRepeatedExercise($inputTest);
                        $workoutPushUp->setRequiredExercise($maxTestWorkout);
                        $workoutPushUp->setIdWorkoutPushUp($idWorkout);
                        $workoutPushUp->setDayWorkoutPushUp(0);

                        $manager->persist($workoutPushUp);
                        $manager->flush();

                        // $error=(date("H:i | d-m-Y"));
                        $errorCode=1;
                        $error="Test zapisany!";
                        
                    }
                   
                 
                }
            }
        }
                
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // $user = $this->getUser();
        // $username=$user->getUsername();


        return $this->render('workout/workoutPushUp/workoutPushUpTest.html.twig', array(
            'namePage' => 'Syssitia App - Push Up - Test',
            'nameWorkout' => 'push up - test',
            'footer' => '1',
            'error' => $error,
            'errorCode' => $errorCode,
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

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


use App\Entity\User;

class RegisterController extends AbstractController
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(ObjectManager $manager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $username="";
        $email="";
        
        $errorCode=0;
        $error="ok";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['btnRegister'])) {
                
                $username=$_POST["username"];
                $email=$_POST["email"];
                $pass=$_POST["pass"];
                $pass2=$_POST["pass2"];
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $error="Niepoprawny adres email";
                    $errorCode=1;
                }
               
                if ((!($pass==$pass2)) || empty($pass))
                {
                    $error="Hasła nie są takie same!";
                    $errorCode=1;
                }

                if (empty($username))
                {
                    $error="Podaj nick!";
                    $errorCode=1;
                }
               
                if ($errorCode==0)
                {
                    $query = $this->getDoctrine()
                    ->getRepository(User::class)->createQueryBuilder('u')
                    ->select('u.username', 'u.email')
                    ->andWhere('u.username = :username OR u.email = :email')
                    ->setParameter('email', $email)
                    ->setParameter('username', $username)
                    ->getQuery();

                    $result = $query->getResult();
                    
                    if ($result) {
                        $errorCode=1;
                        foreach ($result as $row) {

                            if($email==$row['email'])
                            $error="Adres email już istnieje";

                            if($username==$row['username'])
                            $error="Użytkownik już istnieje";
                        }
                    } 
                    else{
                        
                        $user = new User();
                        $encoded = $this->encoder->encodePassword($user, $pass);
                        $user->setPassword($encoded);
                        $user->setUsername($username);
                        $user->setEmail($email);
                        $user->setIsActive('0');

                        $manager->persist($user);
                        $manager->flush();
                        
                        $session = new Session();
                        $session->set('token', '42');
                      
                        return $this->redirectToRoute('RegisterAfter', array(
                                // 'tokenRegisterAfter' => '42',
                            ));
                    }  
                }
            }
        }
  
        return $this->render('firstPageLogin/firstPageRegister.html.twig', array(
            'namePage' => 'Syssitia App - register',
            'nav' => '1',
            'undo' => '1',
            'errorCode' => $errorCode,
            'error' => $error,
            '_username' => $username,
            '_email' => $email,

        ));
    }


     /**
     * @Route("/register-after", name="RegisterAfter")
     */
    public function afterRegister(Request $request)
    {        
        $session = new Session();
        $token=$session->get('token');
        $session->set('token', '0');
        

        return $this->render('firstPageLogin/firstPageRegisterAfter.html.twig', array(
           'namePage' => 'After Register',
           'redirect' => $token,
        ));
    }
}
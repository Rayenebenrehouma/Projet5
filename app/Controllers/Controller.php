<?php
namespace MyApp\Controllers;

use MyApp\Models\Mail;
use MyApp\Models\Post;
use MyApp\Models\User;
use MyApp\repository\EmailRepository;
use MyApp\repository\PostRepository;
use MyApp\repository\UserRepository;


class Controller{


    /**
     * @return void
     */
    public function postControllerAll(){
        $postRepository = new postRepository();
        $blogPost = $postRepository->findAll();
        require('./app/Views/articleList.php');
    }

    /**
     * @param $postId
     * @return void
     */
    public function postControllerById($postId){
        $postRepository = new postRepository();
        $postZoom = $postRepository->postById($postId);
        require('./app/Views/articleZoom.php');
    }

    /**
     * @return void
     */
    public function postControllerAdd(){

        if (isset($_POST['article_titre'], $_POST['article_contenu'])) {
            if (!empty($_POST['article_titre']) and !empty($_POST['article_contenu'])) {
                $article_titre = htmlspecialchars($_POST['article_titre']);
                $article_contenu = htmlspecialchars($_POST['article_contenu']);
                $article_chapo = htmlspecialchars($_POST['article_chapo']);
                $article_auteur = htmlspecialchars($_SESSION['user']->getId());

                $newPost = new Post();
                $newPost->setTitre($article_titre);
                $newPost->setContenu($article_contenu);
                $newPost->setChapo($article_chapo);
                $newPost->setAuteur($article_auteur);

                $postRepository = new postRepository();
                $postAdd = $postRepository->addPost($newPost);
                    }
                }
                require('./app/Views/formRedaction.php');
            }


    /**
     * @param $updateId
     * @return void
     */
    public function postControllerUpdate($updateId){

        if(isset($_POST['update'])) {
            $titre = htmlspecialchars($_POST['article_titre']);
            $chapo = htmlspecialchars($_POST['article_chapo']);
            $contenu = htmlspecialchars($_POST['article_contenu']);
            $article_date = htmlspecialchars(date('Y/m/d'));


            $upPost = new Post();
            $upPost->setTitre($titre);
            $upPost->setContenu($contenu);
            $upPost->setChapo($chapo);
            $upPost->setDateTimePublication($article_date);


            $postChange = new PostRepository();
            $postUpdate = $postChange->updatePost($updateId, $upPost);
        }
        $postRepository = new postRepository();
        $postUpdate = $postRepository->postById($updateId);
        require('./app/Views/updateForm.php');
    }

    /**
     * @param $deleteId
     * @return void
     */
    public function postControllerDelete($deleteId){
        $postRepository = new postRepository();
        $postDelete = $postRepository->postById($deleteId);
        require('./app/Views/deleteForm.php');
        $postDelete = $postRepository->deletePost($deleteId);
    }

    /**
     * @return void
     */
    public function userControllerAdd(){
        if (isset($_POST['user_email'], $_POST['user_password'])) {
            if (!empty($_POST['user_email']) and !empty($_POST['user_password'])) {
                $user_id = htmlspecialchars($_POST['user_id']);
                $user_email = htmlspecialchars($_POST['user_email']);
                $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, ['cost' => 14]);

                $user = new User();
                $user->setIdentifiant($user_id);
                $user->setEmail($user_email);
                $user->setPassword($user_password);

                $userRepository = new userRepository();
                $userAdd = $userRepository->addUser($user);
            }
        }
        require('./app/Views/signUp.php');
    }

    /**
     * @return void
     */
    public function userControllerConnect(){
        if (isset($_POST['user_email'], $_POST['user_password'])) {
            $user_email = htmlspecialchars($_POST['user_email']);
            $user_password = htmlspecialchars($_POST['user_password']);

            $user = new User();
            $user->setEmail($user_email);
            $user->setPassword($user_password);

            $userRepository = new userRepository();
            $userConnect = $userRepository->connectUser($user);
        }
        require('./app/Views/signIn.php');
    }

    /**
     * @return void
     */
    public function userControllerDisconnect(){
        $userRepository = new userRepository();
        require('./app/Views/disconnect.php');
        $userDisconnect = $userRepository->disconnectUser();
        require('./app/Views/disconnect.php');
    }

    /**
     * @return void
     */
    public function mailSend(){
        if (isset($_POST['email']) && isset($_POST['message']) && isset($_POST['sujet'])) {
            if (!empty($_POST['email'])) {
                $firstname = htmlspecialchars($_POST['firstname']);
                $sujet = htmlspecialchars($_POST['sujet']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $mail = new Mail();
                $mail->setFirstname($firstname);
                $mail->setSujet($sujet);
                $mail->setEmail($email);
                $mail->setMessage($message);

                $mailRepository = new EmailRepository();
                $mailRepository->sendMail($mail);

            }
            }
    }

    /**
     * @return void
     */
    public function gestionSite(){
        require('./app/Views/administration.php');
    }
}
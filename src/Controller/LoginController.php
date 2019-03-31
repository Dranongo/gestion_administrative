<?php

namespace Controller;


use DAO\UserDAO;
use Model\User;
use Service\Router;
use Utils\StringHelper;
use Service\Template;

class LoginController extends AbstractController
{
    /**
     * @return array
     * @throws \Exception
     */
    public function homeAction(): array
    {
        $request = $this->getRequest();

        if ($request->isLoggedIn()) {
            Router::redirect('/user/');
        }

        $form = $formErrors = null;
        $errorMessage = '';

        if ($request->isPost()) {
            $form = $request->getRequest('login_form');
            $userMail = $form['mail'];
            $userPassword = StringHelper::encodePassword($userMail, $form['password']);
            $userDao = UserDAO::getInstance();
            $users = $userDao->findBy([
                'mail' => $userMail,
                'password' => $userPassword
            ]);

            if (count($users)) {
                $request->addToSession('user', $users[0]);
                Router::redirect('/user/');
            }

            $formErrors = true;
            $errorMessage = 'Bad credentials';
        }

        return [
            'title' => 'Welcome on ComiX Little Thing',
            'form' => $form,
            'formErrors' => $formErrors,
            'errorMessage' => $errorMessage
        ];
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function logonAction(): array
    {
        $request = $this->getRequest();

        if ($request->isLoggedIn()) {
            Router::redirect('/user/');
        }

        $user = new User();
        $form = $request->getRequest('user_form');
        $formErrors = [];
        $successMessage = $errorMessage = '';
        if ($request->isPost()) {
            foreach ($form as $field => $value) {
                if (trim($value) === '') {
                    $formErrors[$field] = 'has-error';
                }
            }
            if (! StringHelper::isEmailValid($form['mail'])) {
                $formErrors['mail'] = 'has-error';
            }
            if ($form['password'] !== $form['confirm_password']) {
                $formErrors['confirm_password'] = 'has-error';
            }
            if (count($formErrors) === 0) {
                $password = StringHelper::encodePassword($form['mail'], $form['password']);
                $user->setFirstname($form['firstname'])
                    ->setLastname($form['lastname'])
                    ->setMail($form['mail'])
                    ->setPassword($password);
                $userDao = $user::getDAOInstance();
                if ($userDao->save($user)) {
                    $successMessage = 'Account created';
                } else {
                    $errorMessage = 'An error has occured';
                }
            }
        }

        return [
            'title' => 'Sign up ComiX Little Thing',
            'user' => $user,
            'form' => $form,
            'formErrors' => $formErrors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage
        ];
    }

    /**
     *
     */
    public function logoutAction()
    {
        if ($this->getRequest()->destroySession()) {
            Router::redirect('/');
        }

        return [
            'title' => 'An error has occured',
            'error' => 'An error has occured destroying the session',
            'template' => Template::getErrorTemplateName()
        ];
    }
}
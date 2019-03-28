<?php

namespace Controller;


use DAO\UserDAO;
use Entity\User;
use Utils\Route;
use Utils\StringFormatter;
use Utils\Template;

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
            Route::redirect('/user/');
        }

        $form = $formErrors = null;
        $errorMessage = '';

        if ($request->isPost()) {
            $form = $request->getRequest('login_form');
            $userMail = $form['mail'];
            $userPassword = StringFormatter::encodePassword($userMail, $form['password']);
            $userDao = new UserDAO();
            $users = $userDao->findBy([
                'mail' => $userMail,
                'password' => $userPassword
            ]);

            if (count($users)) {
                $request->addToSession('user', $users[0]);
                Route::redirect('/user/');
            }

            $formErrors = true;
            $errorMessage = 'Bad credentials';
        }

        return [
            'title' => 'Welcome on ComiX Little Thing',
            'form' => $form,
            'formErrors' => $formErrors,
            'errorMessage' => $errorMessage,
            'template' => $this->getTemplateName()
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
            Route::redirect('/user/');
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
            if (!StringFormatter::isEmailValid($form['mail'])) {
                $formErrors['mail'] = 'has-error';
            }
            if ($form['password'] !== $form['confirm_password']) {
                $formErrors['confirm_password'] = 'has-error';
            }
            if (count($formErrors) === 0) {
                $password = StringFormatter::encodePassword($form['mail'], $form['password']);
                $user->setFirstname($form['firstname'])
                    ->setLastname($form['lastname'])
                    ->setDescription($form['description'])
                    ->setMail($form['mail'])
                    ->setPassword($password);
                $userDao = $user->getDAO();
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
            'errorMessage' => $errorMessage,
            'template' => $this->getTemplateName()
        ];
    }

    /**
     *
     */
    public function logoutAction()
    {
        if ($this->getRequest()->destroySession()) {
            Route::redirect('/');
        }

        return [
            'title' => 'An error has occured',
            'error' => 'An error has occured destroying the session',
            'template' => Template::getErrorTemplateName()
        ];
    }
}
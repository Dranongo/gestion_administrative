<?php

namespace Service;

use Exception\FileNotFoundException;
use Model\User;

class Template
{
    /**
     * @param string $type
     * @return string
     * @throws \Exception
     */
    public static function getErrorTemplateName($type = 'html'): string
    {
        $errorTemplate = __VIEWS_DIR__ . 'error.' . $type . '.php';
        if (file_exists($errorTemplate)) {
            return $errorTemplate;
        }
        throw new FileNotFoundException("Error template '$errorTemplate' not found.");
    }

    /**
     * @param $fileName
     * @param null $template
     * @return string
     */
    public static function getTemplate(string $fileName, $template): string
    {
        if (! is_file($fileName)) {
            return self::getErrorTemplateName();
        }
        ob_start();
        require_once $fileName;
        $template = ob_get_contents();
        ob_end_clean();

        return $template;
    }

    /**
     * @param array $templatesVariables
     * @return mixed
     */
    public static function getTemplateVariables(array $templatesVariables)
    {
        return new class($templatesVariables) {
            /**
             * Paramters that are sent to the templates
             *  constructor.
             * @param array $variables
             */
            public function __construct(array $variables)
            {
                foreach ($variables as $name => $value) {
                    $this->{$name} = $value;
                }
            }

            /**
             * Check if current user is logged in
             *
             * @return bool
             */
            public function isLoggedIn(): bool
            {
                return Request::getInstance()->isLoggedIn();
            }

            /**
             * @param string $filename
             * @return string
             */
            public function getCssFile(string $filename): string
            {
                return '/css/' . $filename;
            }

            /**
             * @param string $filename
             * @return string
             */
            public function getJsFile(string $filename): string
            {
                return '/js/' . $filename;
            }

            /**
             * @param string $filename
             * @return string
             */
            public function getPicture(string $filename): string
            {
                return '/img/' . $filename;
            }

            /**
             * @return User|null
             */
            public function getUser(): ?User
            {
                return Request::getInstance()->getSession('user');
            }
        };
    }
}
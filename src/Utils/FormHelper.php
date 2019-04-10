<?php 
namespace Utils;

class FormHelper
{
    /**
     * @param array $formErrors
     * @param string $field
     * @return string
     */
    public static function setFeedbackInvalidity(array $formErrors, string $field): string
    {
        return count($formErrors) != 0 && array_key_exists($field, $formErrors) ? '<span>' . $formErrors[$field] . '</span>' : '';
    }

    /**
     * @param array $formErrors
     * @param string $field
     * @return string
     */
    public static function editFieldErrors(array $formErrors, string $field): string
    {
        return count($formErrors) != 0 && array_key_exists($field, $formErrors) ? 'border border-danger' : '';
    }

    /**
     * @param array $formErrors
     * @param string $field
     * @return string
     */
    public static function editRadioFieldErrors(array $formErrors, string $field): string
    {
        return count($formErrors) != 0 && array_key_exists($field, $formErrors) ? 'text text-danger' : '';
    }
}
?>
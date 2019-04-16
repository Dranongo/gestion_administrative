<?php 
namespace Utils;

class FormHelper
{
    /**
     * @param array $formErrors
     * @param string $field
     * @param string $fieldGroup
     * @param string $index
     * @return string
     */
    public static function setFeedbackInvalidity(array $formErrors, string $field, ?string $fieldGroup = '', ?string $index = ''): string
    {
        if ($fieldGroup == '') {
            return count($formErrors) != 0 && array_key_exists($field, $formErrors) ? $formErrors[$field] : '';
        } else {
            if ($index != '') {
                return count($formErrors) != 0 && array_key_exists($fieldGroup, $formErrors) 
                    && array_key_exists($index, $formErrors[$fieldGroup])
                    && array_key_exists($field, $formErrors[$fieldGroup][$index]) ? $formErrors[$fieldGroup][$index][$field] : '';
            }
            return count($formErrors) != 0 && array_key_exists($fieldGroup, $formErrors) 
                && array_key_exists($field, $formErrors[$fieldGroup]) ? $formErrors[$fieldGroup][$field] : '';
        }
    }

    /**
     * @param array $formErrors
     * @param string $field
     * @param string $fieldGroup
     * @param string $index
     * @return string
     */
    public static function editFieldErrors(array $formErrors, string $field, ?string $fieldGroup = '', ?string $index = ''): string
    {
        if ($fieldGroup == '') {
            return count($formErrors) != 0 && array_key_exists($field, $formErrors) ? 'border border-danger' : '';
        } else {
            if ($index != '') {
                return count($formErrors) != 0 && array_key_exists($fieldGroup, $formErrors) 
                    && array_key_exists($index, $formErrors[$fieldGroup])
                    && array_key_exists($field, $formErrors[$fieldGroup][$index]) ? 'border border-danger' : '';
            }
            return count($formErrors) != 0 && array_key_exists($fieldGroup, $formErrors) 
                && array_key_exists($field, $formErrors[$fieldGroup]) ? 'border border-danger' : '';
        }
    }

    /**
     * @param array $formErrors
     * @param string $field
     * @param string $fieldGroup
     * @param string $index
     * @return string
     */
    public static function editRadioFieldErrors(array $formErrors, string $field, ?string $fieldGroup = '', ?string $index = ''): string
    {
        if ($fieldGroup == '') {
            return count($formErrors) != 0 && array_key_exists($field, $formErrors) ? 'text text-danger' : '';
        } else {
            if ($index != '') {
                return count($formErrors) != 0 && array_key_exists($fieldGroup, $formErrors) 
                    && array_key_exists($index, $formErrors[$fieldGroup])
                    && array_key_exists($field, $formErrors[$fieldGroup][$index]) ? 'text text-danger' : '';
            }
            return count($formErrors) != 0 && array_key_exists($fieldGroup, $formErrors) 
                && array_key_exists($field, $formErrors[$fieldGroup]) ? 'text text-danger' : '';
        }
    }
}
?>
<?php

/**
 * Offers static helper methods that for often used tasks.
 *
 * This class offers methods for sanitizing form input, checks for valid e-mail addresses, phone numbers and other kinds
 * of data.
 *
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 */
class Utilities
{
    /**
     * Filters unwanted HTML tags from an input string and returns the filtered (a.k.a. sanitized) string.
     * @param string $input The input string containing possible unwanted HTML tags.
     * @return string The sanitized string that can be safely used.
     */
    public static function sanitizeFilter(string $input): string
    {
        return htmlspecialchars($input, ENT_QUOTES | ENT_HTML5);
    }

    /**
     * Checks if a given string is a valid e-mail address according to the employed pattern.
     * @see http://www.regular-expressions.info/email.html More Information about e-mail validation using regex.
     * @param string $string The input string that is to be checked.
     * @return bool Returns true if the string is a valid e-mail address, otherwise false.
     */
    public static function isEmail(string $string): bool
    {
        // $email_pattern = "/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/"; // easy pattern
        $email_pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/"; // more complicate pattern
        if (preg_match($email_pattern, $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if a given string is a valid phone number. Du to the vast number of phone number formats, not everything
     * is covered by this regular expression. Strings such as +43 732 1234-1234 should work though.
     * @see https://github.com/googlei18n/libphonenumber Project for validating phone numbers.
     * @param string $string The input string that is to be checked.
     * @return bool Returns true if the string is a valid phone number, otherwise false.
     */
    public static function isPhone(string $string): bool
    {
        $phone_pattern = "/^(?!(?:\d*-){5,})(?!(?:\d* ){5,})\+?[\d- ]+$/";
        if (preg_match($phone_pattern, $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if a given string is a valid price. A price is a number with no leading zeroes, a comma for separating
     * the two decimal places. Other formats (as used by most databases) will use the period for separating decimal
     * points.
     * @param string $string The input string that is to be checked.
     * @return bool Returns true if the string is a valid price, otherwise false.
     */
    public static function isPrice(string $string): bool
    {
        $price_pattern = "/(?!0,00)((^[1-9])(\d)*|^[0])((,|\.)\d{2})?$/";
        if (preg_match($price_pattern, $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if a string contains a positive integer that does not equal 0.
     * @see filter_var The PHP function filter_var using the FILTER_VALIDATE_INT filter can achieve the same.
     * @param string $string The input string that is to be checked.
     * @return bool Returns true if the string is a valid integer, otherwise false.
     */
    public static function isInt(string $string): bool
    {
        $int_pattern = "/(^[1-9][0-9]*|0{1,1}$)/";
        if (!preg_match($int_pattern, $string)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Performs a white listing of the supplied characters and checks for minimum and maximum length. White spaces are
     * excluded, therefore only one search term can be entered. This is tailored for DAB, where LIKE is employed instead
     * of a full text search. Production environment will more likely use ElasticSearch or Google crawler.
     * @param string $string The input string that is to be checked.
     * @param int $min The string's minimum length. Default value is 0.
     * @param int $max The string's maximum length. Default value is 50.
     * @return bool Returns true if the string is a single word, otherwise false.
     */
    public static function isSingleWord(string $string, int $min = 0, int $max = 50): bool
    {
        $string_pattern = "/^[a-zäöüA-ZÄÖÜ-]{" . $min . "," . $max . "}$/i";
        if (preg_match($string_pattern, $string)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if a given string is a valid password. Only certain characters are allowed, a minimum and maximum length
     * is enforced.
     * @param string $string The input string that is to be checked.
     * @param int $min The passwords's minimum length.
     * @param int $max The passwords's maximum length.
     * @return bool Returns true if the string is a valid password, otherwise false.
     */
    public static function isPassword(string $string, int $min, int $max): bool
    {
        $regex = "/^[a-zA-Z0-9_]{" . $min . "," . $max . "}$/";
        if (preg_match($regex, $string)) {
            return true;
        } else {
            return false;
        }

        //so gehts: Utilities::isPassword("string")
    }

    /**
     * Checks if a given string is empty after leading and trailing whitespaces were trimmed.
     * @param string $string The input string that is to be checked.
     * @return bool Returns true if the string is empty, otherwise false.
     */
    public static function isEmptyString(string $string): bool
    {
        return (strlen(trim($string)) === 0);
    }

    /**
     * Quick and dirty method for replacing the most common umlauts in a string with regular ASCII characters.
     * Useful when dealing with file names that are provided by the file system. Windows actually delivers e.g. an "ä",
     * whereas MacOS does a diaeresis of a and two dots, which is seen as e.g. \x61\xcc\x88
     * @param string $string The input string where replacements should be performed.
     * @return string A string without umlauts.
     */
    public static function replaceUmlauts(string $string): string
    {
        $charReplace = [
            "ä" => "ae",
            "\x61\xcc\x88" => "ae",
            "Ä" => "Ae",
            "\x41\xcc\x88" => "Ae",
            "ö" => "oe",
            "\x6f\xcc\x88" => "oe",
            "Ö" => "Oe",
            "\x4f\xcc\x88" => "Oe",
            "ü" => "ue",
            "\x75\xcc\x88" => "ue",
            "Ü" => "Ue",
            "\x55\xcc\x88" => "Ue",
            "ß" => "ss",
            " " => "_"
        ];
        return strtr($string, $charReplace);
    }
}

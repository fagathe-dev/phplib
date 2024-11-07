<?php

namespace Fagathe\Phplib\Helpers;

trait StringTrait
{
    /**
     * @param string $string
     * @param string $charset='utf-8'
     *
     * @return string
     */
    public function skipAccents(string $string = '', string $charset = 'utf-8'): string
    {
        $string = trim($string);
        $string = htmlentities($string, ENT_NOQUOTES, $charset);

        $string = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $string);
        $string = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $string);
        $string = preg_replace('#&[^;]+;#', '', $string);

        return $string;
    }

    /**
     * Generate a token
     * @param integer $length
     * @return string
     */
    public function generateShuffleChars(int $length = 10): string
    {
        $char_to_shuffle = 'azertyuiopqsdfghjklwxcvbnAZERTYUIOPQSDFGHJKLLMWXCVBN1234567890';
        return substr(str_shuffle($char_to_shuffle), 0, $length);
    }


    /**
     * Generate Random string token
     *
     * @param int $length
     * @return string
     */
    public function generateToken(int $length = 50): string
    {
        return uniqid($this->generateShuffleChars($length), true);
    }
}

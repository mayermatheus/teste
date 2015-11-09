<?php
/**
 * Created by PhpStorm.
 * User: mayer
 * Date: 07/11/15
 * Time: 13:47
 */

namespace Processor;

use User\User;

class File
{
    public function fileProcessor($file)
    {
        while (!feof($file)) {
            $line = fgets($file, 8989);
            $this->lineProcessor($line);
        }
        fclose($file);
    }

    private function lineProcessor($line)
    {
        $user = new User();

        preg_match('/[0-9]{16}/', $line, $digits);
        preg_match('/[A-Z]{2}/', $line, $language);
        preg_match('/[^0-9]+/', $line, $name);
        $name = current($name);
        $name = preg_replace('/[A-Z]{2}/', '',$name);
        $digits = current($digits);

        $user->setId(substr($line, 0, 3));
        $user->setName($name);
        $user->setAge(substr($digits, 0, 2));
        $user->setLanguage(current($language));
        $user->setIncome(substr($digits, 2, 8));
        $user->setDayBirth(substr($digits, 10, 2));
        $user->setMonthBirth(substr($digits, 12, 2));
        $user->setXpMarket(substr($digits, 14, 2));

        $user->saveUser($user);

    }
}
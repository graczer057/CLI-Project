<?php

declare(strict_types=1);

namespace App\Admin\Password;

class PasswordPrompt
{
    public static function promptSilent($prompt = "Podaj haslo:"): string
    {
        $mypassword = '';
        if (preg_match('/^win/i', PHP_OS)) {
            $vbscript = sys_get_temp_dir() . 'prompt_password.vbs';
            file_put_contents(
                $vbscript, 'wscript.echo(InputBox("'
                . addslashes($prompt)
                . '", "", "Twoje haslo: "))');
            $command = "cscript //nologo " . escapeshellarg($vbscript);
            $password = rtrim(shell_exec($command));
            unlink($vbscript);
            return $password;
        } else {
            $command = "/usr/bin/env bash -c 'echo OK'";
            if (rtrim(shell_exec($command)) !== 'OK') {
                trigger_error("Can't invoke bash");
                throw new \Exception("Nie można uruchomić basha");
            }
            $command = "/usr/bin/env bash -c 'read -s -p 
                        . addslashes($prompt)
                        . mypassword && echo $mypassword";
             $password = rtrim(shell_exec($command));
             echo "n";
            return $password;
  }
    }
}
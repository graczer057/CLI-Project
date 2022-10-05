<?php

declare(strict_types=1);

namespace App;

use App\Game\ChooseGame;
use App\Menu\MenuSelect;
use App\Menu\MenuType;
use App\Setting\ChooseSetting;
use App\Setting\Password\{
    CheckPassword\PasswordChecker,
    CheckPassword\VerifyPassword,
    CreatePassword\CreatePassword,
    CreatePassword\PasswordHash,
    PasswordAction\PasswordAction,
    ResetPassword\PasswordReset
};

class Kernel
{
    public function __construct(
        private readonly PasswordChecker $passwordChecker,
        private readonly CreatePassword $createPassword,
        private readonly PasswordHash $passwordHash,
        private readonly VerifyPassword $verifyPasswordFile,
        private readonly PasswordReset $passwordReset,
        private readonly ?string $passwordAction,
    ) {

    }

    public function start(): void
    {
        $menu = MenuSelect::select();

        $action = match ($menu->getName()) {
            'Graj' => MenuType::PLAY,
            'Ustawienia' => MenuType::SETTINGS,
            'Wyjdź' => MenuType::EXIT,
        };

        switch ($action) {
            case MenuType::PLAY:
                ChooseGame::run();
                break;
            case MenuType::SETTINGS:
                ChooseSetting::run($this->passwordChecker, $this->verifyPasswordFile, $this->createPassword, $this->passwordHash);
                self::start();
                break;
            case MenuType::EXIT:
                die("Żegnaj użytkowniku ;(");
        }
    }

    public function passwordActions(): void
    {
        PasswordAction::select($this->passwordAction, $this->createPassword, $this->passwordReset, $this->passwordChecker, $this->passwordHash);
    }
}
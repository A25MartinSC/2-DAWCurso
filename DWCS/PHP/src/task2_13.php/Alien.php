<?php

class Alien
{
    private string $name;
    private static int $numberOfAliens = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
        self::$numberOfAliens++;   // cada vez que se crea un Alien, suma 1
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function getNumberOfAliens(): int
    {
        return self::$numberOfAliens;
    }
}
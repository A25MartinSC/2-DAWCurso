<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
    ?>
</body>

</html>
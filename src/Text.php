<?php
/**
* Copyright 2021 Opoink Framework (http://opoink.com/)
* Licensed under MIT, see LICENSE.md
*/
namespace Opoink\Cli;

class Text {

    const DEFAULT = "\e[39m";
    const BLACK = "\e[30m";
    const RED = "\e[31m";
    const GREEN = "\e[32m";
    const YELLOW = "\e[33m";
    const BLUE = "\e[34m";
    const MAGENTA = "\e[35m";
    const CYAN = "\e[36m";
    const LIGHTGRAY = "\e[37m";
    const DARKGRAY = "\e[90m";
    const LIGHTRED = "\e[91m";
    const LIGHTGREEN = "\e[92m";
    const LIGHTYELLOW = "\e[93m";
    const LIGHTBLUE = "\e[94m";
    const LIGHTMAGENTA = "\e[95m";
    const LIGHTCYAN = "\e[96m";
    const WHITE = "\e[97m";

    public static function TextColor($text, $color){
        return $color . $text . self::DEFAULT;
    }
}
?>
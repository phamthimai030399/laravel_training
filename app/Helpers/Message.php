<?php

namespace App\Helpers;

class Message
{
    public static function success ($content) {
        return [
            'type' => 'success',
            'content' => $content,
        ];
    }
    public static function error ($content) {
        return [
            'type' => 'error',
            'content' => $content,
        ];
    }
}

<?php
namespace App\Services;

class MessageService
{
    public static function addFlash($key, $message)
    {
        session()->flash($key, $message);
    }
}

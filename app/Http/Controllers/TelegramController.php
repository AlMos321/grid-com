<?php

namespace App\Http\Controllers;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public static $apiKay = '317512919:AAEfdo0D5uy7-pRED09wY9xBS5WbDiwh_pM';
    public static $botName = '@GrigShopBot';

    public static function sendMessages($message)
    {
        $telegram = new Api(self::$apiKay);
            $telegram->sendMessage([
                'chat_id' => "223964700", //my
                'text' => $message,
            ]);
            $telegram->sendMessage([
                'chat_id' => "227627509",
                'text' => $message,
            ]);
    }

    public function getUpdates(){
        $telegram = new Api(self::$apiKay);
        $response = $telegram->getUpdates();
        return $response;
    }
}
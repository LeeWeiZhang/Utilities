<?php

namespace WeiZhang\Utilities;

class WhatsApp
{
    const SEND_MSG_MOBILE_URL = 'https://api.whatsapp.com/';
    const SEND_MSG_DESKTOP_URL = 'https://web.whatsapp.com/';

    public static function directMessage($phone, $message)
    {
        if (false) { // ismobile
            $domain = self::SEND_MSG_MOBILE_URL;
        } else {
            $domain = self::SEND_MSG_DESKTOP_URL;
        }

        $trimmedPhone = preg_replace("/[^0-9]/", '', $phone);

        return $domain."send?phone={$trimmedPhone}&text={$message}";
    }
}

<?php


namespace KMA\IikoApi\Api;


class Token
{
    private const URI = 'auth/access_token';
    private string $token;

    public function __construct(string $user, string $password)
    {
        $res = Request::get(self::URI, ['user_id' => $user, 'user_secret' => $password]);
        $this->token = $res->getBody()->getContents();
    }

    public function get()
    {
        return $this->token;
    }
}

<?php


namespace KMA\IikoApi;


interface IConfig
{
    public function url(): string;
    public function user(): string;
    public function password(): string;
}

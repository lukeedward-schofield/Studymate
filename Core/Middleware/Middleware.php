<?php  

namespace Core\Middleware;
use Core\Middleware\Guest;
use Core\Middleware\Auth;


class Middleware{
    const MAP = [
        "auth" => Auth::class,
        "guest" => Guest::class
    ];
}
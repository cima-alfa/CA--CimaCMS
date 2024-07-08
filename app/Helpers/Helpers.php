<?php

use Barryvdh\Debugbar\Facades\Debugbar;

if (! function_exists('base_url')) {
    /**
     * Gets the base URL of the APP installation. If the application is installed for example in the "my_app" directory, then the base URL is: "http(s)://domain.tld/my_app".
     *
     * @param  bool  $parse  Parse a URL and return its components
     */
    function base_url(bool $parse = false): string|array
    {
        $base_url = 'http://localhost';

        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $base_url = rtrim(sprintf('%s://%s%s', $http, $hostname, $dir), '/');
        }

        return $parse ? parse_url($base_url) : $base_url;
    }
}

if (! function_exists('rroute')) {
    /**
     * Generate the URL to a named route. Defaults to relative links with the base URL path applied.
     */
    function rroute(string $name, array $parameters = []): string
    {
        return (base_url(true)['path'] ?? '').route($name, $parameters, false);
    }
}

if (! function_exists('bdump')) {
    /**
     * Generate the URL to a named route. Defaults to relative links with the base URL path applied.
     */
    function bdump(mixed ...$data): void
    {
        debug(...$data);
    }
}

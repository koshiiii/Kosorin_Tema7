<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

function getThemeFromQuery(): string
{
    $theme = isset($_GET['theme']) ? strtolower((string) $_GET['theme']) : 'light';
    return $theme === 'dark' ? 'dark' : 'light';
}

function getOppositeTheme(string $theme): string
{
    return $theme === 'dark' ? 'light' : 'dark';
}

function buildThemeUrl(string $path, string $theme): string
{
    return $path . '?theme=' . urlencode($theme);
}

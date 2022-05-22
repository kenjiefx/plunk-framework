<?php

function module(
    string $name
    )
{
    $theme = $GLOBALS["BUILD_DATA"]['theme']['path'];
    $module = $theme."/modules/".$name.".php";
    if (file_exists($module)) {
        include($module);
    }
}

function snippet(
    string $name
    )
{
    $theme = $GLOBALS["BUILD_DATA"]['theme']['path'];
    $snippet = $theme."/snippets/".$name.".php";
    if (file_exists($snippet)) {
        include($snippet);
    }
}

function __content__()
{
    include($GLOBALS["BUILD_DATA"]['theme']['target']);
}

function feed(
    string $name
    )
{
    if (!isset($GLOBALS["BUILD_DATA"]['feed'])) return [];
    if ($GLOBALS["BUILD_DATA"]['feed']['name']!==$name) return [];
    return $GLOBALS["BUILD_DATA"]['feed']['data'];
}

function toJsonParsable(
    string $name,
    array $data
    )
{
    return "var {$name} = JSON.parse('".json_encode($data,JSON_UNESCAPED_UNICODE)."')";
}





?>

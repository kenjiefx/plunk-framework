<?php use Kenjiefx\PlunkFramework\ExternalPlugin as ImportablePlugin; require_once "/home/kenjie/github/plunk-framework/vendor/autoload.php";?><?php

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
<?php $GLOBALS["BUILD_DATA"] = json_decode('{"theme":{"name":"Plunk Slate","path":"\/home\/kenjie\/github\/plunk-framework\/themes\/Plunk Slate","target":"\/home\/kenjie\/github\/plunk-framework\/themes\/Plunk Slate\/templates\/product-page.php"},"feed":{"name":"product","data":{"id":2,"title":"Spoon Cup Device","handle":"spoon-cup-device","price":{"current":14,"currency":"USD"}}}}',TRUE); ?><!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Plunk Slate Theme</title>

        <script type="text/javascript">
            <?php echo toJsonParsable('Product',feed('product')); ?>
        </script>
        <script type="text/javascript" src="/assets/script?theme=Plunk Slate&target=main.js"></script>
        <link rel="stylesheet" href="/assets/style?theme=Plunk Slate&target=global.css">
    </head>
    <body>
        Hello World! <br>
        <?php __content__(); ?>
        <?php echo ImportablePlugin::usePlugin(); ?>
    </body>
</html>

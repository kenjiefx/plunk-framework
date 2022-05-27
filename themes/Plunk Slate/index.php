<!DOCTYPE html>
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

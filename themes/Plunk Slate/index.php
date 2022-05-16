<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Plunk Slate Theme</title>
        <script type="text/javascript">
            <?php echo toJsonParsable('Product',feed('product')); ?>
        </script>
    </head>
    <body>
        Hello World! <br>
        <?php __content__(); ?>
    </body>
</html>

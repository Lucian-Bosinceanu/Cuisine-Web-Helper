<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldContent('head'); ?>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <div id="wrapper">
        <div id="main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</body>
</html>

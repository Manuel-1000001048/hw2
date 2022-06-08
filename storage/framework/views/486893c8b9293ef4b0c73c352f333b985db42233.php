<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('css'); ?> 
    <?php echo $__env->yieldContent('script'); ?> 
        

    

    
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Raleway:wght@100&display=swap" rel="stylesheet">
    
    
</head>
<body>
<header>
   <?php echo $__env->yieldContent('contenuto'); ?> 
</header>

<section id="dieta">
      <?php echo $__env->yieldContent('alimenti'); ?>  
</section>

<footer>
    <address>Manuel Rosario Maugeri 1000001048</address>         
</footer>

</body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/layouts/modelloDieta.blade.php ENDPATH**/ ?>
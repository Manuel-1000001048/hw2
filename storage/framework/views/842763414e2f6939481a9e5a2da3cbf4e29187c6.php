
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel='stylesheet' href='<?php echo e(asset('css/Regi.css')); ?>'> <!-- Qui sia login che registrazione hanno lo stesso css, quindi lo metto uguale per tutti -->
    <?php echo $__env->yieldContent('script'); ?> <!-- Qui sia login che registrazione uno script diverso quindi lo metto in generale -->
        

    

    
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Raleway:wght@100&display=swap" rel="stylesheet">
    
    
</head>
<body>

<?php echo $__env->yieldContent('contenitore'); ?>
<?php echo $__env->yieldContent('divTitolo'); ?>

    <main>
       <?php echo $__env->yieldContent('form'); ?>  <!-- Qui sia login che registrazione hanno un form diverso dentro il main quindi lo implemento dentro il loro php -->
        
    </main>
    <?php echo $__env->yieldContent('pReg'); ?>
    <?php echo $__env->yieldContent('link'); ?>
    <div id="Errore"></div>

</body>
</html>



<?php /**PATH C:\xampp\htdocs\hw2\resources\views/layouts/modello.blade.php ENDPATH**/ ?>
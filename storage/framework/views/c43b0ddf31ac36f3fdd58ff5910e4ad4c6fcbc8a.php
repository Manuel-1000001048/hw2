


<?php $__env->startSection('title', '| Dieta'); ?>  <!-- Per inserire il titolo di questa pagina dato che ne layout è generico -->

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href='<?php echo e(asset('css/dieta.css')); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/dieta.js')); ?>' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<script type="text/javascript">
    const CSFR_TOKEN = '<?php echo e(csrf_token()); ?>';
    const REMOVE_ROUTE = "<?php echo e(route('remove')); ?>";
</script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('contenuto'); ?>
<div id="overlay"></div>         <!-- Per la trasparenza dell'immagione -->
            <nav>  
                <div id="Icone"> 
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                <a href="<?php echo e(route('home')); ?>"> HOME </a>
                <a href="<?php echo e(route('dieta')); ?>"> DIETA </a>         
                </div>
            </nav>  
            
            <h1>
                <strong id='Titolo'> La tua Dieta </strong> <br/>
                <em id='Second'> Tieni d'occhio la tua Alimentazione </em> <br/>
                
            </h1>
            <h1> <?php echo e($utente); ?></h1> <!-- nella home controller passiamo il valore con with quel valore qui è una variabile -->
            
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
        <?php echo csrf_field(); ?>
        </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('alimenti'); ?>

<?php $__currentLoopData = $rit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alimento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      <!-- Scorriamo la lista fino a quando c'è un alimento all'interno e lo stampiamo -->
            <?php echo $alimento; ?>     <!-- Usiamo per gestire i blocchi HTML inseriti prima nel controller -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.modelloDieta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/dieta.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', '| Home'); ?>  

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href='<?php echo e(asset('css/Accesso.css')); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/Ricerca.js')); ?>' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<script type="text/javascript">
    const CSFR_TOKEN = '<?php echo e(csrf_token()); ?>';
    const RICERCA_ROUTE = "<?php echo e(route('home')); ?>";
    const LIKE_ROUTE = "<?php echo e(route('like')); ?>";   
</script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('contenuto'); ?>
<div id="overlay"></div>         <!-- Per la trasparenza dell'immagione -->
            <nav>  
                <div id="Icone"> 
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                    <!-- onclick per levare l'evento di default allora manda richiesta get ed entra in contrato  -->
                    <!-- il form serve per mandare la richiesta post infatti viene creata post, ma non deve essere visualizzata nella pagina -->
                    <a href="<?php echo e(route('home')); ?>"> HOME </a>
                    

                    <a href="<?php echo e(route('dieta')); ?>"> DIETA </a>          
                </div>
            </nav>  
            
            <h1>
                <strong id='Titolo'> HARDCORE FITNESS </strong> <br/>
                <em id='Second'> Resta in forma con noi! </em> <br/>
                <h1>Benvenuto <?php echo e($utente); ?></h1>      <!-- nella home controller passiamo il valore con with quel valore qui è una variabile -->              
            </h1>
            
            <form id='Prodotti' method="get" action='"<?php echo e(route('home')); ?>"'> 
            <?php echo csrf_field(); ?>
                        Alimenti Dieta:
                        <input type="text" id="prodotto">
                        <input type="submit" id="submit" value="Cerca">
                    </form>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
        <?php echo csrf_field(); ?>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.modelloHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>
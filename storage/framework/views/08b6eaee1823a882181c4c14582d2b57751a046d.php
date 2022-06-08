

<?php $__env->startSection('title', '| Registrazione'); ?>  <!-- Per inserire il titolo di questa pagina dato che ne layout è generico -->

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/registrazione.js')); ?>' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<script type="text/javascript">
    const REGISTRAZIONE_ROUTE = "<?php echo e(route('registrazione')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenitore'); ?>
<div id="contenitore"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('divTitolo'); ?>
<div>REGISTRATI !</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<form name='regi' method='post' action="<?php echo e(route('registrazione')); ?>"> 
    <?php echo csrf_field(); ?>
                <p>
                    <label>Nome <input id="nome" type='text' name='nome'></label>  
                </p>
                <p>
                    <label>Cognome <input id="cognome" type='text' name='cognome'></label>
                </p>
                <p>
                    <label>E-mail <input id="Mail" type='text' name='email'></label>
                </p>
                <p>
                    <label>Password  <input id="Pass" type='password' name='password'></label>
                </p>
                <p>
                    <label>Conferma Password <input type='password' name='conferma'></label>
                </p>

                <p>
                    <label>&nbsp;<input type='submit' value="Registrati"></label> 
                </p>
</form>                
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pReg'); ?>
<p id='testo'><strong>Requisiti Password:  <br/>
                <em id="min">- Minimo 6 caratteri</em> <br/>
                <em id="spec"> - Minimo due caratteri speciali (/ + ? !)</em></strong></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
<a href="<?php echo e(route('login')); ?>" class='Bottone'>Già Registrato?  </a>  <!-- passiamo il route login per andare alla pagina login -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.modello', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/registrazione.blade.php ENDPATH**/ ?>
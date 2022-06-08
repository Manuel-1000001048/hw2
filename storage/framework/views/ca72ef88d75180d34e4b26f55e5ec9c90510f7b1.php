

<?php $__env->startSection('title', '| Login'); ?>  <!-- Per inserire il titolo di questa pagina dato che ne layout è generico -->

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/Login.js')); ?>' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<!-- Inserire la parte del php di registrazione -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('divTitolo'); ?>
<div>ACCEDI !</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <form name="login" method="post" action="<?php echo e(route('login')); ?>">
              <?php echo csrf_field(); ?>
              <p>
                  <label>E_mail<input type='text' name='email'></label>
              </p>
              <p>
                  <label>Password <input type='password' name='password'></label>
              </p>
              <p>
                  <label>&nbsp;<input type='submit' value="ACCEDI"></label> <!-- Per non scrivere niente accanto -->
              </p>
          </form>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('link'); ?>
<a href="<?php echo e(route('registrazione')); ?>" class='Bottone'>REGISTRATI  </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.modello', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2\resources\views/login.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
 
 
<div class="card">
  <div class="card-header">Batches Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : <?php echo e($batches->name); ?></h5>
        <p class="card-text">Course : <?php echo e($batches->course->name); ?></p>
        <p class="card-text">Start_date: <?php echo e($batches->start_date); ?></p>
  </div>
       
    </hr>
  
  </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Studentmanagement\resources\views/batches/show.blade.php ENDPATH**/ ?>
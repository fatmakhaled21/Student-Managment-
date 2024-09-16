
<?php $__env->startSection('content'); ?>
 
 
<div class="card">
  <div class="card-header">Payments Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Enrollment_id : <?php echo e($payments->enrollment->enroll_no); ?></h5>
        <p class="card-text">Paid_date : <?php echo e($payments->paid_date); ?></p>
        <p class="card-text">Amount: <?php echo e($payments->amount); ?></p>
  </div>
       
    </hr>
  
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Studentmanagement\resources\views/payments/show.blade.php ENDPATH**/ ?>
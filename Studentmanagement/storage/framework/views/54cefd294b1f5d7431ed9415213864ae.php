
<?php $__env->startSection('content'); ?>
 
<div class="card">
  <div class="card-header">Payments Page</div>
  <div class="card-body">
      
      <form action="<?php echo e(url('payments')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <label>Enrollment No</label></br>
        <select name="enrollment_id" id="enrollment_id" class="form-control">
         <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=> $enroll_no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($id); ?>"><?php echo e($enroll_no); ?></option>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <label>Paid_date</label></br>
        <input type="text" name="paid_date" id="paid_date" class="form-control"></br>
        <label>Amount</label></br>
        <input type="text" name="amount" id="amount" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Studentmanagement\resources\views/payments/create.blade.php ENDPATH**/ ?>
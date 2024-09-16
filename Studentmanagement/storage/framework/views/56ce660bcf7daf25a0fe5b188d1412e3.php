
<?php $__env->startSection('content'); ?>
 
<div class="card">
  <div class="card-header">Courses Page</div>
  <div class="card-body">
      
      <form action="<?php echo e(url('courses')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Syllabus</label></br>
        <input type="text" name="syllabus" id="syllabus" class="form-control"></br>
        <label>Duration</label></br>
        <input type="text" name="duration" id="duration" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Studentmanagement\resources\views/courses/create.blade.php ENDPATH**/ ?>
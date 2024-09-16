
<?php $__env->startSection('content'); ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Payments</h2>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/payments/create')); ?>" class="btn btn-success btn-sm" title="Add New payments">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Enrollment_id</th>
                                        <th>Paid_date</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        
                                        <td><?php echo e(optional($item->enrollment)->enroll_no); ?></td>
                                        <td><?php echo e($item->paid_date); ?></td>
                                        <td><?php echo e($item->amount); ?></td>
 
                                        <td>
                                            <a href="<?php echo e(url('/payments/' . $item->id)); ?>" title="View payments"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="<?php echo e(url('/payments/' . $item->id . '/edit')); ?>" title="Edit payments"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="<?php echo e(url('/payments' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline;">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete payments" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                           

                                            <a href="<?php echo e(url('/report/report1/'. $item->id)); ?>" title="Edit Payment"><button class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>Print</button></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Studentmanagement\resources\views/payments/index.blade.php ENDPATH**/ ?>
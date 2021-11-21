

<?php $__env->startSection('styles'); ?>
    <?php echo $__env->make('wallet.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
	<div class="row clearfix">
		
		<div class="col-md-12 " >
        	<?php echo $__env->make('partials.flash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    	</div>

    </div>
	<div class="row clearfix">
       
        <div class="col-lg-12">
             <div class="card">
                <div class="header">
                    <h2><?php echo e(__('My Closed Trades')); ?></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Currency')); ?></th>
                                    <th><?php echo e(__('Trade Date')); ?></th>
                                    <th><?php echo e(__('My Action')); ?></th>
                                    <th><?php echo e(__('User')); ?></th>
                                    <th><?php echo e(__('Quantity from trade position')); ?> </th>
                                    <th><?php echo e(__('Rate in')); ?> <?php echo e($maincurrency->code); ?></th>
                                    <th><?php echo e(__('State')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $closed_trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($ct->trade->currency->code); ?></td>
                                    <td><?php echo e($ct->trade->created_at); ?></td>
                                    <td><?php echo e($ct->status_name); ?> </td>
                                    <td><?php echo e($ct->trader->name); ?></td>
                                    <td><?php echo e($ct->quantity); ?> <span class="float-right"><?php echo e($ct->trade->currency->code); ?></span></td>
                                    <td><?php echo e($ct->trade->price); ?> <span class="float-right"><?php echo e($maincurrency->code); ?></span></td>
                                    <td>
                                        <span class="badge badge-success"><?php echo e(__('Completed')); ?></span>
                                    </td>
                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr >
                                    <td colspan="7"><?php echo e(__('you don\'t have trade positions in the market.')); ?></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
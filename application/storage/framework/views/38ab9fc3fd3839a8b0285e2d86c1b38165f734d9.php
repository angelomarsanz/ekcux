

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
                    <h2><?php echo e(__('My positions')); ?></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Currency')); ?></th>
                                    <th><?php echo e(__('Listing Date')); ?></th>
                                    <th><?php echo e(__('User')); ?></th>
                                    <th><?php echo e(__('Buy / Sell')); ?></th>
                                    <th><?php echo e(__('Position quantity')); ?> </th>
                                    <th><?php echo e(__('Rate in')); ?> <?php echo e($maincurrency->code); ?></th>
                                    <th><?php echo e(__('State')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td><?php echo e($trade->currency->code); ?></td>
                                    <td><?php echo e($trade->created_at); ?></td>
                                    <td><?php echo e($trade->user->name); ?></td>
                                    <td>
                                        <?php if($trade->buy_sell == 0): ?>
                                            <?php echo e(__('is selling')); ?>

                                        <?php elseif( $trade->buy_sell == 1 ): ?>
                                            <?php echo e(__('wants to buy')); ?>

                                        <?php endif; ?>

                                    </td>

                                    <td><?php echo e($trade->quantity); ?> <span class="float-right"><?php echo e($trade->currency->code); ?></span></td>
                                    <td><?php echo e($trade->price); ?> <span class="float-right"><?php echo e($maincurrency->code); ?></span></td>
                                    <td>
                                        <?php if($trade->state == 0): ?>
                                            <span class="badge badge-primary"><?php echo e(__('Removed from market')); ?></span>
                                        <?php elseif($trade->state == 1): ?>
                                            <span class="badge badge-success"><?php echo e(__('Running in the market')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($trade->state == 1 ): ?>
                                            <?php if(Auth::user()->id == $trade->user->id): ?>
                                                <a href="<?php echo e(url('/')); ?>/<?php echo e(app()->getLocale()); ?>/trades/liquid/<?php echo e($trade->id); ?>" class="btn btn-sm btn-warning "><?php echo e(('Remove Listing')); ?></a>
                                            <?php elseif( $trade->buy_sell == 1 ): ?>
                                                <a href="<?php echo e(url('/')); ?>/<?php echo e(app()->getLocale()); ?>/trades/liquid/<?php echo e($trade->id); ?>" class="btn btn-sm btn-danger"><?php echo e(('Sell')); ?></a>
                                            <?php elseif(  $trade->buy_sell == 0): ?>
                                                 <a href="<?php echo e(url('/')); ?>/<?php echo e(app()->getLocale()); ?>/trades/liquid/<?php echo e($trade->id); ?>" class="btn btn-sm btn-success"><?php echo e(('Buy')); ?></a>
                                            <?php endif; ?>
                                        <?php elseif($trade->state == 0 ): ?>

                                        <?php endif; ?>
                                    </td>
                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td><?php echo e(__('you don\'t have trade positions in the market.')); ?></td>
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
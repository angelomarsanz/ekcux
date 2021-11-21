

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
        <div class="col-lg-6">
            <div class="card">
                <div class="header">
                    <h2>
                    	<?php if($utrade->buy_sell == 0 ): ?>
                    	<strong><?php echo e(__('Buy')); ?></strong> <?php echo e($utrade->currency->code); ?>

                    	<?php elseif($utrade->buy_sell == 1 ): ?>
                    	<strong><?php echo e(__('Sell')); ?></strong> <?php echo e($utrade->currency->code); ?>

                    	<?php endif; ?>
                    </h2>
                </div>
                <form method="POST" action="<?php echo e(route('liquid', app()->getLocale())); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="body block-header">
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount"><?php echo e(__('Currency')); ?></label>
                                   	<div class="clearfix"></div>
                                   	<strong><?php echo e($utrade->currency->name); ?></strong>
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="trade_id" value="<?php echo e($utrade->id); ?>">
                        <div class="row ">
                            <div class="col">
                            	<div class="form-group">
	                                <label class="text-primary"><?php echo e(__('Position')); ?></label>
	                                <div class="clearfix"></div>
	                                    <?php if($utrade->buy_sell == 0 ): ?>
				                    	<strong><?php echo e(__('Buy')); ?></strong> 
				                    	<?php elseif($utrade->buy_sell == 1 ): ?>
				                    	<strong><?php echo e(__('Sell')); ?></strong> 
				                    	<?php endif; ?>

                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount"><?php echo e(__('Rate')); ?></label>
                                   	<div class="clearfix"></div>
                                   	<strong><?php echo e($utrade->price); ?> <?php echo e($maincurrency->code); ?></strong>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount"><?php echo e(__('Available quantity')); ?></label>
                                   	<div class="clearfix"></div>
                                   	<strong><?php echo e($utrade->quantity); ?> <?php echo e($utrade->currency->code); ?></strong>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="quantity"> <?php echo e($utrade->currency->code); ?> <?php echo e(__('Quantity to')); ?> <?php if($utrade->buy_sell == 0 ): ?>
				                    	<?php echo e(__('Buy')); ?>

				                    	<?php elseif($utrade->buy_sell == 1 ): ?>
				                    	<?php echo e(__('Sell')); ?>

				                    	<?php endif; ?></label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required="" placeholder="5.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                                     <?php if($errors->has('quantity')): ?>
                                        <span class="invalid-feedback">
                                            <strong class="text-danger"><?php echo e($errors->first('quantity')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                             <div class="col">
                             	<?php if($utrade->buy_sell == 0 ): ?>
				                    <input type="submit" class="btn btn-success btn-block btn-round" value="<?php echo e(__('Buy')); ?>">
				                    <?php elseif($utrade->buy_sell == 1 ): ?>
				                    <input type="submit" class="btn btn-danger btn-block btn-round" value="<?php echo e(__('Sell')); ?>">
				                <?php endif; ?>
                            </div>	          
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
             <div class="card bg-light">
                <div class="header">
                    <h2><?php echo e(__('Running positions')); ?></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table  no-footer">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('User')); ?></th>
                                    <th><?php echo e(__('Buy / Sell')); ?></th>
                                    <th><?php echo e(__('Position quantity')); ?> </th>
                                    <th><?php echo e(__('Rate in')); ?> <?php echo e($maincurrency->code); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
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
                                        <?php if(Auth::user()->id == $trade->user->id): ?>
                                            <a href="<?php echo e(url('/')); ?>/<?php echo e(app()->getLocale()); ?>/trades/liquid/<?php echo e($trade->id); ?>" class="btn btn-sm btn-warning"><?php echo e(('Remove Listing')); ?></a>
                                        <?php elseif( $trade->buy_sell == 1 ): ?>
                                            <a href="<?php echo e(url('/')); ?>/<?php echo e(app()->getLocale()); ?>/trades/liquid/<?php echo e($trade->id); ?>" class="btn btn-sm btn-danger"><?php echo e(('Sell')); ?></a>
                                        <?php elseif(  $trade->buy_sell == 0): ?>
                                             <a href="<?php echo e(url('/')); ?>/<?php echo e(app()->getLocale()); ?>/trades/liquid/<?php echo e($trade->id); ?>" class="btn btn-sm btn-success"><?php echo e(('Buy')); ?></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5"><?php echo e(__('No positions available in the market.')); ?></td>
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
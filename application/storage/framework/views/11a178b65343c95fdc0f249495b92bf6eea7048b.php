

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
        <div class="col-lg-3">
            <div class="card">
                <div class="header">
                    <h2><strong><?php echo e(__('Trade your wallets currencies')); ?></strong></h2>
                </div>
                <form method="POST" action="<?php echo e(route('openposition', app()->getLocale())); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="body block-header">
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount">Currency</label>
                                    <select class="form-control" id="currency" name="currency_id">
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($currency->id); ?>" data-value="<?php echo e($currency->id); ?>"><span class="text-success"><?php echo e($currency->code); ?> --</span> <?php echo e($currency->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </select>
                                    <?php if($errors->has('currency_id')): ?>
                                        <span class="invalid-feedback">
                                            <strong class="text-danger"><?php echo e($errors->first('currency_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                              </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col">
                                <label class="text-primary"><?php echo e(__('Position')); ?></label>
                                <div class="row clearfix">
                                    <div class="col offset-1">
                                        <div>
                                          <input type="radio" id="sell" name="buy_sell" value="0"
                                                 checked>
                                          <label  for="sell"><?php echo e(__('Sell')); ?></label>
                                        </div>

                                        <div>
                                          <input type="radio" id="buy" name="buy_sell" value="1">
                                          <label  for="buy"><?php echo e(__('Buy')); ?></label>
                                        </div>
                                    </div>

                                     <?php if($errors->has('buy_sell')): ?>
                                        <span class="invalid-feedback">
                                            <strong class="text-danger"><?php echo e($errors->first('buy_sell')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="quantity">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required="" placeholder="5.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                                     <?php if($errors->has('quantity')): ?>
                                        <span class="invalid-feedback">
                                            <strong class="text-danger"><?php echo e($errors->first('quantity')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="price">Rate in <span class=""><?php echo e($maincurrency->code); ?></span></label>
                                    <input type="number" class="form-control" id="price" name="price" value="" required="" placeholder="5.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.00000001">
                                     <?php if($errors->has('price')): ?>
                                        <span class="invalid-feedback">
                                            <strong class="text-danger"><?php echo e($errors->first('price')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col">
                            	<input type="submit" class="btn btn-primary bg-blue btn-block btn-round" value="<?php echo e(__('Open Position')); ?>">
                            </div>	          
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-9">
             <div class="card">
                <div class="header">
                    <h2><?php echo e(__('Running positions')); ?></h2>
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
                                    <td colspan="7"><?php echo e(__('No positions available in the market.')); ?></td>
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
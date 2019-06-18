<?php $__env->startSection('content'); ?>  
    
    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $position = (($loop->iteration % 2) == 0) ? 'film-box--right' : 'film-box--left'; ?>
        <?php echo $__env->make('partials.films.film_tile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php echo e($films->links()); ?>

        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
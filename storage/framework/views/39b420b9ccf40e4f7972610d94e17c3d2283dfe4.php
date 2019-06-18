<?php $__env->startSection('content'); ?>
<br/><br/><br/>
<h3><?php echo e($message); ?></h3>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
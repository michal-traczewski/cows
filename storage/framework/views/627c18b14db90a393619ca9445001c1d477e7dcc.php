<?php $__env->startSection('content'); ?>
<div class="jumbotron">
    <div class="container">
        <form name="login" action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>"><br/>
                <?php if($errors->first('email')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" ><br/>
                <?php if($errors->first('password')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
                <label for="remember">Remember Me:</label>
                <input type="checkbox" name="remember" id="remember" class="form-control" <?php echo e(old('remember') ? 'checked' : ''); ?>><br/>
                
            <button class="btn btn-primary" tye="submit">
                <span class="glyphicon glyphicon-ok" ></span>OK
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
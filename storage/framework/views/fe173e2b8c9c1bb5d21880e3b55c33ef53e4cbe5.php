<?php $__env->startSection('content'); ?>      
<br/><br/>
<div class="jumbotron">
    <div class="container">
        <form name="register" action="<?php echo e(route('register')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="name">Last Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Last Name" value="<?php echo e(old('name')); ?>" required autofocus><br/>
                <?php if($errors->first('name')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('name')); ?>

                    </div>
                <?php endif; ?>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" required><br/>
                <?php if($errors->first('email')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required><br/>
                <?php if($errors->first('password')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required><br/>
                <?php if($errors->first('password')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary" tye="submit">
                <span class="glyphicon glyphicon-ok" ></span>Submit
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
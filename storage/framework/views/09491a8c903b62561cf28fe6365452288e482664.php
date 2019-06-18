<br/><br/>
<div class="jumbotron">
    <div class="container">
        <form name="edit_cow" action="<?php echo e($action); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="cow_name">Name:</label>
                <input type="text" name="cow_name" id="cow_name" class="form-control" placeholder="Name" value="<?php echo e($cow_name); ?>"><br/>
                <?php if($errors->first('cow_name')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('cow_name')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary" tye="submit">
                <span class="glyphicon glyphicon-ok" ></span>Submit
            </button>
        </form>
    </div>
</div>
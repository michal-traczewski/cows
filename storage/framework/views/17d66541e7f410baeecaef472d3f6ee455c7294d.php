<br/><br/>
<div class="jumbotron">
    <div class="container">
        <form name="editUser" action="profile" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" value="<?php echo e($user->first_name); ?>"><br/>
                <?php if($errors->first('firstName')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('firstName')); ?>

                    </div>
                <?php endif; ?>
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" value="<?php echo e($user->name); ?>"><br/>
                <?php if($errors->first('lastName')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('lastName')); ?>

                    </div>
                <?php endif; ?>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo e($user->address); ?>"><br/>
                <?php if($errors->first('address')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('address')); ?>

                    </div>
                <?php endif; ?>
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="City" value="<?php echo e($user->city); ?>"><br/>
                <?php if($errors->first('city')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('city')); ?>

                    </div>
                <?php endif; ?>
                <label for="postalCode">Postal Code:</label>
                <input type="text" name="postalCode" id="postalCode" class="form-control" placeholder="Postal Code" value="<?php echo e($user->postal_code); ?>"><br/>
                <?php if($errors->first('postalCode')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('postalCode')); ?>

                    </div>
                <?php endif; ?>
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control"  placeholder="Phone Number" value="<?php echo e($user->phone); ?>"><br/>
                <?php if($errors->first('phoneNumber')): ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        <?php echo e($errors->first('phoneNumber')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <button class="btn btn-primary" tye="submit">
                <span class="glyphicon glyphicon-ok" ></span>Submit
            </button>
        </form>
    </div>
</div>
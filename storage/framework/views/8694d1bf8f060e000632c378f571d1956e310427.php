<?php if(count($films) == 0): ?>
    <h3> Nothing to display </h3>
<?php else: ?>
    <?php $price = 0; ?>
    <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $price = $price + $film->price; ?>
        <?php $position = (($loop->iteration % 2) == 0) ? 'film-box--right' : 'film-box--left'; ?>
        <?php echo $__env->make('partials.films.film_tile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div id="BasketFooter">
        TOTAL: &#163;<?php echo e($price); ?> <br/><br/>
    <a href="/myorders/cart/clear">
        <button class="btn btn-danger">
            <span class="glyphicon glyphicon-remove" ></span>Clear basket
        </button>
    </a><br/><br/>
    <a href="/myorders/cart/checkout">
        <button class="btn btn-primary">
            <span class="glyphicon glyphicon-ok" ></span>Checkout
        </button>
    </div>
<?php endif; ?>
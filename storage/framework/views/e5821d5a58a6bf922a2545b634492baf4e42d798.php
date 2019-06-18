<div class="jumbotron film-box <?php echo e($position); ?>">
    <a href="/films/details/id/<?php echo e($film->film_id); ?>"><img src="/images/films/<?php echo e($film->film_id); ?>.jpg"/></a>
    <a href="/films/details/id/<?php echo e($film->film_id); ?>" class="title"><?php echo e(ucfirst($film->title)); ?></a> 
    <div class="description"><?php echo e($film->description); ?></div>
    <div class="description"><b>Duration: </b><?php echo e($film->length); ?> <b>Language:</b> <?php echo e($film->language->name); ?>  <b>Rating:</b> <?php echo e($film->rating); ?></div>
    <?php if($user_id && isset($films_in_basket)): ?>
        <?php if(isset($films_in_basket) && in_array($film->film_id, $films_in_basket)): ?>
            <p class="add-to-basket">IN BASKET</p>
        <?php else: ?>
            <p class="add-to-basket"><a href="/myorders/cart/add/<?php echo e($film->film_id); ?>">ADD TO BASKET</a></p>
        <?php endif; ?>
    <?php endif; ?>
</div>


<?php if(count($orders) == 0): ?>
    <h3> Nothing to display </h3>
<?php else: ?>
    <div class="container my-orders">          
        <table class="table table-bordered">
            <tr>
                <th>No. </th>
                <th>Order number</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
            </tr>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($order->order_id); ?></td>
                    <td><?php echo e($order->statuses->description); ?></td>
                    <td><?php echo e($order->created); ?></td>
                    <td><a href="/myorders/<?php echo e($order->order_id); ?>"><button class="btn btn-primary">Show</button></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php endif; ?>

<?php if($order_details): ?>
    <div class="container order-details">          
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php $__currentLoopData = $order_details->films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($detail->title); ?></td>
                    <td><?php echo e($detail->description); ?></td>
                    <td><?php echo e($detail->price); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <div id="btn-cancel-order">
        <a href="/myorders/<?php echo e($current_order); ?>/cancel">
            <button class="btn btn-danger">
                <span class="glyphicon glyphicon-remove" ></span>Cancel order
            </button>
        </a>
    </div>
<?php endif; ?>

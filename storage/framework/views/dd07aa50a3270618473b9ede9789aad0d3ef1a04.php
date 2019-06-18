<?php $__env->startSection('content'); ?>
<div class="container">
    <br/><br/><br/>

    <h4>Order by: </h4>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#cows">Day output</a></li>
        <li><a data-toggle="pill" href="#cows_1">Month output</a></li>
        <li><a data-toggle="pill" href="#cows_2">Year output</a></li>
    </ul>
  <div id="cows-list">
    <div class="tab-content">
      <div id="cows" class="tab-pane fade in active"><br/>
          <table class="table table-striped">
              <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Today Output</th>
                  <th>Month Output</th>
                  <th>Year Output</th>
                  <th></th>
                  <th></th>
              </tr>
              <?php $__currentLoopData = $cows_order_by_today; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($cow->id); ?></td>
                      <td><?php echo e($cow->name); ?></td>
                      <td><?php echo e($cow->today); ?></td>
                      <td><?php echo e($cow->month); ?></td>
                      <td><?php echo e($cow->year); ?></td>
                      <td>
                        <a href="/editcow/<?php echo e($cow->id); ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a></td>
                      <td>
                        <a href="/?cow_id=<?php echo e($cow->id); ?>">
                            <button class="btn btn-primary">Show</button>
                        </a></td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
      </div>
      <div id="cows_1" class="tab-pane fade"><br/>
          <table class="table table-striped">
              <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Today Output</th>
                  <th>Month Output</th>
                  <th>Year Output</th>
                  <th></th>
                  <th></th>
              </tr>
              <?php $__currentLoopData = $cows_order_by_month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($cow->id); ?></td>
                      <td><?php echo e($cow->name); ?></td>
                      <td><?php echo e($cow->today); ?></td>
                      <td><?php echo e($cow->month); ?></td>
                      <td><?php echo e($cow->year); ?></td>
                      <td>
                        <a href="/editcow/<?php echo e($cow->id); ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a></td>
                      <td>
                        <a href="/?cow_id=<?php echo e($cow->id); ?>">
                            <button class="btn btn-primary">Show</button>
                        </a></td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
      </div>
          <div id="cows_2" class="tab-pane fade"><br/>
          <table class="table table-striped">
              <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Today Output</th>
                  <th>Month Output</th>
                  <th>Year Output</th>
                  <th></th>
                  <th></th>
              </tr>
              <?php $__currentLoopData = $cows_order_by_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($cow->id); ?></td>
                      <td><?php echo e($cow->name); ?></td>
                      <td><?php echo e($cow->today); ?></td>
                      <td><?php echo e($cow->month); ?></td>
                      <td><?php echo e($cow->year); ?></td>
                      <td>
                        <a href="/editcow/<?php echo e($cow->id); ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a></td>
                      <td>
                        <a href="/?cow_id=<?php echo e($cow->id); ?>">
                            <button class="btn btn-primary">Show</button>
                        </a></td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
      </div>
    </div>
  </div>
  <br/>
  
  <?php $cow_name = $chosen_cow ? $chosen_cow->name : '' ; ?>
  <?php $cow_id = $chosen_cow ? $chosen_cow->id : 0 ; ?>
    
  
        <div id="cow-details">
          <h4>This month: <?php echo e($cow_name); ?> </h4>
          <br/>
          <table class="table table-striped">
              <tr>
                  <th>Day </th>
                  <th>Output</th>
              </tr>
              <?php $__currentLoopData = $daily_outputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $output): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($output->date); ?></td>
                      <td><?php echo e($output->output); ?></td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
          <br/>
          <?php if($chosen_cow): ?>
          <form name="add_output" action="/add_daily_output" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                <label for="daily_output">Daily output <?php echo e($date); ?> </label>
                    <input type="text" name="daily_output" id="daily_output" class="form-control" value="<?php echo e($daily_output); ?>"><br/>
                <input type="hidden" name="date" id="date" class="form-control" value="<?php echo e($date); ?>"><br/>
                <input type="hidden" name="cow_id" id="cow_id" class="form-control" value="<?php echo e($cow_id); ?>"><br/>
                <button class="btn btn-primary" tye="submit">
                    <span class="glyphicon glyphicon-ok" ></span>Update daily output
                </button>
                </div>
            </form>
          <?php endif; ?>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Trips</div>

                    <div class="">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <br/><br/>

                        <div class="container">


                            <table id="example" class="order-table table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th> Route</th>
                                    <th> Date</th>
                                    <th> Departure at</th>
                                    <th> Arrival at</th>
                                    <th> Seat price</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($data->firstItem() + $key); ?> </td>
                                    <td><a ><?php echo e($row->name); ?></a></td>
                                    <td><a ><?php echo e($row->Route->name); ?></a></td>
                                    <td><a ><?php echo e($row->date); ?></a></td>
                                    <td><a ><?php echo e($row->departure_at); ?></a></td>
                                    <td><a ><?php echo e($row->arrival_at); ?></a></td>
                                    <td><a ><?php echo e($row->seat_price); ?></a></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#form_trip<?php echo e($row->id); ?>" class="btn btn-primary">Edit</a>

                                        <a href="<?php echo e(route('trip.delete' , $row->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>

                            <?php echo e($data->links("pagination::bootstrap-4")); ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="form_trip<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Trip  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  class="form-horizontal" action="<?php echo e(route('trip.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label> Name </label>
                                <input hidden type="text" class="form-control" name="id" value="<?php echo e($row->id); ?>" required  >
                                <input type="text" class="form-control" name="name" value="<?php echo e($row->name); ?>" required  >
                            </div>

                            <?php $routes = DB::table('routes')->get(); ?>

                            <div class="form-group">
                                <label> Routes </label>
                                <select class="form-control" name="route" required>

                                    <option class="form-control" selected disabled="" >Select option</option>

                                    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="form-control" <?php if($route->id == $row->route): ?> selected <?php endif; ?> value="<?php echo e($route->id); ?>" ><?php echo e($route->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Date </label>
                                <input type="date" class="form-control" name="date" value="<?php echo e($row->date); ?>" required >
                            </div>

                            <div class="form-group">
                                <label> Departure at </label>
                                <input type="time" class="form-control" name="departure_at" value="<?php echo e($row->departure_at); ?>" required >
                            </div>

                            <div class="form-group">
                                <label> Arrival at </label>
                                <input type="time" class="form-control" name="arrival_at" value="<?php echo e($row->arrival_at); ?>" required >
                            </div>

                            <div class="form-group">
                                <label> Seat Price </label>
                                <input id="seat_price" oninput="this.value = Math.abs(this.value)" type="number" value="<?php echo e($row->seat_price); ?>" class="form-control" name="seat_price"  min="0" required >
                            </div>


                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel pros\busBookingSystem\resources\views/admin/trips.blade.php ENDPATH**/ ?>
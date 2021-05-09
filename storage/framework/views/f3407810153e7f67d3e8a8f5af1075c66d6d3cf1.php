<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row">


            
                
                    
                        
                    
                

            


            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Stations  </h4>

                        <?php

                        $data  = DB::table('stations')->get();
                        $coun  = $data->count();

                        echo '<h1 class="card-text">'.$coun.'</h1>';
                        ?>
                        <a href="#" data-toggle="modal" data-target="#form_station" class="btn btn-primary">Add</a>

                        <a href="<?php echo e(route('station.index')); ?>" class="btn btn-primary">Manage</a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Routes  </h4>

                        <?php

                        $data  = DB::table('routes')->get();
                        $coun  = $data->count();

                        echo '<h1 class="card-text">'.$coun.'</h1>';
                        ?>
                        <a href="#" data-toggle="modal" data-target="#form_route" class="btn btn-primary">Add</a>

                        <a href="<?php echo e(route('route.index')); ?>" class="btn btn-primary">Manage</a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Trips  </h4>

                        <?php

                        $data  = DB::table('trips')->get();
                        $coun  = $data->count();

                        echo '<h1 class="card-text">'.$coun.'</h1>';
                        ?>
                        <a href="#" data-toggle="modal" data-target="#form_trip" class="btn btn-primary">Add</a>

                        <a href="<?php echo e(route('trip.index')); ?>" class="btn btn-primary">Manage</a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bookings</h4>

                        <?php

                        $data  = DB::table('bookings')->get();
                        $coun  = $data->count();

                        echo '<h1 class="card-text">'.$coun.'</h1>';
                        ?>

                        <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-primary">Manage</a>

                    </div>
                </div>
            </div>


        </div>

    </div>


    <div class="modal fade" id="form_station" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> New Station  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal" action="<?php echo e(route('station.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label> Name </label>
                            <input hidden type="text" class="form-control" name="id" value="0" required  >
                            <input type="text" class="form-control" name="name" required  >
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

    <div class="modal fade" id="form_route" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> New Route  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal" action="<?php echo e(route('route.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label> Name </label>
                            <input hidden type="text" class="form-control" name="id" value="0" required  >
                            <input type="text" class="form-control" name="name" required  >
                        </div>


                        <div class="form-group">
                            <label> Start Point </label>
                            <select class="form-control start_point_select" name="start_point">
                                <option class="form-control" selected disabled="" >Select option</option>

                            <?php $__currentLoopData = $stations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option class="form-control" value="<?php echo e($station->id); ?>" ><?php echo e($station->name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> End Point </label>
                            <select class="form-control end_point_select" name="end_point">
                                <option class="form-control" selected disabled="" >Select option</option>

                                <?php $__currentLoopData = $stations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="form-control" value="<?php echo e($station->id); ?>" ><?php echo e($station->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Please select all route points in order * </label>
                            

                            <br>

                            <ul class="stop_list" style="list-style-type: none;height:100px;overflow-y: auto;">
                                <?php $__currentLoopData = $stations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="stop_points[]" class="checkbox-btn" value="<?php echo e($station->id); ?>" > <?php echo e($station->name); ?>

                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
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

    <div class="modal fade" id="form_trip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> New Trip  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal" action="<?php echo e(route('trip.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label> Name </label>
                            <input hidden type="text" class="form-control" name="id" value="0" required  >
                            <input type="text" class="form-control" name="name" required  >
                        </div>

                        <?php $routes = DB::table('routes')->get(); ?>

                        <div class="form-group">
                            <label> Routes </label>
                            <select class="form-control" name="route" required>

                                <option class="form-control" selected disabled="" >Select option</option>

                                <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="form-control" value="<?php echo e($row->id); ?>" ><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label> Date </label>
                            <input type="date" class="form-control" name="date" required >
                        </div>

                        <div class="form-group">
                            <label> Departure at </label>
                            <input type="time" class="form-control" name="departure_at" required >
                        </div>

                        <div class="form-group">
                            <label> Arrival at </label>
                            <input type="time" class="form-control" name="arrival_at" required >
                        </div>

                        <div class="form-group">
                            <label> Seat Price </label>
                            <input id="seat_price" oninput="this.value = Math.abs(this.value)" type="number" class="form-control" name="seat_price"  min="0" required >
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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



    

        
            
            
            
                
                
                
            

            
                

            

        
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel pros\busBookingSystem\resources\views/admin/home.blade.php ENDPATH**/ ?>
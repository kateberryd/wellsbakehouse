
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.my_pro')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.my_pro')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="row rowkey">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <strong class="card-title"><?php echo e(__('messages.my_pro')); ?></strong>
            </div>
            <div class="card-body">
               <div id="pay-invoice">
                  <div class="card-body">
                     <?php if(Session::has('message')): ?>
                     <div class="col-sm-12">
                        <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     <?php endif; ?>
                     <form action="<?php echo e(url('updateprofile')); ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.name')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="text" id="name" placeholder=" <?php echo e(__('messages.name')); ?>" class="form-control" name="name" value="<?php echo e($data->name); ?>">
                        </div>
                        <div class="form-group">
                           <label for="email" class=" form-control-label">
                           <?php echo e(__('messages.email')); ?>

                           </label>
                           <input type="text" readonly id="email" name="email" placeholder="<?php echo e(__('messages.email')); ?>" class="form-control" value="<?php echo e($data->email); ?>">
                        </div>
                        <div class="form-group">
                           <label for="phone_no" class=" form-control-label">
                           <?php echo e(__('messages.phone_no')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="text" id="phone_no" name="phone_no" placeholder="<?php echo e(__('messages.phone_no')); ?>" class="form-control" value="<?php echo e($data->mobile_number); ?>">
                        </div>
                        <div class="form-group">
                           <label for="file" class=" form-control-label">
                           <?php echo e(__('messages.pro_pic')); ?>

                           </label>
                           <img src="<?php echo e(asset('/upload/images/profile/'.'/'.$data->profile_pic)); ?>" class="adminpro" />
                           <div>
                              <input type="file" id="file" name="file" class="form-control-file">
                           </div>
                        </div>
                        <div>
                            <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php endif; ?>
                           
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/catherine/Desktop/UploadingContentV1.3/kingburger/new_king_script_web/kingburger/resources/views/admin/updateprofile.blade.php ENDPATH**/ ?>
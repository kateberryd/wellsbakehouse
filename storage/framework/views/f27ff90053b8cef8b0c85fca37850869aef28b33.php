
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.change_password')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.change_password')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="row rowkey" >
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <strong class="card-title"><?php echo e(__('messages.change_password')); ?></strong>
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
                     <form action="<?php echo e(url('updatepassword')); ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.en_cu_pd')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="password" id="cpwd" placeholder="<?php echo e(__('messages.en_cu_pd')); ?>" class="form-control" name="cpwd" required="" onchange="checkcurrentpwd(this.value)">
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.en_nw_pd')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="password" id="npwd" placeholder="<?php echo e(__('messages.en_nw_pd')); ?>" class="form-control" name="npwd" required="" >
                        </div>
                        <div class="form-group">
                           <label for="name" class=" form-control-label">
                           <?php echo e(__('messages.r_n_pd')); ?>

                           <span class="reqfield">*</span>
                           </label>
                           <input type="password" id="rpwd" placeholder="<?php echo e(__('messages.r_n_pd')); ?>" class="form-control" name="rpwd" onchange="checkboth(this.value)" required="">
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
<input type="hidden" id="pwdsmerr" value="<?php echo e(__('successerr.pwd_sm_error')); ?>" />
<input type="hidden" id="pwd_cor" value="<?php echo e(__('successerr.pwd_cor')); ?>" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/catherine/Desktop/UploadingContentV1.3/kingburger/new_king_script_web/kingburger/resources/views/admin/changepassword.blade.php ENDPATH**/ ?>
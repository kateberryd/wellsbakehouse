
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1><?php echo e(__('messages.Ingredients_Item')); ?></h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li class="active"><?php echo e(__('messages.Ingredients_Item')); ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="content mt-3">
   <div class="row">
      <div class="col-12">
         <div class="card">
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
               <button  class="btn btn-primary btn-flat m-b-30 m-t-30" data-toggle="modal" data-target="#myModal"><?php echo e(__('messages.add')); ?>  <?php echo e(__('messages.Ingredients_Item')); ?></button>
               <div class="table-responsive dtdiv">
                  <table id="itemtab" class="table table-striped dttablewidth">
                     <thead>
                        <tr>
                           <th><?php echo e(__('messages.id')); ?></th>
                           <th><?php echo e(__('messages.category_name')); ?></th>
                           <th><?php echo e(__('messages.menu_name')); ?></th>
                           <th><?php echo e(__('messages.Ingredients_Name')); ?></th>
                           <th><?php echo e(__('messages.type')); ?></th>
                           <th><?php echo e(__('messages.price')); ?></th>
                           <th><?php echo e(__('messages.action')); ?></th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo e(__('messages.add')); ?>  <?php echo e(__('messages.Ingredients_Item')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('add_menu_ingre')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                     <label><?php echo e(__('messages.select_cat')); ?></label>
                     <select class="form-control" name="category" required onchange="updateitem(this.value)">
                        <option value=""><?php echo e(__('messages.select_cat')); ?></option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->cat_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.select_item')); ?></label>
                     <select class="form-control" name="item" required id="itemlist">
                        <option value=""><?php echo e(__('messages.select_item')); ?></option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.item_name')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.item_name')); ?>" name="name" required>
                  </div>
                  <div class="form-group is_hide" id="price_add">
                     <label><?php echo e(__('messages.price')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.price')); ?>" id="price" name="price" required value="0">
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.type')); ?></label>
                     <div class="radio">
                        <label><input value="1" type="radio" onclick="javascript:yesnoCheck('add',this.value);" name="type" id="yesCheck" required="">&nbsp;<?php echo e(__('messages.paid')); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input value="0" type="radio" onclick="javascript:yesnoCheck('add',this.value);" name="type" id="yesCheck" required="" checked="" >&nbsp;<?php echo e(__('messages.free')); ?></label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                        <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-primary btn-md form-control" onclick="disablebtn()">
                           <?php echo e(__('messages.add')); ?>

                           </button>
                           <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-primary btn-md form-control">
                           <?php echo e(__('messages.add')); ?>

                           </button>
                           <?php endif; ?>

                     </div>
                     <div class="col-md-6">
                        <input type="button" class="btn btn-secondary btn-md form-control" data-dismiss="modal" value="<?php echo e(__('messages.close')); ?>">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="editing" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><?php echo e(__('messages.edit')); ?>  <?php echo e(__('messages.Ingredients_Item')); ?>

               </h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form name="menu_form_category" action="<?php echo e(url('update_menu_ingre')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" id="id"/>
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group">
                     <label><?php echo e(__('messages.select_cat')); ?></label>
                     <select class="form-control" name="editcategory" required onchange="updateitem(this.value)" id="editcategory">
                        <option value=""><?php echo e(__('messages.select_cat')); ?></option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->cat_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.select_cat')); ?></label>
                     <select class="form-control" name="item" required id="edititemlist" id="item">
                        <option value=""><?php echo e(__('messages.select_cat')); ?></option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.item_name')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.item_name')); ?>" name="name" id="editname" required>
                  </div>
                  <div class="form-group" id="price_edit">
                     <label><?php echo e(__('messages.price')); ?></label>
                     <input type="text" class="form-control" placeholder="<?php echo e(__('messages.price')); ?>" name="price" id="editprice" required>
                  </div>
                  <div class="form-group">
                     <label><?php echo e(__('messages.type')); ?></label>
                     <div class="radio">
                        <label><input value="1" type="radio" onclick="javascript:yesnoCheck('edit',this.value);" name="edittype" id="edittype" required="">&nbsp;<?php echo e(__('messages.paid')); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input value="0" type="radio" onclick="javascript:yesnoCheck('edit',this.value);"  name="edittype" id="edittype" required="">&nbsp;<?php echo e(__('messages.free')); ?></label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-6">
                           <?php if(Session::get("demo")==0): ?>
                               <button id="payment-button" type="button" class="btn btn-primary btn-md form-control" onclick="disablebtn()">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php else: ?>
                             <button id="payment-button" type="submit" class="btn btn-primary btn-md form-control">
                           <?php echo e(__('messages.update')); ?>

                           </button>
                           <?php endif; ?>
                     </div>
                     <div class="col-md-6">
                        <input type="button" class="btn btn-secondary btn-md form-control" data-dismiss="modal" value="<?php echo e(__('messages.close')); ?>">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/catherine/Desktop/kingburger/resources/views/admin/ingredient/default.blade.php ENDPATH**/ ?>
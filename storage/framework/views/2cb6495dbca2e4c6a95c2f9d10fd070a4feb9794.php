
<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="detail-main">
      <div class="order-d">
         <h1><?php echo e(__('messages.view_order_details')); ?></h1>
      </div>
      <div div class="order-status">
         <ul>
            <li class="process-1">
               <div class="pro-rou">
                  <div class="round-d">
                     <img src="<?php echo e(asset('burger/images/ture.png')); ?>">
                  </div>
               </div>
               <div class="order-d-text">
                  <h1><?php echo e(__('messages.Order_Placed')); ?></h1>
                  <p><?php echo e($order->order_placed_date); ?></p>
               </div>
            </li>
            <?php
               if($order->preparing_date_time!=""){
               	 $class2="process-1";
               	 $divclass2="d";
               }
               else{
               	 $class2="process-2 no-process-1";
               	 $divclass2="d-1";
               }
               ?>
            <li class="<?php echo e($class2); ?>">
               <div class="pro-rou">
                  <div class="round-<?php echo e($divclass2); ?>">
                     <?php if($order->preparing_date_time!=""){?>
                     <img src="<?php echo e(asset('burger/images/ture.png')); ?>">
                     <?php }else{?>
                     <span><?php echo e(__('messages.two')); ?></span>
                     <?php }?>
                  </div>
               </div>
               <div class="order-d-text">
                  <h1><?php echo e(__('messages.preparing')); ?></h1>
                  <p>
                     <?php if($order->preparing_date_time!=""): ?>
                     <?php echo e($order->preparing_date_time); ?>

                     <?php endif; ?>
                  </p>
               </div>
            </li>
            <?php
               if($order->dispatched_date_time!=""){
               	 $class3="process-1";
               	 $divclass3="d";
               }
               else{
               	 $class3="process-2 no-process-1";
               	 $divclass3="d-1";
               }
               
               ?>
            <li class="<?php echo e($class3); ?>">
               <div class="pro-rou">
                  <div class="round-<?php echo e($divclass3); ?>">
                     <?php if($order->dispatched_date_time!=""){?>
                     <img src="<?php echo e(asset('burger/images/ture.png')); ?>">
                     <?php }else{?>
                     <span><?php echo e(__('messages.three')); ?></span>
                     <?php }?>
                  </div>
               </div>
               <div class="order-d-text">
                   <?php if($order->shipping_type==1): ?>
                       <h1><?php echo e(__('messages.wait_pick')); ?></h1>
                   <?php else: ?>
                       <h1><?php echo e(__('messages.dispatching')); ?></h1>
                   <?php endif; ?>
                 
                  <p>
                     <?php if($order->dispatched_date_time!=""): ?>
                     <?php echo e($order->dispatched_date_time); ?>

                     <?php endif; ?>
                  </p>
               </div>
            </li>
            <?php
               if($order->delivered_date_time!=""){
               	 $divclass4="d";
               }
               else{
               	 $divclass4="d-1";
               }
               
               ?>
            <li class="">
               <div class="pro-rou">
                  <div class="round-<?php echo e($divclass4); ?>">
                     <?php if($order->delivered_date_time!=""){?>
                     <img src="<?php echo e(asset('burger/images/ture.png')); ?>">
                     <?php }else{?>
                     <span> <?php echo e(__('messages.four')); ?></span>
                     <?php }?>
                  </div>
               </div>
               <div class="order-d-text">
                     <?php if($order->shipping_type==1): ?>
                       <h1><?php echo e(__('messages.order_pickup')); ?></h1>
                   <?php else: ?>
                      <h1><?php echo e(__('messages.delivered')); ?></h1>
                   <?php endif; ?>
                  
                  <p>
                     <?php if($order->delivered_date_time!=""): ?>
                     <?php echo e($order->delivered_date_time); ?>

                     <?php endif; ?>
                  </p>
               </div>
            </li>
         </ul>
      </div>
      <div class="item-main">
         <div class="row">
            <?php if(Session::has('message')): ?>
            <div class="col-sm-12">
               <div class="alert  <?php echo e(Session::get('alert-class', 'alert-info')); ?> alert-dismissible fade show" role="alert"><?php echo e(Session::get('message')); ?>

                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            </div>
            <?php endif; ?>
            <div class="col-md-12 col-sm-12 col-12 col-lg-8">
               <div class="order-item">
                  <div class="main-order-detail">
                     <h1><?php echo e($order->order_placed_date); ?></h1>
                     <span><?php echo e(Session::get("usercurrency")); ?> <?php echo e($order->total_price); ?></span>
                     <p><?php echo e(count($itemlist)); ?> <?php echo e(__('messages.item_order')); ?></p>
                     <p><?php echo e($order->address); ?></p>
                     <p><?php echo e($order->phone_no); ?></p>
                  </div>
                  <div class="sub-order">
                     <?php $__currentLoopData = $itemlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="sub-order-1">
                        <div class="img">
                           <?php $__currentLoopData = $allmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $as): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($as->id==$item->item_id): ?>
                           <img src="<?php echo e(asset('upload/images/menu_item_icon/'.$as->menu_image)); ?>">
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="sub-order-text">
                           <div class="sub-text-1">
                              <h1><?php echo e($item->itemdata->menu_name); ?></h1>
                              <p><?php $intgr=explode(",",$item->ingredients_id);  ?>
                                 <?php $__currentLoopData = $menu_interdient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php if(in_array($menu->id,$intgr)): ?>
                                 <?php echo e($menu->item_name); ?>,
                                 <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </p>
                           </div>
                           <span>
                              <?php echo e(Session::get("usercurrency")); ?><?php echo e($item->ItemTotalPrice); ?>

                              <h1><?php echo e(Session::get("usercurrency")); ?>   	         		<?php echo e($item->item_amt); ?><img src="<?php echo e(asset('burger/images/cross-1.png')); ?>"><?php echo e($item->item_qty); ?></h1>
                           </span>
                        </div>
                     </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12 col-lg-4">
               <div class="all-data-order">
                  <div class="per-data">
                     <h1><?php echo e(__('messages.per_detail')); ?></h1>
                  </div>
                  <ul>
                     <li class="pro">
                        <h1><?php echo e(__('messages.name')); ?> :</h1>
                        <span><?php echo e($order->name); ?></span>
                     </li>
                     <li class="pro">
                        <h1><?php echo e(__('messages.city')); ?> :</h1>
                        <span><?php echo e($order->city); ?></span>
                     </li>
                     <li class="pro">
                        <h1><?php echo e(__('messages.pay_type')); ?> :</h1>
                        <span><?php echo e($order->payment_type); ?></span>
                     </li>
                     <li class="pro">
                        <h1><?php echo e(__('messages.shipping_type')); ?>:</h1>
                        <span> <?php if($order->shipping_type==0): ?>
                        <?php echo e(__('messages.HD')); ?>

                        <?php endif; ?>
                        <?php if($order->shipping_type==1): ?>
                        <?php echo e(__('messages.LP')); ?>	
                        <?php endif; ?></span>
                     </li>
                  </ul>
               </div>
               <div class="all-data-order-1">
                  <div class="per-data">
                     <h1><?php echo e(__('messages.billing_detail')); ?></h1>
                  </div>
                  <div class="order-sub-total">
                     <div class="sub-total-start">
                        <h1><?php echo e(__('messages.subtotal')); ?>:</h1>
                        <span><?php echo e(Session::get("usercurrency")); ?> <?php echo e($order->subtotal); ?></span>
                     </div>
                     <?php if($order->delivery_mode==0){?>
                     <div class="sub-total-start">
                        <h1><?php echo e(__('messages.DC')); ?> :</h1>
                        <span><?php echo e(Session::get("usercurrency")); ?> <?php echo e($order->delivery_charges); ?></span>
                     </div>
                     <?php }?>
                     <div class="final-total">
                        <h1><?php echo e(__('messages.total')); ?> :</h1>
                        <span><?php echo e(Session::get("usercurrency")); ?> <?php echo e($order->total_price); ?></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.subindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/catherine/Documents/projects/kingburger/resources/views/user/viewdetails.blade.php ENDPATH**/ ?>
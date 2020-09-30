<style type="text/css">
         
    .kb-text-box h2:after{
        background:<?=Session::get("webcolor")?> !important;
        border: 2px solid <?=Session::get("webcolor")?> !important;
    }
    
    .landing-page{
       background-color: #388697;
       width: 100%;
       height: 800px;
       
    }

    .basket{
      font-family: "Montserrat" !important;
      font-size: 16px !important;
      color: #fff !important;
      
    }
    .landing-page .basket{
      text-transform: uppercase;
    }
   .landing-page .img{
      
        background-image:url(<?=Session::get("main_banner")?>) !important;
        background-size: contain !important;
        background-position: right !important;
        border: none !important;
        width:50%;
        margin-top: 100px;
        float: right;
    }

    .footer-section {
     background-color: black;
   }
   .secound-section {
      background-image:  linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.73)),url(<?=Session::get("second_sec_img")?>) !important;
      background-repeat: no-repeat;
      width:100%;
      background-size: cover;
      padding-top: 115px;
      padding-bottom: 95px;
      margin-bottom: 60px;
      height: 900px;
   }

   .about-text h5:after {
       background:<?=Session::get("webcolor")?> !important;
      border: 2px solid <?=Session::get("webcolor")?> !important;
      /* margin-top: 100px !important; */
   }

   .about-text img {
      
      margin-top: 20px !important;
   }
   .about-text p {
      
     font-size: 22px !important;
   }
   
   .price h1{
      font-size: 16px !important;
   }

   .heading h1 {
    
      color: <?=Session::get("webcolor")?> !important;
      font-family: "Dancing Script" !important;
      font-size: 85px;
      font-weight: bold;
   }
   .add_basket{
      font-family: "Roboto";
      font-size: 12px;
      color: #fff;
      font-weight: 500;
      padding: 10px 20px;
      background-color: <?=Session::get("webcolor")?> !important;
      transition: all 0.5s;
      border: none;
      border-radius: 6px;
      cursor: pointer;
        
    }

   .King_script_active:after {
      border-top: 23px solid <?=Session::get("webcolor")?> !important;
   }

   .King_script_active {
      background: <?=Session::get("webcolor")?> !important;
   }

   .head h1:after {
       background:<?=Session::get("webcolor")?> !important;
      border: 2px solid <?=Session::get("webcolor")?> !important;
   }

   .crl {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .fo-text h1:after {
       background:<?=Session::get("webcolor")?> !important;
      border: 2px solid <?=Session::get("webcolor")?> !important;
   }

   .detail-background-box {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .main-pizza-sb-2 {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .about-history h2 {
      color: <?=Session::get("webcolor")?> !important;
   }

   .about-content-1 p span {
      color: <?=Session::get("webcolor")?> !important;
   }

   .contact-head h1:after {
      border: 2px solid <?=Session::get("webcolor")?> !important;
   }

   .contact-head-1 h1:after {
      border: 2px solid <?=Session::get("webcolor")?> !important;
   }

   .contact-head .submit {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .login-modal .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .modal-login-button button {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .requiredfield {
      color: <?=Session::get("webcolor")?> !important;
   }

   .account-page-head h1 {
      color: <?=Session::get("webcolor")?> !important;
   }

   .pending-btn a {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .nav-pills .nav-link.active {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .btn-danger:hover {
      background-color: <?=Session::get("webcolor")?> !important;
      border-color: <?=session::get("webcolor")?> !important;
   }

   .acco-tab-content label span {
      color: <?=Session::get("webcolor")?> !important;
   }

   .acco-button .acco-u-button a {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .cart a:hover {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .detail-product-box .detail-product-head h4 {
      color: <?=Session::get("webcolor")?> !important;
   }

   .detail-ingredients .detail-ingredients-heading:after {
      border: 2px solid <?=Session::get("webcolor")?> !important;
   }

   .detail-product-box .detail-plus-add-cart {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .detail-related-head:after {
      border: 2px solid <?=Session::get("webcolor")?> !important;
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .cart-bill-and-category .cart-head h1 {
      color: <?=Session::get("webcolor")?> !important;
   }

   .cart-category i.fa.fa-trash-o {
      color: <?=Session::get("webcolor")?> !important;
   }

   .checkout-but {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .cric {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .por-1 .price i {
      color: <?=Session::get("webcolor")?> !important;
   }

   .por-1 .b-text p {
      color: <?=Session::get("webcolor")?> !important;
   }

   .viewcart h1 a {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .accordion .card-header {
      border-top: 6px solid <?=Session::get("webcolor")?> !important;
   }

   .accordion.indicator-plus-before.round-indicator .card-header:before {
      color: <?=Session::get("webcolor")?> !important;
   }

   .card-body form span {
      color: <?=Session::get("webcolor")?> !important;
   }

   #orderplacefluttterwave button {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   #orderplacepaypal button {
      background-color: <?=Session::get("webcolor")?> !important;
   }
   div#orderplacestrip .stripe-button-el {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   div#orderplace1 button {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .order-d h1:after {
      border: 3px solid <?=Session::get("webcolor")?> !important;
   }

   .order-status ul .round-d {
      background-color: <?=Session::get("webcolor")?> !important;
   }

   .order-status ul .process-1:after {
      border: 3px solid <?=Session::get("webcolor")?> !important;
   }

   .order-d-text p {
      color: <?=Session::get("webcolor")?> !important;
   }
   .checkbox-acco1 a.card-title{
       color:<?=Session::get("webcolor")?> !important;
   }
   .card-body .sub input{
       background-color:<?=Session::get("webcolor")?> !important;
   }
   .logout-but .btn{
      background-color:<?=Session::get("webcolor")?> !important;
      border: 1px solid <?=Session::get("webcolor")?> !important;
   }

</style><?php /**PATH /home/catherine/Documents/projects/kingburger/resources/views/user/cssclass.blade.php ENDPATH**/ ?>
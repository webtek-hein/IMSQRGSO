

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Admin') {
    echo '<div class="content mt-3">
    <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5" id="itemsrec">New Items Received</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           <div id="demo" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="increase">
           
        </div>
        </div>
        </div>
        </div>'.

        '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5" id="itemsiss">Issued Items</div>
            </div>
         <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo1">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo1" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="issued">
           
        </div>
        </div>
        </div>
        </div>'.

        '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5" id="retitem">Returned Items</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo2">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           <div id="demo2" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="returned">
           
        </div>
        </div>
        </div>
        </div>
        </div>'.

        '<div class="content"><div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5" id="expitems">Expired Item</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo3">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo3" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="expired">
           
        </div>
        </div>
        </div>
        </div>'.
        '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-edit"></i>
              </div>
              <div class="mr-5" id="expitems">Edit Item</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo4">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo4" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="edited">
            
        </div>
        </div>
        </div>
        </div>';}
?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Custodian') {
    echo '<div class="content mt-3">
    <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5" id="itemsrec">New Items Received</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           <div id="demo" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="increase">
           
        </div>
        </div>
        </div>
        </div>'.

    '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5" id="itemsiss">Issued Items</div>
            </div>
         <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo1">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo1" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="issued">
           
        </div>
        </div>
        </div>
        </div>'.

    '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5" id="retitem">Returned Items</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo2">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           <div id="demo2" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="returned">
           
        </div>
        </div>
        </div>
        </div>
        </div>'.

    '<div class="content"><div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5" id="expitems">Expired Item</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo3">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo3" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="expired">
           
        </div>
        </div>
        </div>
        </div>'.
    '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-edit"></i>
              </div>
              <div class="mr-5" id="expitems">Edit Item</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo4">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo4" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="edited">
            
        </div>
        </div>
        </div>
        </div>';}
?>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Supply Officer') {
    echo '<div class="content mt-3">
  <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5" id="itemsiss">Issued Items</div>
            </div>
         <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo1">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo1" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="issued">
           
        </div>
        </div>
        </div>
        </div>'.

        '<div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5" id="retitem">Returned Items</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo2">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           <div id="demo2" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="returned">
           
        </div>
        </div>
        </div>
        </div>
        </div>'.

        '<div class="content"><div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5" id="expitems">Expired Item</div>
            </div>
            <a type="button" class="card-footer text-white clearfix small z-1" data-toggle="collapse" data-target="#demo3">
              <span class="float-left" style="color:black">View Details</span>
               <span class="float-right">
                 <i class="fa fa-angle-right" style="color:black"></i>
               </span>
             </a>
           
           <div id="demo3" class="collapse ScrollStyle" style="color:black">
        <div class="list-group" id="expired">
           
        </div>
        </div>
        </div>
        </div>';
}
?>
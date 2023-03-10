@extends('layouts.main')
@section('content') 
<div class="page-body">
   <div class="container-fluid">
      <div class="page-title">
         <div class="row">
            <div class="col-6">
               <h3>Draggable Card</h3>
            </div>
            <div class="col-6">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}"> <i data-feather="home"></i></a></li>
                  <li class="breadcrumb-item">Bonus Ui</li>
                  <li class="breadcrumb-item active">Draggable Card</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row ui-sortable" id="draggableMultiple">
         <div class="col-sm-12 col-xl-6">
            <div class="card">
               <div class="card-header">
                  <h5>Basic Card</h5>
               </div>
               <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-6">
            <div class="card b-r-0">
               <div class="card-header">
                  <h5>Flat Card</h5>
               </div>
               <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-6">
            <div class="card shadow-0 border">
               <div class="card-header">
                  <h5>Without shadow Card</h5>
               </div>
               <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-6">
            <div class="card">
               <div class="card-header">
                  <h5><i class="icon-move me-2"></i> Icon in Heading</h5>
               </div>
               <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-6">
            <div class="card">
               <div class="card-header">
                  <h5>Card sub Title</h5>
                  <span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
               </div>
               <div class="card-body">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-xl-6">
            <div class="card">
               <div class="card-header">
                  <h5>Card sub Title</h5>
                  <span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
               </div>
               <div class="card-body">
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid Ends-->
</div>
@endsection
@section('css')
<style type="text/css"></style>
@endsection
@section('js')
<script type="text/javascript"></script>
@endsection
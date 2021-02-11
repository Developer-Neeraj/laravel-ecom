@extends('admin/layout')
@section('product_title', 'Manage Product')
@section('product_select', 'active')
@section('container')
@if ($id>0)
{{ $request_required = ''}}        
@else
{{ $request_required = 'required'}}            
@endif
<h1>Manage Product</h1>
<a href="{{url('admin/product')}}" class="mt-2">
<button type="button" class="btn btn-success">
Back
</button>
</a>

<div class="row m-t-30">
   <div class="col-md-12">
      <form action="{{route('category.manage_product_process')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-body">
                        <div class="form-group">
                           <label for="name" class="control-label mb-1">Name</label>
                           <input id="name" value="{{$name}}" name="name" type="text" class="form-control" required>
                           @error('name')
                           {{$message}}
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="slug" class="control-label mb-1">Slug</label>
                           <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" required>
                           @error('slug')
                           {{$message}}
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="images" class="control-label mb-1">Image</label>
                           <input id="images" name="images" type="file" class="form-control" {{ $request_required }}>
                           @error('images')
                           {{$message}}
                           @enderror
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="category_id" class="control-label mb-1">Category</label>
                              <select id="category_id" name="category_id" type="text" class="form-control" required>
                                 <option value="">Select Category</option>
                                 @foreach ($category as $item)
                                 @if ($category_id == $item->id)
                                 <option selected value="{{ $item->id }}">    
                                    @else
                                 <option value="{{ $item->id }}">
                                    @endif    
                                    {{ $item->category_name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="brand" class="control-label mb-1">Brand</label>
                              <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="model" class="control-label mb-1">Model</label>
                              <input id="model" value="{{$model}}" name="model" type="text" class="form-control" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="short_desc" class="control-label mb-1">Short Description</label>
                           <textarea id="short_desc" name="short_desc" type="text" class="form-control" required>
                           {{$short_desc}}
                           </textarea>
                        </div>
                        <div class="form-group">
                           <label for="description" class="control-label mb-1">Description</label>
                           <textarea id="description" name="description" type="text" class="form-control" required>
                           {{$description}}
                           </textarea>
                        </div>
                        <div class="form-group">
                           <label for="keyword" class="control-label mb-1">Keyword</label>
                           <textarea id="keyword" name="keyword" type="text" class="form-control" required>
                           {{$keyword}}
                           </textarea>
                        </div>
                        <div class="form-group">
                           <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                           <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" required>
                           {{$technical_specification}}
                           </textarea>
                        </div>
                        <div class="form-group">
                           <label for="uses" class="control-label mb-1">Uses</label>
                           <textarea id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" required>
                           </textarea>
                        </div>
                        <div class="form-group">
                           <label for="warranty" class="control-label mb-1">Warranty</label>
                           <textarea id="warranty" name="warranty" type="text" class="form-control" required>
                           {{$warranty}}
                           </textarea>
                        </div>
                     </div>
               </div>
            </div>
         </div>
         

         <div class="m-t-30">
            <h1 class="mb-2">Add Attribute</h1>
            <div class="row">
            <div class="col-lg-12" id="html_row_attr1">
               @foreach ($productAttrArr as $key=>$val)
                  <?php
                     $pARR = (array)$val;
                     echo "<pre>";
                     print_r($pARR);
                     echo "</pre>";
                  ?>
                  <div class="card">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="row">
                              <div class="form-group col-md-2">
                                 <label for="sku" class="control-label mb-1">SKU</label>
                                 <input type="text" name="sku[]" value="{{ $pARR['sku'] }}" id="sku" class="form-control" required>
                              </div>      
                              <div class="form-group col-md-2">
                                 <label for="mrp" class="control-label mb-1">MRP</label>
                                 <input id="mrp" name="mrp[]" type="text" value="{{ $pARR['mrp'] }}" class="form-control" required>
                              </div>
                              <div class="form-group col-md-2">
                                 <label for="price" class="control-label mb-1">Price</label>
                                 <input id="price" name="price[]" value="{{ $pARR['price'] }}" type="text" class="form-control" required>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="size_id" class="control-label mb-1">Size</label>
                                 <select id="size_id" name="size[]" type="text" class="form-control" required>'
                                    <option value="">Select Size</option>
                                    @foreach ($size as $list)
                                       @if ($pARR['size_id'] == $list->id)
                                          <option value="{{ $list->id }}" selected>{{ $list->size }}</option> 
                                       @else
                                          <option value="{{ $list->id }}">{{ $list->size }}</option> 
                                       @endif
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group col-md-3">
                                 <label for="color" class="control-label mb-1">Color</label>
                                 <select id="color" name="color[]" type="text" class="form-control" required>'
                                    <option value="">Select Color</option>
                                    @foreach ($color as $item)
                                       @if ($pARR['color_id'] == $item->id)
                                          <option value="{{ $item->id }}" selected>{{ $item->color }}</option> 
                                       @else
                                          <option value="{{ $item->id }}">{{ $item->color }}</option> 
                                       @endif
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group col-md-2">
                                 <label for="qty" class="control-label mb-1">Qty</label>
                                 <input id="qty" name="qty[]" value="{{ $pARR['qty'] }}" type="text" class="form-control" required>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="attr_images" class="control-label mb-1">Image</label>
                                 <input id="attr_images" name="attr_images[]" value="{{ $pARR['sku'] }}" type="file" class="form-control" required>
                              </div>
                              <div class="form-group col-md-4">
                                 <label for="attr_images" class="control-label mb-1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 </label>
                                 <div>
                                    <button type="button" onclick="add_more()" class="btn btn-success">
                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                       &nbsp; Add
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
            </div>
         </div>
         

         <div>
               <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                  Submit
               </button>
         </div>
         <input type="hidden" name="id" value="{{$id}}">
      </form>
   </div>
</div>

<script>
   var loop_count = 1;
   function add_more() {
       loop_count++;
       var html = '<div class="card" id="html_row_attr'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';
           html+='<div class="form-group col-md-2"><label for="sku" class="control-label mb-1">SKU</label><input type="text" name="sku[]" id="sku" class="form-control" required></div>';
           html+= '<div class="form-group col-md-2"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" required></div>';
           html+= '<div class="form-group col-md-2"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="text" class="form-control" required></div>';
       var sizeData = jQuery("#size_id").html();
           html+= '<div class="form-group col-md-3"><label for="size_id" class="control-label mb-1">Size</label><select id="size_id" name="size[]" type="text" class="form-control" required>'
           +sizeData+
           '</select></div>';
       var colorData = jQuery("#color").html();
   
           html+= '<div class="form-group col-md-3"><label for="color" class="control-label mb-1">Color</label><select id="color" name="color[]" type="text" class="form-control" required>'
                       +colorData+
                   '</select></div>';
           html+=  '<div class="form-group col-md-2"><label for="qty" class="control-label mb-1">Qty</label><input id="qty" name="qty[]" type="text" class="form-control" required></div>';
           html+=   '<div class="form-group col-md-4"><label for="attr_images" class="control-label mb-1">Image</label><input id="attr_images" name="attr_images[]" type="file" class="form-control" required></div>';
           html+=    '<div class="form-group col-md-4"><label for="attr_images" class="control-label mb-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><div><button type="button" onclick="remove_more('+loop_count+')" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i>&nbsp; Remove</button></div></div>';            
           html+= '</div></div></div><div>';
           jQuery("#html_row_attr1").append(html);
   }
   function remove_more(loop_count) {
       jQuery("#html_row_attr"+loop_count).remove();
   }
</script>
@endsection
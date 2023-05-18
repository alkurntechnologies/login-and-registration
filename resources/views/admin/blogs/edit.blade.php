@extends('admin.layouts.master_admin')

{{config('app.name')}} | Edit Blog

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Blog</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">  
                <form action="" method="post"
                        id="edit_business_form" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail4">Title</label>
                            <input type="text" class="form-control" name="title"
                                    id="title" placeholder="Enter title" required=""  data-parsley-required-message="Please enter title." value="{{@$row->title}}">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail4">Author</label>
                            <input type="text" class="form-control" name="author"
                                    id="author" placeholder="Enter author" data-parsley-required-message="Please enter author." value="{{@$row->author}}">
                            @if ($errors->has('author'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('author') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group ns-des show-maze-images">
                            <label for="exampleInputEmail4">Description</label> 
                            <textarea name="description" id="description" placeholder="Enter description" class="form-control" required="" data-parsley-required-message="Please enter description." data-parsley-errors-container="#descriptionError">{!! @$row->description !!}</textarea>

                            <div id="descriptionError" class=""></div>
                                
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="exampleInputEmail4">Image</label>
                            @if(@$row->image!='')<img src="{{url('storage/app').'/'.@$row->image}}" height="100" width="150">@endif

                            <label class="d-block" for="exampleInputEmail4">Update Image</label>
                            <input type="file" class="form-control img-upload-tag" name="image"
                                    id="image" data-parsley-required-message="Please upload image." data-parsley-fileextension="jpg,jpeg,png,JPG,JPEG,PNG">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail4">Status</label>
                            <select name="status" id="status" class="form-control" required=""  data-parsley-required-message="Please select status."  data-parsley-errors-container="#statusError">
                                <option value="1" @if(@$row->status)==1) selected @endif>Active</option>
                                <option value="0" @if(@$row->status==0) selected @endif>De-Active</option>
                            </select>

                            <div id="statusError" class="mt-2"></div>

                            @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-info" value="Save">

                    </fieldset>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{--Footer--}}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('admin_script_codes')
<script type="text/javascript">
    $(document).ready(function() {
        $('#description').summernote({height: 300});
    });
</script>


@endsection

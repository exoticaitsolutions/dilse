<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card">
                    <div class="card-body">
                    <form method="POST" action="{{ route('admin.blog.update' ,$blog->id )}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf @method('PUT')
                        <div class="form-group">
                        <label for="blog_title">   {{ __('Blog Title *') }}</label>
                            <input type="text" name="blog_title" id="blog_title" class="form-control" placeholder ="Blog title" value="{{ old('blog_title', $blog->blog_title) }}">
                            @error('blog_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_slug">   {{ __('Blog Slug *') }}</label>
                            <input type="text" name="blog_slug" id="blog_slug" class="form-control" readonly placeholder ="Blog Slug" value="{{ old('blog_slug' , $blog->blog_slug) }}">
                            @error('blog_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_content"> {{ __('Blog Content') }}</label>
                        <textarea name="blog_content" id="blog_content" class="form-control" placeholder="Blog Content" >{{ old('blog_content' ,$blog->blog_content) }}</textarea>
                            @error('blog_content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_title">   {{ __('Blog Meta Title  *') }}</label>
                            <input type="text" name="blog_meta_title" id="blog_meta_title" class="form-control"  placeholder ="Blog Meta Title" value="{{ old('blog_meta_title' ,$blog->blog_meta_title) }}">
                            @error('blog_meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_description"> {{ __('Blog Meta Description') }}</label>
                        <textarea name="blog_meta_description" id="blog_content" class="form-control" placeholder="Blog Content" >{{ old('blog_meta_description' ,$blog->blog_meta_description) }}</textarea>
                            @error('blog_meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">   {{ __('Banner status') }}</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value="published" {{ old('status' ,$blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                             <option value="inactive" {{ old('status' ,$blog->status) == 'inactive' ? 'selected' : '' }}>Inactive
                             <option value="draft" {{ old('status' ,$blog->status) == 'draft' ? 'selected' : '' }}>Draft
                            </select>

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>
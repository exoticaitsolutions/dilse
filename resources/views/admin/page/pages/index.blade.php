<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Pages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                <a href="{{ route('admin.manage-pages.create')}}" type ="button" class="btn btn-success float-right" >Add Pages</a>
              </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Page Title </th>
                                        <th>Page Slug </th>
                                        <th>Page Content </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ( $page)
                                @foreach ( $page as $key => $pageValue )
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pageValue->page_title }}</td>
                                <td>{{ $pageValue->page_slug }}</td>
                                <td>{!! \Illuminate\Support\Str::limit(strip_tags($pageValue->page_content)) !!}</td>
                                <td>{{ $pageValue->page_title }}</td>
                                <td class="project-actions">
                          <a class="btn btn-info btn-sm" href="{{ route('admin.manage-pages.edit', $pageValue->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('admin.manage-pages.destroy', $pageValue->id) }}" data-confirm-delete="true">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                                </tr>

                                @endforeach

                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

</x-admin-app-layout>

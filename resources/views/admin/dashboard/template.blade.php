@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endpush

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVideo">
                    add video
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>content</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->content }}</td>
                            <td>
                                <i class="bi bi-check-circle"></i>
                                <button type="button" class="btn btn-sm btn-default mr-2" data-bs-toggle="modal" data-bs-target="#viewVideo_{{$video->id}}">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-default mr-2" data-bs-toggle="modal" data-bs-target="#editVideo_{{$video->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('admin.delete.media', [$video->id, 'video']) }}" class="d-inline-block" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-default mr-2"><i class="bi bi-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="editVideo_{{$video->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editVideo_{{$video->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.edit.video', $video->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf    
                                        <div class="form-group">
                                            <div class="form-control">
                                                <input type="file" name="video" id="video">
                                            </div>
                                        </div>
                                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Edit Video</button>
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="viewVideo_{{$video->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewVideo_{{$video->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <video src="{{ asset('video/'.$video->content) }}" controls></video>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBanner">
                add banner
            </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>content</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->content }}</td>
                            <td>
                                <i class="bi bi-check-circle"></i>
                                <button type="button" class="btn btn-sm btn-default mr-2" data-bs-toggle="modal" data-bs-target="#viewBanner_{{$banner->id}}">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-default mr-2" data-bs-toggle="modal" data-bs-target="#editBanner_{{$banner->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('admin.delete.media', [$banner->id, 'image']) }}" class="d-inline-block" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-default mr-2"><i class="bi bi-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="editBanner_{{$banner->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editBanner_{{$banner->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.edit.image', $banner->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf    
                                        <div class="form-group">
                                            <div class="form-control">
                                                <input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Edit Image</button>
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="viewBanner_{{$banner->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewBanner_{{$banner->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('image/'.$banner->content) }}" alt="" srcset="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLogo">
                    add logo
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>content</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logos as $logo)
                        <tr>
                            <td>{{ $logo->content }}</td>
                            <td>
                                <i class="bi bi-check-circle"></i>
                                <button type="button" class="btn btn-sm btn-default mr-2" data-bs-toggle="modal" data-bs-target="#viewLogo_{{$logo->id}}">
                                    <i class="bi bi-eye-slash"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-default mr-2" data-bs-toggle="modal" data-bs-target="#editLogo_{{$logo->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('admin.delete.media', [$logo->id, 'image']) }}" class="d-inline-block" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-default mr-2"><i class="bi bi-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="editLogo_{{$logo->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLogo_{{$logo->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.edit.image', $logo->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf    
                                        <div class="form-group">
                                            <div class="form-control">
                                                <input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Edit Image</button>
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="viewLogo_{{$logo->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewLogo_{{$logo->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('image/'.$logo->content) }}" alt="" srcset="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTable">
                add Table text
            </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title1</th>
                            <th>Title2</th>
                            <th>Title3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables1 as $table)
                        <tr>
                            <td>{{ $table->title1 }}</td>
                            <td>{{ $table->title2 }}</td>
                            <td>{{ $table->title3 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTable2">
                    add Table 2 text 
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title3</th>
                            <th>Title4</th>
                            <th>Title5</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables2 as $table)
                        <tr>
                            <td>{{ $table->title1 }}</td>
                            <td>{{ $table->title2 }}</td>
                            <td>{{ $table->title3 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTable3">
                    add Table 3 text
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title6</th>
                            <th>Title7</th>
                            <th>Title8</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables3 as $table)
                        <tr>
                            <td>{{ $table->title1 }}</td>
                            <td>{{ $table->title2 }}</td>
                            <td>{{ $table->title3 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
    <!-- Modal -->
    <div class="modal fade" id="addTable3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTable3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTable3Label">Add Row for Table3</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.add.row', 'table3') }}" method="post">
                    @csrf    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 1</label>
                                <input type="text" class="form-control" name="title1" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 2</label>
                                <input type="text" class="form-control" name="title2" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 3</label>
                                <input type="text" class="form-control" name="title3" id="">
                            </div>
                        </div>
                    </div>
                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Add Row</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
    <!-- Modal -->
    <div class="modal fade" id="addTable2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTable2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTable2Label">Add Row for Table2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.add.row', 'table2') }}" method="post">
                    @csrf    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 1</label>
                                <input type="text" class="form-control" name="title1" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 2</label>
                                <input type="text" class="form-control" name="title2" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 3</label>
                                <input type="text" class="form-control" name="title3" id="">
                            </div>
                        </div>
                    </div>
                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Add Row</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
    <!-- Modal -->
    <div class="modal fade" id="addTable" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTableLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTableLabel">Add Row for Table1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.add.row', 'table1') }}" method="post">
                    @csrf    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 1</label>
                                <input type="text" class="form-control" name="title1" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 2</label>
                                <input type="text" class="form-control" name="title2" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">Title 3</label>
                                <input type="text" class="form-control" name="title3" id="">
                            </div>
                        </div>
                    </div>
                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Add Row</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
    <!-- Modal -->
    <div class="modal fade" id="addLogo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLogoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLogoLabel">Add Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.add.image', 'logo') }}" method="post" enctype="multipart/form-data">
                    @csrf    
                    <div class="form-group">
                            <div class="form-control">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Add Logo</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
    <!-- Modal -->
    <div class="modal fade" id="addBanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBannerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBannerLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.add.image', 'banner') }}" method="post" enctype="multipart/form-data">
                    @csrf    
                    <div class="form-group">
                            <div class="form-control">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Add Image</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
    <!-- Modal -->
    <div class="modal fade" id="addVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addVideoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVideoLabel">Add Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.add.video') }}" method="post" enctype="multipart/form-data">
                    @csrf    
                    <div class="form-group">
                            <div class="form-control">
                                <input type="file" name="video" id="video">
                            </div>
                        </div>
                        <button class="mt-2 btn btn-sm btn-primary" type="submit">Add Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush
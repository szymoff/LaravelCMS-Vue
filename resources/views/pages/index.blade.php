@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pages <small>(3)</small></h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary">Add Page<i class="ni ni-fat-add"></i></a> 
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Page Title</th>
                                    <th scope="col">Page Content</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach ($pages as $page)
                                        <tr>
                                        <th scope="row">
                                               <a href="{{route('pages.show', $page->id)}}">{{ $page->title }}</a>
                                            </th>
                                            <td>
                                                    {{ $page->content }}
                                            </td>
                                            <td>
                                                @if ($page->sketch === 0)
                                                    Published <i class="ni ni-check-bold text-blue"></i>
                                                @endif
                                            </td>
                                            <td>
                                                    {{ $page->created_at }}
                                            </td>
                                            <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            
                                                                <form action="" method="post">                                                                
                                                                    <a class="dropdown-item" href="{{route('pages.edit', $page->id)}}">{{ __('Edit') }}</a>
                                                                </form>  
                                                            <form action="{{route('pages.destroy', $page->id)}}" method="POST">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                   <input type="submit" class="dropdown-item" value="Delete"/>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </td>
                                        </tr>
                                    @endforeach
                                
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
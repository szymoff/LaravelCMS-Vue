@extends('layouts.app', ['title' => __('Edit Page')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Page')])   
    @if ( $errors->count() > 0 )
    <div class="alert alert-danger">
    <ul>
            @foreach( $errors->all() as $message )</p>
    <li>{{ $message }}</li>
            @endforeach
          </ul>
    </div>
        @endif
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Create Page') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('pages.index') }}" class="btn btn-sm btn-primary">{{ __('Back to pages list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pages.update', $page->id) }}" autocomplete="off">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Page Data') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Podaj nazwę strony') }}</label>
                                    <input type="text" name="title" id="input-name" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $page->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('meta_description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-meta_description">{{ __('meta_description') }}</label>
                                        <input type="text" name="meta_description" id="input-meta_description" class="form-control form-control-alternative{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" placeholder="{{ __('meta_description') }}" value="{{ $page->meta_description }}" required>
    
                                        @if ($errors->has('meta_description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('meta_description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    

                                    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-content">{{ __('content') }}</label>
                                            <input type="text" name="content" id="input-content" class="form-control form-control-alternative{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="{{ __('content') }}" value="{{ $page->content }}" required>
        
                                            @if ($errors->has('content'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    <div class="form-group{{ $errors->has('meta_title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-meta_title">{{ __('meta_title') }}</label>
                                    <input type="text" name="meta_title" id="input-meta_title" class="form-control form-control-alternative{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" placeholder="{{ __('meta_title') }}" value="{{ $page->meta_title }}" required>

                                    @if ($errors->has('meta_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('meta_title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
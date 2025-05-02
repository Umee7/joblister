@extends('layouts.app')

@section('layout-holder')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-lg-8">
            <h1 class="mb-3">Companies</h1>
            <p class="text-muted">Discover great places to work</p>
        </div>
    </div>

    <div class="row">
        @forelse($companies as $company)
            <div class="col-md-4 mb-4">
                <div class="card company-card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset($company->logo) }}" alt="{{ $company->title }}" class="company-logo mr-3">
                            <div>
                                <h5 class="card-title mb-1">
                                    <a href="{{ route('account.employer', $company->user_id) }}" class="text-dark text-decoration-none">
                                        {{ $company->title }}
                                    </a>
                                </h5>
                                @if($company->category)
                                    <span class="badge badge-light">{{ $company->category->category_name }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <p class="card-text text-muted mb-3">{{ Str::limit($company->description, 100) }}</p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="fas fa-briefcase mr-1"></i>
                                {{ $company->posts->count() }} {{ Str::plural('job', $company->posts->count()) }}
                            </span>
                            <a href="{{ $company->website }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-external-link-alt mr-1"></i>
                                Visit Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-2"></i>
                    No companies found.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $companies->links() }}
    </div>
</div>
@endsection

@push('css')
<style>
    .company-card {
        transition: transform 0.2s ease-in-out;
    }
    
    .company-card:hover {
        transform: translateY(-5px);
    }
    
    .company-logo {
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 8px;
        background-color: #f8f9fa;
        padding: 8px;
    }
    
    .badge {
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 20px;
    }
</style>
@endpush 
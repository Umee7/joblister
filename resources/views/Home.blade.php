@extends('layouts.app')

@section('layout-holder')
  <section class="home-page bg-primary py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="px-lg-4">
            <div class="hero-content mb-5">
              <h1 class="display-4 text-primary mb-3">Find Your Dream Job Today</h1>
              <p class="lead text-secondary mb-4">Search through thousands of job listings from top companies</p>
            </div>
            <form action="{{route('job.index')}}" class="search-form">
              <div class="search-input-group">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="q" placeholder="Search jobs by title, keyword, or company" class="search-input">
                <button type="submit" class="search-button">
                  Search Jobs
                </button>
              </div>
              <div class="search-categories">
                @foreach ($categories->take(5) as $category)
                  <a href="{{URL::to('search?category_id='.$category->id)}}" class="category-tag">
                    {{$category->category_name}}
                  </a>
                @endforeach
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
          <div class="text-center">
            <img src="{{asset('images/hero-illustration.svg')}}" alt="Job Search" class="img-fluid hero-image">
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="jobs-section py-5 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card bg-secondary shadow-sm">
            <div class="card-header bg-secondary border-bottom d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0 text-primary">
                <i class="fas fa-briefcase mr-2"></i> Featured Jobs
              </h5>
              <a href="{{route('job.index')}}" class="btn btn-link text-primary">View All <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            <div class="card-body bg-secondary">
              <div class="row">
                @foreach ($posts as $post)
                  @if ($post->company)
                    <div class="col-md-6 mb-4">
                      <a href="{{route('post.show',['job'=>$post->id])}}" class="text-decoration-none">
                        <div class="job-item bg-tertiary p-3 rounded">
                          <div class="d-flex align-items-center">
                            <div class="company-logo mr-3">
                              <img src="{{asset($post->company->logo)}}" alt="{{$post->company->title}}" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: contain;">
                            </div>
                            <div class="job-info">
                              <h6 class="company-name text-primary mb-1">{{$post->company->title}}</h6>
                              <p class="job-title text-primary mb-1">{{$post->job_title}}</p>
                              <div class="job-meta">
                                <small class="text-secondary"><i class="fas fa-map-marker-alt mr-1"></i> {{$post->job_location}}</small>
                                <small class="text-secondary ml-2"><i class="fas fa-clock mr-1"></i> {{$post->job_type}}</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card bg-secondary shadow-sm mb-4">
            <div class="card-header bg-secondary border-bottom">
              <h5 class="card-title mb-0 text-primary">
                <i class="fas fa-building mr-2"></i> Top Employers
              </h5>
            </div>
            <div class="card-body bg-secondary">
              <div class="top-employers d-flex flex-wrap gap-3">
                @foreach ($topEmployers as $employer)
                  <a href="{{route('account.employer',['employer'=>$employer])}}" class="top-employer bg-tertiary p-2 rounded">
                    <img src="{{asset($employer->logo)}}" alt="{{$employer->title}}" class="img-fluid" style="width: 80px; height: 80px; object-fit: contain;">
                  </a>
                @endforeach
              </div>
            </div>
          </div>

          <div class="card bg-secondary shadow-sm">
            <div class="card-header bg-secondary border-bottom">
              <h5 class="card-title mb-0 text-primary">
                <i class="fas fa-th-large mr-2"></i> Browse by Category
              </h5>
            </div>
            <div class="card-body bg-secondary">
              <div class="jobs-category">
                @foreach ($categories as $category)
                  <a href="{{URL::to('search?category_id='.$category->id)}}" class="category-item text-secondary">
                    {{$category->category_name}}
                  </a>
                @endforeach
              </div>
              <div class="text-center mt-3">
                <a href="{{route('job.index')}}" class="btn btn-link text-primary">View All Categories <i class="fas fa-arrow-right ml-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-secondary py-5">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8">
          <h2 class="text-primary mb-4">Why Choose JobLister?</h2>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="feature-item bg-tertiary">
                <i class="fas fa-search fa-2x text-primary mb-3"></i>
                <h5 class="text-primary">Easy Job Search</h5>
                <p class="text-secondary">Find the perfect job match with our powerful search tools</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-item bg-tertiary">
                <i class="fas fa-building fa-2x text-primary mb-3"></i>
                <h5 class="text-primary">Top Companies</h5>
                <p class="text-secondary">Connect with leading companies and organizations</p>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="feature-item bg-tertiary">
                <i class="fas fa-laptop fa-2x text-primary mb-3"></i>
                <h5 class="text-primary">Remote Work</h5>
                <p class="text-secondary">Discover remote and flexible job opportunities</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('css')
<style>
  .hero-content h1 {
    font-weight: 700;
    letter-spacing: -0.02em;
    background: linear-gradient(135deg, var(--text-primary) 0%, var(--accent-primary) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .hero-image {
    max-width: 500px;
    filter: drop-shadow(0 10px 16px rgba(0, 0, 0, 0.2));
  }

  .feature-item {
    padding: 2rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
  }
  
  .feature-item:hover {
    transform: translateY(-5px);
    border-color: var(--accent-primary);
    box-shadow: var(--shadow-md);
  }
  
  .category-item {
    display: block;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
    margin-bottom: 0.5rem;
  }
  
  .category-item:hover {
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    text-decoration: none;
    border-color: var(--accent-primary);
  }

  .job-item {
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
  }

  .job-item:hover {
    transform: translateY(-2px);
    border-color: var(--accent-primary);
    box-shadow: var(--shadow-md);
  }

  .top-employer {
    transition: all 0.3s ease;
    border: 1px solid var(--border-color);
  }

  .top-employer:hover {
    transform: translateY(-2px);
    border-color: var(--accent-primary);
    box-shadow: var(--shadow-sm);
  }

  .top-employers {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 1rem;
  }
</style>
@endpush


<footer class="bg-secondary">
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr text-primary">For Job Seekers</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="{{route('register')}}" class="footer-links">Register <span class="badge badge-primary">Free</span></a>
             <a href="{{route('login')}}" class="footer-links">Login</a>
             <a href="" class="footer-links">Find jobs</a>
             <a href="#" class="footer-links">Faq</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr text-primary">For Employers</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="{{route('register')}}" class="footer-links">Register <span class="badge badge-primary">Free</span></a>
             <a href="{{route('login')}}" class="footer-links">Login</a>
             <a href="{{route('post.create')}}" class="footer-links">Vacancy Announcement</a>
             <a href="#" class="footer-links">Faq</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr text-primary">Links</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="#" class="footer-links">Home</a>
             <a href="#" class="footer-links">About Us</a>
             <a href="#" class="footer-links">Advertise</a>
             <a href="#" class="footer-links">Contact Us</a>
             <a href="#" class="footer-links">Faq</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h3 class="footer-brand mb-2 text-primary">JobLister</h3>
            <div class="footer-link-list">
             <a href="#" class="footer-links"><i class="fas fa-compass"></i> Newroad,kathmadndu-64400,Nepal</a>
             <a href="tel:98400001511" class="footer-links"><i class="fas fa-phone"></i> +977-6000-000</a>
             <a href="tel:98400001511" class="footer-links"><i class="fas fa-mobile"></i> +977-9840003200</a>
             <a href="mailto:info@joblister.com" class="footer-links"><i class="fas fa-envelope"></i> info@joblister.com</a>
             <div class="social-links">
               <a href="https://www.facebook.com" target="_blank" class="social-link"><i class="fab fa-facebook"></i></a>
               <a href="https://www.twitter.com" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
               <a href="https://www.linkedin.com" target="_blank" class="social-link"><i class="fab fa-linkedin"></i></a>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

@push('css')
<style>
  .footer-main {
    background-color: var(--bg-secondary);
    color: var(--text-primary);
    padding: 2rem 0;
  }
  .footer-links {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
  .footer-links .footer-hdr {
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 1rem;
  }
  .footer-links .footer-link-list .footer-links {
    display: block;
    color: var(--text-secondary);
    padding: 0.5rem 0;
    margin: 0;
    font-size: 0.9rem;
    transition: all 0.3s ease;
  }
  .footer-links .footer-link-list .footer-links:hover {
    color: var(--text-primary);
    transform: translateX(5px);
  }
  .footer-main .social-links {
    margin: 1.5rem 0;
  }
  .footer-main .social-links .social-link {
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    padding: 0.75rem;
    border-radius: 50%;
    transition: all 0.3s ease;
    margin-right: 0.5rem;
  }
  .footer-main .social-links .social-link:hover {
    color: var(--text-primary);
    background-color: var(--accent-primary);
    transform: translateY(-3px);
  }
  .line-divider {
    height: 2px;
    background: var(--border-color);
    margin: 0.5rem 0;
    width: 50px;
  }
</style>
@endpush
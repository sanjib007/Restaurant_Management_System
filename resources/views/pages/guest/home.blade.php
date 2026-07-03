@extends('main-layout.guest')

@section('guestContent')
<style>
  /* ─── Modern Home Page Styling ─── */
  body {
    background-color: #f8fafc;
    color: #334155;
  }
  
  /* Hero Carousel Customizations */
  .carousel-item {
    height: 540px;
    background: #0f172a;
  }
  .carousel-item img {
    height: 540px;
    object-fit: cover;
    opacity: 0.85;
    transition: transform 6s ease;
  }
  .carousel-item.active img {
    transform: scale(1.05);
  }
  .carousel-caption {
    bottom: 20%;
    left: 10%;
    right: auto;
    text-align: left;
    background: rgba(15, 23, 42, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    padding: 2.5rem;
    border-radius: 20px;
    max-width: 580px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  }
  .carousel-caption h5 {
    font-size: 2.2rem;
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.5px;
    margin-bottom: 0.75rem;
    line-height: 1.2;
  }
  .carousel-caption p {
    font-size: 1.05rem;
    color: #e2e8f0;
    margin-bottom: 1.5rem;
    line-height: 1.6;
  }

  /* Section Headers */
  .section-header {
    text-align: center;
    margin-bottom: 3.5rem;
  }
  .section-header .badge-pill {
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    padding: 6px 16px;
    background: rgba(23, 162, 184, 0.12);
    color: #17a2b8;
    margin-bottom: 1rem;
    display: inline-block;
  }
  .section-header h2 {
    font-size: 2.4rem;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 0.75rem;
  }
  .section-header p {
    color: #64748b;
    font-size: 1.1rem;
    max-width: 650px;
    margin: 0 auto;
  }

  /* Feature Cards */
  .feature-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    border: 1px solid #f1f5f9;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    transition: all 0.3s ease;
    height: 100%;
  }
  .feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    border-color: #cbd5e1;
  }
  .feature-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    margin-bottom: 1.5rem;
  }
  .icon-blue { background: #e0f2fe; color: #0284c7; }
  .icon-emerald { background: #d1fae5; color: #059669; }
  .icon-amber { background: #fef3c7; color: #d97706; }

  .feature-card h4 {
    font-size: 1.35rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.75rem;
  }
  .feature-card p {
    color: #64748b;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 0;
  }

  /* Fluid Showcase Accordion Gallery */
  .gallery-accordion {
    display: flex;
    gap: 12px;
    height: 380px;
    overflow: hidden;
    border-radius: 24px;
    margin-bottom: 2rem;
  }
  .gallery-item {
    flex: 1;
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    cursor: pointer;
    transition: flex 0.6s cubic-bezier(0.25, 1, 0.5, 1);
  }
  .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .gallery-item:hover {
    flex: 3.5;
  }
  .gallery-item:hover img {
    transform: scale(1.08);
  }
  .gallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(15, 23, 42, 0.85) 0%, rgba(15, 23, 42, 0.1) 60%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 1.75rem;
    color: #ffffff;
  }
  .gallery-title {
    font-size: 1.35rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
    white-space: nowrap;
  }
  .gallery-sub {
    font-size: 0.9rem;
    color: #cbd5e1;
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: all 0.4s ease;
  }
  .gallery-item:hover .gallery-sub {
    opacity: 1;
    max-height: 60px;
    margin-top: 0.35rem;
  }

  /* Featured Food Cards */
  .food-card {
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid #f1f5f9;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .food-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.09);
  }
  .food-img-wrapper {
    position: relative;
    height: 210px;
    overflow: hidden;
  }
  .food-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .food-card:hover .food-img-wrapper img {
    transform: scale(1.08);
  }
  .food-price-badge {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(15, 23, 42, 0.88);
    color: #38bdf8;
    backdrop-filter: blur(8px);
    font-weight: 700;
    font-size: 0.95rem;
    padding: 6px 14px;
    border-radius: 30px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }
  .food-card-body {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .food-card-body h5 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.5rem;
  }
  .food-card-body p {
    color: #64748b;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .food-card-footer {
    margin-top: auto;
  }

  /* Testimonial Cards */
  .review-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid #f1f5f9;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    height: 100%;
  }
  .stars {
    color: #f59e0b;
    font-size: 1.1rem;
    margin-bottom: 1rem;
  }

  /* CTA Banner */
  .cta-banner {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    border-radius: 28px;
    padding: 4.5rem 3rem;
    color: #ffffff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(15, 23, 42, 0.25);
  }
  .cta-banner::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.15) 0%, transparent 70%);
    border-radius: 50%;
  }

  @media (max-width: 768px) {
    .carousel-item { height: 420px; }
    .carousel-item img { height: 420px; }
    .carousel-caption { left: 5%; right: 5%; bottom: 10%; padding: 1.5rem; }
    .carousel-caption h5 { font-size: 1.6rem; }
    .gallery-accordion { flex-direction: column; height: 600px; }
    .cta-banner { padding: 3rem 1.5rem; text-align: center; }
  }
</style>

<!-- Hero Carousel Section -->
<section class="content-header p-0 mb-5">
  <div id="heroCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
    <ol class="carousel-indicators">
      @if(isset($sliders) && $sliders->count() > 0)
        @foreach($sliders as $index => $slider)
        <li data-target="#heroCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
      @else
        <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#heroCarousel" data-slide-to="1"></li>
      @endif
    </ol>
    <div class="carousel-inner">
      @if(isset($sliders) && $sliders->count() > 0)
        @foreach($sliders as $index => $slider)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          <img class="d-block w-100" src="{{ asset('assets/img/slider/'.$slider->image) }}" alt="Slide {{ $index + 1 }}">
          <div class="carousel-caption">
            <h5>{{ $slider->title ?? 'Savor the Extraordinary' }}</h5>
            <p>{!! $slider->subtitle ?? 'Step into a world of exquisite flavors, artisan culinary traditions, and a warm dining atmosphere.' !!}</p>
            <a href="{{ route('our.menu') }}" class="btn btn-info btn-lg px-4 py-2" style="border-radius: 50px; font-weight: 600;">
              Explore Full Menu <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
        @endforeach
      @else
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Culinary Art">
          <div class="carousel-caption">
            <h5>Authentic Flavors, Modern Elegance</h5>
            <p>Experience handcrafted dishes prepared with organic farm-fresh ingredients and intense culinary passion.</p>
            <a href="{{ route('our.menu') }}" class="btn btn-info btn-lg px-4 py-2" style="border-radius: 50px; font-weight: 600;">
              Order Online Now <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="Pasta Perfection">
          <div class="carousel-caption">
            <h5>Handmade Pasta & Gourmet Specialties</h5>
            <p>Treat your loved ones to unforgettable dining where every bite tells an enchanting story.</p>
            <a href="{{ route('our.menu') }}" class="btn btn-info btn-lg px-4 py-2" style="border-radius: 50px; font-weight: 600;">
              View Chef Recommendations <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      @endif
    </div>
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<!-- Main Content Area -->
<section class="content pb-5">
  <div class="container">

    <!-- Welcome & Core Values -->
    <div class="section-header">
      <span class="badge badge-pill">The RMS Experience</span>
      <h2>Where Culinary Art Meets Hospitality</h2>
      <p>We believe dining is more than just food—it's about memorable conversations, inviting ambiance, and uncompromising quality.</p>
    </div>

    <div class="row mb-5 pb-4">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="feature-card">
          <div class="feature-icon icon-blue">
            <i class="fas fa-utensils"></i>
          </div>
          <h4>Master Chef Creations</h4>
          <p>Our renowned chefs blend traditional culinary secrets with modern techniques to craft dishes that delight every palate.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="feature-card">
          <div class="feature-icon icon-emerald">
            <i class="fas fa-leaf"></i>
          </div>
          <h4>Organic & Farm Fresh</h4>
          <p>We partner directly with local farmers to procure sustainable herbs, organic vegetables, and premium grade ingredients daily.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="feature-card">
          <div class="feature-icon icon-amber">
            <i class="fas fa-mobile-alt"></i>
          </div>
          <h4>Seamless Smart Ordering</h4>
          <p>Enjoy hassle-free digital ordering, instant table reservations, and real-time status tracking right from your mobile device.</p>
        </div>
      </div>
    </div>

    <!-- Interactive Signature Showcase -->
    <div class="section-header">
      <span class="badge badge-pill">Visual Delights</span>
      <h2>Our Signature Showcase</h2>
      <p>Hover over our gallery to explore our most beloved culinary masterpieces.</p>
    </div>

    <div class="gallery-accordion">
      <div class="gallery-item">
        <img src="https://images.pexels.com/photos/1600711/pexels-photo-1600711.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Club Sandwich">
        <div class="gallery-overlay">
          <div class="gallery-title">Gourmet Club Sandwich</div>
          <div class="gallery-sub">Toasted artisanal bread with smoked chicken & crisp veggies.</div>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.pexels.com/photos/539451/pexels-photo-539451.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Soup">
        <div class="gallery-overlay">
          <div class="gallery-title">Royal Mushroom Soup</div>
          <div class="gallery-sub">Rich cream, truffle oil, and wild roasted mushrooms.</div>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.pexels.com/photos/70497/pexels-photo-70497.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Burger">
        <div class="gallery-overlay">
          <div class="gallery-title">Classic Beef Smash Burger</div>
          <div class="gallery-sub">Juicy double patty with aged cheddar and seasoned fries.</div>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Pasta">
        <div class="gallery-overlay">
          <div class="gallery-title">Italian Pomodoro Pasta</div>
          <div class="gallery-sub">Fresh basil, San Marzano tomatoes, and authentic parmesan.</div>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Salad">
        <div class="gallery-overlay">
          <div class="gallery-title">Mediterranean Green Salad</div>
          <div class="gallery-sub">Crisp lettuce, feta cheese, olives, and extra virgin olive oil.</div>
        </div>
      </div>
    </div>

    <!-- Featured Menu Recommendations -->
    @if(isset($featuredItems) && $featuredItems->count() > 0)
    <div class="section-header mt-5 pt-4">
      <span class="badge badge-pill">Handpicked For You</span>
      <h2>Chef's Recommended Dishes</h2>
      <p>Discover our top-rated delicacies frequently requested by our dining guests.</p>
    </div>

    <div class="row mb-5">
      @foreach($featuredItems as $aItem)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="food-card">
          <div class="food-img-wrapper">
            <img src="{{ asset('assets/img/items/'.$aItem->item_image) }}" alt="{{ $aItem->item_name }}">
            <div class="food-price-badge">{{ $aItem->item_price }}/-</div>
          </div>
          <div class="food-card-body">
            <h5>{{ $aItem->item_name }}</h5>
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($aItem->item_description), 90) }}</p>
            <div class="food-card-footer">
              <a href="{{ route('our.menu') }}" class="btn btn-outline-info btn-block" style="border-radius:10px;font-weight:600;">
                <i class="fas fa-shopping-cart mr-2"></i> Order Now
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif

    <!-- Customer Reviews / Testimonials -->
    <div class="section-header mt-5 pt-3">
      <span class="badge badge-pill">Testimonials</span>
      <h2>Loved By Food Enthusiasts</h2>
      <p>See what our wonderful guests have to say about their dining experience.</p>
    </div>

    <div class="row mb-5 pb-4">
      @if(isset($reviews) && $reviews->count() > 0)
        @foreach($reviews as $rev)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="review-card">
            <div class="stars">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="font-italic text-muted mb-4">"{{ $rev->review_text }}"</p>
            <div class="d-flex align-items-center">
              <div class="mr-3">
                <div style="width:45px;height:45px;background:#e0f2fe;color:#0284c7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;">
                  {{ strtoupper(substr($rev->review_name ?? 'Guest', 0, 1)) }}
                </div>
              </div>
              <div>
                <h6 class="mb-0 font-weight-bold">{{ $rev->review_name ?? 'Satisfied Customer' }}</h6>
                <small class="text-muted">Verified Guest</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @else
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="review-card">
            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <p class="font-italic text-muted mb-4">"Absolutely incredible food! The Club Sandwich and pomodoro pasta were bursting with fresh flavor. Will definitely visit again!"</p>
            <h6 class="mb-0 font-weight-bold">Tahsan Khan</h6>
            <small class="text-muted">Verified Diner</small>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="review-card">
            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <p class="font-italic text-muted mb-4">"The ambiance is warm and welcoming, and the online ordering system made ordering takeaway effortless and super fast."</p>
            <h6 class="mb-0 font-weight-bold">Sadia Rahman</h6>
            <small class="text-muted">Verified Diner</small>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="review-card">
            <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <p class="font-italic text-muted mb-4">"Best mushroom soup in town! The staff is extremely polite and the quality of ingredients really shines through."</p>
            <h6 class="mb-0 font-weight-bold">Arafat Islam</h6>
            <small class="text-muted">Verified Diner</small>
          </div>
        </div>
      @endif
    </div>

    <!-- Call to Action Banner -->
    <div class="cta-banner">
      <div class="row align-items-center position-relative" style="z-index: 2;">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <h2 class="font-weight-bold mb-3" style="font-size: 2.2rem;">Ready to Satisfy Your Cravings?</h2>
          <p class="mb-0 text-light" style="font-size: 1.15rem; opacity: 0.9; max-width: 600px;">
            Order your favorite dishes online right now or explore our full gourmet menu for takeaway and dine-in.
          </p>
        </div>
        <div class="col-lg-4 text-lg-right">
          <a href="{{ route('our.menu') }}" class="btn btn-info btn-lg px-5 py-3 shadow-lg" style="border-radius: 50px; font-weight: 700; font-size: 1.1rem;">
            Explore Menu <i class="fas fa-utensils ml-2"></i>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
<section class="subscribe-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="section-title">
                    <h2>Get New Job Notifications</h2>
                    <p>Subscribe & get all related jobs notification</p>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{url('/subscribe-us')}}" method="POST" class="newsletter-form" data-toggle="validator">
                    @csrf
                    <input type="email" class="form-control" placeholder="Enter your email" name="email" required
                        autocomplete="off">
                    <button class="default-btn sub-btn" type="submit">
                        Subscribe
                    </button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
    </div>
</section>

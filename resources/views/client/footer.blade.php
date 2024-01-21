<footer class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                    </div>
                    <p>{{  $setting['desp'] }}</p>
                    <div class="footer-social">
                        <a href="{{ $setting['fb']}}" target="_blank"><i class='bx bxl-facebook'></i></a>
                        <a href="{{ $setting['twitter']}}" target="_blank"><i class='bx bxl-twitter'></i></a>
                        <a href="{{ $setting['insta']}}" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                        <a href="{{ $setting['youtube']}}" target="_blank"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget pl-60">
                    <h3>Quick Links</h3>
                    <ul>
                        @foreach(App\Models\Page::all() as $page)
                        <li>
                            <a href={{url('/pages',['pageSlug'=>$page->slug])}}>
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                {{$page->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget footer-info">
                    <h3>Information</h3>
                    <ul>
                        <li>
                            <span>
                                <i class='bx bxs-phone'></i>
                                Phone:
                            </span>
                            <a href="#">
                                {{  $setting['phn'] }}
                            </a>
                        </li>
                        <li>
                            <span>
                                <i class='bx bxs-envelope'></i>
                                Email:
                            </span>
                            <a
                                href="#">{{  $setting['email'] }}
                            </a>
                        </li>
                        <li>
                            <span>
                                <i class='bx bx-location-plus'></i>
                                Address:
                            </span>
                            {{  $setting['add'] }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

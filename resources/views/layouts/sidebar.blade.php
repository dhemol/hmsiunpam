<div class="col-lg-4 col-12">
    <div class="main-sidebar">
        >
        <!-- Single Widget -->
        <div class="single-widget category">
            <h3 class="title">Blog Categories</h3>
            @foreach ($categories as $category)
                <ul class="categor-list">
                    <li><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
                </ul>
            @endforeach
        </div>
        <!--/ End Single Widget -->

        <!-- Single Widget -->
        <div class="single-widget newsletter">
            <h3 class="title">Newslatter</h3>
            <div class="letter-inner">
                <h4>Subscribe & get news <br> latest updates.</h4>
                <div class="form-inner">
                    <input type="email" placeholder="Enter your email">
                    <a href="#">Submit</a>
                </div>
            </div>
        </div>
        <!--/ End Single Widget -->
    </div>
</div>

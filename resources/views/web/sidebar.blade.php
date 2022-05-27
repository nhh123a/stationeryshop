
<div class="ban-top">
    <div class="container">

        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active">
                                <a class="nav-stylehead" href="index.html">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Category
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    @foreach ($categories as $cat)
                                    <li>
                                        <a href="/web/category/{{ $cat->cat_id }}">{{ $cat->cat_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Brand
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    @foreach ($brands as $br)
                                    <li>
                                        <a href="/web/brand/{{ $br->brand_id }}">{{ $br->brand_title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="about.html">About Us</a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="faqs.html">Faqs</a>
                            </li>

                            <li class="">
                                <a class="nav-stylehead" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>


@yield('sidebar')

<aside id="sidebar_main">

    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="{{route('admin.dashboard')}}" class="sSidebar_hide sidebar_logo_large" style="padding-top:10px;">
                <img class="logo_regular" src="{{asset('assets/images/icons/logo-white.png')}}" alt=""
                     width="150"/>
            </a>
        </div>
    </div>

    <div class="menu_section">
        <ul>
            <li title="Dashboard" class="@if(request()->is('*admin')) current_section @endif">
                <a href="{{route('admin.dashboard')}}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/pages*')) current_section @endif" title="Users">
{{--                    <a href="{{route('page.admin.index')}}">--}}
{{--                        <span class="menu_icon"><i class="material-icons">bookmarks</i></span>--}}
{{--                        <span class="menu_title">Pages</span>--}}
{{--                    </a>--}}
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/slides*')) current_section @endif" title="Users">
{{--                    <a href="{{route('slide.admin.index')}}">--}}
{{--                        <span class="menu_icon"><i class="material-icons">bookmarks</i></span>--}}
{{--                        <span class="menu_title">Slides</span>--}}
{{--                    </a>--}}
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/featuredImages*')) current_section @endif" title="featuredImages">
                   <a href="{{route('featured.admin.index')}}">
                       <span class="menu_icon"><i class="material-icons">bookmarks</i></span>
                       <span class="menu_title">Featured Images</span>
                    </a>
                </li>
            @endif
            {{-- @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/users*')) current_section @endif" title="Users">
                    <a href="{{route('user.admin.index')}}">
                        <span class="menu_icon"><i class="material-icons">group</i></span>
                        <span class="menu_title">Customers</span>
                    </a>
                </li>
            @endif --}}
            @if($authUser->can('view_dashboard'))
                
                <li class="@if(request()->is('*admins*')) current_section @endif" >
                    <a href="{{route('management.admin.user.index')}}">
                        <span class="menu_icon"><i class="material-icons">security</i></span>
                        <span class="menu_title">Managers</span>
                    </a>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/homeconfigs*')) current_section @endif" title="Slider">
                    <a href="{{route('home.admin.index')}}">
                        <span class="menu_icon"><i class="material-icons">settings</i></span>
                        <span class="menu_title">Homepage settings</span>
                    </a>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                @php
                    $aboutconfigs = request()->is('*aboutconfigs');
                    $abusenumbers = request()->is('*abusenumbers*');
                    $numbers = request()->is('*admin/numbers*');
                    $goals = request()->is('*admin/goals*');
                    $employees = request()->is('*admin/employees*');
                @endphp
                <li @if($aboutconfigs || $abusenumbers || $numbers || $goals || $employees) class="current_section act_section" @endif title="Articles">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">About us</span>
                    </a>
                    <ul>
                        <li @if($aboutconfigs) class="act_item" @endif title="About">
                            <a href="{{route('about.admin.index')}}">
                                <span class="menu_title">About us</span>
                            </a>
                        </li>
                        @if($authUser->can('view_dashboard'))
                        <li @if($abusenumbers) class="act_item" @endif title="Abuse Numbers">
                            <a href="{{route('abuse.admin.index')}}">
                                <span class="menu_title">General Numbers</span>
                            </a>
                        </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($numbers) class="act_item" @endif title="Numbers">
                                <a href="{{route('number.admin.index')}}">
                                    <span class="menu_title">Ministry numbers</span>
                                </a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($goals) class="act_item" @endif title="Goals">
                                <a href="{{route('perpos.admin.index')}}">
                                    <span class="menu_title">Goals</span>
                                </a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($employees) class="act_item" @endif title="Employees">
                                <a href="{{route('employee.admin.index')}}">
                                    <span class="menu_title">Employees</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                @php
                    $services = request()->is('*services*');
                    $values = request()->is('*values*');                   
                @endphp
                <li @if($services || $values ) class="current_section act_section" @endif title="Articles">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">Our Services</span>
                    </a>
                    <ul>
                        <li @if($services) class="act_item" @endif title="Services">
                            <a href="{{route('service.admin.index')}}">
                                <span class="menu_title">Services</span>
                            </a>
                        </li>
                        @if($authUser->can('view_dashboard'))
                            <li @if($values) class="act_item" @endif title="Values">
                                <a href="{{route('value.admin.index')}}">
                                    <span class="menu_title">Values</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/testimonials*')) current_section @endif" title="Testimonials">
                    <a href="{{route('testimonial.admin.index')}}">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">Testimonials</span>
                    </a>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                @php
                    $requestsActive = request()->is('*askforhelp*');

                    $termsActive = request()->is('*terms-conditions*');
                @endphp
                <li @if($requestsActive || $termsActive || request()->is('*counselingTypes') ) class="current_section act_section" @endif title="Advice request">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">Advice requests</span>
                    </a>
                    <ul>
                        @if($authUser->can('view_dashboard'))
                            <li @if($requestsActive) class="act_item" @endif>
                                <a href="{{route('askhelp.admin.index')}}">Advice requests</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if(request()->is('*counselingTypes')) class="act_item" @endif>
                                <a href="{{route('counselingType.admin.index')}}">Forms</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($termsActive) class="act_item" @endif>
                                <a href="{{route('about.admin.edit')}}">Terms and Conditions</a>
                            </li>
                        @endif
                    </ul>
                </li>
                
            @endif           
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/contacts*')) current_section @endif" title="Contacts">
                    <a href="{{route('contact.admin.index')}}">
                        <span class="menu_icon"><i class="material-icons">settings</i></span>
                        <span class="menu_title">Contacts</span>
                    </a>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                <li class="@if(request()->is('*admin/announcements*')) current_section @endif" title="Announcements">
                    <a href="{{route('ads.admin.index')}}">
                        <span class="menu_icon"><i class="material-icons">settings</i></span>
                        <span class="menu_title">Announcements</span>
                    </a>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                @php
                    $articlesActive = request()->is('*articles*');
                    $writersActive = request()->is('*writers*');
                    $topicsActive = request()->is('*article-topics*');
                @endphp
                <li @if($articlesActive || $writersActive) class="current_section act_section" @endif title="Articles">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">Articles</span>
                    </a>
                    <ul>
                        @if($authUser->can('view_dashboard'))
                            <li @if($articlesActive) class="act_item" @endif>
                                <a href="{{route('article.admin.index')}}">All Articles</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($writersActive) class="act_item" @endif title="Writers">
                                <a href="{{route('writer.admin.index')}}">Writers</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($topicsActive) class="act_item" @endif title="Topics">
                                <a href="{{route('articleTopics.admin.index')}}">Topics</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            

            @if($authUser->can('view_dashboard'))
                @php
                    $coursesActive = request()->is('*courses*');
                    $lecturersActive = request()->is('*lecturers*');
                    $audiosActive = request()->is('*audios*');
                    $topics = request()->is('*course-topics*');
                @endphp
                <li title="Management"
                    @if($coursesActive || $lecturersActive) class="current_section act_section" @endif>
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">Educational materials</span>
                    </a>
                    <ul>
                        @if($authUser->can('view_dashboard'))
                            <li @if($coursesActive) class="act_item" @endif>
                                <a href="{{route('course.admin.index')}}">All Courses</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($audiosActive) class="act_item" @endif>
                                <a href="{{route('audio.admin.index')}}">Audios Files</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($lecturersActive) class="act_item" @endif>
                                <a href="{{route('lecturer.admin.index')}}">Lecturers</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($topics) class="act_item" @endif title="Topics">
                                <a href="{{route('courseTopics.admin.index')}}">Topics</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if($authUser->can('view_dashboard'))
                @php
                    $booksActive = request()->is('*books*');
                    $authorsActive = request()->is('*authors*');
                    $publishersActive = request()->is('*publishers*');
                    $translatorsActive = request()->is('*translators*');
                    $categoriesActive = request()->is('*categories*');
                    $typesActive = request()->is('*types*');
                @endphp
                <li title="Management"
                    @if($booksActive || $authorsActive) class="current_section act_section" @endif>
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">list</i></span>
                        <span class="menu_title">Books</span>
                    </a>
                    <ul>
                        @if($authUser->can('view_dashboard'))
                            <li @if($booksActive) class="act_item" @endif>
                                <a href="{{route('book.admin.index')}}">All Books</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($authorsActive) class="act_item" @endif>
                                <a href="{{route('author.admin.index')}}">Authors</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($publishersActive) class="act_item" @endif>
                                <a href="{{route('publisher.admin.index')}}">Publishers</a>
                            </li>
                        @endif
                        
                        @if($authUser->can('view_dashboard'))
                            <li @if($translatorsActive) class="act_item" @endif>
                                <a href="{{route('translator.admin.index')}}">Translators</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($categoriesActive) class="act_item" @endif>
                                <a href="{{route('bookCategory.admin.index')}}">Categories</a>
                            </li>
                        @endif
                        @if($authUser->can('view_dashboard'))
                            <li @if($typesActive) class="act_item" @endif>
                                <a href="{{route('bookType.admin.index')}}">Types</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</aside>

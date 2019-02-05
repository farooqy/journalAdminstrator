    <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{env('APP_URL')}}">
                <img class="brand-img d-inline-block" src="{{env('APP_URL')}}uploads/static/1xLogosmall.png" height="50px" alt="brand" />
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="settings"></i></span></a>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{env('APP_URL')}}dist/img/avatar12.jpg" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{$AdminName = "Madelyn Shanse"}}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
    </nav>

    <nav class="hk-nav hk-nav-dark">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{env('APP_URL')}}" data-toggle="collapse" data-target="#dash_drp">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header" >
                        <span>Articles</span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}articles/topublish">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Ready for Publication </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}articles/toapprove" >
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Articles That require approval </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}articles/resent" >
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Resent Articles </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}articles/rejected" >
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                <span class="nav-link-text">Rejected articles </span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Editorial Board Members </span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}members/active">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Active Board Members  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}members/newmember" >
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Add New Board Member  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}members/diactivated" >
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Diactivated Board Members  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}members/roles/new" >
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                <span class="nav-link-text">Add New Editorial Role  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}members/roles" >
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                <span class="nav-link-text">View existing roles   </span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Team Members  </span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}team/active">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Active Team Members   </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}team/new" >
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Add New Team Member  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}team/diactivated" >
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Diactivated Team Members   </span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>News  </span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}news">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Active News  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}news/new" >
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Add News  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}news/diactivated" >
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Diactivated News </span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Feedback Messages  </span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}feedback">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Unread Messages  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}feedback/unread" >
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Non-replied Messages  </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}feedback/read" >
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Replied Messages </span>
                            </a>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Others  </span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}harvest">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Harvest Emails   </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{env('APP_URL')}}analytics" >
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Users Data Analysis  </span>
                            </a>
                        </li>
                    </ul>


                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>System Info</span>
                        <span>GS</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="http://ganacsigroup.com" target="_blank">
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Ganacsi Group</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-with-badge" href="http://ganacsigroup.com" target="_blank">
                                <span class="feather-icon"><i data-feather="eye"></i></span>
                                <span class="nav-link-text">Changelog</span>
                                <span class="badge badge-sm badge-success badge-pill">v 1.0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mailto:farooqy@ganacsigroup.com" target="_blank">
                                <span class="feather-icon"><i data-feather="headphones"></i></span>
                                <span class="nav-link-text">Support</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
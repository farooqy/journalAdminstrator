    @extends ("mainlayout.unsignedBody")

    @section ("maincontent")
    <div class="container" style="min-height: 800px">
        <div class="row">
             <div class="col-xl-3 pa-0"></div>
            <div class="col-xl-6 pa-0">
                <div class="auth-form-wrap py-xl-0 py-50">
                    <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                        <form method="POST" action="">
                            @csrf
                            <h1 class="display-4 mb-10">
                                <img src="{{env('APP_URL')}}uploads/static/1xLogosmall.png" height="60px">
                            </h1>
                            <p class="mb-30 text-center">Journal of Toxicology and Molecular Biology.</p>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Password" type="password" name="password">
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox mb-25">
                                <input class="custom-control-input" id="same-address" type="checkbox" checked="">
                                <label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                            <p class="font-14 text-center mt-15">Having trouble logging in?</p>
                            <div class="form-row text-center">
                                Send issue to: <a href="mailto:admin@jtmb.scimazong.com"> admin@jtmb.scimazong.com </a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 pa-0"></div>
        </div>
    </div>
           
            

    @endsection

    
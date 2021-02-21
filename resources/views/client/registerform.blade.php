<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        <title>Register</title>
    </head>

    <body>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>Register</h2>
                <br>
                <form method="POST" action="/register">

                    @csrf

                    <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label">First Name:</label>
                        <div class="col-sm-10">
                          <input name="firstname" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="middlename" class="col-sm-2 col-form-label">Middle Name:</label>
                        <div class="col-sm-10">
                          <input name="middlename" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-sm-2 col-form-label">Last Name:</label>
                        <div class="col-sm-10">
                          <input name="lastname" type="text" class="form-control" required>
                        </div>
                    </div>
                    
                    <br><br>
                    <br><br>

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username: </label>
                        <div class="col-sm-10">
                          <input name="username" type="text" class="form-control" required>
                        </div>
                    </div>
                    
                       
                    <div class="form-group row">
                        <label for="password1" class="col-sm-2 col-form-label">Password: </label>
                        <div class="col-sm-10">
                          <input name="password1" type="password" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) " class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password2" class="col-sm-2 col-form-label">Retype Password: </label>
                        <div class="col-sm-10">
                          <input name="password2" type="password" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) " class="form-control" required>
                        </div>
                    </div>
                    @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{session('msg')}}
                    </div>
                    @endif
                    @if (session('msgerr'))
                        <div class="alert alert-danger" role="alert">
                            {{session('msgerr')}}
                        </div>
                    @endif
                
                    <br>
                    <hr>
                    <p>By clicking Register, you agree to our Terms, Data Policy and Cookies Policy.</p>

                    <div class="form-group row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-outline-success"><span class="mdi mdi-content-save"></span> Register</button>
                            <a href="/login" class="btn btn-outline-danger"><span class="mdi mdi-cancel"></span> Cancel</a>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    @extends('frames.footer')
    @extends('includes.bootstrapscript')
    </body>

</html>
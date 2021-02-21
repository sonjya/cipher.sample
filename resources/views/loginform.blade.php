<html lang='en'>
    <head>
        @extends('includes.bootstrapcss')
        <title>Login</title>
    </head>

    <body>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
            
                <h1>Login</h1>
                <form method='post' action='/signin'>
                    @csrf
                    <div class="col-sm-4">
                        <label for="username">Username: </label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="password">Password </label>
                        <input type="password" name="password" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" class="form-control" required>
                    </div>
                    <div class="col-sm-4">
                        <br><button type="submit" class="btn btn-outline-success">Login</button>
                    </div>
                    <br>
                </form> 

                <div class="col-sm-5">
                    <p>Not a member yet? <a href="/registration"><u>Register here.</u></a></p>
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

            </div>
            
            <div class="col-sm-5">
                <div class="jumbotron">
                    <h1 class="display-4">Hello!</h1>
                    <p class="lead">Sample lang ni dre sir para dili murag tae akong design :)</p>
                    <p class="lead">Sir add ko sa valorant :)</p>
                    <hr class="my-4">
                    <p>Ceasar Cipher</p>
                    <p class="lead">
                      <a class="btn btn-outline-info btn-lg" href="#" role="button">About Us</a>
                    </p>
                  </div>
            </div>
    
         </div>
         
    @extends('includes.bootstrapscript')
    @extends('frames.footer')
    </body>

</html>
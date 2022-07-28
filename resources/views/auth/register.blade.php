@php
use App\Models\Role;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/authenticate.css') }}">
    <title>Document</title>
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="/vendor/fontawesome-5.6.1/css/all.min.css" />
</head>


<body class="container">

    <div class="form-container">

        <div class="form-image"><img src="images/456.jpg" alt=""></div>
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <div class="form-partition">
                <div class="form-rows">
                    <label for="">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        placeholder="Enter Your Name">
                </div>
                <div class="form-rows">
                    <label for="">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        placeholder="Eg : jakenate@gmail.com">
                </div>
                <div class="form-rows">
                    <label for="">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        placeholder="Enter Your Password">
                </div>
                <div class="form-rows">
                    <label for="">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        placeholder="Confirm Your Password">
                </div>
                <div class="form-check ">
                    <a href="{{ route('login') }}">
                        {{ 'Already registered?' }}
                    </a>
                </div>
                <div class="form-rows ">
                    <p class="mt-1" style="cursor: pointer;" onclick="i=== 1 ? openForm() : closeForm();">
                        Optional <i class="fas fa-angle-down"></i></p>
                    <div class="form-check hidden" id="optional_check">
                        <span style="justify-content:flex-start;">
                            <input type="checkbox" name="role_checker" value="{{ Role::$role_vendor }}">I want to
                            become an Admin
                        </span>
                    </div>
                </div>

                <div class="form-rows"><button class="btn" type="submit">Register</button></div>
            </div>

        </form>
    </div>
    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="form-rows alert" style="margin: 15px; color:rgb(197, 31, 31);">
            <div class="font-medium text-red-600">
                {{ 'Whoops! Something went wrong.' }}
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Validation Errors end -->
    <script>
        var i = 1;
        const openForm = () => {
            document.getElementById("optional_check").style.display = "block";
            i = 2;
        }

        const closeForm = () => {
            document.getElementById("optional_check").style.display = "none";
            i = 1;
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulir</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Poppins", sans-serif;
            }
            
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: #111827;
            }

            .wrapper {
                max-width: 600px;
                background: transparent;
                border: 2px solid rgba(255, 255, 255, .2);
                backdrop-filter: blur(20px);
                box-shadow: 0 0 10px rgba(0, 0, 0, .2);
                color: #fff;
                border-radius: 10px;
                padding: 30px 40px;
            }

            .wrapper h1 {
                font-size: 36px;
                text-align: center;
            }

            .wrapper .input-box {
                position: relative;
                width: 100%;
                height: 50px;
                margin: 30px 0;
            }

            .input-box input {
                width: 100%;
                height: 100%;
                background: transparent;
                border: none;
                outline: none;
                border: 2px solid rgba(255, 255, 255, .2);
                border-radius: 40px;
                font-size: 16px;
                color: #fff;
                padding: 20px 45px 20px 20px;
            }

            .input-box input::placeholder{
                color: #fff;
            }

            .input-box i{
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 20px;
            }

            .wrapper .btn{
                width: 100%;
                height: 45px;
                background: #fff;
                border: none;
                outline: none;
                border-radius: 40px;
                box-shadow: 0 0 10px rgba(0, 0, 0, .1);
                cursor: pointer;
                font-size: 16px;
                color: #333;
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <form method="POST" action="/form" enctype="multipart/form-data">

                @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif

                @csrf
                <h1>Formulir</h1>

                <div class="input-box">
                    <input type="text" placeholder="Username" id="username" name="username" value="{{old('username')}}">
                    <i class='bx bxs-user'></i>
                    @error('username')
                        {{ $message }}
                    @enderror
                </div>

                <div class="input-box">
                    <input type="password" placeholder="password" id="password" name="password">
                    <i class='bx bxs-lock-alt' ></i>
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <div class="input-box">
                    <input type="email" placeholder="Email" id="email" name="email" value="{{old('email')}}">
                    <i class='bx bxl-gmail'></i>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="input-box">
                    <input type="number" placeholder="2.50 s.d. 99.99" id="number" name="number" value="{{old('number')}}">
                    <i class='bx bx-dialpad'></i>
                    @error('number')
                        {{ $message }}
                    @enderror
                </div>

                <div class="input-box">
                    <input type="file" style="padding-top: 12px" id="image" name="image" accept="image/*">
                    <i class='bx bxs-image'></i>
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>

                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </body>
</html>

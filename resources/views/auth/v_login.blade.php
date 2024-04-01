<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="view-app/resources/css/auth/login.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/330f974ef1.js" crossorigin="anonymous"></script>

    <style>
        a {
            text-decoration: none;
        }

        body {
            background: rgb(255, 253, 253);
        }

        label {
            font-family: "Raleway", sans-serif;
            font-size: 11pt;
        }

        #forgot-pass {
            color: #2dbd6e;
            font-family: "Raleway", sans-serif;
            font-size: 10pt;
            margin-top: 3px;
            text-align: right;
        }

        #card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            height: 410px;
            margin: 6rem auto 8.1rem auto;
            width: 400px;
            height: 450px;
            position: relative;
            /* Added */
        }

        #img {
            width: 50px;
            height: 50px;
            position: absolute;  /* Added */
            top: 20px; /* Adjusted */
            left: 20px;  /* Adjusted */
        }
        #text {
            color: rgb(225, 3, 40);
            margin-top: 20px; /* Added */
            margin-left: 32px;
            position: absolute; /* Added */
            top: 20px; /* Adjusted */
            left: 90px; /* Adjusted */
        }
        #text-login {
          font-size: 20px;
        }
        #hr {
            width:350px;
            text-align: center;
            margin-top: 90px;
            box-shadow: 1px 2px 8px rgba(230, 221, 221, 0.65);
        }

        #card-content {
            padding: 1px 44px;

        }

        #card-title {
            font-family: "Raleway Thin", sans-serif;
            letter-spacing: 4px;
            text-align: center;
        }

        #signup {
            color: #2dbd6e;
            font-family: "Raleway", sans-serif;
            font-size: 10pt;
            margin-top: 16px;
            text-align: center;
        }

        #submit-btn {
            background: -webkit-linear-gradient(right, rgb(255, 9, 50), rgb(255, 9, 50));
            border: none;
            border-radius: 10px;
            /* box-shadow: 0px 1px 8px rgb(255, 9, 50); */
            cursor: pointer;
            color: white;
            font-family: "Raleway SemiBold", sans-serif;
            margin: 0 auto;
            margin-top: 5px;
            transition: 0.25s;
        }

        #submit-btn:hover {
            box-shadow: 0px 1px 18px rgb(255, 9, 50);
        }

        .form {
            align-items: left;
            display: flex;
            flex-direction: column;
        }

        .form-border {
            background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
            height: 1px;
            width: 100%;
        }

        .form-content {
            background: #fbfbfb;
            border: none;
            outline: none;
            padding-top: 14px;
        }
    </style>
</head>

<body>
    <div id="card" class="float-left ml-5">
        <div id="card-header">
            <div class="row float-inline" style="width:50px; height:40px">
                <span class="ms-3 mb-1 align-middle">
                    <img src="{{ url('asset\dist\img\clicknext.png') }}" class="ml-5 mt-1"
                        id="image">
                </span>
                <h2 class="display-4 font-weight-bold" id="text">Clicknext</h2>
            </div>
        </div>
        <div id="card-title">
            <hr id="hr">
        </div>
        <div id="card-content">
            <h2 class="fw-normal display-5 text-center" id="text-login">เข้าสู่ระบบ</h2>
            <form action="{{ route('login.save') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example1">Username</label>

                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                                <input type="text" id="form3Example1" class="form-control" placeholder="username"
                                    name="hr_username" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example2">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" id="form3Example2" class="form-control" placeholder="Password"
                                    name="hr_password" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="form-outline">

                            <button class="form-control" id="submit-btn" type="submit" name="submit"><i
                                    class="fa-solid fa-arrow-right-to-bracket mr-2"></i>เข้าสู่ระบบ</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Masuk | Aderim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properties -->
    <link rel="icon" href="assets/image/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <script>
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        email: {
                            identifier: 'email',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Alamat email tidak boleh kosong'
                                },
                                {
                                    type: 'email',
                                    prompt: 'Harap masukan email anda yang benar'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Kata sandi tidak boleh kosong'
                                },
                                {
                                    type: 'length[6]',
                                    prompt: 'Kata sandi yang anda masukan minimal harus 6 karakter'
                                }
                            ]
                        }
                    }
                });
            $('.ui.negative.message.alert').transition({
                animation  : 'fade in',
                duration   : '0.8s',
                onComplete : function() {                    
                    $(this).transition({
                        interval   : '2000',
                        animation  : 'fade out',
                        duration   : '0.8s',
                    });
                }
            });
            $('.ui.positive.message.alert').transition({
                animation  : 'fade in',
                duration   : '0.8s',
                onComplete : function() {                    
                    $(this).transition({
                        interval   : '2000',
                        animation  : 'fade out',
                        duration   : '0.8s',
                    });
                }
            });
        });
    </script>
</head>

<body>
    @if(\Session::has('alert'))
    <div style="position:absolute;right:15px;top:15px;max-width:400px">
        <div class="ui negative message alert" style="display:none">
            {{Session::get('alert')}}
        </div>
    </div>
    @elseif(\Session::has('alert-success'))
    <div style="position:absolute;right:15px;top:15px;max-width:400px">
        <div class="ui positive message alert" style="display:none">
            {{Session::get('alert-success')}}
        </div>
    </div>
    @endif
    <div class="ui container fluid"
        style="position:absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin:20px">
        <div class="ui container center aligned">
            <a href="/">
                <img class="ui centered image " src="{{asset('logo/logo_biru.png')}}" style="max-height:150px">
            </a>
            <div style="margin-top:20px">
                <h2>Silahkan Masuk Ke Akun Anda</h2>
            </div>
            <div class="ui container" style="width:40%">
                <div class="ui container">
                    <form class="ui form" action="{{url('loginproses')}}" method="post" style="padding:20px"
                        method="post">
                        {{csrf_field()}}
                        <div class="ui segment">
                            <div class="field" style="margin-top:20px">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" name="email" placeholder="E-mail address">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="ui two column stackable grid">
                                <div class="row">
                                    <div class="column left aligned">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="example">
                                            <label>Ingat saya</label>
                                        </div>
                                    </div>
                                    <div class="column right aligned">
                                        <a href="" style="color:teal">Lupa Password?</a>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <button class="ui fluid large teal submit button"
                                    style="margin-top:15px;margin-bottom:20px">
                                    Masuk
                                </button>
                            </a>
                            <div style="font-size:15px">Belum punya akun Aderim?<a href="/register" style="color:teal">
                                    Daftar</a></div>
                        </div>

                        <!-- Pesan error -->
                        <div class="ui error message">
                            <ul class="list">
                                <li>Alamat email tidak boleh kosong</li>
                                <li>Harap masukan email anda yang benar</li>
                                <li>Kata sandi tidak boleh kosong</li>
                                <li>Kata sandi yang anda masukan minimal harus 6 karakter</li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
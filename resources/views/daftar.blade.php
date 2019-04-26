<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Daftar | Aderim</title>
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
        .ready(function() {});
    //Tampilkan gambar yang dipilih
    function previewImage(preview, unggah) {
        document.getElementById(preview).style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(unggah).files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById(preview).src = oFREvent.target.result;
        };
    };
    </script>
    <script>
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        foto: {
                            identifier: 'foto',
                            rules: [{
                                type: 'empty',
                                prompt: 'Harap pilih foto profil'
                            }]
                        },
                        username: {
                            identifier: 'username',
                            rules: [{
                                type: 'empty',
                                prompt: 'Username tidak boleh kosong'
                            }]
                        },
                        nama: {
                            identifier: 'nama',
                            rules: [{
                                type: 'empty',
                                prompt: 'Nama tidak boleh kosong'
                            }]
                        },
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
                        nohp: {
                            identifier: 'nohp',
                            rules: [{
                                type: 'empty',
                                prompt: 'Nomor telepon tidak boleh kosong'
                            }]
                        },
                        address: {
                            identifier: 'address',
                            rules: [{
                                type: 'empty',
                                prompt: 'Alamat tempat tinggal tidak boleh kosong'
                            }]
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
                        },
                        validpassword: {
                            identifier: 'validpassword',
                            rules: [{
                                type: 'match[password]',
                                prompt: 'Kata sandi tidak cocok'
                            }]
                        }
                    }
                });
        });
    </script>
</head>

<body>
    <div class="ui container fluid" style="margin-top:30px;margin-bottom:20px;line-height:1.5">
        <div class="ui container center aligned">
            <a href="/">
                <img class="ui centered image" src="{{asset('logo/logo_biru.png')}}" style="margin-bottom:20px;max-height:90px">
            </a>
            <form class="ui form" action="{{url('registerproses')}}" method="post" enctype="multipart/form-data">
                <div class="ui centered stackable grid">
                    <div class="six wide middle aligned column" style="padding-right:50px">
                        <div>
                            <img src="{{asset('home.png')}}" class="ui rounded centered large image">
                        </div>
                        <div style="font-size:25px;margin-top:5px">
                            Mari Bergabung Bersama Aderim
                        </div>
                        <div style="font-size:19px;margin-top:5px">
                            Dan wujudkan desain rumah impian anda
                        </div>
                        <div class="ui error message">
                            <ul class="list">
                            </ul>
                        </div>
                    </div>
                    <div class="seven wide center aligned column" style="padding-left:100px">
                        <div style="margin-top:20px">
                            <p style="font-size:28px">Daftar Akun</p>
                        </div>
                        <div class="ui segment" style="padding:20px 40px 20px 40px">
                            <div class="ui container fluid">
                                <div style="font-size:18px"><b>Foto Profil</b></div>
                                <img class="ui small centered image" id="image-preview1" style="margin-top:10px">
                                <label for="unggah_gambar1" class="ui label"
                                    style="cursor:pointer;margin-top:5px;margin-bottom:15px">
                                    <i class="cloud upload icon"></i>
                                    Pilih Foto
                                </label>
                                <input type="file" id="unggah_gambar1" name="foto"
                                    onchange="previewImage('image-preview1','unggah_gambar1')" style="display: none">
                            </div>
                            <div class="field" style="margin-top:8px">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" maxlength="20" name="username" placeholder="Username Anda">
                                </div>
                            </div>
                            <div class="field" style="margin-top:8px">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" maxlength="20" name="nama" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="field" style="margin-top:20px">
                                <div class="ui left icon input">
                                    <i class="envelope icon"></i>
                                    <input type="text" name="email" placeholder="Alamat Email">
                                </div>
                            </div>
                            <div class="field" style="margin-top:20px">
                                <div class="ui left icon input">
                                    <i class="phone icon"></i>
                                    <input type="text" name="nohp" placeholder="Nomor Telepon">
                                </div>
                            </div>
                            <div class="field" style="margin-top:20px">
                                <div class="ui left icon input">
                                    <i class="home icon"></i>
                                    <input type="text" name="address" placeholder="Alamat Tempat Tinggal">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" placeholder="Kata Sandi">
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="validpassword" placeholder="Konfirmasi Kata Sandi">
                                </div>
                            </div>
                            {{csrf_field()}}
                            <button class="ui fluid large button teal" style="margin-top:15px;margin-bottom:20px">
                                Daftar
                            </button>
                            <div style="font-size:15px">Sudah punya akun Aderim?<a href="/login" style="color:teal">
                                    Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
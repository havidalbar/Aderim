<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>HelpPet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properties -->
    <link rel="icon" href="assets/image/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

    <style type="text/css">
    .hidden.menu {
        display: none;
    }

    .masthead.segment {
        min-height: 700px;
        padding: 1em 0em;
    }

    .masthead .logo.item img {
        margin-right: 1em;
    }

    .masthead .ui.menu .ui.button {
        margin-left: 0.5em;
    }

    .masthead h1.ui.header {
        margin-top: 3em;
        margin-bottom: 0em;
        font-size: 4em;
        font-weight: normal;
    }

    .masthead h2 {
        font-size: 1.7em;
        font-weight: normal;
    }

    .ui.vertical.stripe {
        padding: 8em 0em;
    }

    .ui.vertical.stripe h3 {
        font-size: 2em;
    }

    .ui.vertical.stripe .button+h3,
    .ui.vertical.stripe p+h3 {
        margin-top: 3em;
    }

    .ui.vertical.stripe .floated.image {
        clear: both;
    }

    .ui.vertical.stripe p {
        font-size: 1.33em;
    }

    .ui.vertical.stripe .horizontal.divider {
        margin: 3em 0em;
    }

    .quote.stripe.segment {
        padding: 0em;
    }

    .quote.stripe.segment .grid .column {
        padding-top: 5em;
        padding-bottom: 5em;
    }

    .footer.segment {
        padding: 5em 0em;
    }

    .secondary.menu .toc.item {
        display: none;
    }

    @media only screen and (max-width: 768px) {
        .ui.fixed.menu {
            display: none !important;
        }

        .secondary.inverted.menu .item,
        .secondary.inverted.menu .menu {
            display: none;
        }

        .secondary.inverted.menu .toc.item {
            display: block;
        }
    }
    </style>
    <script>
    $(document)
        .ready(function() {
            // fix menu when passed
            $('.inverted.vertical')
                .visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                });
            // create sidebar and attach to menu open
            $('.ui.sidebar')
                .sidebar('attach events', '.toc.item');

            $('.menu .item')
                .tab();
            $('.ui.dropdown')
                .dropdown();
        });
    </script>
    <script>
    //Salin Nilai
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    //Popup Berhasil
    var popupTimer;

    function delayPopup(popup) {
        popupTimer = setTimeout(function() {
            $(popup).popup('hide')
        }, 1000);
    }

    $(document).ready(function() {
        $('.copyToken').click(function() {
            clearTimeout(popupTimer);
            var $input = $(this).closest('div').find('.copyInput');
            /* Select the text field */
            $input.select();
            /* Copy the text inside the text field */
            document.execCommand("copy");
            $(this)
                .popup({
                    title: 'Berhasil Disalin!',
                    on: 'manual',
                    exclusive: true
                })
                .popup('show');
            // Hide popup after 5 seconds
            delayPopup(this);
        });
    });
    </script>
</head>

<body>
    <!-- Following Menu -->
    <div class="ui large top borderless menu fixed transition hidden">
        <div class="ui container">
            <div class="item" style="margin-right:10px">
                <a class="ui tiny image" href="#">
                    <img src="assets/image/HELPPET-DARK.png">
                </a>
            </div>
            <a class="item" href="#">Beranda</a>
            <a class="item" href="#">Adopsi Hewan</a>
            <a class="item" href="#">Penampungan Hewan</a>
            <a class="item" href="#">Relawan</a>
            <a class="item" href="#">Donasi</a>
            <div class="right item">
                <a class="ui brown button" style="margin-right:15px" href="#">
                    Masuk
                </a>
                <a class="ui brown button" href="#">
                    Daftar
                </a>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar borderless menu left" style="background-color:#cd8b62">
        <div class="item" style="margin-right:10px">
            <a class="ui tiny image" href="#">
                <img src="assets/image/HELPPET-LIGHT.png">
            </a>
        </div>
        <a class="item" href="#">Beranda</a>
        <a class="item" href="#">Adopsi Hewan</a>
        <a class="item" href="#">Penampungan Hewan</a>
        <a class="item" href="#">Relawan</a>
        <a class="item" href="#">Donasi</a>
        <div class="right item">
            <a class="ui inverted button" style="margin-right:15px" href="#">
                Masuk
            </a>
            <a class="ui inverted button" href="#">
                Daftar
            </a>
        </div>
    </div>

    <div>
        <div class="ui inverted vertical center aligned segment" style="background-color:#273d40">
            <div class="ui container">
                <div class="ui large secondary inverted menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <div class="item" style="margin-right:10px">
                        <a class="ui tiny image" href="#">
                            <img src="assets/image/HELPPET-LIGHT.png">
                        </a>
                    </div>
                    <a class="item" href="#">Beranda</a>
                    <a class="item" href="#">Adopsi Hewan</a>
                    <a class="item" href="#">Penampungan Hewan</a>
                    <a class="item" href="#">Relawan</a>
                    <a class="item" href="#">Donasi</a>
                    <div class="right item">
                        <a class="ui inverted button" style="margin-right:15px" href="#">
                            Masuk
                        </a>
                        <a class="ui inverted button" href="#">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="ui horizontal divider" style="margin-top:60px;margin-bottom:40px">
            <i class="paw icon huge brown"></i>
        </div>
        <div class="ui container">
            <div class="ui two column stackable grid">
                <div class="row middle aligned">
                    <div class="column">
                        <a href="#"><img class="ui medium image" src="assets/image/HELPPET-DARK.png"></a>
                    </div>
                    <div class="column">
                        <div style="display:flex;flex-direction:row;float: right;">
                            <div style="margin:5px;font-size:20px">Temukan kami di: </div>
                            <div style="margin:5px">
                                <i class="facebook icon large"></i>
                            </div>
                            <div style="margin:5px">
                                <i class="twitter square icon large"></i>
                            </div>
                            <div style="margin:5px">
                                <i class="instagram icon large"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui vertical footer segment">
            <div class="ui container">
                <div class="ui stackable divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui header">Tentang Kami</h4>
                        <div class="ui link list">
                            <a href="#" class="item">Apa itu HelpPet?</a>
                            <a href="#" class="item">Syarat dan Ketentuan</a>
                            <a href="#" class="item">Kebijakan Privasi</a>
                            <a href="#" class="item">Hubungi Kami</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui header">Mulai Membantu</h4>
                        <div class="ui link list">
                            <a href="#" class="item">Penampungan Hewan</a>
                            <a href="#" class="item">Relawan</a>
                            <a href="#" class="item">Donasi</a>
                        </div>
                    </div>
                    <div class="seven wide column">
                        <h4 class="ui header">HelpPet</h4>
                        <p>HelpPet merupakan pilihan yang tepat bagi kamu untuk
                            mengadopsi, mencari pengadopsi, maupun berdonasi untuk hewan peliharaan yang
                            lucu!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
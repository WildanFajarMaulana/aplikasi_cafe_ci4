<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="/css/style/chatting.css">
    <link rel="stylesheet" href="/css/style/media-query.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/1b43db8c23.js" crossorigin="anonymous"></script>

    <title>Mau Cafe | Chatting</title>
</head>

<body>
    <?php 
        $nama=$profilByIdLogin['nama'];
        $nama=explode(" ",$nama);

    ?>
    <section class="body" data-room="<?= $id_tranksaksi ?>" data-role="<?= $_SESSION['role']=='user'?1:0 ?>"
        data-name="<?= $nama[0] ?>">
        <!-- header nav -->
        <section class="header-nav">
            <div class="wrapper-header-nav">

                <!-- button back -->
                <div class="button-back">
                    <a href="/app/riwayat.html" style="color:black"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <!-- end button back -->


                <!-- location dropdown -->
                <div class="loc-drop">
                    <h3 class="name-chat f-mts-l"></h3>
                </div>
                <!-- end location dropdown -->


                <!-- button love -->

                <!-- end button love -->
            </div>
        </section>
        <!-- end header nav -->


        <!-- button-bar -->
        <?php if($filterChatTranksaksi){?>

        <?php }else{?>
        <section class="button-bar">
            <div class="wrap-icon-input-message">
                <form action="" id="form">
                    <input type="hidden" id="id_tranksaksi" value="<?= $id_tranksaksi ?>">
                    <input type="text" id="input" placeholder="ketikan pesan" autocomplete="off">
                    <button type="submit" id="btn-sender"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </section>
        <?php }?>
        <!-- end-button-bar -->

        <!-- body chatting -->
        <section class="body-chatting">

        </section>
        <!-- end body chatting -->


    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://chat-maucafe.herokuapp.com/socket.io/socket.io.js"></script>
    <script src="/js/user/chat.js"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>
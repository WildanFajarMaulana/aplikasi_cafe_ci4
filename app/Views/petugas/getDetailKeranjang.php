<?php foreach($keranjangDetail as $k){?>

<div class="order-list">
    <div class="left">
        <h2 class="title-menu f-pps-l"><?= $k['nama_menu'] ?></h2>

        <p class="harga-menu f-mts-l"><?= $k['total_harga'] ?></p>


        <input type="hidden" class="csrfCafe" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

        <i class="fas fa-trash-alt hapusMenuKeranjang" data-id="<?= $k['id'] ?>" data-trx="<?= $id_tranksaksi ?>"
            data-id-pembeli="<?= $id_pembeli ?>"></i>

    </div>

    <div class="right">

        <div class="thumbnail-menu-order" style="background-image: url('/img/<?= $k['gambar_menu'] ?>');"></div>

        <div class="count-order-menu">


            <button data-id="<?= $k['id'] ?>" data-trx="<?= $id_tranksaksi ?>" data-id-pembeli="<?= $id_pembeli ?>"
                class="button-minus">
                <i class="fas fa-minus"></i>
            </button>

            <div class="f-pps-m value-order"><?= $k['jumlah'] ?></div>



            <button class="button-plus" data-id="<?= $k['id'] ?>" data-trx="<?= $id_tranksaksi ?>"
                data-id-pembeli="<?= $id_pembeli ?>">
                <i class="fas fa-plus"></i>
            </button>

        </div>
    </div>
</div>


<?php }  ?>

<script>
$(document).ready(function() {
    $('.button-plus').on('click', function() {
        // CSRF Hash
        var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
        let id = $(this).attr('data-id')
        let id_pembeli = $(this).attr('data-id-pembeli')
        let id_tranksaksi = $(this).attr('data-trx')
        console.log(id)
        console.log(id_pembeli)
        console.log(id_tranksaksi)

        $.ajax({
            type: "post",
            url: '/petugas/plusKeranjang.html',
            data: {
                id: id,
                id_pembeli: id_pembeli,
                id_tranksaksi: id_tranksaksi,
                [csrfName]: csrfHash
            },
            dataType: "json",
            success: function(response) {
                console.log(response.token)
                $('.csrfCafe').val(response.token);
                dataPesanan();
                getDetaildata();
                $(".close").click();
                setTimeout(() => {
                    document.location.href =
                        '/petugas/managePesanan.html'
                }, 100);

            },
            error: function(xhr, ajaxOptions, thrownError) {

            }
        });
    })

    $('.button-minus').on('click', function() {
        // CSRF Hash
        var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
        let id = $(this).attr('data-id')
        let id_pembeli = $(this).attr('data-id-pembeli')
        let id_tranksaksi = $(this).attr('data-trx')
        console.log(id)
        console.log(id_pembeli)
        console.log(id_tranksaksi)
        $.ajax({
            type: "post",
            url: '/petugas/minKeranjang.html',
            data: {
                id: id,
                id_pembeli: id_pembeli,
                id_tranksaksi: id_tranksaksi,
                [csrfName]: csrfHash
            },
            dataType: "json",
            success: function(response) {
                console.log(response.token)
                $('.csrfCafe').val(response.token);
                if (response.error) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: response.error
                    });
                } else {
                    dataPesanan();
                    getDetaildata();
                    $(".close").click();
                    setTimeout(() => {
                        document.location.href =
                            '/petugas/managePesanan.html'
                    }, 100);
                }

            },
            error: function(xhr, ajaxOptions, thrownError) {

            }
        });
    })



    // modal location

    $('.hapusMenuKeranjang').on('click', function() {

        // CSRF Hash
        var csrfName = $('.csrfCafe').attr('name'); // CSRF Token name
        var csrfHash = $('.csrfCafe').val(); // CSRF hash
        let id = $(this).attr('data-id');
        let id_tranksaksi = $(this).attr('data-trx');
        let id_pembeli = $(this).attr('data-id-pembeli');
        Swal.fire({
            title: 'Yakin Hapus Menu?',
            text: "Kamu Tidak Bisa Mengembalikannya Lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya,Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: '/petugas/hapusMenuKeranjang.html',
                    data: {
                        id: id,
                        id_pembeli: id_pembeli,
                        id_tranksaksi: id_tranksaksi,
                        [csrfName]: csrfHash
                    },
                    dataType: "json",
                    success: function(response) {
                        $('.csrfCafe').val(response.token);
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                'deleted.',
                                'success'
                            )
                            dataPesanan();
                            getDetaildata();
                            $(".close").click();
                            setTimeout(() => {
                                document.location.href =
                                    '/petugas/managePesanan.html'
                            }, 500);
                        }


                    },
                    error: function(xhr, ajaxOptions, thrownError) {

                    }
                });

            }
        })

    })
})
</script>
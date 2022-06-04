<?= $this->extend('template/template_admin'); ?>
<?= $this->section('css'); ?>
<link rel="stylesheet" href="/css/styleAdmin/message.css">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">



    <!-- Main content -->
    <div class="content">
        <div class="name-section">
            <h5 class="name-chat"></h5>
        </div>

        <div class="chat-section">

        </div>
        <div id="id_tranksaksi_data" data-id="<?= $id_tranksaksi ?>"></div>

        <div class="input-section">
            <form class="message" id="form">

                <input type="text" name="message" placeholder="ketikan pesan disini" id="input">
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="/js/admin_chat.js"> </script>
<?= $this->endSection(); ?>
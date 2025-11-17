<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Hadida</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css') ?>">
</head>

<body class="bg-[#efefef] flex">
    <?= $this->include('components/sidebar'); ?>

    <main id="container-content" class="w-[85%] h-svh">
        <?= $this->include('components/navbar'); ?>

        <div class="p-5">
            <?= $this->renderSection('content'); ?>
        </div>
    </main>

    <script src="<?= base_url('assets/js/index.js') ?>"></script>
</body>

</html>
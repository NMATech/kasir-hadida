<?php if (session()->getFlashdata('success')): ?>
    <!-- Modal -->
    <div class="absolute flex z-10 right-2 bg-green-500 px-6 py-2 rounded-lg" id="modalSuccess">
        <h4 class="text-white"><?= session()->getFlashdata('success'); ?></h4>
    </div>
<?php endif; ?>

<script>
    const modal = document.getElementById('modalSuccess');
    const messageElement = document.getElementById('successMessage');

    setTimeout(() => {
        if (modal) {
            modal.style.transition = 'opacity 0.5s';
            modal.style.opacity = '0';
            setTimeout(() => modal.remove(), 500);
        }
    }, 3000);
</script>
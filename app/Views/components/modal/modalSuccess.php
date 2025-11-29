<?php if (session()->getFlashdata('success')): ?>
    <div id="successModal" class="fixed top-4 right-4 z-50 transform transition-all duration-300 ease-in-out">
        <script>
            showSuccessModal("<?= esc(session()->getFlashdata('success')) ?>");
        </script>
        <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 min-w-[300px]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <div>
                <h4 class="font-semibold text-lg">Success!</h4>
                <p id="successMessage" class="text-sm"><?= esc(session()->getFlashdata('success')) ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    function showSuccessModal(message = 'Operation completed successfully.') {
        const modal = document.getElementById('successModal');
        const messageElement = document.getElementById('successMessage');

        messageElement.textContent = message;
        // modal.classList.remove('hidden');

        // Add slide-in animation
        setTimeout(() => {
            modal.classList.add('translate-x-0');
        }, 10);

        // Auto-hide after 3 seconds
        setTimeout(() => {
            modal.classList.add('opacity-0', 'translate-x-full');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('opacity-0', 'translate-x-full', 'translate-x-0');
            }, 300);
        }, 3000);
    }
</script>
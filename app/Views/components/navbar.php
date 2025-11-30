<nav class="w-full flex justify-between items-center py-3 px-5">
    <div class="flex items-center">
        <button class="bg-[#dfdfdf] rounded-full hover:bg-[#dfdfdf]/90 hover:scale-105 p-2" onclick="toggleExpandSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                <path id="icon-expand" stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
            </svg>
        </button>
    </div>
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2 bg-sky-100 px-3 py-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-sky-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <div>
                <p class="font-semibold text-sm"><?= session()->get('full_name') ?></p>
                <p class="text-xs text-gray-600"><?= ucfirst(session()->get('role')) ?></p>
            </div>
        </div>
        <a href="<?= base_url('/logout') ?>" class="cursor-pointer bg-red-500 hover:bg-red-600 text-white rounded-lg px-4 py-2 hover:scale-105 transition flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
            </svg>
            Logout
        </a>
    </div>
</nav>
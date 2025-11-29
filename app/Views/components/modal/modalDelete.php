<div id="modalDelete" class="w-full h-svh absolute inset-0 z-20 hidden justify-center items-center bg-[#333] bg-opacity-50 ease-in-out">
    <div class="w-[20em] bg-white z-30 rounded-lg shadow-lg p-4">
        <div class="w-full flex justify-end">
            <button class="cursor-pointer hover:bg-[#efefef] rounded-full p-2" onclick="showModalDelete()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <h4 id="textHeadlineModal" class="text-2xl font-bold text-center"></h4>

        <form id="formDelete" action="" method="post">
            <div class="flex flex-col gap-3 mt-5">
                <div class="flex flex-col text-center gap-2">
                    <p id="textModal"></p>
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" class=" bg-red-500 p-2 rounded-lg text-white hover:scale-105" onclick="showModalDelete()">
                    Cancel
                </button>
                <button type="submit" class="bg-emerald-500 p-2 rounded-lg text-white hover:scale-105">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const baseUrl = '<?= base_url() ?>'
    const formDelete = document.getElementById('formDelete')

    function setActionToFormDelete(url) {
        formDelete.setAttribute('action', `${baseUrl}/${url}`)
    }
</script>
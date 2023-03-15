@props(['action'])

<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster bg-gray-900/60">
    <div class="border border-gray-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded-lg shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Import employees</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <form id="form-import" action="#" method="post">
                @csrf
                    <div class="my-5">
                        <style>
                            input[type=file]::file-selector-button{
                                visibility: hidden;
                                color: transparent;
                            }

                            input[type=file]::-webkit-file-upload-button{
                                visibility: hidden;
                                color: transparent;
                            }
                        </style>
                        <label class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300" for="file_input">Select file in csv format!</label>
                        <input name="file_csv" class="py-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="file_input" type="file">
                    </div>
                    <div class="flex justify-center pt-2">
                        <button class="focus:outline-none modal-close px-4 bg-orange-400 p-3 rounded-lg text-white hover:bg-orange-300">{{__("Cancel")}}</button>
                        <button class="focus:outline-none px-4 bg-green-500 p-3 ml-3 rounded-lg text-white hover:bg-green-400">{{__("Import")}}</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    function alertClose(e) {
        e.parentElement.parentElement.remove()
    }

    const modal = document.querySelector('.main-modal');
    const closeButton = document.querySelectorAll('.modal-close');

    const modalClose = () => {
        let form = document.getElementById('form-import')
        form.setAttribute('action', '#')
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 5);
    }

    const openModal = () => {
        document.querySelectorAll('.modal-close')
        let form = document.getElementById('form-import')
        form.setAttribute('action', '{{$action}}')
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }

    for (let i = 0; i < closeButton.length; i++) {
        const elements = closeButton[i];
        elements.onclick = (e) => modalClose();
        modal.style.display = 'none';
        window.onclick = function (event) {
            if (event.target == modal) modalClose();
        }
    }
</script>

@props(['status', 'message'])

@php
    $message = ($message ?? null);

    if (isset($status)) {
        switch ($status) {
            case 'success':
                $class_bg = 'bg-green-100 border-green-200';
                $class_text = 'text-green-700';
                break;
            case 'warning':
                $class_bg = 'bg-yellow-100 border-yellow-200';
                $class_text = 'text-yellow-700';
                break;
            case 'error':
                $class_bg = 'bg-red-100 border-red-200';
                $class_text = 'text-red-700';
                break;
            case 'info':
                $class_bg = 'bg-sky-100 border-sky-200';
                $class_text = 'text-sky-700';
                break;
            default:
                $class_bg = 'bg-grey-100 border-grey-200';
                $class_text = 'text-grey-700';
        }
    }
@endphp

<div class="alert-msg max-w-7xl mx-auto flex justify-end">
    <div class="md:w-1/3 sm:w-1/2 flex justify-between border rounded-lg p-4 mb-4 text-sm {{$class_bg}} {{$class_text}}" role="alert">
        <div class="flex">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div>
                {{$message}}
            </div>
        </div>
        <div onclick="alertClose(this)" class="cursor-pointer z-50">
            <svg  class="fill-current {{$class_text}}" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
        </div>
    </div>
</div>

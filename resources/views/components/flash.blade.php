@if(session()->has('success'))
<div class="fixed right-3 bg-blue-500 rounded-xl py-2 px-4 text-white text-sm bottom-3"
x-data = "{show:true}"
x-init="setTimeout(() => show = false, 4000)"
x-show="show"
>
    <p>{{session('success')}}</p>
</div>
@endif
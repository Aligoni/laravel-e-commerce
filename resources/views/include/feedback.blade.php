
@if (session('message'))
    <div class="alert alert-danger flex justify-center">
        <div class="px-16 py-4 bg-blue-400 bg-opacity-75 rounded">
            <p class="md:text-xl text-center text-white">{{session('message')}}</p>
        </div>
    </div>
@endif
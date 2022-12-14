@if (session()->has('message'))
    <div id="myToast" class="fixed right-10 top-5 px-5 py-4 border-l-8 border-blue-500 bg-white/80 drop-shadow-lg">
        <p class="text-sm">
            <span class="mr-2 inline-block px-3 py-1 rounded-full bg-blue-500 text-white font-extrabold">i</span>
            This is a toast. Welcome to KindaCode.com
        </p>
    </div>

    <script>
        function showToast() {
            document.getElementById("myToast").classList.remove("hidden");
            setTimeout(function() {
                document.getElementById("myToast").classList.add("hidden");
            }, 5000);
        }
    </script>
@endif

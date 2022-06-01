<footer class="bg-gray-800 w-full py-8 mt-auto">
    <div class="max-w-screen-xl mx-auto px-4">
        <ul class="max-w-screen-md mx-auto text-lg font-light flex flex-wrap justify-between">
            <li class="my-2">
                <a class="text-gray-300 hover:text-gray-500 transition-colors duration-200" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li class="my-2">
                <a class="text-gray-300 hover:text-gray-500 transition-colors duration-200" href="{{ route('servicos') }}">
                    Serviços
                </a>
            </li>
            <li class="my-2">
                <a class="text-gray-300 hover:text-gray-500 transition-colors duration-200" href="{{ route('quem-eu-devo') }}">
                    Quem eu devo
                </a>
            </li>
            <li class="my-2">
                <a class="text-gray-300 hover:text-gray-500 transition-colors duration-200" href="{{ route('quem-me-deve') }}">
                    Quem me deve
                </a>
            </li>
        </ul>
        <div class="text-center text-gray-500 dark:text-gray-200 pt-10 sm:pt-12 font-light flex items-center justify-center">
            Toigun - &copy {{date('Y')}}
        </div>

        <div class="text-center text-gray-500 dark:text-gray-200 pt-10 sm:pt-12 font-light flex items-center justify-center">
            Criado por Vitor
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $("#concluido").on("click", function() {
        $("#checkConcluido").attr("checked", 'checked');
    });

    $('#days_history').on('change', function() {
        this.form.submit();
    })

    $('.money').mask('000.000.000.000.000,00', {
        reverse: true
    });

</script>

</body>

</html>

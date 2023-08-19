<script>
    function randomIntFromInterval(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min)
    }
    $('.captca').text(randomIntFromInterval(1000, 5000));

    $('body').on('keyup', '.captca_input', function() {
        let value = $(this).val();
        const captca = $('.captca').text();
        const btn = $('.verify_btn');
        if (value == captca) {
            btn.removeClass('disabled')
        } else {
            btn.addClass('disabled')
        }
    });
</script>
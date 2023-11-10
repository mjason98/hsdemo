<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>

<style>
    @font-face {
        font-family: 'Oregon';
        src: url('{{ asset('fonts/Angeline_Vintage_Demo.ttf') }}') format('truetype'),
             url('{{ asset('fonts/Angeline_Vintage_Demo.otf') }}') format('opentype');
        /* Add other font formats if needed */
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'SpringSummer';
        src: url('{{ asset('fonts/Spring_Summer.otf') }}') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    body {
        font-family: 'sans-serif'; /* Use the custom fonts when available, fallback to sans-serif */
    }
</style>
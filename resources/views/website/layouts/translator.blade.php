<div id="google_translate_element" class="hidden"> </div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'pt',
            includedLanguages: 'en,pt,fr',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            multilanguagePage: true,
            gaTrack: true,
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var menuItems = document.querySelectorAll('.menu-traslate-header ul li a');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                window.location = this.getAttribute('href');
                location.reload();
            });
        });
    });
</script>

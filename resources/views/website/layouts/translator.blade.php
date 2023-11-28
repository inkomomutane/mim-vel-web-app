<div id="google_translate_element" class="hidden"> </div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'pt',
            includedLanguages: 'pt,en,fr,zh-CN,ur',
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
                event.preventDefault();
                var href = this.getAttribute('href');
                window.location.href = href;
                window.location.reload();
            });
        });
    });

    function mobilePageTranslator(event) {
        var href = event.getAttribute('href');
        window.location.href = href;
        console.log(window.location);
        window.location.reload();
    }
</script>

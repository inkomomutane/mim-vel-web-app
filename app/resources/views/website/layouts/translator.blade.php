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
        const menuItems = document.querySelectorAll('.menu-traslate-header ul li a');
        menuItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const href = this.getAttribute('href');
                window.location.href = href;
                if(href.includes('#')) {
                    window.location.reload();
                }else {
                    console.log(href);
                }
            });
        });
    });

    function mobilePageTranslator(event) {
        const href = event.getAttribute('href');
        window.location.href = href;
        if(href.includes('#')) {
            window.location.reload();
        }else {
            console.log(href);
        }
    }
</script>

<script setup>
const recaptchaScript = document.createElement("script");
    recaptchaScript.setAttribute(
      "src",
      "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    );
document.head.appendChild(recaptchaScript);

const translate  = () => {
    new google.translate.TranslateElement({
        pageLanguage: 'pt',
        includedLanguages: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
      }, 'google_translate_element');
}
window.addEventListener('load',function(){
    translate();
})
</script>


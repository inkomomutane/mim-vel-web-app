@production
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1133822068011030');
    fbq('track', 'PageView');
  </script>
  <script>
      fbq('trackCustom', 'Viu a pániga {{ View::hasSection('title') ? View::getSection('title') : '' }}', {
          dominio: '{{ URL::full() }}',
          pagina: '{{ View::getSection('title') }}', fonte: 'Meta'}
       );
    </script>
@endproduction

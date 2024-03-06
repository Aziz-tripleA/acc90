
<?php $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<li>
    <a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($link); ?>" class="facebook" target="_blank" rel="noopener noreferrer">
        <img src="{{asset('assets/images/social/fb-white.png')}}" alt="">
    </a>
</li>
<li>
    <a href="https://twitter.com/share?url=<?php echo urlencode($link); ?>" class="twitter" target="_blank" rel="noopener noreferrer">
        <img src="{{asset('assets/images/social/twitter-white.png')}}" alt="">
    </a>
</li>
<li>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($link) ?>" class="linked" target="_blank" rel="noopener noreferrer">
        <img src="{{asset('assets/images/social/linkedin-white.png')}}" alt="">
    </a>
</li>
<li>
    <a href="whatsapp://send?text=<?php echo urlencode($link) ?>" class="share" target="_blank" rel="noopener noreferrer">
        <img src="{{asset('assets/images/social/whatsapp-16.png')}}" alt="">
    </a>
</li>

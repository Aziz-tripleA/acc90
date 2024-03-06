@php
    $contacts = App\Models\ContactData::whereIn('title', [
                'facebook', 'twitter', 'instagram', 'youtube'
            ])->get();
    
    $facebook = $contacts->firstWhere('title', 'facebook')->value;
    $twitter = $contacts->firstWhere('title', 'twitter')->value;
    $youtube = $contacts->firstWhere('title', 'youtube')->value;
    $instagram = $contacts->firstWhere('title', 'instagram')->value;
    
@endphp
@if ($facebook)
    <li>
        <a href="{{$facebook}}" target="_blank" rel="noopener noreferrer">
            <img src="{{asset('assets/images/social/fb-'.$color.'.png')}}" alt="">
        </a>
    </li>
@endif
@if ($twitter)
    <li>
        <a href="{{$twitter}}" target="_blank" rel="noopener noreferrer">
            <img src="{{asset('assets/images/social/twitter-'.$color.'.png')}}" alt="">
        </a>
    </li>
@endif
@if ($instagram)
<li>
    <a href="{{$instagram}}" target="_blank" rel="noopener noreferrer">
        <img src="{{asset('assets/images/social/insta-'.$color.'.png')}}" alt="">
    </a>
</li>
@endif
@if ($youtube)
<li>
    <a href="{{$youtube}}" target="_blank" rel="noopener noreferrer">
        <img src="{{asset('assets/images/social/youtube-'.$color.'.png')}}" alt="">
    </a>
</li>
@endif
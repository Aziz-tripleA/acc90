<style>
    .dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}
.dropdown-item{
    display: list-item;
    list-style: none;
    padding: 5px;
    border-bottom: 1px solid #b7c9ca26;
}
.inner-select-single{
    float: right;
    width: 20%;
}
.inner-select-single h5{
    float: left;
    width: 25%;
}
.dropleft:hover .dropdown-menu {
  display: block;
}
.dropleft{
    width: 75%;
    float: right;
}
.dropdown-toggle
{
    width: 100%;
    text-align: left;
    background: #f9f9f9;
    border: #f9f9f9;
    height: 25px;
}
    </style>
<div class="inner-select-single">
    <h5>Sort by</h5>
    <div class="dropleft">
        <button class="btn btn-link dropdown-toggle text-capitalize"
                id="sortBySelect"
                data-toggle="dropdown"
                type="button"
                aria-expanded="false"
                aria-haspopup="true">
            @if (request('sort_by'))
                @if (request('sort_dir'))
                    @foreach ($sorting as $item)
                        @if(request('sort_by') == $item['sort_by'] && request('sort_dir') == $item['sort_dir'])
                            {{ $item['title'] }}
                            @break
                        @endif
                    @endforeach
                @else
                    @foreach ($sorting as $item)
                        @if(request('sort_by') == $item['sort_by'])
                            {{ $item['title'] }}
                            @break
                        @endif
                    @endforeach
                @endif
            @else
                {{$sorting[0]['title']}}
            @endif
        </button>
        <div class="dropdown-menu" aria-labelledby="sortBySelect">
            @foreach ($sorting as $item)
                <a class="dropdown-item" href="{{$item['url']}}">{{$item['title']}}</a>
            @endforeach
        </div>
    </div>
</div>

<a class="book-item wow fadeInUp" href="{{ route('book.show',$book->slug) }}">
    <div class="book-item-img">
      <img src="{{ $book->cover?$book->cover->getUrl(): ($book->s_img?:($book->l_img?:asset('assets/images/default_book.png')))}}" alt="" />
    </div>
    <div class="book-item-data">
      <div class="book-item-content">
        <span>{{ $book->category?$book->category->cat_name:''}}</span>
        <h3>{{ $book->item_name }}</h3>
        <strong>{{ $book->author?$book->author->author_name:'' }}</strong>
      </div>
      <div class="book-item-action">
        <span>المزيد</span>
      </div>
    </div>
  </a>
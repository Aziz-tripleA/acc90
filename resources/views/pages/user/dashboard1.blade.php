<div class="row inner-content" id="profile-content">
    <div class="col-12">
        <div class="card-profile mb-4">
            <div class="card-header">
                <div class="dropleft">
                    <button class="btn btn-link dropdown-toggle" id="profileDropdown" data-offset="40,0"
                            data-toggle="dropdown" type="button" aria-expanded="false" aria-haspopup="true">
                        <i class="material-icons">more_vert</i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{route('user.edit')}}">edit basic profile</a>
                        <a class="dropdown-item" href="{{route('user.provider.info')}}">edit provider
                            profile</a>
                        @if (auth()->check() && $authUser->isAdmin() && !$user->trashed())
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item">delete user</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-content-basic">
                    <div class="user-data">
                        <div class="user-img-lg align-items-center">
                            <img class="img-thumbnail border-primary"
                                 src="{{ $user->getUrlFor('avatar') ?: $avatarDef }}" alt="admin image">
                        </div>
                        <h4 class="text-primary">
                            {{ $user->full_name }}
                            @if ($user->hasCompleteVerification())
                                <img src="{{asset('images/icons/verified.png')}}">
                            @endif
                        </h4>
                        <p>{{$user->provider_type_status->title}}</p>
                        <p>registered since {{$user->created_at->diffForHumans()}}</p>
                        <span class="badge badge-{{$user->status->color}} text-capitalize">
                                    {{$user->status->title}}
                                </span>
                    </div>
                </div>
                <div class="card-content-stat">
                    <div class="card-rating flex-column">
                        <p>customer ratings</p>
                        @include('pages._partials.rating', ['rate'=>$customerReviews->pluck('rate')->avg()])
                    </div>
                    <div class="card-rating flex-column">
                        <p>Provider rating</p>
                        @include('pages._partials.rating', ['rate'=>$providerReviews->pluck('rate')->avg()])
                    </div>
                    <div class="desc-list justify-content-center mt-3">
                        <dl>
                            <dt>{{count($user->orders_delivered)}}</dt>
                            <dd class="text-capitalize">delivered orders</dd>
                        </dl>
                    </div>
                    <div class="desc-list flex-row">
                        @if ($user->hasVerifiedEmail())
                            <dl class="flex-column">
                                <dt><img src="{{asset('images/icons/verified.png')}}"></dt>
                                <dd>verified email</dd>
                            </dl>
                        @endif
                        @if ($user->hasVerifiedMobile())
                            <dl class="flex-column">
                                <dt><img src="{{asset('images/icons/verified.png')}}"></dt>
                                <dd>verified phone</dd>
                            </dl>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="card-social">
                    <div class="card-body">
                        <a class="card-social-icon text-linked-in" href="{{$user->linkedin_account}}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="card-social-icon text-instagram" href="{{$user->website}}">
                            <i class="fas fa-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.user.partials.info')
    </div>
</div>
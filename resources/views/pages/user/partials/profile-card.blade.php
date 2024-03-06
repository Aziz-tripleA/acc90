<div class="new-card-profie card-profile mb-4">
    <div class="card-body profile-header">
        <div class="card-content-basic">
            <div class="user-data">
                <div class="user-img-lg align-items-center">
                    <img class="img-thumbnail border-primary" src="{{ $user->getUrlFor('avatar') ?: $avatarDef }}"
                         alt="admin image">
                </div>
                <h4 class="text-primary">
                    {{$user->full_name}}
                </h4>
                @if($user->hasRole('customer'))
                    <div class="card-rating mb-3 flex-column">
                        <p class="mb-0">customer ratings</p>
                        @include('pages._partials.rating', ['rate'=>$customerReviews->pluck('rate')->avg()])
                    </div>
                @endif
                @if($user->hasRole('provider'))
                    <div class="card-rating mb-3 flex-column">
                        <p class="mb-0">services rating</p>
                        @include('pages._partials.rating', ['rate'=>$providerReviews->pluck('rate')->avg()])
                    </div>
                @endif
                <p>registered since {{$user->created_at->diffForHumans()}}</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="desc-list justify-content-center">
            <dl>
                <dt>{{count($user->orders_delivered)}}</dt>
                <dd class="text-capitalize">delivered orders</dd>
            </dl>
        </div>
    </div>
    @if(!$authUser || (!$authUser->canSendMessage($user->id) && $authUser->id != $user->id))
        <div>
            <p class="m-0 p-3 bg-light rounded">
                @lang('common.have_running_order',['user'=>$user->first_name])
            </p>
        </div>
    @else
        <div class="card-footer social-footer">
            <div class="card-social">
                <div class="card-body">
                    @if($user->facebook_account)
                        <a class="card-social-icon text-facebook" href="{{$user->facebook_account}}" target="_blank">
                            <i class="fab fa-facebook-f">
                            </i>
                        </a>
                    @endif
                    @if($user->linked_account)
                        <a class="card-social-icon text-linked-in" href="{{$user->linked_account}}"
                           target="_blank">
                            <i class="fab fa-linkedin-in">
                            </i>
                        </a>
                    @endif
                    @if($user->twitter_account)
                        <a class="card-social-icon text-twitter" href="{{$user->twitter_account}}"
                           target="_blank">
                            <i class="fab fa-twitter">
                            </i>
                        </a>
                    @endif
                    @if($user->website)
                        <a class="card-social-icon text-globe" href="{{$user->website}}" target="_blank">
                            <i class="fas fa-globe">
                            </i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
@if($authUser && $authUser->canSendMessage($user->id))
    <a class="btn btn-danger btn-block mb-4"
       href="{{route('conversation.get',$user->id)}}">@lang('message.send_message')</a>
@endif

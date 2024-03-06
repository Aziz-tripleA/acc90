<div class="col-12">
    <div class="card mb-4">
        <div class="accordion" id="tags-1">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">
                        <button class="btn btn-link " type="button">{{$event->title}} Template</button>
                    </h6>
                    <div class="dropleft">
                        <button class="btn btn-link dropdown-toggle" id="tagsDropdownParent-1" data-offset="40,0"
                                data-toggle="dropdown" type="button" aria-expanded="false" aria-haspopup="true">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="tagsDropdownParent-1">
                            <a class="dropdown-item" href="{{ route('notification.manager.edit',$event->id) }}">edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

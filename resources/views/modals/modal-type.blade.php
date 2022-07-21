<div>
    <div {!! $attributes->merge(['class' => 'modal fade']) !!} aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h2>{{$modal_heading}}</h2>
                    <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>

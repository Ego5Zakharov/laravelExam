<div>
    @if(session('flash.message'))
        <div class="alert alert-{{session('flash.type','success')}}">
            {{session('flash.message')}}

            <div class="position-absolute top-0 end-0 mt-2 me-3">
                <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
</div>

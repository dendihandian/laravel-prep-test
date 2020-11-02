@if (Session::has('success'))
    <div class="alert alert-success">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span>{{ Session::get('success') }}</span>
        </div>
    </div>
@elseif(Session::has('info'))
    <div class="alert alert-info">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span>{{ Session::get('info') }}</span>
        </div>
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span>{{ Session::get('warning') }}</span>
        </div>
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger">
        <div class="container">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span>{{ Session::get('error') }}</span>
        </div>
    </div>
@endif
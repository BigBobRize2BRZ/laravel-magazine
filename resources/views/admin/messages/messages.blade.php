<div class="container mt-2">
    <div class="row">
        <div class="col-12 mb-3">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible" style="margin: 15px 15px 0;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible" style="margin: 15px 15px 0;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
</div>
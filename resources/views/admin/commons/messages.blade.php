@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session()->get('success') }}
</div>
@endif

@if(session()->has('info_message'))
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Deberías saber</h4>
    {{ session()->get('info_message') }}
</div>
@endif

@if(session()->has('warning_message'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Precaución!</h4>
    {{ session()->get('warning_message') }}
</div>
@endif

@if(session()->has('danger_message'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Peligro!</h4>
    {{ session()->get('danger_message') }}
</div>
@endif

@if(count($errors) > 0)

<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Error</h4>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach  
</div>

@endif
@if(count($errors))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Oops!</h5>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@else 
    @if (session('success'))
        {{-- <script type="text/javascript">
            $(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'd'
                });
            });
        </script>
 --}}
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ session('success') }}
        </div>



    @endif
@endif
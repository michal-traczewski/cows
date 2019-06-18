<br/><br/>
<div class="jumbotron">
    <div class="container">
        <form name="edit_cow" action="{{ $action }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="cow_name">Name:</label>
                <input type="text" name="cow_name" id="cow_name" class="form-control" placeholder="Name" value="{{ $cow_name }}"><br/>
                @if ($errors->first('cow_name'))
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        {{ $errors->first('cow_name') }}
                    </div>
                @endif
            </div>
            <button class="btn btn-primary" tye="submit">
                <span class="glyphicon glyphicon-ok" ></span>Submit
            </button>
        </form>
    </div>
</div>
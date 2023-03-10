<form class="form-inline search-full col" action="{{route('searchprojectsandtasks')}}" method="Post">
    @csrf
    <div class="mb-3 w-100">
        <div class="Typeahead Typeahead--twitterUsers">
            <div class="u-posRelative">
                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                       placeholder="Search here ...." name="searchkeyword" autofocus required/>
                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span>
                </div>
                <i class="close-search" data-feather="x"></i>
            </div>
            <div class="Typeahead-menu"></div>
        </div>
    </div>
</form>

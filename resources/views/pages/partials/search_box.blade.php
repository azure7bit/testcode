<form action="{{route('queries.search')}}" method="post">
    {{csrf_field()}}
    <div class="typeahead-container" id="typeahead-container">
        <div class="typeahead-field">
            <span class="typeahead-query" id="typeahead-query">
                <input type="text" id='flyer-query' placeholder='Search Products...' autocomplete="false">
            </span>
            <button type="submit" id="Search-Btn">Search</button>
        </div>
    </div>
</form>
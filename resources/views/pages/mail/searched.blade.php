
<h3>Someone Searched this book :</h3>
<p>Search Keyword : {{ $q }}</p>

<h3><u>Search Result</u></h3>
@foreach($searchResult as $result)
    <p><a href="http://findbook.link/order/create?product_id={{ $result->id }}">{{ $result->name }}</a></p>
@endforeach
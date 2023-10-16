@extends('layout.master')

@section('content')
    <div class="row g-3 justify-content-md-center">
        <div class="col-auto">
            <input type="text" class="form-control" id="search" placeholder="Search by country">
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary mb-3" id="searchButton">Search</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="lead text-center" id="initialMessage">
                Any search results will show here after clicking the search button above
            </p>

            <table class="table table-striped table-hover" style="display: none;" id="searchTable">
                <thead>
                <tr>
                    <th scope="col">School</th>
                    <th scope="col">Country</th>
                    <th scope="col">Members</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr id="noResults">
                    <td colspan="3" class="text-center">No results found.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        let searchRequest;
        $(document).ready(function () {
            $('#searchButton').click(function () {
                // If we are already are making a search request lets abort that and make a fresh one
                // with the updated search term.
                if (searchRequest) {
                    searchRequest.abort();
                }

                // Do a backend search to retrieve any matches to the search term
                $.get('/schools/search/' + $('#search').val(), function (data) {
                    // Remove the initial message and any old school rows
                    $('main div.card p#initialMessage').fadeOut(function () {
                        // Fade in the search table after the initial search message has faded out
                        $('table#searchTable').fadeIn();
                    });
                    $('table#searchTable tbody tr.schoolRow').remove();

                    if (data.length) {
                        // Hide no results row
                        $('table#searchTable tbody tr#noResults').hide();

                        $.each(data, function (index, school) {
                            $('table#searchTable tbody').append("<tr class='schoolRow'><td>" + school.name
                                + "</td><td>" + school.country + "</td><td>" + school.members_count + "</td>"
                                + "</td><td class='text-center'><a href='/schools/" + school.id
                                + "' class='btn btn-primary'>View</a></td></tr>");
                        });
                    }
                    else {
                        // Show no results row
                        $('table#searchTable tbody tr#noResults').show();
                    }
                });
            });
        });
    </script>
@endsection

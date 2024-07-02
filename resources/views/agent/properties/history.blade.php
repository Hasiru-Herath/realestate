<!-- resources/views/agent/properties/history.blade.php -->
@extends('agent.agent_dashboard')

@section('agent')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Property History</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Properties Added</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Address</th>
                                        <th>Price</th>
                                        <th>Square Feet</th>
                                        <th>Bedrooms</th>
                                        <th>Bathrooms</th>
                                        <th>Photo</th>
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($properties as $property)
                                        <tr>
                                            <td>{{ $property->address }}</td>
                                            <td>{{ $property->price }}</td>
                                            <td>{{ $property->square_ft }}</td>
                                            <td>{{ $property->bedrooms }}</td>
                                            <td>{{ $property->bathrooms }}</td>
                                            <td>
                                                @if($property->photo)
                                                    <img src="{{ asset('storage/' . $property->photo) }}" alt="Property Photo" width="50">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $property->created_at->format('d M Y') }}</td>
                                            <td>
                                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div>
@endsection

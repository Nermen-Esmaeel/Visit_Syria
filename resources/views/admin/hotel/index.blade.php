@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Hotel Management'])
    @php
        $Count = 0;
    @endphp
    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Hotels</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> no.
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">photo
                                        cover
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">photo
                                        logo
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City
                                        Name_en
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City
                                        Name_ar
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        street_en
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        street_ar</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        city_en</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        city_ar</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        title_en</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        title_ar</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hotel_rating</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        description_en</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        description_ar</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        phone_number</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        email</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        facebook</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        instagram</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        youtube</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        twitter</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        website</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        working_time</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hotels as $hotel)
                                    @php
                                        $Count++;
                                    @endphp
                                    <tr>

                                        <td> {{ $Count }}</td>
                                        {{-- coover --}}
                                        <td>
                                            {{-- <div class="d-flex px-3 py-1">
                                                <div>
                                                    <img src="./img/team-1.jpg" class="avatar me-3" alt="image">
                                                </div>
                                            </div> --}}

                                            @if ($hotel->photo_cover)
                                                <img class="avatar" style="width:50px;height:50px"
                                                    src="{{ asset($hotel->photo_cover) }}" alt="">
                                            @else
                                                <img class="avatar" src="{{ asset('white') }}/img/default-avatar.png">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                @if ($hotel->photo_logo)
                                                    <img class="avatar" style="width:50px;height:50px"
                                                        src="{{ asset($hotel->photo_logo) }}" alt="">
                                                @else
                                                    <img class="avatar" src="{{ asset('white') }}/img/default-avatar.png">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->city->governorates }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->city->governorates_AR }}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->street_en }}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->street_ar }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->city_en }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->city_ar }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->title_en }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->title_ar }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->Hotel_rating }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->description_en }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->description_ar }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->phone_number }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->email }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->facebook }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->instagram }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->youtube }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->twitter }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->website }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $hotel->working_time }}</p>
                                        </td>

                                        <td class="align-middle text-end td-actions text-right">
                                            <form action="{{ route('hotels.destroy', $hotel) }}" method="POST">
                                                @csrf
                                                @method('delete')

                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('hotels.show', $hotel) }}" rel="tooltip"
                                                        class="btn btn-info btn-sm btn-round btn-icon">
                                                        <i class="tim-icons icon-tv-2"></i>
                                                    </a>
                                                    {{-- //edit button --}}
                                                    <a href="{{ route('hotels.edit', $hotel) }}" rel="tooltip"
                                                        class="btn btn-success btn-sm btn-round btn-icon">
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
                                                    {{-- delete button --}}
                                                    <button type="submit" rel="tooltip"
                                                        class="btn btn-danger btn-sm btn-round btn-icon"
                                                        onclick="return confirm('Are you sure you want to delete this {{ $hotel->title_en }}?')">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </div>
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
    </div>
@endsection

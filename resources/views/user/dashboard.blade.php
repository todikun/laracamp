@extends('layouts.app')

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <tbody>
                    @forelse ($checkouts as $checkout)
                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{asset('images/item_bootcamp.png')}}" height="120" alt="">
                        </td>
                        <td>
                            <p class="mb-2">
                                <strong>{{$checkout->Camp->title}}</strong>
                            </p>
                            <p>
                                {{$checkout->created_at->format('M d, Y')}}
                            </p>
                        </td>
                        <td>
                            <strong>
                                Rp. {{ $checkout->total }}
                            </strong>
                            @if ($checkout->discount_id)
                                <span class="badge bg-success">Disc {{ $checkout->discount_percentage }}%</span>
                            @endif
                        </td>
                        <td>
                            @if ($checkout->payment_status == 'paid')
                            <strong class="text-success">{{$checkout->payment_status}}</strong>
                            @else
                            <strong class="text-secondary">{{$checkout->payment_status}}</strong>
                            @endif
                        </td>
                        <td>
                            @if ($checkout->payment_status == 'waiting')
                            <a href="{{$checkout->midtrans_url}}" class="btn btn-primary">Pay here</a>
                            @endif
                        </td>
                        <td>
                            <a href="https://wa.me/08222222222?text=Hi, saya ingin bertanya tentang kelas {{$checkout->Camp->title}}"
                                class="btn btn-primary" target="blank">
                                Contact Support
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <h4 class="secondary-header">No Camp Registered</h4>
                            <hr>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

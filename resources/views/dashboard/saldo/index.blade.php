@extends('dashboard.layout.pages.main')
@section('container')

    <h2>Refferal</h2>
    @auth
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                        
                    <ul class="list-group mt-3">
                        <li>Username: {{ auth()->user()->username }}</li>
                        <li>Email: {{ auth()->user()->email }}</li>
                        <li>Referral link: <a href="{{ auth()->user()->referral_link }}">{{ auth()->user()->referral_link }}</a></li>
                        <li>Referrer: {{ auth()->user()->referrer->name ?? 'Not Specified' }}</li>
                        <li>Refferal count: {{ count(auth()->user()->referrals)  ?? '0' }}</li>
                        {{-- <a href="">{{ auth()->user()->referrals }}</a> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
                        
    @endauth
@endsection
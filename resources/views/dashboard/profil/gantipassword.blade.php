@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ganti Password</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/profil/prosesgantipassword/{{ $user[0]->email }}" class="mb-5">
        @method('put')
        @csrf
      <div class="mb-3">
        <label for="password_lama" class="form-label">Password Lama</label>
        <input type="password" class="form-control @error('password_lama') is-invalid @enderror" id="password_lama" name="password_lama" autofocus>
        @error('password_lama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password_baru" class="form-label">Password Baru</label>
        <input type="password" class="form-control @error('password_baru') is-invalid @enderror" id="password_baru" name="password_baru" autofocus>
        @error('password_baru')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      

      <button type="submit" class="btn bg-gradient-primary">Ubah Password</button>
    </form>
</div>

<script>

</script>
@endsection
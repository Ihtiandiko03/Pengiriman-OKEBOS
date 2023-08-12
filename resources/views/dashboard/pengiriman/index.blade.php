@extends('dashboard.layout.pages.main')
@section('container')



<a class="btn bg-gradient-primary mb-3" href="/dashboard/pengiriman/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Pengiriman</a>

    <div class="card mb-4 mt-4 px-3">
            
            <div class="card-header mx-auto">
              <h6>Daftar Pengiriman</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablepengiriman" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nama Barang</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kota Tujuan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pengiriman as $pengirimanku)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->nomor_resi }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->nama_barang }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->kabupatenkota_penerima }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->created_at }}</span>
                      </td>
                      <td class="align-middle text-center">
                        @if($pengirimanku->status == 'Dibuat')
                          <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->status }}</span>
                        @elseif($pengirimanku->status == 'Diproses')
                          <span class="text-warning text-sm font-weight-bold">{{ $pengirimanku->status }}</span>
                        @else
                          <span class="text-success text-sm font-weight-bold">{{ $pengirimanku->status }}</span>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">Lacak</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
      
<script>
  $(document).ready( function () {
    // $('#table').DataTable();

    var table = $('#table').DataTable( {
        buttons: [ 'excel', 'pdf', 'colvis' ],
        dom:
        "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" + 
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>> ",
        lengthMenu:[
          [5,10,25,50,100,-1],
          [5,10,25,50,100,"All"]
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#table_wrapper .col-md-6:eq(0)' );
} );
</script>
@endsection
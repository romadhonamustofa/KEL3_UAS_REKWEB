@extends('../layout/' . $layout)

@section('subhead')
    <title>Create Data With API</title>
@endsection
@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Tambah Mahasiswa</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('dashboardstore') }}" method='POST'>
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">nama </label>
                    <input id="nama" type="text" class="form-control w-full" name="nama" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Asal Sekolah </label>
                    <input id="asal_sekolah" type="text" class="form-control w-full" name="asal_sekolah" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Tempat Lahir </label>
                    <input id="tempat_lahir" type="text" class="form-control w-full" name="tempat_lahir" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Tanggal Lahir </label>
                    <input id="tanggal_lahir" type="text" class="form-control w-full" name="tanggal_lahir" >
                </div>
                <div>
                    <label for="crud-form-1" class="form-label">No HP </label>
                    <input id="no_hp" type="text" class="form-control w-full" name="no_hp" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Alamat </label>
                    <input id="alamat" type="text" class="form-control w-full" name="alamat" >
                </div>
                <div class="mt-3">
                <div class="text-right mt-5">
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
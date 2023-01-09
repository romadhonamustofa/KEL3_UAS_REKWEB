@extends('../layout/' . $layout)

@section ('subhead')
    <title>Dashboard - Mahasiswa Baru</title>
@endsection
@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">List Data Mahasiswa</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-1">
            <a href="{{ route('dashboardcreate') }}"><button class="btn btn-primary shadow-md mr-2">Tambah Data Mahasiswa </button></a>
            <div class="hidden md:block mx-auto text-slate-500">Showing List data Entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            </div>
        </div>
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            @if(session('success'))
            {{session('success')}}
            @endif
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">ID</th>
                    <th class="whitespace-nowrap">Nama</th>
                    <th class="text-center whitespace-nowrap">Asal Sekolah</th>
                    <th class="text-center whitespace-nowrap">Tempat Lahir</th>
                    <th class="text-center whitespace-nowrap">Tanggal Lahir</th>
                    <th class="text-center whitespace-nowrap">No HP</th>
                    <th class="text-center whitespace-nowrap">Alamat</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                {{$value['id']}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="text-slate-500">{{$value['nama']}}</div>
                    </td>
                    <td>
                        <div class="text-slate-500">{{$value['asal_sekolah']}}</div>
                    </td>
                    <td>
                        <div class="text-slate-500">{{$value['tempat_lahir']}}</div>
                    </td>
                    <td class="text-center">{{$value ['tanggal_lahir']}}</td>
                    <td class="text-center">{{$value ['no_hp']}}</td>
                    <td class="">
                        <div class="flex utem-center justify-center {{ $value['alamat']}}">
                            {{$value ['alamat']}}
                        </div>
                    </td>
                    <td class="table-report__action w-56">

                                    <form action="{{ route('dashboardestroy' , $value['id']) }}" method='POST'>
                                    @csrf
                                    @method("delete")
                                    <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('dashboardedit',$value['id']) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <button class="flex items-center text-danger" type="submit"
                                    data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
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
@endsection
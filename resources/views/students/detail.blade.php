@extends("layouts.master")

@section("title", "Detail Siswa")

@section("content")
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Siswa
            <!--begin::Separator-->
            <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
            <!--end::Separator-->
            <!--begin::Description-->
            <span class="text-muted fs-7 fw-bold mt-2">Detail Siswa {{ $data->name }}</span>
            <!--end::Description--></h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('students.index') }}" class="btn btn-sm btn-danger">Kembali</a>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Nama</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>NIM</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->nim }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Jurusan</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->major->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Jenis Kelamin</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ ($data->gender == "MEN") ? "Laki-laki" : "Perempuan" }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>E-Mail</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->email }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Phone</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->phone }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Provinsi</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->province->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Kota/Kabupaten</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->regency->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Kecamatan</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->district->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <strong>Alamat Lengkap</strong>
                            </div>
                            <div class="col-lg-8">
                                {{ $data->address }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection

@section("js")

@endsection
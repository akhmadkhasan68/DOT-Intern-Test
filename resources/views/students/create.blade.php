@extends("layouts.master")

@section("title", "Data Siswa")

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
            <span class="text-muted fs-7 fw-bold mt-2">Buat Siswa Baru</span>
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
                    <form autocomplete="off" onsubmit="event.preventDefault(); submitForm(this)" action="{{ route('students.store') }}" method="post">
                        <div class="card-body">
                            @csrf
                            <h3>Data Diri Siswa</h3>
                            <div class="separator mx-1 my-4"></div>

                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="name">Nama</label>
                                <input type="text" class="form-control form-control-solid" name="name" placeholder="Masukkan Nama Siswa ...">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="phone">Jenis Kelamin</label>
                                <div class="form-check form-check-custom form-check-solid mt-3">
                                    <input class="form-check-input" type="radio" name="gender" value="MEN" id="genderMen"/>
                                    <label class="form-check-label" for="genderMen">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mt-3">
                                    <input class="form-check-input" type="radio" name="gender" value="WOMEN" id="genderWomen"/>
                                    <label class="form-check-label" for="genderWomen">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="nim">NIM</label>
                                <input type="text" class="form-control form-control-solid" name="nim" placeholder="Masukkan NIM Siswa ...">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="email">E-Mail</label>
                                <input type="email" class="form-control form-control-solid" name="email" placeholder="Masukkan E-Mail Siswa ...">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="phone">Nomor Telepon</label>
                                <input type="number" class="form-control form-control-solid" name="phone" placeholder="Masukkan Nomor Telepon Siswa ...">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="major_id">Jurusan</label>
                                <select class="form-select form-select-solid" name="major_id" aria-label="Pilih jurusan siswa">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach($majors as $major)
                                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <h3 class="mt-5">Alamat Domisili Siswa</h3>
                            <div class="separator mx-1 my-4"></div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="province_id">Provinsi</label>
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih Provinsi" id="province_id" name="province_id" aria-label="Pilih provinsi siswa" onchange="onchangeProvince(this, '#regency_id')">
                                    <option></option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="regency_id">Kota/Kabupaten</label>
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih Kota/Kabupaten" id="regency_id" name="regency_id" aria-label="Pilih kota/kabupaten siswa" onchange="onchangeRegency(this, '#district_id')">
                                    <option></option>
                                    @foreach($regencies as $regency)
                                        <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="district_id">Kecamatan</label>
                                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Pilih Kecamatan" id="district_id" name="district_id" aria-label="Pilih kecamatan siswa">
                                    <option></option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-label required" for="address">Alamat</label>
                                <textarea name="address" class="form-control form-control-solid" id="address" cols="30" rows="10" placeholder="Masukkan Alamat Lengkap Siswa ..."></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-block" id="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection

@section("js")
    <script>
        $(document).ready(function(){
            
        });
    </script>
@endsection
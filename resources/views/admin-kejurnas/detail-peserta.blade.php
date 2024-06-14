@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Detail Peserta
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h4 class="mb-3">Detail Peserta</h4>
    <div class="table-responsive">
        <table class="table table-sm">
            <tr>
                <td>Jumlah Kontingen</td>
                <td>: {{ $kontingen }}</td>
            </tr>
            <tr>
                <td>Jumlah Atlet</td>
                <td>: {{ $atlet }}</td>
            </tr>
            <tr>
                <th colspan="2">Jenis Kelamin</th>
            </tr>
            <tr>
                <td>Laki-laki</td>
                <td>: {{ $jk }}</td>
            </tr>
            <tr>
                <td>Perempuan</td>
                <td>: {{ $atlet - $jk }}</td>
            </tr>
        </table>
    </div>

    
    <hr>
    <h4>Kategori Tanding</h4>
    <hr>

    <h5 class="text-center text-bg-secondary">Remaja</h5>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah Peserta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A</td>
                    <td>{{ $r_t_a }}</td>
                    <td>{{ $r_t_a_pi }}</td>
                    <td>{{ $r_t_a + $r_t_a_pi }}</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>{{ $r_t_b }}</td>
                    <td>{{ $r_t_b_pi }}</td>
                    <td>{{ $r_t_b + $r_t_b_pi }}</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>{{ $r_t_c }}</td>
                    <td>{{ $r_t_c_pi }}</td>
                    <td>{{ $r_t_c + $r_t_c_pi }}</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>{{ $r_t_d }}</td>
                    <td>{{ $r_t_d_pi }}</td>
                    <td>{{ $r_t_d + $r_t_d_pi }}</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>{{ $r_t_e }}</td>
                    <td>{{ $r_t_e_pi }}</td>
                    <td>{{ $r_t_e + $r_t_e_pi }}</td>
                </tr>
                <tr>
                    <td>F</td>
                    <td>{{ $r_t_f }}</td>
                    <td>{{ $r_t_f_pi }}</td>
                    <td>{{ $r_t_f + $r_t_f_pi }}</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>{{ $r_t_g }}</td>
                    <td>0</td>
                    <td>{{ $r_t_g + 0 }}</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td>{{ $r_t_h }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $r_t_h + 0 }}</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>{{ $r_t_i }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $r_t_i + 0 }}</td>
                </tr>
                <tr>
                    <td>J</td>
                    <td>{{ $r_t_j }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $r_t_j + 0 }}</td>
                </tr>
                
            </tbody>
        </table>
    </div>

    
@endsection
{{-- /konten --}}

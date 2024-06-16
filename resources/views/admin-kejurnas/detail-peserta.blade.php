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

    {{-- pra usia dini --}}
    <hr>
    <h4 class="text-center text-bg-secondary p-2">Pra Usia Dini</h4>
    <hr>
    <h5>Kategori Seni</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Seni</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">Seni Tunggal Tangan Kosong</td>
                    <td>{{ $pud_s_ttk }}</td>
                    <td>{{ $pud_s_ttk_pi }}</td>
                    <td>{{ $pud_s_ttk + $pud_s_ttk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Tunggal Bersenjata</td>
                    <td>{{ $pud_s_tb }}</td>
                    <td>{{ $pud_s_tb_pi }}</td>
                    <td>{{ $pud_s_tb + $pud_s_tb_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $pud_s_ttk + $pud_s_tb }}</td>
                    <td>{{ $pud_s_ttk_pi + $pud_s_tb_pi }}</td>
                    <td>{{ $pud_s_ttk + $pud_s_tb + $pud_s_ttk_pi + $pud_s_tb_pi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- usia dini --}}
    <hr>
    <h4 class="text-center text-bg-warning p-2">Usia Dini</h4>
    <hr>
    <h5>Kategori Tanding</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Kelas</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah Peserta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A</td>
                    <td>{{ $ud_t_a }}</td>
                    <td>{{ $ud_t_a_pi }}</td>
                    <td>{{ $ud_t_a + $ud_t_a_pi }}</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>{{ $ud_t_b }}</td>
                    <td>{{ $ud_t_b_pi }}</td>
                    <td>{{ $ud_t_b + $ud_t_b_pi }}</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>{{ $ud_t_c }}</td>
                    <td>{{ $ud_t_c_pi }}</td>
                    <td>{{ $ud_t_c + $ud_t_c_pi }}</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>{{ $ud_t_d }}</td>
                    <td>{{ $ud_t_d_pi }}</td>
                    <td>{{ $ud_t_d + $ud_t_d_pi }}</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>{{ $ud_t_e }}</td>
                    <td>{{ $ud_t_e_pi }}</td>
                    <td>{{ $ud_t_e + $ud_t_e_pi }}</td>
                </tr>
                <tr>
                    <td>F</td>
                    <td>{{ $ud_t_f }}</td>
                    <td>{{ $ud_t_f_pi }}</td>
                    <td>{{ $ud_t_f + $ud_t_f_pi }}</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>{{ $ud_t_g }}</td>
                    <td>{{ $ud_t_g_pi }}</td>
                    <td>{{ $ud_t_g + $ud_t_g_pi }}</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td>{{ $ud_t_h }}</td>
                    <td>{{ $ud_t_h_pi }}</td>
                    <td>{{ $ud_t_h + $ud_t_h_pi }}</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>{{ $ud_t_i }}</td>
                    <td>{{ $ud_t_i_pi }}</td>
                    <td>{{ $ud_t_i + $ud_t_i_pi }}</td>
                </tr>
                <tr>
                    <td>J</td>
                    <td>{{ $ud_t_j }}</td>
                    <td>{{ $ud_t_j_pi }}</td>
                    <td>{{ $ud_t_j + $ud_t_j_pi }}</td>
                </tr>
                <tr>
                    <td>K</td>
                    <td>{{ $ud_t_k }}</td>
                    <td>{{ $ud_t_k_pi }}</td>
                    <td>{{ $ud_t_k + $ud_t_k_pi }}</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>{{ $ud_t_l }}</td>
                    <td>{{ $ud_t_l_pi }}</td>
                    <td>{{ $ud_t_l + $ud_t_l_pi }}</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>{{ $ud_t_m }}</td>
                    <td>{{ $ud_t_m_pi }}</td>
                    <td>{{ $ud_t_m + $ud_t_m_pi }}</td>
                </tr>
                <tr>
                    <td>BEBAS</td>
                    <td>{{ $ud_t_bebas }}</td>
                    <td>{{ $ud_t_bebas_pi }}</td>
                    <td>{{ $ud_t_bebas + $ud_t_bebas_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $ud_t_a + $ud_t_b + $ud_t_c + $ud_t_d + $ud_t_e + $ud_t_f + $ud_t_g + $ud_t_h + $ud_t_i + $ud_t_j + $ud_t_k + $ud_t_l + $ud_t_m + $ud_t_bebas }}
                    </td>
                    <td>{{ $ud_t_a_pi + $ud_t_b_pi + $ud_t_c_pi + $ud_t_d_pi + $ud_t_e_pi + $ud_t_f_pi + $ud_t_g_pi + $ud_t_h_pi + $ud_t_i_pi + $ud_t_j_pi + $ud_t_k_pi + $ud_t_l_pi + $ud_t_m_pi + $ud_t_bebas_pi }}
                    </td>
                    <td>{{ $ud_t_a + $ud_t_b + $ud_t_c + $ud_t_d + $ud_t_e + $ud_t_f + $ud_t_g + $ud_t_h + $ud_t_i + $ud_t_j + $ud_t_k + $ud_t_l + $ud_t_m + $ud_t_bebas + ($ud_t_a_pi + $ud_t_b_pi + $ud_t_c_pi + $ud_t_d_pi + $ud_t_e_pi + $ud_t_f_pi + $ud_t_g_pi + $ud_t_h_pi + $ud_t_i_pi + $ud_t_j_pi + $ud_t_k_pi + $ud_t_l_pi + $ud_t_m_pi + $ud_t_bebas_pi) }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <h5>Kategori Seni</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Seni</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">Seni Tunggal Tangan Kosong</td>
                    <td>{{ $ud_s_ttk }}</td>
                    <td>{{ $ud_s_ttk_pi }}</td>
                    <td>{{ $ud_s_ttk + $ud_s_ttk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Tunggal Bersenjata</td>
                    <td>{{ $ud_s_tb }}</td>
                    <td>{{ $ud_s_tb_pi }}</td>
                    <td>{{ $ud_s_tb + $ud_s_tb_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $ud_s_ttk + $ud_s_tb }}</td>
                    <td>{{ $ud_s_ttk_pi + $ud_s_tb_pi }}</td>
                    <td>{{ $ud_s_ttk + $ud_s_tb + $ud_s_ttk_pi + $ud_s_tb_pi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- pra remaja --}}
    <hr>
    <h4 class="text-center text-bg-primary p-2">Pra Remaja</h4>
    <hr>
    <h5>Kategori Tanding</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Kelas</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah Peserta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A</td>
                    <td>{{ $pr_t_a }}</td>
                    <td>{{ $pr_t_a_pi }}</td>
                    <td>{{ $pr_t_a + $pr_t_a_pi }}</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>{{ $pr_t_b }}</td>
                    <td>{{ $pr_t_b_pi }}</td>
                    <td>{{ $pr_t_b + $pr_t_b_pi }}</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>{{ $pr_t_c }}</td>
                    <td>{{ $pr_t_c_pi }}</td>
                    <td>{{ $pr_t_c + $pr_t_c_pi }}</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>{{ $pr_t_d }}</td>
                    <td>{{ $pr_t_d_pi }}</td>
                    <td>{{ $pr_t_d + $pr_t_d_pi }}</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>{{ $pr_t_e }}</td>
                    <td>{{ $pr_t_e_pi }}</td>
                    <td>{{ $pr_t_e + $pr_t_e_pi }}</td>
                </tr>
                <tr>
                    <td>F</td>
                    <td>{{ $pr_t_f }}</td>
                    <td>{{ $pr_t_f_pi }}</td>
                    <td>{{ $pr_t_f + $pr_t_f_pi }}</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>{{ $pr_t_g }}</td>
                    <td>{{ $pr_t_g_pi }}</td>
                    <td>{{ $pr_t_g + $pr_t_g_pi }}</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td>{{ $pr_t_h }}</td>
                    <td>{{ $pr_t_h_pi }}</td>
                    <td>{{ $pr_t_h + $pr_t_h_pi }}</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>{{ $pr_t_i }}</td>
                    <td>{{ $pr_t_i_pi }}</td>
                    <td>{{ $pr_t_i + $pr_t_i_pi }}</td>
                </tr>
                <tr>
                    <td>J</td>
                    <td>{{ $pr_t_j }}</td>
                    <td>{{ $pr_t_j_pi }}</td>
                    <td>{{ $pr_t_j + $pr_t_j_pi }}</td>
                </tr>
                <tr>
                    <td>K</td>
                    <td>{{ $pr_t_k }}</td>
                    <td>{{ $pr_t_k_pi }}</td>
                    <td>{{ $pr_t_k + $pr_t_k_pi }}</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>{{ $pr_t_l }}</td>
                    <td>{{ $pr_t_l_pi }}</td>
                    <td>{{ $pr_t_l + $pr_t_l_pi }}</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>{{ $pr_t_m }}</td>
                    <td>{{ $pr_t_m_pi }}</td>
                    <td>{{ $pr_t_m + $pr_t_m_pi }}</td>
                </tr>
                <tr>
                    <td>BEBAS</td>
                    <td>{{ $pr_t_bebas }}</td>
                    <td>{{ $pr_t_bebas_pi }}</td>
                    <td>{{ $pr_t_bebas + $pr_t_bebas_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $pr_t_a + $pr_t_b + $pr_t_c + $pr_t_d + $pr_t_e + $pr_t_f + $pr_t_g + $pr_t_h + $pr_t_i + $pr_t_j + $pr_t_k + $pr_t_l + $pr_t_m + $pr_t_bebas }}
                    </td>
                    <td>{{ $pr_t_a_pi + $pr_t_b_pi + $pr_t_c_pi + $pr_t_d_pi + $pr_t_e_pi + $pr_t_f_pi + $pr_t_g_pi + $pr_t_h_pi + $pr_t_i_pi + $pr_t_j_pi + $pr_t_k_pi + $pr_t_l_pi + $pr_t_m_pi + $pr_t_bebas_pi }}
                    </td>
                    <td>{{ $pr_t_a + $pr_t_b + $pr_t_c + $pr_t_d + $pr_t_e + $pr_t_f + $pr_t_g + $pr_t_h + $pr_t_i + $pr_t_j + $pr_t_k + $pr_t_l + $pr_t_m + $pr_t_bebas + ($pr_t_a_pi + $pr_t_b_pi + $pr_t_c_pi + $pr_t_d_pi + $pr_t_e_pi + $pr_t_f_pi + $pr_t_g_pi + $pr_t_h_pi + $pr_t_i_pi + $pr_t_j_pi + $pr_t_k_pi + $pr_t_l_pi + $pr_t_m_pi + $pr_t_bebas_pi) }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <h5>Kategori Seni</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Seni</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">Seni Tunggal Tangan Kosong</td>
                    <td>{{ $pr_s_ttk }}</td>
                    <td>{{ $pr_s_ttk_pi }}</td>
                    <td>{{ $pr_s_ttk + $pr_s_ttk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Tunggal Bersenjata</td>
                    <td>{{ $pr_s_tb }}</td>
                    <td>{{ $pr_s_tb_pi }}</td>
                    <td>{{ $pr_s_tb + $pr_s_tb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Tangan Kosong</td>
                    <td>{{ $pr_s_gtk }}</td>
                    <td>{{ $pr_s_gtk_pi }}</td>
                    <td>{{ $pr_s_gtk + $pr_s_gtk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Bersenjata</td>
                    <td>{{ $pr_s_gb }}</td>
                    <td>{{ $pr_s_gb_pi }}</td>
                    <td>{{ $pr_s_gb + $pr_s_gb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Tangan Kosong dan Bersenjata</td>
                    <td>{{ $pr_s_gtkb }}</td>
                    <td>{{ $pr_s_gtkb_pi }}</td>
                    <td>{{ $pr_s_gtkb + $pr_s_gtkb_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $pr_s_ttk + $pr_s_tb + $pr_s_gtk + $pr_s_gb + $pr_s_gtkb }}</td>
                    <td>{{ $pr_s_ttk_pi + $pr_s_tb_pi + $pr_s_gtk_pi + $pr_s_gb_pi + $pr_s_gtkb_pi }}</td>
                    <td>{{ $pr_s_ttk + $pr_s_tb + $pr_s_gtk + $pr_s_gb + $pr_s_gtkb + $pr_s_ttk_pi + $pr_s_tb_pi + $pr_s_gtk_pi + $pr_s_gb_pi + $pr_s_gtkb_pi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- remaja --}}
    <hr>
    <h4 class="text-center text-bg-success p-2">Remaja</h4>
    <hr>
    <h5>Kategori Tanding</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Kelas</th>
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
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $r_t_a + $r_t_b + $r_t_c + $r_t_d + $r_t_e + $r_t_f + $r_t_g + $r_t_h + $r_t_i + $r_t_j }}</td>
                    <td>{{ $r_t_a_pi + $r_t_b_pi + $r_t_c_pi + $r_t_d_pi + $r_t_e_pi + $r_t_f_pi }}</td>
                    <td>{{ $r_t_a + $r_t_b + $r_t_c + $r_t_d + $r_t_e + $r_t_f + $r_t_g + $r_t_h + $r_t_i + $r_t_j + $r_t_a_pi + $r_t_b_pi + $r_t_c_pi + $r_t_d_pi + $r_t_e_pi + $r_t_f_pi }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <h5>Kategori Seni</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Seni</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">Seni Tunggal Tangan Kosong</td>
                    <td>{{ $r_s_ttk }}</td>
                    <td>{{ $r_s_ttk_pi }}</td>
                    <td>{{ $r_s_ttk + $r_s_ttk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Tunggal Bersenjata</td>
                    <td>{{ $r_s_tb }}</td>
                    <td>{{ $r_s_tb_pi }}</td>
                    <td>{{ $r_s_tb + $r_s_tb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Tangan Kosong</td>
                    <td>{{ $r_s_gtk }}</td>
                    <td>{{ $r_s_gtk_pi }}</td>
                    <td>{{ $r_s_gtk + $r_s_gtk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Bersenjata</td>
                    <td>{{ $r_s_gb }}</td>
                    <td>{{ $r_s_gb_pi }}</td>
                    <td>{{ $r_s_gb + $r_s_gb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Tangan Kosong dan Bersenjata</td>
                    <td>{{ $r_s_gtkb }}</td>
                    <td>{{ $r_s_gtkb_pi }}</td>
                    <td>{{ $r_s_gtkb + $r_s_gtkb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Trio</td>
                    <td>{{ $r_s_t }}</td>
                    <td>{{ $r_s_t_pi }}</td>
                    <td>{{ $r_s_t + $r_s_t_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $r_s_ttk + $r_s_tb + $r_s_gtk + $r_s_gb + $r_s_gtkb + $r_s_t }}</td>
                    <td>{{ $r_s_ttk_pi + $r_s_tb_pi + $r_s_gtk_pi + $r_s_gb_pi + $r_s_gtkb_pi + $r_s_t_pi }}</td>
                    <td>{{ $r_s_ttk + $r_s_tb + $r_s_gtk + $r_s_gb + $r_s_gtkb + $r_s_t + $r_s_ttk_pi + $r_s_tb_pi + $r_s_gtk_pi + $r_s_gb_pi + $r_s_gtkb_pi + $r_s_t_pi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- dewasa --}}
    <hr>
    <h4 class="text-center text-bg-danger p-2">Dewasa</h4>
    <hr>
    <h5>Kategori Tanding</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Kelas</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah Peserta</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A</td>
                    <td>{{ $d_t_a }}</td>
                    <td>{{ $d_t_a_pi }}</td>
                    <td>{{ $d_t_a + $d_t_a_pi }}</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td>{{ $d_t_b }}</td>
                    <td>{{ $d_t_b_pi }}</td>
                    <td>{{ $d_t_b + $d_t_b_pi }}</td>
                </tr>
                <tr>
                    <td>C</td>
                    <td>{{ $d_t_c }}</td>
                    <td>{{ $d_t_c_pi }}</td>
                    <td>{{ $d_t_c + $d_t_c_pi }}</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>{{ $d_t_d }}</td>
                    <td>{{ $d_t_d_pi }}</td>
                    <td>{{ $d_t_d + $d_t_d_pi }}</td>
                </tr>
                <tr>
                    <td>E</td>
                    <td>{{ $d_t_e }}</td>
                    <td>{{ $d_t_e_pi }}</td>
                    <td>{{ $d_t_e + $d_t_e_pi }}</td>
                </tr>
                <tr>
                    <td>F</td>
                    <td>{{ $d_t_f }}</td>
                    <td>{{ $d_t_f_pi }}</td>
                    <td>{{ $d_t_f + $d_t_f_pi }}</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>{{ $d_t_g }}</td>
                    <td>0</td>
                    <td>{{ $d_t_g + 0 }}</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td>{{ $d_t_h }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $d_t_h + 0 }}</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>{{ $d_t_i }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $d_t_i + 0 }}</td>
                </tr>
                <tr>
                    <td>J</td>
                    <td>{{ $d_t_j }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $d_t_j + 0 }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $d_t_a + $d_t_b + $d_t_c + $d_t_d + $d_t_e + $d_t_f + $d_t_g + $d_t_h + $d_t_i + $d_t_j }}</td>
                    <td>{{ $d_t_a_pi + $d_t_b_pi + $d_t_c_pi + $d_t_d_pi + $d_t_e_pi + $d_t_f_pi }}</td>
                    <td>{{ $d_t_a + $d_t_b + $d_t_c + $d_t_d + $d_t_e + $d_t_f + $d_t_g + $d_t_h + $d_t_i + $d_t_j + $d_t_a_pi + $d_t_b_pi + $d_t_c_pi + $d_t_d_pi + $d_t_e_pi + $d_t_f_pi }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <h5>Kategori Seni</h5>
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr>
                    <th class="w-50">Seni</th>
                    <th>Putra</th>
                    <th>Putri</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">Seni Tunggal Tangan Kosong</td>
                    <td>{{ $d_s_ttk }}</td>
                    <td>{{ $d_s_ttk_pi }}</td>
                    <td>{{ $d_s_ttk + $d_s_ttk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Tunggal Bersenjata</td>
                    <td>{{ $d_s_tb }}</td>
                    <td>{{ $d_s_tb_pi }}</td>
                    <td>{{ $d_s_tb + $d_s_tb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Tangan Kosong</td>
                    <td>{{ $d_s_gtk }}</td>
                    <td>{{ $d_s_gtk_pi }}</td>
                    <td>{{ $d_s_gtk + $d_s_gtk_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Bersenjata</td>
                    <td>{{ $d_s_gb }}</td>
                    <td>{{ $d_s_gb_pi }}</td>
                    <td>{{ $d_s_gb + $d_s_gb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Ganda Tangan Kosong dan Bersenjata</td>
                    <td>{{ $d_s_gtkb }}</td>
                    <td>{{ $d_s_gtkb_pi }}</td>
                    <td>{{ $d_s_gtkb + $d_s_gtkb_pi }}</td>
                </tr>
                <tr>
                    <td class="text-start">Seni Trio</td>
                    <td>{{ $d_s_t }}</td>
                    <td>{{ $d_s_t_pi }}</td>
                    <td>{{ $d_s_t + $d_s_t_pi }}</td>
                </tr>
                <tr class="fw-bold">
                    <td>Total</td>
                    <td>{{ $d_s_ttk + $d_s_tb + $d_s_gtk + $d_s_gb + $d_s_gtkb + $d_s_t }}</td>
                    <td>{{ $d_s_ttk_pi + $d_s_tb_pi + $d_s_gtk_pi + $d_s_gb_pi + $d_s_gtkb_pi + $d_s_t_pi }}</td>
                    <td>{{ $d_s_ttk + $d_s_tb + $d_s_gtk + $d_s_gb + $d_s_gtkb + $d_s_t + $d_s_ttk_pi + $d_s_tb_pi + $d_s_gtk_pi + $d_s_gb_pi + $d_s_gtkb_pi + $d_s_t_pi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
{{-- /konten --}}

// dewasa
        // tanding
        $d_t_a = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'A')->where('jk', 'PA')->get()->count();
        $d_t_b = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'B')->where('jk', 'PA')->get()->count();
        $d_t_c = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'C')->where('jk', 'PA')->get()->count();
        $d_t_d = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'D')->where('jk', 'PA')->get()->count();
        $d_t_e = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'E')->where('jk', 'PA')->get()->count();
        $d_t_f = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'F')->where('jk', 'PA')->get()->count();
        $d_t_g = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'G')->where('jk', 'PA')->get()->count();
        $d_t_h = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'H')->where('jk', 'PA')->get()->count();
        $d_t_i = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'I')->where('jk', 'PA')->get()->count();
        $d_t_j = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'J')->where('jk', 'PA')->get()->count();
        $d_t_a_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'A')->where('jk', 'PI')->get()->count();
        $d_t_b_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'B')->where('jk', 'PI')->get()->count();
        $d_t_c_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'C')->where('jk', 'PI')->get()->count();
        $d_t_d_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'D')->where('jk', 'PI')->get()->count();
        $d_t_e_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'E')->where('jk', 'PI')->get()->count();
        $d_t_f_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'F')->where('jk', 'PI')->get()->count();
        // seni
        $d_s_ttk    = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Tunggal Tangan Kosong')->where('jk', 'PA')->get()->count();
        $d_s_tb     = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Tunggal Bersenjata')->where('jk', 'PA')->get()->count();
        $d_s_gtk    = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Ganda Tangan Kosong')->where('jk', 'PA')->get()->count();
        $d_s_gb     = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Ganda Bersenjata')->where('jk', 'PA')->get()->count();
        $d_s_gtkb   = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PA')->get()->count();
        $d_s_t      = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Trio')->where('jk', 'PA')->get()->count();
        $d_s_ttk_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Tunggal Tangan Kosong')->where('jk', 'PI')->get()->count();
        $d_s_tb_pi  = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Tunggal Bersenjata')->where('jk', 'PI')->get()->count();
        $d_s_gtk_pi = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Ganda Tangan Kosong')->where('jk', 'PI')->get()->count();
        $d_s_gb_pi  = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Ganda Bersenjata')->where('jk', 'PI')->get()->count();
        $d_s_gtkb_pi= DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Ganda Tangan Kosong dan Bersenjata')->where('jk', 'PI')->get()->count();
        $d_s_t_pi   = DB::table($atlets)->where('golongan', 'Dewasa')->where('kelas_tanding', 'Trio')->where('jk', 'PI')->get()->count();